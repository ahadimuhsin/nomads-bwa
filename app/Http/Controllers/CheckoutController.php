<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaction;
use App\TransactionDetail;
use App\TravelPackage;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Mail;
use App\Mail\TransactionSuccess;
use Exception;
use Midtrans\Config;
use Midtrans\Snap;

class CheckoutController extends Controller
{

    //fungsi menampilkan halaman checkout
    public function index(Request $request, $id)
    {
        $item = Transaction::with(['details', 'travel_package', 'user'])->findOrFail($id);
        return view('pages.main.checkout', compact('item'));
    }

    //dijalankan saat transaksi sukses
    public function success(Request $request, $id){

        $transaction = Transaction::with(['details', 'travel_package.galleries', 'user'])->findOrFail($id);

        $transaction->transaction_status = 'PENDING';

        $transaction->save();

        //Set konfigurasi midtrans
        Config::$serverKey = config('midtrans.server_key');
        Config::$isProduction = config('midtrans.is_production');
        Config::$isSanitized = config('midtrans.is_sanitize');
        Config::$is3ds = config('midtrans.is_3ds');

        //array untuk dikirim ke midtrans
        $midtrans_params =
        [
            'transaction_details' => [
                'order_id' => 'NOMADS-'.$transaction->id,
                'gross_amount' => (int) $transaction->transaction_total
            ],
            'customer_detail' => [
                'first_name' => $transaction->user->name,
                'email' => $transaction->user->email
            ],
            'enabled_payments' => ['gopay'],
            'vtweb' => []
        ];

        try{
            //ambil halaman payment di midtrans
              $paymentUrl = Snap::createTransaction($midtrans_params)->redirect_url;
                // echo $paymentUrl;
              //redirect ke halaman midtrans
              return redirect()->away($paymentUrl);
            //   header('Location: https://www.facebook.com/');

        }
        catch (Exception $e){
            echo $e->getMessage();
        }


        // // return $transaction;
        // //kirim email ke user
        // Mail::to($transaction->user)->send(
        //     new TransactionSuccess($transaction)
        // );

        // return view('pages.main.success');
    }

    //memproses transaksi
    public function process(Request $request, $id)
    {
        $travel_package = TravelPackage::findOrFail($id);

        $transaction = Transaction::create([
            'travel_packages_id' => $id,
            'users_id' =>  Auth::user()->id,
            'additional_visa' => 0,
            'transaction_total' => $travel_package->price,
            'transaction_status' => 'IN_CART'
        ]);

        TransactionDetail::create([
            'transaction_id' => $transaction->id,
            'username' => Auth::user()->username,
            'nationality' => 'ID',
            'is_visa' => false,
            'doe_passport' => Carbon::now()->addYears(5)
        ]);

        return redirect()->route('checkout', $transaction->id);
    }
    //menghapus transaksi
    public function remove(Request $request, $detail_id)
    {
        $item = TransactionDetail::findOrFail($detail_id);

        $transaction = Transaction::with(['details', 'travel_package'])
        ->findOrFail($item->transaction_id);

        if ($item->is_visa) {
            $transaction->transaction_total -= 190;
            $transaction->additional_visa -= 190;
        }

        $transaction->transaction_total -= $transaction->travel_package->price;
        $transaction->save();

        $item->delete();

        return redirect()->route('checkout', $item->transaction_id);

    }
    //membuat transaksi
    public function create(Request $request, $id)
    {
        $this->validate($request, [
            'username' => 'required|string|exists:users,username',
            'nationality' => 'required',
            'is_visa' => 'required|boolean',
            'doe_passport' => 'required'
        ]);

        $data = $request->all();
        $data['transaction_id'] = $id;

        TransactionDetail::create($data);

        $transaction = Transaction::with(['travel_package'])->findOrFail($id);

        if($request->is_visa){
            $transaction->transaction_total += 190;
            $transaction->additional_visa += 190;
        }

        $transaction->transaction_total += $transaction->travel_package->price;
        $transaction->save();

        return redirect()->route('checkout', $id);
    }


}

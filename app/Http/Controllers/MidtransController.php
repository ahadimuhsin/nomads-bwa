<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Midtrans\Config;
use App\Mail\TransactionSuccess;
use App\Transaction;
use Illuminate\Support\Facades\Mail;
use Midtrans\Notification;

class MidtransController extends Controller
{
    //
    public function notificationHandler (Request $request)
    {
        //set konfigurasi midtrans

        Config::$serverKey = config('midtrans.server_key');
        Config::$isProduction = config('midtrans.is_production');
        Config::$isSanitized = config('midtrans.is_sanitize');
        Config::$is3ds = config('midtrans.is_3ds');

        //buat instance midtrans notification
        $notification = new Notification();

        //pecah order id
        //misal dari NOMADS-12
        //jadi['NOMADS'][12]
        $order = explode('-', $notification->order_id);

        //assign variabel untuk memudahkan config
        $status = $notification->transaction_status;
        $type = $notification->payment_type;
        $fraud = $notification->fraud_status;
        $order_id = $order[1];

        //cari transaksi berdasarkan ID
        $transaction = Transaction::findOrFail($order_id);

        //handle notifikasi status midtrans
        if($status == 'capture'){
            if($type == 'creditcard'){
                if($fraud == 'challenge'){
                    $transaction->transaction_status = 'CHALLENGE';
                }
                else{
                    $transaction->transaction_status = 'SUCCESS';
                }
            }
        }

        else if ($status == 'settlement'){
            $transaction->transaction_status = 'SUCCESS';
        }
        else if($status == 'pending'){
            $transaction->transaction_status = 'PENDING';
        }
        else if($status == 'deny'){
            $transaction->transaction_status = 'FAILED';
        }
        else if($status == 'expire'){
            $transaction->transaction_status = 'FAILED';
        }
        else if ($transaction == 'cancel'){
            $transaction ->transaction_status = 'FAILED';
        }

        //simpan transaksi
        $transaction->save();

        //kirim email
        if($transaction){
            if($status == 'capture' && $fraud == 'accept'){
                Mail::to($transaction->user)->send(
                    new TransactionSuccess($transaction)
                );
            }
            else if($status == 'settlement'){
                Mail::to($transaction->user)->send(
                    new TransactionSuccess($transaction)
                );
            }
            else if($status == 'success'){
                Mail::to($transaction->user)->send(
                    new TransactionSuccess($transaction)
                );
            }
            else if($status == 'capture' && $fraud == 'challenge'){
                return response()->json([
                    'meta' => [
                        'code' => 200,
                        'message' => 'Midtrans transaction Challenge'
                    ]
                ]);
            }
            else{
                return response()->json([
                    'meta' => [
                        'code' => 200,
                        'message' => 'Midtrans Not Settlement'
                    ]
                ]);
            }

            return response()->json([
                'meta' => [
                    'code' => 200,
                    'message' => 'Midtrans Notification Success'
                ]
            ]);
        }
    }

    public function finishRedirect (Request $request)
    {
        return view('pages.main.success');
    }

    public function unfinishRedirect (Request $request)
    {
        return view('pages.main.unfinished');
    }

    public function errorRedirect (Request $request)
    {
        return view('pages.main.failed');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Transaction;
use App\Http\Requests\Admin\TransactionRequest;
use Carbon\Carbon;
use Illuminate\Support\Str;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $items = Transaction::with(['details', 'travel_package', 'user'])
        ->get();

        return view('pages.admin.transaction.index', [
            'items' => $items
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function create()
    // {
    //     //
    //     return view('pages.admin.transaction.create');
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TransactionRequest $request)
    {
        //
        $data = $request->all();

        $data['slug'] = Str::slug(strtolower($request->title));

        //menghapus tanda ribuan dari hasil request price
        //kemudian convert ke int agar bisa disimpan ke database
        $price = str_replace('.', '', $request->price);
        $data['price'] = (int)$price;
        ;
        //konversi format tanggal
        $data['departure_date'] = Carbon::createFromFormat('m/d/Y', $request->departure_date)->format('Y-m-d');

        Transaction::create($data);

        return redirect()->route('transaction.index')->with(['success' => 'Ubah galeri berhasil!']);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
         $item = Transaction::with(['details', 'travel_package', 'user'])
         ->findOrFail($id);

         return view('pages.admin.transaction.detail', compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $item = Transaction::findOrFail($id);

        return view('pages.admin.transaction.edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TransactionRequest $request, $id)
    {
        //
        //
        $data = $request->all();

        //menghapus tanda ribuan dari hasil request price
        //kemudian convert ke int agar bisa disimpan ke database

        $item = Transaction::findOrFail($id);


        $item->update($data);

        return redirect()->route('transaction.index')->with(['success' => 'Ubah transaksi berhasil!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $travel = Transaction::findOrFail($id);

        $travel->delete();

        return redirect()->route('transaction.index')->with(['success' => 'Hapus transaksi berhasil!']);
    }
}

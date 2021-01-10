<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\TravelPackage;
use App\Http\Requests\Admin\TravelPackageRequest;
use Carbon\Carbon;
use Illuminate\Support\Str;

class TravelPackageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $items = TravelPackage::with('galleries')->orderBy('id', 'asc')->get();
        // dd($items);
        // $items->departure_date = Carbon::createFromFormat('d m Y', $items->departure_date);
        // dd($items->departure_date);

        return view('pages.admin.travel-package.index', [
            'items' => $items
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('pages.admin.travel-package.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TravelPackageRequest $request)
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

        TravelPackage::create($data);

        return redirect()->route('travel-package.index')->with(['success' => 'Tambah Paket Travel berhasil!']);

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
        $travel = TravelPackage::findOrFail($id);

        return view('pages.admin.travel-package.edit', compact('travel'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TravelPackageRequest $request, $id)
    {
        //
        //
        $data = $request->all();

        $data['slug'] = Str::slug(strtolower($request->title));

        //menghapus tanda ribuan dari hasil request price
        //kemudian convert ke int agar bisa disimpan ke database

        $item = TravelPackage::findOrFail($id);

        if($request->price != $item->price){
            $price = str_replace('.', '', $request->price);
            $data['price'] = (int)$price;
        }

        //konversi format tanggal
        if($request->departure_date != $item->departure_date){
            $data['departure_date'] = Carbon::createFromFormat('m/d/Y', $request->departure_date)->format('Y-m-d');
        }


        $item->update($data);

        return redirect()->route('travel-package.index')->with(['success' => 'Ubah paket travel berhasil!']);
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
        $travel = TravelPackage::findOrFail($id);

        $travel->delete();

        return redirect()->route('travel-package.index')->with(['success' => 'Hapus paket travel berhasil!']);
    }
}

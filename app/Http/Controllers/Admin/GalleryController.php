<?php

namespace App\Http\Controllers\Admin;

use App\Gallery;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\GalleryRequest;
use App\TravelPackage;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $galleries = Gallery::with(['travel_package'])->get();

        return view('pages.admin.gallery.index', compact('galleries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $travel_packages = TravelPackage::all();

        return view('pages.admin.gallery.create', compact('travel_packages'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GalleryRequest $request)
    {
        //
        $data = $request->all();

        $data['image'] = $request->file('image')
        ->store('assets/gallery', 'public');

        Gallery::create($data);

        return redirect()->route('gallery.index')->with(['success' => 'Tambah galeri berhasil!']);
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
        $item = Gallery::findOrFail($id);
        $travel_packages = TravelPackage::all();

        return view('pages.admin.gallery.edit', compact('item', 'travel_packages'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(GalleryRequest $request, $id)
    {
        //
        $data = $request->all();

        $item = Gallery::findOrFail($id);

        if($request->file('image')){
            if($item->image && file_exists(storage_path('app/public/'.$item->image))){
                Storage::delete('public/'.$item->image);
            }
            $data['image'] = $request->file('image')
            ->store('assets/gallery', 'public');
        }

        $item->update($data);

        return redirect()->route('gallery.index')->with(['success' => 'Ubah galeri berhasil!']);
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
        $item = Gallery::findOrFail($id);

        $item->delete();
        Storage::delete('public/'.$item->image);

        return redirect()->route('gallery.index')->with(['success' => 'Hapus galeri berhasil!']);
    }
}

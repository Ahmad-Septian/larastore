<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Pesanan;
use App\Product;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Admin\PesananRequest;

class PesananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pesanans = Pesanan::with(['pesanan_details', 'user'])->get();
        // $product = Product::get();

        return view('pages.admin.pesanan.index', [
            'pesanans' => $pesanans,
            // 'product' => $product
        ]); 
    }

    public function search(Request $request)
    {
        $search = "";

        $search = $request->search;


        if($search !== ""){
            $pesanans = Pesanan::where("kode_pemesanan", "LIKE", "%". $search . "%")->paginate(5);
        }else{
            $pesanans = Pesanan::paginate(5);
        }

        return view('pages.admin.pesanan.index', [
            'pesanans' => $pesanans
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
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PesananRequest $request)
    {
        $data = $request->all();
     

        Pesanan::create($data);

        return redirect()->route('pesanan');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pesanan = Pesanan::with(['pesanan_details', 'user'])->findOrFail($id);

        return view('pages.admin.pesanan.detail', [
            'pesanan' => $pesanan
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pesanan = Pesanan::findOrFail($id);

        return view('pages.admin.pesanan.edit', [
            'pesanan' => $pesanan
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
       

        $pesanan = Pesanan::FindOrFail($id);
        $pesanan->update($data);

        Session()->flash('record_update','Pesanan Berhasil Di Update');

        return redirect()->route('pesanan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pesanan = Pesanan::FindOrFail($id);
        $pesanan->delete();

        Session()->flash('record_delete','Pesanan Berhasil Di Hapus');

        return redirect()->route('pesanan');
    }
}

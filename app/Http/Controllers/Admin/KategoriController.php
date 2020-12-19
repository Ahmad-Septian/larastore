<?php

namespace App\Http\Controllers\Admin;

use App\Kategori;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\KategoriRequest;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kategoris = Kategori::paginate(5);

        return view('pages.admin.kategori.index', [
            'kategoris' => $kategoris
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.kategori.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(KategoriRequest $request)
    {
        $data = $request->all();
        $data['gambar'] = $request->file('gambar')->store(
            'assets/kategori',
            'public'
        );

        Kategori::create($data);

        Session()->flash('record_add','Kategori Berhasil Di Tambahkan');
        
        return redirect()->route('kategori');

    }

 
    public function show($id)
    {
        //
    }

  
    public function edit($id)
    {
        $kategori = Kategori::findOrFail($id);

        return view('pages.admin.kategori.edit', [
            'kategori' =>$kategori
        ]);
    }

    
    public function update(Request $request, $id)
    {
        $gambar = $request->file('gambar');

        if(!empty($gambar)){
            $data['gambar'] = $request->file('gambar')->store(
                'assets/kategori',
                'public'
            );
        }else{
            $data = $request->all();
        }   

        $kategori = Kategori::findOrFail($id);
        $kategori->update($data);

        Session()->flash('record_update','Kategori Berhasil Di Update');

        return redirect()->route('kategori');

    }


    public function destroy($id)
    {
        $kategori = Kategori::findOrFail($id);
        $kategori->delete();
        
        Session()->flash('record_delete','Kategori Berhasil Di Hapus');

        return redirect()->route('kategori');
    }
}

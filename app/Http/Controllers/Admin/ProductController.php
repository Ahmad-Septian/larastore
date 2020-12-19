<?php

namespace App\Http\Controllers\Admin;

use App\Product;
use App\Kategori;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProductRequest;

class ProductController extends Controller
{

    public $kategori;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Product::with('kategori')->paginate(5);
        
        return view('pages.admin.product.index',[
            'items' => $items
        ]);
    }

    
    public function create()
    {
        $kategoris = Kategori::all();
        
        return view('pages.admin.product.create', [
            'kategoris' => $kategoris
        ]);
    }

    
    public function store(ProductRequest $request)
    {
        $data = $request->all();
        // dd($data);
        $data['gambar'] = $request->file('gambar')->store(
            'assets/gallery',
            'public'
        );

        Product::create($data);

        Session()->flash('record_add','Product Berhasil Di Tambahkan');
        return redirect()->route('product');
    }

  
    public function show($id)
    {
        //
    }

  
    public function edit($id)
    {
        $item = Product::findOrFail($id);
        $kategoris = Kategori::all();


        return view('pages.admin.product.edit', [
            'item' => $item,
            'kategoris' => $kategoris
        ]);
    }

   
    public function update(Request $request, $id)
    {
        $gambar = $request->file('gambar');

      
        if(!empty($gambar)) {
            $data['gambar'] = $request->file('gambar')->store(
                'assets/gallery',
                'public'
            );
        }else{
            $data = $request->all();
        }

        $item = Product::findOrFail($id);
        $item->update($data);

        Session()->flash('record_update','Product Berhasil Di Update');

        return redirect()->route('product');
    }

   
    public function destroy($id)
    {
        $item = Product::findOrFail($id);
        $item->delete();

        Session()->flash('record_delete','Product Berhasil Di Hapus');
        return redirect()->route('product');
    }
}

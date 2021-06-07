<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ModelProduct;
use Image;

class ProductController extends Controller
{

    private $objProduct;

    public function __construct()
    {
        $this->objProduct = new ModelProduct();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = $this->objProduct->cursorPaginate(5);
        return view('index', compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|min:6',
            'description' => 'max:4000',
            'image' => 'required|image|mimes:jpg,png,gif|max:5000',
            'stock' => 'required'
        ]);

        if($request->hasFile('image')){
          $request->image->store('images', 'public');
          $product = new ModelProduct([
            "title" => $request->get('title'),
            "description" => $request->get('description'),
            "image" => $request->image->hashName(),
            "stock" => $request->get('stock')
          ]);
        }
        $product->save();

        return redirect('products')
        ->with('success','Item created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $product = ModelProduct::find($id);
      return view('show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = $this->objProduct->find($id);
        return view('create', compact('product'));
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
      $request->validate([
          'title' => 'required|min:6',
          'description' => 'max:4000',
          'stock' => 'required'
      ]);

      $this->objProduct->where(['id'=>$id])->update([
      'title'=>$request->title,
      'description'=>$request->description,
      'stock'=>$request->stock
  ]);
  return redirect('products');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $del = $this->objProduct->destroy($id);
      return($del)?"yes":"no";
    }
}

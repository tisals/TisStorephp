<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\Models\Category;


class ProductController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
 
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        return view('product.index', [
            'products' => Product::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::all();
        return view('product.create', compact('category'));
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
            'name' => ['required', 'string', 'max:50'],
            'value' => ['required', 'integer' ],
            'description' => ['required', 'string'],
            'category_id' => ['required', 'integer']
        ]);
            $image='';
        if ($request->file('image')!= null){
            $image = $this->get_and_save_image($request->file('image'));
        }
        $state=$request->status;
        if ($state==''){
            $state='Activo';
        }

        Product::create([
            'name'=> $request->get('name'),
            'description'=> $request->get('description'),
            'value'=> $request->get('value'),
            'image'=> $image,
            'type'=> $request->get('type'),
            'brand'=> $request->get('brand'),
            'status'=> $state,
            'category_id'=> $request->get('category_id'),
        ]);
        return redirect('/product');
    }

    public function get_and_save_image($image){
       
        $extension = $image->getClientOriginalExtension();
        storage::disk('public')->put($image->getFilename().'.'.$extension, File::get($image));
        //dd($image->getFilename().'.'.$extension) ;
        return $image->getFilename().'.'.$extension ;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        $category = category::all();
        return view('product.show', [
            'product'=> $product,
            
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $category = category::all();
        return view('product.edit',compact('product', 'category'));
     /*   return view('product.edit',[
            'category' => $category,
            'product' => $product,
            
        ]);*/
        

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //$category = category::all();
        $request->validate([
            'name' => ['required', 'string', 'max:50'],
            'value' => ['required', 'integer' ],
            'description' => ['required', 'string'],
            'category_id'=>['required', 'integer']
        ]);

        if ($request->file('image')!= null){
            $product->image = $this->get_and_save_image($request->file('image'));
        }
        $state=$request->status;
        if ($state==''){
            $state='Activo';
        }

        $product->name = $request->get('name');
        $product->description = $request->get('description');
        $product->value= $request->get('value');
        $product->type= $request->get('type');
        $product->brand= $request->get('brand');
        $product->status= $state;
        $product->category_id= $request->get('category_id');
        $product -> save();
        return redirect('/product');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product-> delete();
        return redirect()->route('product.index');
    }

    public function listproduct()
    {
        $category = category::all();
        $products = product::all();
        return view('product.listproduct',compact('products', 'category'));
       /* return view('product.listproduct', [
            'products' => product::all()
        ]);*/
    }
}

<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->query = Auth::user()->type;
            if($this->query == 'backend'){
                return $next($request);
            }else{
                return redirect()->route('inicio');
            }  
        });
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $products = Product::all();

        return view('backend.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'price' => 'required|numeric',
            'tax' => 'required|numeric',
        ]);

        $product = new Product();
        $product->image = $request->image;
        $product->name = $request->name;
        $product->price = $request->price;
        $product->tax = $request->tax;
        $product->description = $request->description;
        if($product->save()){
            return redirect()->route('products.show', $product->id);
        }else{
            return redirect()->back()->with('error', '¡Error!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::findOrFail($id);

        return view('backend.products.show' , compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);

        return view('backend.products.edit' , compact('product'));
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
        $this->validate($request,[
            'name' => 'required',
            'price' => 'required|numeric',
            'tax' => 'required|numeric',
        ]);

        $product = Product::findOrFail($id);
        $product->image = $request->image;
        $product->name = $request->name;
        $product->price = $request->price;
        $product->tax = $request->tax;
        $product->description = $request->description;
        if($product->save()){
            return redirect()->route('products.show', $product->id);
        }else{
            return redirect()->back()->with('error', '¡Error!');
        }
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
    }

    public function delete($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->back();
    }
}

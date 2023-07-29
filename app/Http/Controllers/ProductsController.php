<?php

namespace App\Http\Controllers;

use App\Products;
use Illuminate\Http\Request;
use Auth;
class ProductsController extends Controller
{
    public function __construct() {

        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('products.index')->with('products',Products::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('products.create');
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

            'name'=>'required',
            'image'=>'required',
            'price'=>'required|numeric',
            'description'=>'required'
        ]);

        $featured=$request->image;
        $new_name=time().$featured->getClientOriginalName();
        $featured->move('uploads/products',$new_name);

        $product = Products::create([
            'name'=>$request->name,
            'image'=>'uploads/products/'.$new_name,
            'price'=>$request->price,
            'description'=>$request->description,
        ]);

        return redirect()->route('products.index');
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
       return view('products.update')->with('product',Products::find($id));
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

            'name'=>'required',
            'image'=>'required',
            'price'=>'required|numeric',
            'description'=>'required'
        ]);

        $product=Products::find($id);

        if($request->hasFile('image'))
        {

        $featured=$request->image;
        $new_name=time().$featured->getClientOriginalName();
        $featured->move('uploads/products',$new_name);
        if(file_exists($product->image))
        unlink($product->image);
        $product->image='uploads/products/'.$new_name;
        $product->save();
        }

        $product->name=$request->name;
        $product->price=$request->price;
        $product->description=$request->description;
        $product->save();

        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product=Products::find($id);

        if(file_exists($product->image))
        unlink($product->image);

        $product->delete();

        return redirect()->back();


    }
}

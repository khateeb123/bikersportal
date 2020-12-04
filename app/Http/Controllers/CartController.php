<?php

namespace App\Http\Controllers;

use App\Product;

use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('user.cart');
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
    public function store(Request $request, Product $product)
    {
        $cart =  session()->get('cart');


        // if cart has nothing
        if (! $cart) {

            $cart[$product->id]=[

                'name'       => $product->name,
                'price'      => $product->price,
                'quantity'   => $request->quantity,
                'image'      => $product->image,

            ];
            session()->put('cart',$cart);

            if (request()->has('buy')) {

                return view('user.checkout');
            }

            return back()->with('success','product is added to cart !');
            
        }

        

        //if this item is exist in cart then update the given quantity
       if (isset($cart[$product->id])) {

                $cart[$product->id]['quantity']=$request->quantity ;
                
                session()->put('cart',$cart);

            if (request()->has('buy')) {
                
                return view('user.checkout');
            }

                return back()->with('success', 'product is updated again !');
                            
            }
        

            //if this item not exist in cart 
             $cart[$product->id]=[

                'name'       => $product->name,
                'price'      => $product->price,
                'quantity'   => $request->quantity,
                'image'      => $product->image,

            ];
                session()->put('cart',$cart);

                if (request()->has('buy')) {
                
                return view('user.checkout');
            }
            
                return back()->with('success', 'product is added to car');

        
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cart=session('cart');
        unset($cart[$id]);
        session()->put('cart',$cart);
        return back()->with('success','item is removed !');
    }
}

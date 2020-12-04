<?php

namespace App\Http\Controllers;

use App\Address;
use App\OrderDetail;

use App\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.checkout');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
       if (request()->has('clicked')) {//if check box is clicked then store both addresses
        $attributes=request()->validate([
      'fname'       => 'required',
      'lname'       =>'required',
      'address'     => 'required',
      'countary'    =>'required',
      'city'        => 'required',
      'zip'         => 'required',
      'phone'       => 'required',

      'fname2'       => 'required',
      'lname2'       =>'required',
      'address2'     => 'required',
      'countary2'    =>'required',
      'city2'        => 'required',
      'zip2'         => 'required',
      'phone2'       => 'required',
                
                ]);
           
       }
        else { //else store first address 
    

        $attributes=request()->validate([
        'fname'     => 'required',
      'lname'       =>'required',
      'address'     => 'required',
      'countary'    =>'required',
      'city'        => 'required',
      'phone'       => 'required',
      'zip'         => 'required'
                
                ]);
          }


          if (session('cart')) {
            //store the address, its 'id' would be used in order 
              $address = Address::create($attributes);
            // create order , its 'id' would be used in order detail
              $order = Order::create([

                            'user_id'    => auth()->id(),
                            'address_id' => $address->id,
                            'total_price'=> session('total'),

                                    ]);
              // store every product in orderDetail-table
              foreach (session('cart') as $id => $product) {

                        OrderDetail::create([

                                'order_id'       => $order->id,
                                'product_id'     => $id,
                                'quantity'      =>  $product['quantity'],
                                'sub_total_price' => $product['quantity']*$product['price'],

                                    ]);

              }
              // clean the session
              session()->forget(['cart','total']);

              return redirect()->route('/')->with('success','thank you for shopping ');





          } else {
               return redirect()->route('/')->with('error','first go for shopping ! ');
          }
          

       
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}

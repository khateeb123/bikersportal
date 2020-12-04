<?php

namespace App\Http\Controllers;

use App\Address;
use App\City;
use App\RentBike;
use App\RentOrder;
use Illuminate\Http\Request;
use Carbon\Carbon;

class RentBikeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   $cities=City::all();
        return view('rent.rent')->with('cities',$cities);
    } 


    public function cityBikes() 
    {   $id=request()->city_id;

            $city=City::where('id',$id)->first();
            $rentBikes=RentBike::where('city_id',$id)->get();



      
        return view('rent.city_bikes')->with('city',$city)->with('rentBikes',$rentBikes);
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cities = City::all();
          return view('admin.add_rent_bike')->with('cities',$cities);

              }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Product $product)
    {
        return $product;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\RentBike  $rentBike
     * @return \Illuminate\Http\Response
     */
    public function showRentBike(RentBike $rentBike)
    {
        return view('rent.rent_bike_detail')->with('rentBike',$rentBike);
    }
 /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\RentBike  $rentBike
     * @return \Illuminate\Http\Response




     
     */
    public function rentBikeCheckout(RentBike $rentBike)
    {
        request()->validate([
            'startDate' => ['required','date','after:today'],
            'endDate'   =>['required','date','after:startDate']
        ]);

        $startDate = new Carbon(request('startDate'));
        $endDate   = new Carbon (request('endDate'));

         $days =$endDate->diff($startDate)->days;

        $rentOrder=[

           'user_id' => auth()->id(),
           'rent_bike_id' => $rentBike->id,
           'total_rent'   => $rentBike->rent*$days,
           'start_date'   => $startDate,
           'end_date'     => $endDate,
           'days'         => $days,
                    ];

        session()->put('rentOrder',$rentOrder);

        return view('rent.rent_checkout')->with('rentOrder',$rentOrder);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\RentBike  $rentBike
     * @return \Illuminate\Http\Response

    



     */
    public function rentOrderStore()
    {
    
        $attributes=request()->validate([
        'fname'     => 'required',
      'lname'       =>'required',
      'address'     => 'required',
      'countary'    =>'required',
      'city'        => 'required',
      'phone'       => 'required',
      'zip'         => 'required'
                
                ]);

       $address  = Address::create($attributes);
       
       $rentOrder = session()->get('rentOrder');
       $rentOrder['address_id']=$address->id;

       RentOrder::create($rentOrder);
       session()->forget('rentOrder');

       return redirect()->route('user-profile')->with('success','thanks, rent order is placed !');


    }

    public function edit(RentBike $rentBike)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\RentBike  $rentBike
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RentBike $rentBike)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\RentBike  $rentBike
     * @return \Illuminate\Http\Response
     */
    public function destroy(RentBike $rentBike)
    {
        //
    }


   
}

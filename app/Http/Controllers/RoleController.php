<?php

namespace App\Http\Controllers;


use App\Order;
use App\RentOrder;
use App\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=[
            'orders' => auth()->user()->orders,
            'rentOrders' => auth()->user()->rentOrders,


        ];

        return view('user.user_profile')->with($data);
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function updatePassword(Request $request, Role $role)
    {  
        request()->validate([
            'newPass'=> ['required']


        ]);



            if (Hash::check(request('oldPass'), auth()->user()->password  )) {
                
                $password=Hash::make(request('newPass'));

                auth()->user()->update(['password'=>$password]);

                return back()->with('success','password is chenged');

            }
            return back()->with('error','old  password is not mached');

   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response

     */
     public function updateProfile(Request $request, Role $role)
    {  
        
            $attributes = request()->validate([
                'name'  => 'required',
                'contact'  => 'required',

            ]);

            auth()->user()->update($attributes);
            return back()->with('success','profile is updated successfully');
    }
    public function destroy(Role $role)
    {
        //
    }
}

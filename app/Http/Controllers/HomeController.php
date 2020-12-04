<?php

namespace App\Http\Controllers;


use App\OrderDetail;
use App\RentOrder;
use App\Order;
use Illuminate\Http\Request;
use App\ProductCategory;
use App\Product;
use App\User;
use App\RentBike;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth','admin'])->except(['orderDetail']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
      $counts=[
      'orders' => Order::all()->count(),
      'rentOrders' => RentOrder::all()->count(),
      'products' => Product::all()->count(),
      'rentBikes' => RentBike::all()->count(),
      'bikes' => ProductCategory::where('name','bike')->first()->products->count(),
      'parts' => ProductCategory::where('name','part')->first()->products->count(),
      'accessories' => ProductCategory::where('name','accessory')->first()->products->count(),

      'users' => User::all()->count(),
     
      ];
      
    
        return view('admin.admin_dashboard')->with($counts);
    }

    public function orders()
    {
      $orders=Order::all();
        return view('admin.orders')->with('orders',$orders);
    }
  public function acceptOrder(Order $order)
    {
      $order->update(['status'=>'accepted']);
      
        return back();
     }
  public function rejectOrder(Order $order)
    {
      $order->update(['status'=>'rejected']);
      
      
        return back();
    }




public function acceptROrder(RentOrder $rentOrder)
    {
      $rentOrder->update(['status'=>'accepted']);
      
        return back();
     }
  public function rejectROrder(RentOrder $rentOrder)
    {
      $rentOrder->update(['status'=>'rejected']);
      
      
        return back();
    }



     public function orderDetail(Order $order)
    {
      

  
        return view('admin.order_detail')->with('order',$order);
    }


    public function rentOrders()
    {
      $rentOrders=RentOrder::all();
        return view('admin.rent_orders')->with('rentOrders',$rentOrders);
    }

    public function rentBikes()
    {
        $rentBikes = RentBike::all();

        return view('admin.rent_bikes')->with('rentBikes', $rentBikes);
    }

    public function storeRent(Request $request)
    {
    $attributes = request()->validate([
       'city_id'                 => 'required',
      'name'                     => 'required',
      'description'              => 'required',
      'rent'                    => 'required',
      'color'                    => 'required',
      'image'                    => ['image','nullable','max:1999']
                

                ]);


       if ($request->hasFile('image')) {
           $fileName =  time().$request->file('image')->getClientOriginalName();
           $path    = $request->file('image')->storeAs('public/image',$fileName);
         
       } else {
           $fileName = 'no image.jpg';
       }
       $attributes['image'] = $fileName;

       RentBike::create($attributes);
       return back()->with('success','product is created !');

     }




    public function bikes()
    {
      $bikes      = ProductCategory::where('name','bike')->first()->products;

        return view('admin.bikes')->with('bikes',$bikes);
    }

    Public function parts()
    {
        $parts      = ProductCategory::where('name','part')->first()->products;

        return view('admin.parts')->with('parts',$parts);
    }

    public function accessories()
    {
      $accessories= ProductCategory::where('name','accessory')->first()->products;

        return view('admin.accessories')->with('accessories',$accessories);
    }


    public function inventory()
    {
        $data=[
            'bikes'      => ProductCategory::where('name','bike')->first()->products,
            'parts'      => ProductCategory::where('name','part')->first()->products,
            'accessories'=> ProductCategory::where('name','accessory')->first()->products,
            'rentBikes'   => RentBike::all()
        ];


        return view('admin.inventory')->with($data);
    }

    public function users()
    {
        $users = User::where('role_id',1)->get();

        return view('admin.users')->with('users', $users);
    }

    public function blockUser(User $user)
    {
      $user->update(['status'=>'blocked']);

      return back();
    }

     public function unblockUser(User $user)
    {
        $user->update(['status'=>'active']);

        return back();
    }



    public function editProduct(Product $product)
    {
        return view('admin.edit_product')->with('product', $product);
    }
    public function updateProduct(Request $request,Product $product)
    {

        $attributes = request()->validate([
     
      'name'                     => 'required',
      'modal'                    => 'required',
      'description'              => 'required',
      'price'                    => 'required',
      'quantity'                 => 'required',
      'color'                    => 'required',
      'image'                    => ['image','nullable','max:1999']
                

                ]);
       
       if ($request->hasFile('image')) {
           $fileName =  time().$request->file('image')->getClientOriginalName();
           $path    = $request->file('image')->storeAs('public/image',$fileName);
           $attributes['image'] = $fileName;
         
                }


   $product->update($attributes);
       return redirect()->route('inventory')->with('success','product updated now ! ');
    }
    public function deleteProduct(Product $product)
    {
        $product->delete();
        return back();
    }

     public function editRentBike(RentBike $rentBike)
    {
       return view('admin.edit_rent_bike')->with('rentBike',$rentBike);
    } 

    public function updateRentBike(Request $request, RentBike $rentBike)
    {
        $attributes = request()->validate([
     
      'name'                     => 'required',
      'description'              => 'required',
      'rent'                    => 'required',
      'color'                    => 'required',
      'image'                    => ['image','nullable','max:1999']
                

   ]);
       
       if ($request->hasFile('image')) {

           $fileName =  time().$request->file('image')->getClientOriginalName();
           $path    = $request->file('image')->storeAs('public/image',$fileName);
           $attributes['image'] = $fileName;
         
                }

        $rentBike->update($attributes);

       return redirect()->route('inventory')->with('success','product updated now ! ');
    }   

    public function deleteRentBike(RentBike $rentBike)
    {
      $rentBike->delete();
      return back()->with('success','rent bike  is deleted !');
    }
}

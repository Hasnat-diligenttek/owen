<?php

namespace App\Http\Controllers;

use App\Models\Addtocart;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\Product;
use App\Models\Blance;
use Carbon\Carbon;

class AddtocartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd(Auth::user(),session()->all());
        if(Auth::user()){
            $user_id = Auth::user()->id;
        }else{
            $user_id = session()->get('session_id');
        }
        $check =  Addtocart::where([
            ['user_id','=',$user_id],
            ['product_id','=',$request->product_id],
            ])->first();

        $product = Product::find($request->product_id);

        if ($check!=null) {
            $total_qty =$request->quantity + $check->quantity;

            $save = Addtocart::find($check->id);
            $save->quantity = $request->quantity + $check->quantity;
            $save->total_price =  $total_qty * $product->price_1;
            $save->user_id = $user_id;
            $save->save();

        }
        else{
            $save = new Addtocart();
            $save->product_id = $request->product_id;
            $save->quantity = $request->quantity;
            $save->price = $product->price_1;
            $save->total_price =  $request->quantity * $product->price_1;
            $save->user_id = $user_id;
            $save->save();
        }

        return 1;
    }

    /**
     * Display the specified resource.
     */

     public function fetch_cart() {
        if(Auth::user()){
            $cart =  Addtocart::join('products','addtocarts.product_id','=','products.id')->where('user_id',Auth::user()->id)
            ->select('addtocarts.*','products.product_name','products.thumb_image')->get();
            $price =  Addtocart::join('products','addtocarts.product_id','=','products.id')->where('user_id',Auth::user()->id)->sum('price');

        }else{

            $cart =  Addtocart::join('products','addtocarts.product_id','=','products.id')->where('user_id',session()->get('session_id'))
            ->select('addtocarts.*','products.product_name','products.thumb_image')->get();
            $price =  Addtocart::join('products','addtocarts.product_id','=','products.id')->where('user_id',session()->get('session_id'))->sum('total_price');
        }
        // dd($cart);
        $view = view('front_include.cart_product',compact('cart','price'));
        echo $view->render();

    }

   public function checkout(Request $request)
    {
        if(!Auth::user()){
            return view('profile.login');
            // dd(Auth::user());
        }else{
            for ($i=0; $i <count($request->cart_id); $i++) {
                $product_price =  Addtocart::join('products','addtocarts.product_id','=','products.id')->where('addtocarts.id',$request->cart_id[$i])->first();

                // dd($product_price);
            Addtocart::where('id',$request->cart_id[$i])->update([
                'quantity' => $request->qty[$i],
                'price' => $product_price->price_1,
                'total_price' => $product_price->price_1 * $request->qty[$i],
            ]);
        }
        $data = [
            'cart' =>Addtocart::join('products','addtocarts.product_id','=','products.id')->get(),
            'subtotal' =>Addtocart::join('products','addtocarts.product_id','=','products.id')->sum('total_price'),
            'deliv_start_date'=> Carbon::now()->addDays(5)->format('Y M d'),
            'deliv_end_date'=> Carbon::now()->addDays(10)->format('Y M d'),
            'blance'=>Blance::where('userId',Auth::user()->id)->sum('blance')

        ];
        return view('checkout')->with($data);
    }

    }
    public function remove_cart(Request $request)
    {
        // dd($request->all());
        $del  = Addtocart::where('id',$request->id)->delete();
        return 1;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Addtocart $addtocart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Addtocart $addtocart)
    {
        //
    }
}

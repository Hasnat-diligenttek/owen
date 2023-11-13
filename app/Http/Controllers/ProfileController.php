<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Address;
use App\Models\User;
use App\Models\Addtocart;
use App\Models\Order;


use Auth;
use Hash;
class ProfileController extends Controller
{
    public function ecom_dashboard() {
        $order = Order::
        join('products','orders.product_id','=','products.id')
        ->leftJoin('order_details','orders.id','=','order_details.order_id')
        ->select('orders.*','products.product_name','order_details.appartment')
        ->where('orders.user_id',Auth::user()->id)->get();

        // dd($order);
        $data = [
            'primary_bill_address' => Address::where('user_id',Auth::user()->id)->where('type',0)->first(),
          'primary_ship_address' => Address::where('user_id',Auth::user()->id)->where('type',1)->first(),
            'order' => $order,
        ];
        return view('profile.profile')->with($data);
    }
    public function b_login() {
        return view('profile.login');
    }
        public function b_signup() {
        return view('profile.signup');
    }

    public function create_account(Request $request){

         $request->validate(
           [
            'email' => 'required|string|email|max:255|unique:users',
            'name' => 'required',
            'lastname' => 'required',
             'password' => 'min:6',
            'password_confirmation' => 'required_with:password|same:password|min:6'

           ]
        );
// dd($request->all());
        $create = User::create([
            'email' => $request['email'],
            'name' => $request['name'],
            'lastname' => $request['lastname'],
            'password' => Hash::make($request['password'])
        ]);

        session()->flash('success','Account Successfully Created!');
        return redirect()->to('login/b');
    }


    public function profile_login(Request $request) {


        $check =  User::where('email',$request->email)->first();
        if ($check!=null) {
            if (Hash::check($request->password,$check->password)) {
                Auth::login($check);

                $update_session_id = Addtocart::where('user_id',session()->get('session_id'))->update([
                    'user_id'=> Auth::user()->id,
                ]);

                return redirect()->to('my-account');
                // dd('match');
            }else {
                session()->flash('danger','Invalid Password!');
                return redirect()->back();


            }





    }
      session()->flash('danger','Invalid Caredientials');
                return redirect()->back();


}
  public function update_address(Request $request){

      $upd = Address::where('user_id',Auth::user()->id)->where('type',$request->type)->first();

        if($upd==null){
            $upd = new Address();
        }
        $upd->reciever_name = $request->first_name;
        $upd->organization = $request->organization;
        $upd->address = $request->address;
        $upd->city = $request->city;
        $upd->zip_code = $request->zip;
        $upd->phone = $request->phone;
        $upd->user_id = Auth::user()->id;
        $upd->type = $request->type;
        $upd->save();

        session()->flash('success',"Address Updated Successfully");
        return redirect()->to('my-account');
    }
    public function logout() {
        Auth::logout();
        return redirect()->to('index');
    }

}


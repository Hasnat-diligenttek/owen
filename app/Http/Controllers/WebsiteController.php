<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Crypt;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use App\Models\Store;
use Illuminate\Support\Facades\Http;
use App\Models\Addtocart;
use App\Models\Order;
use App\Models\Order_detail;
use App\Models\Event;
use App\Models\event_payment;
use App\Models\Blance;

use Auth;
use DB;

class WebsiteController extends Controller
{
    public function v_login() {
        // return view('thankyou');

        // return view('virtual.login_detail');

        return view('virtual.login');
    }
    public function login_with_code() {
        return view('virtual.login_with_code');
    }

    public function shop(Request $request) {
        $items = Product::paginate(3);

        return view('shop',compact('items'));
        }

        function product() {
            $items = Product::get();
            $view = view('front_include.product', ['items' => $items]);
            return $html = $view->render();



        }
        function product_detail($id) {

            $data = [
                'product' => Product::find($id),
                'images'=> DB::table('productsimges')->where('product_id',$id)->get(),

            ];
            return view('product_detail')->with($data);
        }
        function fetch_data(Request $request) {
            // return 'hy';
            if ($request->ajax()) {
                $items = Product::paginate(3);
                return view('front_include.product',compact('items'))->render();

            }
        }

        public function send_code(Request $request) {

            $check = User::where('phone',$request->phone)->first();

            if($check!=null){
                $update_code = User::find($check->id);
                $update_code->sms_code = rand(0000,9999);
                $update_code->save();
                return 1;
            }else{
                return 0;
            }
        }
        function popup() {
            $data = [
                'store' => Store::where('status',1)->get(),
            ];
            return view('popup')->with($data);
        }
        function popupstore($storecode){
            // dd($storecode);
            return view('popupstore');
        }
        public function processPayment(Request $request)
        {
            $cart =  Addtocart::where('user_id',Auth::user()->id)->sum('total_price');
   $token = $request->input('token');
            $url = 'https://connect.squareupsandbox.com/v2/payments';
        $rand = rand(0000,9999);
            $data = [
                "idempotency_key" => "7b0f3ec5-086a-4871-8f13-3c81b387".$rand,
                "amount_money" => [
                    "amount" => $cart*100,
                    "currency" => "USD"
                ],
                "source_id" => $token,
                "autocomplete" => true,
                "customer_id" => "W92WH6P11H4Z77CTET0RNTGFW8",
                "location_id" => "L8TND7DB25H58",
                "reference_id" => "123456",
                "note" => "Brief description",
                // "app_fee_money" => [
                //     "amount" => 10,
                //     "currency" => "USD"
                // ]
            ];

            try {
                $response = Http::withHeaders([
                    'Authorization' => 'Bearer EAAAEDAHqaHo_jUI-Ixv_iE7CTHO4qR4OS9-0ijBet0P8SiI-yID_6OjYcqySmZS',
                    'Square-Version' => '2023-07-20',
                    'Content-Type' => 'application/json'
                ])->post($url, $data);

                return $response->body();
            } catch (\Exception $e) {
                return 'Error: ' . $e->getMessage();
            }
        }

        public function eventPayment(Request $request)
        {
            // dd($request->all());


           $token = $request->input('token');
            $url = 'https://connect.squareupsandbox.com/v2/payments';
            $rand = rand(0000,9999);
            $data = [
                "idempotency_key" => "7b0f3ec5-086a-4871-8f13-3c81b387".$rand,
                "amount_money" => [
                    "amount" => (int)$request->amount,
                    "currency" => "USD"
                ],
                "source_id" => $token,
                "autocomplete" => true,
                "customer_id" => "W92WH6P11H4Z77CTET0RNTGFW8",
                "location_id" => "L8TND7DB25H58",
                "reference_id" => "123456",
                "note" => "Brief description",
                // "app_fee_money" => [
                //     "amount" => 10,
                //     "currency" => "USD"
                // ]
            ];

            try {
                $response = Http::withHeaders([
                    'Authorization' => 'Bearer EAAAEDAHqaHo_jUI-Ixv_iE7CTHO4qR4OS9-0ijBet0P8SiI-yID_6OjYcqySmZS',
                    'Square-Version' => '2023-07-20',
                    'Content-Type' => 'application/json'
                ])->post($url, $data);

                $return= $response->body();
                $responseArray = json_decode($return,true);
                    // dd($responseArray);
                $save = new event_payment();
                $save->event_id = Crypt::decrypt($request->event_id);
                $save->amount = $request->amount;
                $save->sq_order_id = $responseArray['payment']['order_id'];
                $save->save();

                $event = Event::find(Crypt::decrypt($request->event_id));

                 $blance =  Blance::where('userId',$event->user_id)->first();
                    if($blance!=null){
                    $balanceUpdate = Blance::findOrFail($blance->id);
                    $balanceUpdate->blance = $blance->blance + $request->amount;
                    $balanceUpdate->save();
                    }else{
                    $newBlance = new Blance();
                    $newBlance->userId = $event->user_id;
                    $newBlance->blance = $request->amount;
                    $newBlance->save();

                    }
                 return 'DONE';

            } catch (\Exception $e) {
                     echo 'ERROR';

            }
        }
        function save_order(Request $request){
            // ORDER ID ZERO MEANS ITS PAYMENT FROM ACCOUNT BLANCE
            if($request->order_id==0){
            $total_price =  Addtocart::where('user_id',Auth::user()->id)->sum('total_price');
                 $blance =  Blance::where('userId',Auth::user()->id)->first();
                    if($blance!=null){
                        if($total_price <= $blance->blance){
            // dd($request->all());
            
                             $cart =  Addtocart::where('user_id',Auth::user()->id)->get();

                                    if($request->hasFile('box_cover')){
                                        $imageName = time().'.'.$request->box_cover->extension();
                                        $request->box_cover->move(public_path('box_cover'), $imageName);
                                     }else{
                                        $imageName = '';
                                     }
                            foreach ($cart as $key => $value) {
                
                                $order =  new Order();
                                $order->user_id = Auth::user()->id;
                                $order->product_id = $value->product_id;
                                $order->sq_order_id = $value->order_id;
                                $order->qty = $value->quantity;
                                $order->price = $value->price;
                                $order->total_price = $value->total_price;
                                $order->box_cover = $imageName;
                                $order->custom_option = $request->custom_option;
                                $order->gift_option = $request->gift_option;
                                $order->save();
                
                                $detail = new Order_detail();
                                $detail->order_id = $order->id;
                                $detail->email = $request->email;
                                $detail->phone_no = $request->phone;
                                $detail->f_name = $request->first_name;
                                $detail->l_name = $request->last_name;
                                $detail->address = $request->address;
                                $detail->appartment = $request->appartment;
                                $detail->city = $request->city;
                                $detail->province = $request->state;
                                $detail->zipcode = $request->zip;
                                $detail->gift_status = $request->gift;
                                $detail->save();
                            }
                            
                             $new_blance =  $blance->blance - $total_price;
                           
                             $new_b =  Blance::find($blance->id);             
                             $new_b->blance =$new_blance;
                             $new_b->save();
                            
                        }else{session()->flash('Inifucient Blance');return redirect()->back();}
                  
           
            }else{
                
            }
            
            }else{
                
            $cart =  Addtocart::where('user_id',Auth::user()->id)->get();

            if($request->hasFile('box_cover')){
                $imageName = time().'.'.$request->box_cover->extension();
                $request->box_cover->move(public_path('box_cover'), $imageName);
             }else{
                $imageName = '';
             }
            foreach ($cart as $key => $value) {

                $order =  new Order();
                $order->user_id = Auth::user()->id;
                $order->product_id = $value->product_id;
                $order->sq_order_id = $value->order_id;
                $order->qty = $value->quantity;
                $order->price = $value->price;
                $order->total_price = $value->total_price;
                $order->box_cover = $imageName;
                $order->custom_option = $request->custom_option;
                $order->gift_option = $request->gift_option;
                $order->save();

                $detail = new Order_detail();
                $detail->order_id = $order->id;
                $detail->email = $request->email;
                $detail->phone_no = $request->phone;
                $detail->f_name = $request->first_name;
                $detail->l_name = $request->last_name;
                $detail->address = $request->address;
                $detail->appartment = $request->appartment;
                $detail->city = $request->city;
                $detail->province = $request->state;
                $detail->zipcode = $request->zip;
                $detail->gift_status = $request->gift;
                $detail->save();
            }
            
            }
            Addtocart::where('user_id',Auth::user()->id)->delete();
            session()->put('success','Order Successfully Created!');
            return redirect()->to('thank_you');


        }
        function virtual_fundraising_payment($event_code){
            // dd($event_code);
            $data = [
                'event' => Event::join('users','events.user_id','=','users.id')->where('code',$event_code)->select('events.*','users.name','users.lastname')->first()

            ];

            // dd($data);
            return view('virtual_event_payment')->with($data);
        }


}

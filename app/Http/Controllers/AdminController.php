<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\User;
use Auth;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function login()
    {
        return view('admin.login');
    }
    public function dashboard()
    {
        return view('admin.dashboard');
    }
    public function login_check(Request $req)
    {
        // dd('hy');
        $check = User::where('email', $req->email)->first();
        if ($check != null) {
            if (Hash::check($req->password, $check->password)) {
                Auth::login($check);
                    // dd('hy');
                return $this->dashboard();

            } else {
                session()->flash('danger','Invalid Password');
                return $this->login();
            }

        }
        session()->flash('danger','Invalid Caredientiasls');
        return $this->login();
    }
    public function logout()
    {
        Auth::logout();
        return $this->login();

    }
    public function add_product()
    {

        $data = [
            'title' => 'Add Product',
        ];
        return view('admin.product.add_product')->with($data);
    }

    public function save_product(Request $request)
    {
        if ($request->hasFile('thumb_images')) {
            $random_name = rand(0000,9999).time();
            $imageName = $random_name . '.' . $request->thumb_images->extension();
            $request->thumb_images->move(public_path('product_image'), $imageName);
        }

        $save = new Product();
        $save->product_name = $request->product_name;
        $save->product_type = $request->product_type;
        $save->size = $request->size;
        $save->short_desc = $request->short_desc;
        $save->thumb_image = $imageName;
        $save->price_1 = $request->price_1;
        $save->price_3 = $request->price_3;
        $save->price_6 = $request->price_6;
        $save->save();




        if ($request->hasFile('images')) {

            foreach ($request->images as $key => $value) {

                    $random_name = rand(0000,9999).time();
                $imageName = $random_name . '.' . $value->extension();
                $value->move(public_path('product_image'), $imageName);

                $insert = DB::table('productsimges')->insert([

                    'product_id' => $save->id,
                    'image' => $imageName,

                ]);
            }
        }
        session()->flash('success','Product Successfully Added!');
      return redirect()->to('admin/all_product');

    }

    function all_product(){

        $data = [
            'title' => 'All Products',
            'product' => Product::all(),

        ];
        return view('admin.product.all_product')->with($data);

    }
}

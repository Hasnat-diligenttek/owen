<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Event;
use App\Models\Event_member;
use App\Models\Store;
use App\Models\event_payment;
use Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class Virtual_funding extends Controller
{
    public function virtual_login(Request $request) {
        $check = User::where('phone',$request->phone)->first();
        if($check!=null){
                if ($check->sms_code==$request->code) {
                    Auth::login($check);


                    // return $this->dashboard();
                    return redirect()->to('dashboard');
                }else{
                    session()->flash('danger','Invalid Code');
            return redirect()->back();

                }

        }else {

            // $create = new User();

            return redirect()->back();
        }
    }
    public function virtual_login_detail(Request $request){
        // dd($request->all());
        $save =  new User();
        $save->email = $request->email;
        $save->phone = $request->phone;
        $save->login_type = 1;
        $save->name = $request->first_name;
        $save->lastname = $request->last_name;
       $save->password = Hash::make(rand(0000,9999));

       $save->save();
        Auth::login($save);
        return redirect()->to('dashboard');

    }
    public function dashboard() {
        $join  = Event_member::join('events','event_members.event_id','=','events.id')->where('userId',Auth::user()->id)->get();

        $data = [
            'join_event' => $join,
            'all_event' => Event::where('user_id',Auth::user()->id)->get(),

        ];
        return view('virtual.dashboard')->with($data);

    }

   public function event_detail($code) {
    $event = Event::where('code','=',$code)->first();

    $data = [
           'event' => Event::where('code','=',$code)
           ->join('org_type_cate','events.org_type','=','org_type_cate.id')->select('events.*','org_type_cate.org_type_name')->first(),

           'leader' => Event_member::
           join('events','event_members.event_id','=','events.id')
           ->join('users','event_members.userId','=','users.id')
           ->select('event_members.userId','events.code','users.name')
           ->where('events.id',$event->id)->get(),
            'event' => Event::where('code','=',$code)
           ->join('org_type_cate','events.org_type','=','org_type_cate.id')->select('events.*','org_type_cate.org_type_name')->first(),

           'event_payment'=>event_payment::join('events','event_payments.event_id','=','events.id')->sum('amount'),
           'event_supporter'=>event_payment::where('event_id',$event->id)->count(),


        ];
        // dd($data);
        return view('virtual.event.detail')->with($data);
    }
   public function create_event() {
    // $html = '<select name="taxonomy-select" aria-label="Education &amp; Academics" data-id="automation-DGSelect-Education&amp;Academics" id="Education &amp; Academics"><option disabled="" value=""></option><option value="Pre-K">Pre-K</option><option value="DECA">DECA</option><option value="Elementary School">Elementary School</option><option value="Future Business Leaders of America">Future Business Leaders of America</option><option value="High School">High School</option><option value="Higher Education">Higher Education</option><option value="Middle School">Middle School</option><option value="Parent &amp; Teacher Groups">Parent &amp; Teacher Groups</option><option value="Preschools &amp; Daycare">Preschools &amp; Daycare</option><option value="Scholarships &amp; Student Financial Aid">Scholarships &amp; Student Financial Aid</option><option value="Science Olympiad">Science Olympiad</option><option value="SkillsUSA">SkillsUSA</option><option value="Stayover or Day Camps">Stayover or Day Camps</option><option value="Student Council &amp; Student Government">Student Council &amp; Student Government</option><option value="Student Services">Student Services</option><option value="Other">Other</option></select>';

    // // Extract option names using regular expression
    // preg_match_all('/<option value="([^"]+)">([^<]+)<\/option>/', $html, $matches);

    // // Get option names from the second capture group
    // $options = $matches[1];

    // foreach ($options as $key => $value) {
    //     DB::table('org_type_cate')->insert([
    //         'org_type_name' => $value,
    //         'org_status' =>0,
    //         'org_parent_id'=>3
    //     ]);
    // }
    // // Print the options array
    // print_r($options);
    // die();

    $data = [
        'org' => DB::table('org_type_cate')->where('org_status',1)->get(),
    ];
    return view('virtual.event.create')->with($data);
    }
    public function user_logout(){
        Auth::logout();
        return redirect()->to('index');
    }
    public function get_org_type(Request $request){
        // dd($request->all());

         return DB::table('org_type_cate')->where('org_parent_id',$request->id)->get();

    }
    public function save_event(Request $request){

        $code = Str::random(6);

        $save =  new Event();
        $save->team_name = $request->name;
        $save->org_type = $request->organization_type;
        $save->org_cate = $request->arts_culture;
        $save->org_name = $request->org_name;
        $save->start_date = $request->start_date;
        $save->zip_code = $request->zip_code;
        $save->code = $code;
        $save->user_id = Auth::user()->id;

        $save->end_date =  $request->end_date;
        $save->members = $request->members;
        $save->save();
        session()->flash('success','Event Successfully Created!');

            return redirect()->to('dashboard');
    }
    public function edit_event($id) {

            $data = [
                'event' => Event::find($id),
                'org' => DB::table('org_type_cate')->where('org_status',1)->get(),


            ];
        return view('virtual.event.edit')->with($data);
        }
        public function edit_get_org_type(Request $request) {

         $cate =  DB::table('org_type_cate')->where('org_parent_id',$request->id)->get();

         foreach ($cate as $key => $value) {

            if($value->id==$request->cate_id){
                echo '<option seleted value="'.$value->id.'"> '.$value->org_type_name.'</option>' ;
            }else{
                echo '<option value="'.$value->id.'"> '.$value->org_type_name.'</option>' ;
             }
         }


        }
        public function update_event(Request $request) {
            // dd($request->all());
             $id = Crypt::decryptString($request->id);

            $upd= Event::find($id);
            $upd->team_name = $request->name;
        $upd->org_type = $request->organization_type;
        $upd->org_cate = $request->org_cate;
        $upd->org_name = $request->org_name;
        $upd->start_date = $request->start_date;
        $upd->zip_code = $request->zip_code;

        $upd->end_date = $request->end_date;
        $upd->members = $request->members;
            $upd->save();
            session()->flash('success','Event Successfully Created!');

            return redirect()->to('dashboard');
        }

        public function update_profile(Request $request) {

            $upd  = User::find(Auth::user()->id);

            if ($request->has('name')) {
                $upd->name = $request->name;
                $upd->lastname = $request->last_name;
                $upd->save();
            }
            else {
                $upd->phone = $request->number;
                $upd->email = $request->email;
                $upd->save();
            }
            session()->flash('success','Profile Successfully Updated!');

            return redirect()->to('dashboard');


        }
        public function delete_event($id) {

            $upd= Event::where('id',$id)->delete();
            session()->flash('success','Profile Successfully Deleted!');

            return redirect()->to('dashboard');

        }

        public function join_event_code(Request $request) {
            // dd($request->all());
            $find = Event::where('code',$request->event_code)->where('user_id','!=',Auth::user()->id)->first();
            if ($find!=null) {
                $save =  new Event_member();
                $save->event_id = $find->id;
                $save->userId = Auth::user()->id;
                $save->save();
                return 'done';
            }else {
                return 'Code Error';
            }



        }
        public function event_join_detail($id){
            $id = Crypt::decryptString($id);

            $data = [
                'event' => Event::
                join('org_type_cate','events.org_type','=','org_type_cate.id')->select('events.*','org_type_cate.org_type_name')
                ->where('events.id','=',$id)
                ->first(),
             ];
             // where([['code','=',$code],['user_id','=',Auth::user()->id] ])
            //  dd($data['event']);
             return view('virtual.event.event_join_details')->with($data);

        }

        public function create_store($id){
            // dd($id);
            $data = [
                'event_id'=>$id
            ];

            return view('virtual.event.store.create_store')->with($data);

        }
        public function save_event_store(Request $request) {


            $save = new Store();

            if($request->hasFile('image')){
                $image= $request->image;
                $imageName=time().'.'.$image->getClientOriginalExtension();
                $request->image->move(public_path('store_image/') , $imageName);
                $save->image=$imageName;
            }

            $save->event_id =  Crypt::decryptString($request->event_id);
            $save->display_name = $request->display_name;
            $save->amount = $request->goal_amount;
            $save->store_code = bin2hex(openssl_random_pseudo_bytes(10));
            $save->user_id= Auth::user()->id;
            $save->status = $request->my_store;
            $save->save();

            session()->flash('success','Store Successfully Created!');
            return redirect()->to('dashboard');



        }
}

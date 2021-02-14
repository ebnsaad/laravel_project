<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\supplier;

class supplier_auth extends Controller
{
public function login(Request $req){
    $req->validate([
     'email'=>'required|email',
     'pass'=>'required'
    ]);
    $email=$req->input('email');
    $pass=$req->input('pass');

    $data=supplier::where('email','=',$email)->count();
      if($data > 0){
       $enc_pass=supplier::where('email','=',$email)->value('password');
        if(Hash::check($pass,$enc_pass)){
       $req->session()->put('s_supplier',$email);
       return redirect('setting');
   }else{
        $req->session()->flash('login_check','err');
        return redirect('logins');
   }   

    }
}

    public function signup(Request $req){

        $req->validate([

      't_first'=>'required',
      't_last'=>'required',
      't_national'=>'required',
      't_email'=>'required|email',
      't_address'=>'required',
      't_cat'=>'required',
      't_country'=>'required',
      't_pass'=>'required',
      't_photo'=>'required',
      't_bio'=>'required',
      't_phone'=>'required',
      't_post'=>'required',


            ]);
            $email=$req->input('t_email');

            $check_email=supplier::where('email','=',$email)->count();
            if($check_email >0){
                $req->session()->flash('check','done');
                return redirect('signups');
  
            }else{

                $s=new supplier;
                $s->f_name=$req->input('t_first');
                $s->l_last=$req->input('t_last');
                $s->national_id=$req->input('t_national');
                $s->email=$req->input('t_email');
                $s->post_code=$req->input('t_post');
                $s->bio=$req->input('t_bio');
                $s->img_url=$req->file('t_photo')->store("supplier_pic","public");
                $s->category=$req->input('t_cat');
                $s->country=$req->input('t_country');
                $s->password=Hash::make($req->input('t_pass'));
                $s->address=$req->input('t_address');
                $s->phone=$req->input('t_phone');
                $s->save();
               $req->session()->put('s_supplier',$req->input('t_email'));
               return redirect('setting');
            }

            

    }
}

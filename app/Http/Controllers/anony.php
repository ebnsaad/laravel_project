<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App;


class anony extends Controller
{
 
    public function  __construct(){
          $this->middleware('lang');
    }


    public function arabic(Request $req){
        $lan="ar";
        $req->session()->put('lan',$lan);
        App::setLocale($lan);
        return redirect("/");
       }
       public function english(Request $req){
           $lan="en";
           $req->session()->put('lan',$lan);
           App::setLocale($lan);
           return redirect("/");
          }


    public function items(Request $req){

        $email=$req->session()->get('s_supplier');
        $data=DB::table('item_page_view')
        ->orderBy('item_id','desc')->get();

        return view('items')->with('items',$data);
    }

   

     public function search(Request $req){
         $word=$req->input('word');
        $data=DB::table('item_page_view')
        ->where('item_name','like','%'.$word.'%')->get();
        return view('items')
        ->with('items',$data);
    }


}

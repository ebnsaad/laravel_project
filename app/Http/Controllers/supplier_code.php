<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\item;
use App\item_image;
use App\supplier;


class supplier_code extends Controller
{

public function __construct(){
    $this->middleware('supplier_auth');
}


//delete single photo
public function delete_single_photo(Request $req){
    $case_id=$req->del;
    $del=item_image::where('id','=',$case_id)->delete();
    return redirect('edit_item');
}



    //update item code
    public function set_itemid(Request $req){
        $item_id=$req->input('item_id');
        $req->session()->put('up_item_id',$item_id);
        return redirect('edit_item');
    }

    //get item to edit
    public function get_itemedit(Request $req){
        $item_id=$req->session()->get('up_item_id');
        $data=item::where('item_id','=',$item_id)->get();
        $images=item_image::where('item_id','=',$item_id)->get();
        return view('supplier.edit_item')
        ->with('data',$data)
        ->with('images',$images);
    }
     
//edit item information

public function edit_iteminfo(Request $req){
    $item_id=$req->session()->get('up_item_id');

    $req->validate([
        't_name'=>'required',
        't_price'=>'required',
        't_size'=>'required',
        't_unit'=>'required',
        't_cat'=>'required',
        't_date'=>'required',
        't_short'=>'required',
        't_full'=>'required',
    ]);
    $d=item::where('item_id','=',$item_id)->update([
        'item_name'=>$req->input('t_name'),      
       'price'=>$req->input('t_price'),
        'size'=>$req->input('t_size'),
        'unit'=>$req->input('t_unit'),
        'category'=>$req->input('t_cat'),
        't_date'=>$req->input('t_date'),
       'short'=>$req->input('t_short'),
        'full'=>$req->input('t_full'),

    ]);
    return redirect('edit_item');
}


    //


//upload new images

public function new_images(Request $req){
    $req->validate([
        't_photo'=>'required'
    ]);
    $item_id=$req->session()->get('up_item_id');
    $photos=array();
    $photos=$req->file('t_photo');
    foreach($photos as $photo){
        $t=new item_image;
        $t->item_id=$item_id;
        $t->img_url=$photo->store("item_photos","public");
        $t->save();
    }
    return redirect('edit_item');
}


//

   //
    public function logout_supplier(Request $req){
        $email=$req->session()->forget('s_supplier');
        return redirect('/');
    }
//delet item
    public function del_item(Request $req){
        $item_id=$req->input('item_id');
        $del=item_image::where('item_id','=',$item_id)->delete();
        $del=item::where('item_id','=',$item_id)->delete();
        return redirect('my_items');
    }
   
    public function additem(Request $req){

        $req->validate([
            't_name'=>'required',
            't_price'=>'required',
            't_size'=>'required',
            't_unit'=>'required',
            't_cat'=>'required',
            't_date'=>'required',
            't_short'=>'required',
            't_full'=>'required',
            't_photo'=>'required',

        ]);
          
         $number=mt_rand(1, 9999);
         $res=$number *2;
         $item_id=$res + 1;
         $ch=item::where('item_id',$item_id)->count();
         if($ch>0){
             $item_id++;
             $ch2=item::where('item_id',$item_id)->count();
             if($ch2>0){
                 $item_id*=2;
             }
         }



        $n=new item;
        $n->item_name=$req->input('t_name');
        $n->item_id=$item_id;
        $n->price=$req->input('t_price');
        $n->size=$req->input('t_size');
        $n->unit=$req->input('t_unit');
        $n->category=$req->input('t_cat');
        $n->t_date=$req->input('t_date');
        $n->short=$req->input('t_short');
        $n->full=$req->input('t_full');
        $n->viewed_number=2;
        $n->supplier_email=$req->session()->get('s_supplier');
        $n->save();


        $photos=array();
        $photos=$req->file('t_photo');
        foreach($photos as $photo){
            $t=new item_image;
            $t->item_id=$item_id;
            $t->img_url=$photo->store("item_photos","public");
            $t->save();

        }
        $req->session()->flash('added','done');
        return redirect('add_item');

    }


    //get items

    public function get_items(Request $req){

        $email=$req->session()->get('s_supplier');
        $data=DB::table('item_page_view')
        ->where('supplier_email','=',$email)->get();

        return view('supplier.my_items')->with('items',$data);
    }

    //profile_data
    public function profile_data(Request $req){

        $email=$req->session()->get('s_supplier');
        $data=supplier::where('email','=',$email)->get();

        return view('supplier.edit_profile')->with('data',$data);
    }

    //update profile
    public function edit(Request $req){
        $req->validate([

            't_first'=>'required',
            't_last'=>'required',
            't_national'=>'required',
            't_address'=>'required',
            't_cat'=>'required',
            't_country'=>'required',
           // 't_photo'=>'required',
            't_bio'=>'required',
            't_post'=>'required',
      
                  ]);
                  $email=$req->session()->get('s_supplier');
                   $photo=$req->file('t_photo');
                   if($photo !=null){
                    
                    $d=supplier::where('email','=',$email)->update([
                       'f_name'=>$req->input('t_first'),
                       'l_last'=>$req->input('t_last'),
                       'national_id'=>$req->input('t_national'),                   
                       'post_code'=>$req->input('t_post'),
                       'bio'=>$req->input('t_bio'),
                        'img_url'=>$req->file('t_photo')->store("supplier_pic","public"),
                        'category'=>$req->input('t_cat'),
                       'country'=>$req->input('t_country'),   
                        'address'=>$req->input('t_address'),
                       'phone'=>$req->input('t_phone'),
            
                    ]);
                    
                    return redirect('/setting');

                   }else{
                    $d=supplier::where('email','=',$email)->update([
                        'f_name'=>$req->input('t_first'),
                        'l_last'=>$req->input('t_last'),
                        'national_id'=>$req->input('t_national'),
                        'post_code'=>$req->input('t_post'),
                        'bio'=>$req->input('t_bio'),
                         'category'=>$req->input('t_cat'),
                        'country'=>$req->input('t_country'),                      
                         'address'=>$req->input('t_address'),
                        'phone'=>$req->input('t_phone'),
                     ]);
                     return redirect('/setting');


                   }

        
    }


}

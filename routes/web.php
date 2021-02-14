<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\item_image;
use App\item;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', function () {
    return view('index');
})->middleware('lang');

Route::post('/ar','anony@arabic');
Route::post('/en','anony@english');

Route::get('/signups', function () {
    return view('supplier.signup');
});

Route::get('/setting', function () {
    return view('supplier.setting');
})->middleware('supplier_auth');

Route::post('signup/save','supplier_auth@signup');
//login code

Route::get('/logins', function() {
return view('supplier.login');
});

Route::post('login/save','supplier_auth@login');




Route::get('/items', function () {
    return view('items');
});


Route::get('/items','anony@items');

Route::post('items','anony@search');

Route::get('/itemdetail/v/{v}', function (Request $req) {
    $item_id=$req->v;
    $data=DB::table('item_page_view')
    ->where('item_id','=',$item_id)->get();
    //get item images
    $images=item_image::where('item_id','=',$item_id)->get();
    $cat_value=item::where('item_id','=',$item_id)->value('category');
    $seealso=DB::table('item_page_view')
    ->where('category','=',$cat_value)->get();

    return view('itemdetail')
    ->with('data',$data)
    ->with('images',$images)
    ->with('seealso',$seealso);

})->name('v');





Route::get('/add_item', function () {
    return view('supplier.add_item');
})->middleware('supplier_auth');

Route::post('additem/save','supplier_code@additem');



//supplier items

Route::get('/my_items', function () {
    return view('supplier.my_items');
});

Route::get('/my_items','supplier_code@get_items');

Route::post('/del','supplier_code@del_item');


Route::post('up','supplier_code@set_itemid');


/// edit profile

Route::get('/edit_item', function () {
    return view('supplier.edit_item');
});
Route::get('edit_item','supplier_code@get_itemedit');
// delete single image
Route::get('del','supplier_code@delete_single_photo')->name('del');

Route::post('up/info','supplier_code@edit_iteminfo');

Route::post('up/images','supplier_code@new_images');



// get data first

Route::get('/edit_profile','supplier_code@profile_data');
Route::post('supplier/edit','supplier_code@edit');


Auth::routes();


Route::get('/payment', 'HomeController@index')->name('home');
Route::get('/profile', function () {
    return view('customer.profile');
})->middleware('auth');







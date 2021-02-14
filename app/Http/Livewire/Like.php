<?php

namespace App\Http\Livewire;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\like;

use Livewire\Component;

class Like_view extends Component
{
    public $statues;
    public function make_like(Request $req){
        $user_ip=$req->ip();
        this->statues=1;
        $id=$req->session()->get('itemid_more');
        $d=new like;
        $d->
    }
   
    {
        return view('livewire.like');
    }
}

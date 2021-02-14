@extends('master.master')

@section('content')
<img src="img/shop.png" id="shop_icon" alt="">
<!--   shopping card icon-->
<div class="parent_big_image"></div>
<img src="big_image"alt="">
{!! Form::open(['url' => 'items']) !!}
<div class="search">
    <input type="search" name="word" placeholder="Search here..">
    <button>Search</button>
    {!! Form::close() !!}
</div>
<div class="parent_items">
@if(count($items)>0)
@foreach($items as $i)
<div class="item_part">
        <button id="add">Git it</button>
        <img class="select" onclick="zoom_item(this)" src="{{asset('storage/'.$i->img_url)}}" alt="">
        <p id="price">price EGP.500.{{$i->price}}</p>
        <p id="name">Item Name.{{$i->item_name}}</p>
        <p id="desc">
        {{$i->short}}
        </p>
        <a href="{{route('v',['v'=>$i->item_id])}}">More</a>
        
    </div>

<!-- start of item part--> 
    
    </div>

    @endforeach
    @endif

@endsection
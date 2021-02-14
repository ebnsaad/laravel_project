@extends('supplier.master')


@section('supplier_content')

<!-- items parent div-->
<div class="parent_items">
    @if (count($items)>0)
    
        @foreach($items as $i)

    
<!-- start of item part --> 
    <div class="item_part">

        <img class="select" onclick="zoom_item(this)" 
        src="{{asset('storage/'.$i->img_url)}}" alt="">
        <p id="price">price EGP.{{$i->price}}</p>
        <p id="name">{{$i->item_name}}</p>
        <p id="desc">
            {{$i->short}}
        </p>
        {!! Form::open(['url' => 'up']) !!}
        <input type="hidden" name="item_id" value="{{$i->item_id}}" >
        <input type="submit" value="update" class="btn btn-primary float-right">
        {!! Form::close() !!}
  
        {!! Form::open(['url' => 'del']) !!}
        <input type="hidden" name="item_id" value="{{$i->item_id}}" >
        <input type="submit" value="Delete" class="btn btn-danger">
        {!! Form::close() !!}
    </div>
<!-- end of item part -->
@endforeach

@endif
</div>



@endsection
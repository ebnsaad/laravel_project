@extends('supplier.master')

@section('supplier_content')

<div>
@if(count($images)>0)
@foreach($images as $d)


<img src="{{asset('storage/'.$d->img_url)}}"
style="width:100px;height:100px;margin:10px" alt="">


<a href="{{route('del',['del'=>$d->id])}}">Delete</a>
@endforeach
@endif

</div>
<div class="container">

{!! Form::open(['url' => 'up/images','files'=>true]) !!}
<div class="form-row float-right mt-3 mb-3 "style="width:50%;">


<div class="form-group col-md-6">
   
   <input type="submit" name="submit" value="Add images" class="btn btn-success">
</div>

<div class="form-group col-md-6">
    <label>Upload new images</label>
    <input type="file" name="t_photo[]" multiple class="form-control-file">
</div>

</div>
{!! Form::close() !!}

@if(count($data)>0)
@foreach($data as $i)
 
{!! Form::open(['url' => 'up/info']) !!}

     <div class="form-row">
      
       <div class="form-group col-md-6">
           <label>Item Name</label>
           <input type="text" name="t_name" value="{{$i->item_name}}" class="form-control">
       </div>
       <div class="form-group col-md-6">
           <label>Price</label>
           <input type="number" name="t_price" value="{{$i->price}}"  class="form-control">
       </div>

       <div class="form-group col-md-6">
           <label>Item Size</label>
           <input type="text" name="t_size" value="{{$i->size}}"  class="form-control">
       </div>
       <div class="form-group col-md-6">
           <label>unit</label>
           <input type="number" name="t_unit" value="{{$i->unit}}"  class="form-control">
       </div>

       <div class="form-group col-md-6">
           <label>Category</label>
           <select name="t_cat" value="{{$i->category}}"  class="form-control">
               <option>PC</option>
               <option>labtop</option>
               <option>phones</option>
               <option>elctronics</option>
           </select>
</div>

<div class="form-group col-md-6">
   <label>Production Date</label>
   <input type="date" name="t_date" value="{{$i->p_date}}"  class="form-control">
</div>
<div class="form-group col-md-12">
   <label>Short Description</label>
   <input type="text" name="t_short" value="{{$i->short}}"  class="form-control">
</div>
<div class="form-group col-md-12">
   <label>Full Description</label>
  <textarea name="t_full"  class="form-control"> {{$i->full}}</textarea>
 
</div>
<div class="form-group col-md-6">

          
   <input type="submit" name="submit" value="Add Item" class="btn btn-primary">
</div>


   </div>
   {!! Form::close() !!}
   @endforeach
@endif
</div>



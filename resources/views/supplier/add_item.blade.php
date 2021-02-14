@extends('supplier.master')

@section('supplier_content')

@if(session('added'))
<script>alert("Item Added")</script>

@endif

<div class="container">
 
{!! Form::open(['url' => 'additem/save','files'=>true]) !!}

     <div class="form-row">
      
       <div class="form-group col-md-6">
           <label>Item Name</label>
           <input type="text" name="t_name" class="form-control">
       </div>
       <div class="form-group col-md-6">
           <label>Price</label>
           <input type="number" name="t_price" class="form-control">
       </div>

       <div class="form-group col-md-6">
           <label>Item Size</label>
           <input type="text" name="t_size" class="form-control">
       </div>
       <div class="form-group col-md-6">
           <label>unit</label>
           <input type="number" name="t_unit" class="form-control">
       </div>

       <div class="form-group col-md-6">
           <label>Category</label>
           <select name="t_cat" class="form-control">
               <option>PC</option>
               <option>labtop</option>
               <option>phones</option>
               <option>elctronics</option>
           </select>
</div>

<div class="form-group col-md-6">
   <label>Production Date</label>
   <input type="date" name="t_date" class="form-control">
</div>
<div class="form-group col-md-12">
   <label>Short Description</label>
   <input type="text" name="t_short" class="form-control">
</div>
<div class="form-group col-md-12">
   <label>Full Description</label>
  <textarea name="t_full" class="form-control"></textarea>
</div>
<div class="form-group col-md-6">
          
   <input type="submit" name="submit" value="Add Item" class="btn btn-primary">
</div>

<div class="form-group col-md-6">
    <label>Upload item Photo</label>
    <input type="file" name="t_photo[]" multiple class="form-control-file">
</div>





   </div>
   {!! Form::close() !!}

</div>

@endsection
@extends('supplier.master')


@section('supplier_content')

@if(count($data)>0)
@foreach($data as $d)

<div>
<img src="{{asset('storage/'.$d->img_url)}}" width="100" hight="100" alt="">
</div>

<div class="container">
       
        {!! Form::open(['url' => 'supplier/edit','files'=>true]) !!}
       
        <div class="form-row mt-3">

            <div class="form-group col-md-6">
                <label>First Name</label>
                <input type="text" name="t_first" value="{{$d->f_name}}"class="form-control">

            </div>

            <div class="form-group col-md-6">
                <label>Last Name</label>
                <input type="text" name="t_last" value="{{$d->l_last}}"class="form-control">
            </div>

            <div class="form-group col-md-12">
                <label>National ID</label>
                <input type="number" name="t_national" value="{{$d->national_id}}"class="form-control">
            </div>

            

            <div class="form-group col-md-6">
                <label>mobile number</label>
                <input type="tel" name="t_phone" value="{{$d->phone}}" class="form-control">
            </div>


            <div class="form-group col-md-6">
                <label>Post Code</label>
                <input type="number" name="t_post" value="{{$d->post_code}}"class="form-control">
            </div>



            <div class="form-group col-md-12">
                <label>address</label>
                <input type="text" name="t_address" value="{{$d->address}}"class="form-control">
            </div>

           

            <div class="form-group col-md-6">
                <label>Category</label>
                <select name="t_cat" class="form-control">
                <option>{{$d->category}}</option>
                    <option>PC</option>
                    <option>labtop</option>
                    <option>phones</option>
                    <option>elctronics</option>
                </select>
                
            </div>
            <div class="form-group col-md-6">
                <label>Country</label>
                <select name="t_country"  class="form-control">
                <option>{{$d->country}}</option>
                    <option>Egy</option>
                    <option>ksa</option>
                    <option>uae</option>
                    <option>kwt</option>
                </select>
                
            </div>
  

            <div class="form-group col-md-12">
                <label>Bio</label>
               <textarea name="t_bio"class="form-control">{{$d->bio}}</textarea>
            </div>

            <div class="form-group col-md-6">
               
               <input type="submit" name="submit" value="signup"class="btn btn-primary"  >

            </div>

            <div class="form-group col-md-6">
                <label>Upload Your Photo</label>
                <input type="file" name="t_photo" class="form-control-file" >
            </div>



            {!! Form::close() !!}

       </div>

@endforeach
@endif





@endsection
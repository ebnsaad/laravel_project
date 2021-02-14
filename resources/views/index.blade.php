@extends('master.master')

@section('content')

{!! Form::open(['url' => '/ar']) !!}
<input type="submit" value="ar">
{!! Form::close() !!}


{!! Form::open(['url' => '/en']) !!}
<input type="submit" value="en">
{!! Form::close() !!}

<h1>index page</h1>

@endsection

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>

  @if(session('check'))
<script>alert("ypu email already exist pls go to log in page")</script>

@endif


    <div class="container">
       
        {!! Form::open(['url' => 'signup/save','files'=>true]) !!}
       
        <div class="form-row mt-3">

            <div class="form-group col-md-6">
                <label>First Name</label>
                <input type="text" name="t_first" class="form-control">

            </div>

            <div class="form-group col-md-6">
                <label>Last Name</label>
                <input type="text" name="t_last" class="form-control">
            </div>

            <div class="form-group col-md-12">
                <label>National ID</label>
                <input type="number" name="t_national" class="form-control">
            </div>

            <div class="form-group col-md-6">
                <label>email</label>
                <input type="email" name="t_email" class="form-control">
            </div>

            <div class="form-group col-md-6">
                <label>mobile number</label>
                <input type="tel" name="t_phone" class="form-control">
            </div>



            <div class="form-group col-md-8">
                <label>address</label>
                <input type="text" name="t_address" class="form-control">
            </div>

            <div class="form-group col-md-4">
                <label>Post Code</label>
                <input type="number" name="t_post"  class="form-control">
            </div>

            <div class="form-group col-md-6">
                <label>Category</label>
                <select name="t_cat"  class="form-control">
                    <option>PC</option>
                    <option>labtop</option>
                    <option>phones</option>
                    <option>elctronics</option>
                </select>
                
            </div>
            <div class="form-group col-md-6">
                <label>Country</label>
                <select name="t_country"  class="form-control">
                    <option>Egy</option>
                    <option>ksa</option>
                    <option>uae</option>
                    <option>kwt</option>
                </select>
                
            </div>


            <div class="form-group col-md-6">
                <label>Password</label>
                <input type="password" name="t_pass"  class="form-control">
            </div>

            <div class="form-group col-md-6">
                <label>Confirm Password</label>
                <input type="password" class="form-control">
            </div>

            <div class="form-group col-md-12">
                <label>Bio</label>
               <textarea name="t_bio"  class="form-control">Bio</textarea>
            </div>

            <div class="form-group col-md-6">
               
               <input type="submit" name="submit" value="signup" class="btn btn-primary">

            </div>

            <div class="form-group col-md-6">
                <label>Upload Your Photo</label>
                <input type="file" name="t_photo" class="form-control-file">
            </div>





       </div>

{!! Form::close() !!}


    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    <!-- Option 2: jQuery, Popper.js, and Bootstrap JS
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    -->
  </body>
</html>
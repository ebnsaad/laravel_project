<!DOCTYPE html>
<html lang="en">
<head>
@if(count($data)>0)
@foreach($data as $d)
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$d->item_name}}</title>
    <meta property="og:url"           content="http://www.jet-egy.com/itemdetail/v/{{$d->item_id}}" />
    <meta property="og:type"          content="{{$d->category}}" />
    <meta property="og:title"         content="$d->item_name" />
    <meta property="og:description"   content="$d->short" />
    <meta property="og:image"         content="https://www.jet-egy.com/storage/app/public/{{$d->img_url}}" />
    <link rel="stylesheet" href="/css/header.css">
    <link rel="stylesheet" href="/css/item_detail.css">
    <script src="/js/jquery.js"></script>
    <script src="/js/jquery.transform2d.js"></script>
    <script src="/js/jquery.transform3d.js"></script>
    <script defer src="/js/itemdetail.js"></script>
    @livewireStyles
</head>
<body>
      


  <!-- Load Facebook SDK for JavaScript -->
  <div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v8.0&appId=955730244775576&autoLogAppEvents=1" nonce="qT8r5jXy"></script>
<!--  start of header   -->
@include('master.header')
    <!-- end of header -->
    
    <!-- parent detail -->
     <div class="parent_detail">

        <div class="item_photo">
            <img id="big_image" src="{{asset('storage/'.$d->img_url)}}" alt="">
            <div class="over-photos">
            @foreach($images as $image)
                <img class="over" src="{{asset('storage/'.$image->img_url)}}" alt="">
                @endforeach
            </div>
        </div>
        <div class="item_data">
            <h1>Name:{{$d->item_name}}</h1>
            <p>Price:{{$d->price}}</p>
            <p>Category:{{$d->category}}</p>
            <p>size:1200x980</p>
            <p>Transportation:Included</p>
            <button>Buy Now</button>

            <div class="fb-like" 
            data-href="http://www.jet-egy.com/itemdetail/v/{{$d->item_id}}" 
            data-width="" data-layout="standard" 
            data-action="like" data-size="small" data-share="true"></div>
        </div>
     </div>
    <!-- end parent detail -->
<!-- full description -->
<div class="desc">
    <h1>Full Description</h1>
    <p>
        {{$d->full}}
    </p>
</div>
<!-- end full description -->
<!-- comments-->
<div class="comment">
   
    <div class="fb-comments"
     data-href="http://www.jet-egy.com/itemdetail/v/{{$d->item_id}}" data-numposts="5" data-width=""></div>
<div style="display: none;">
<input type="text" placeholder="Comment..">
<button>Post</button>
<ul>
    <li>Good PC</li>
    <li>very Good PC</li>
    <li>good very PC</li>
</ul>
</div>

</div>
<!-- end comments-->
@endforeach
@endif

<!-- items parent div-->
<div class="parent_items">
<h1>Also See this </h1>
@if(count($seealso)>0)
@foreach($seealso as $i)
    <!-- start of item part-->
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


    @endforeach
    @endif

    </div>

    <!-- end of item part-->
    
    
    
    </div>
    
    
    <div class="footer">
        <p>All Rights &copy; Jet 2020 </p>
    </div>




    @livewireScripts
</body>
</html>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<script>

</script>
<body>
@extends('layout.layout')
    @section('content')
    <section style="background-color: whitesmoke;" >
        <div class="container py-5  " > 
<div class="row">
    <div class="col-md-3" style="background-color: whitesmoke;">
   <h5> <i class="fas fa-filter"> <b style="text-align: center;">Bộ lọc tìm kiếm</b></i> </h5>
   @foreach($cate as $c)
   @if($c->visible==0)
   <div class="mt-5">
   <div class="form-inline mt-5">
   <div class="form-group ">
<input type="radio"   class=" ml-2" name="cate"  id="cate" value="{{$c->cateName}}" onclick=window.location.href="{{url("checkCate/{$c->cateId}")}}"> 
<label style="color:dimgray" for="cate" class="ml-4">{{$c->cateName}}</label>
    </div></div></div>
    @endif
   @endforeach
    </div>
    <div class="col-md-9"  style="background-color: white">
        <h5 class="ms-3">Kết quả tìm kiếm cho từ khóa <small style="color: red;">{{$collection->collect()}}</small></h5>
        @if(@empty($catePri))
        <p></p>
        @else
        <p class=" ml-3" >Và thuộc hể loại : {{$catePri->cateName}}</p>
        @endif
      <div class="row">
@foreach($table as $item)
@if($item->visiblePro == 0)
<div class="btn col-sm-3"  onclick=window.location.href="{{url("productdetails/{$item->productId}")}}" >
                    <div class="card" id="index" >
                 <img class="card-img-top w-100 m-auto" src="{{ url('product-images/'.$item->productImage) }}" alt="Card image" style="width:100%">
                  <div class="card-body">
                    <p class="card-text" >{{$item->productName}}</p>
                  </div>
                </div>    
                    </div>
                    @endif
@endforeach
</div>   </div>
</div></div>
    </section>
    @endsection
</body>
</html>
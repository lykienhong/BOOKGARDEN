<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script>

    </script>
</head>
<style>

#cards:hover{
  box-shadow: 10px 10px 5px grey;
}
</style>
<body>
@extends('layout.layout')
    @section('content')
    <section style="background-color: whitesmoke;">
    <div class="container py-5">
    <div class="row">
   <div class="col-md-6 col-xs-6">
   <img class="mx-auto d-block elevation-3" style="width:70%" src="{{ url('product-images/'.$products->productImage) }}">
   </div>
            
        
    <div class="col-md-6 col-xs-6">
        <div class="card mx-auto" style="height: 390px; width: 70%;">
    
    <div class="card-body">
      <h5 class="card-text  border-bottom mb-3 pb-2"><b>Tên sản phẩm : {{$products->productName}}</b> </h5>
      <h5 class="card-text pb-3">Thể loại : {{$products->cateName}}</h5>
      <h5 class="card-text pb-3 ">Tình trạng : {{$products->productStatus}}</h5>
      <h5 class="card-text text-red ">Giá(VNĐ): {{$products->price}}</h5 >
 
     
   <div class="button-group  " style="margin-top: 5em;">

   @if($products->productStatus=='Hết hàng')
   <p  class=" rounded-pill float-right bg-danger p-2" >Sản phẩm đã hết</p>
  
   @else
    <a type="submit" class=" rounded-pill float-right bg-success p-2" onclick="return confirm('Bạn phải đăng nhập mới thêm sản phẩm được')"  href="{{url('login')}}">Thêm vào giỏ hàng</a>
  
   @endif
    </div>

    </div>
      </div>   
</div>
    </div>
    </div>
    <div class="container mt-3">

  <br>
  <!-- Nav tabs -->
  <ul class="nav nav-tabs m-auto "  role="tablist">
    <li class="nav-item "  >
      <a class="nav-link active text-white bg-success"   data-bs-toggle="tab" href="#home">Mô tả sản phẩm</a>
    </li>
    <li class="nav-item">
      <a class="nav-link text-white bg-success"  data-bs-toggle="tab" href="#menu1">Đánh giá của khách hàng</a>
    </li>
   
  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
    <div id="home" style="background-color: white;" class="container tab-pane active"><br>
      <h3>{{$products->productName}}</h3>
      <p>Mô tả : {{$products->description}}</p>
    </div>
    <div id="menu1" class="container tab-pane fade" style="background-color: white;"><br>
    <form method="GET" action="{{url('login')}}">
      <textarea name="comment" class="form-control" placeholder="Nhập bình luận của bạn" id="comment" cols="150" rows="3"></textarea><br>
      <button type="submit" class="btn btn-outline-success  float-right" >Gửi</button>
    </form>
    @foreach($comment as $item)
    <div class=" border-bottom  w-100 h-100 d-inline-block my-4 " style="background-color: whitesmoke;">
      <div class="row">
      <span class="col-md-2 border-end pt-2">
      <img src="{{ url('product-images/'.$item->avatar) }}" width="50px">
       <p>{{$item->fullname}}</p>
     
      </span>
           <p class="col-md-10 pt-2">{{$item->comment}}</p>
      </div>
           
     </div>
     @endforeach
    </div>
  
  </div>
</div>
<div class="container my-5 " >
<h3 class="bg-success "><i style="justify-content: center;">Có thể bạn sẽ thích</i></h3>
</div>
<div class="container">
                <div class="row mb-2">
                  @foreach($udetails as $item)
                    <div class="btn col-sm-3" onclick=window.location.href="{{url("productdetails/{$item->productId}")}}" >
                    <div class="card" id="cards" >
                 <img class="card-img-top w-75 m-auto" src="../product-images/{{$item->productImage}}" alt="Card image" style="width:100%">
                  <div class="card-body">
                    <p class="card-text" >{{$item->productName}}</p>
                  </div>
                </div>    
                    </div>
                 @endforeach
                </div>
            </div></section>
    @endsection
</body>
</html>
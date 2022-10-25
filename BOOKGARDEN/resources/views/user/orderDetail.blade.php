<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body style="background-color: whitesmoke;">
@extends('layout.layout-user')
    @section('content')
<section >
    <div class="container my-5 py-3" style="background-color: white">
        <h2 class="text-red pb-3" style="text-align: center;">Kiểm tra đơn hàng</h2>
<div class="progress rounded-pill mb-4 " style="height:3em">
@if($details->process_status==4)
<div class="progress-bar bg-danger border-end " style="width:100%;font-size: 150%;">
      Đã hủy
    </div>

@else
@if($details->process_status==0)
    <div class="progress-bar bg-success border-end " style="width:25%;font-size: 150%;">
      Đang xử lý
    </div>
    <div class="progress-bar bg-secondary  border-end" style="width:25%;font-size: 150%">
    Đang đóng gói
    </div>
    <div class="progress-bar bg-secondary   border-end" style="width:25%;font-size: 150%">
    Đang vận chuyển
    </div>
    <div class="progress-bar bg-secondary " style="width:25%;font-size: 150%">
    Đã nhận hàng
    </div>
@endif
@if($details->process_status==1 )
    <div class="progress-bar bg-success border-end " style="width:25%;font-size: 150%;">
      Đang xử lý
    </div>
    <div class="progress-bar bg-success border-end" style="width:25%;font-size: 150%">
    Đang đóng gói
    </div>
    <div class="progress-bar bg-secondary   border-end" style="width:25%;font-size: 150%">
    Đang vận chuyển
    </div>
    <div class="progress-bar bg-secondary " style="width:25%;font-size: 150%">
    Đã nhận hàng
    </div>
@endif
@if($details->process_status==2)
    <div class="progress-bar bg-success border-end " style="width:25%;font-size: 150%;">
      Đang xử lý
    </div>
    <div class="progress-bar bg-success border-end" style="width:25%;font-size: 150%">
      Đang đóng gói
    </div>
    <div class="progress-bar bg-success   border-end" style="width:25%;font-size: 150%">
    Đang vận chuyển
    </div>
    <div class="progress-bar bg-secondary " style="width:25%;font-size: 150%">
    Đã nhận hàng
    </div>
@endif
@if($details->process_status==3)
    <div class="progress-bar bg-success border-end " style="width:25%;font-size: 150%;">
      Đang xử lý
    </div>
    <div class="progress-bar bg-success border-end" style="width:25%;font-size: 150%">
    Đang đóng gói
    </div>
    <div class="progress-bar bg-success   border-end" style="width:25%;font-size: 150%">
    Đang vận chuyển
    </div>
    <div class="progress-bar bg-success " style="width:25%;font-size: 150%">
    Đã nhận hàng
    </div>
@endif
@endif
</div>
<div class="border-top ">
<div class="row border-bottom">
  <div class="ms-5 col border-end border-3">
  <h2 class="text-red">Thông tin khách hàng</h2>
    <p>Họ tên: {{$userr->fullname}}</p>
    <p>email: {{$userr->email}}</p>
    <p>Số điện thoại: (+84){{$userr->telephone}}</p>
    <p>Địa chỉ: {{$orders->ship_address}}</p>
  </div>
  
<div class="col ms-5">
<h2 class="text-red">Phương thức thanh toán</h2>
<p>Ngày đặt hàng: {{$orders->order_date}} </p>
<p>Thanh toán khi nhận hàng</p>
<p>Đơn vị vận chuyển : BookGardenDelivery</p>
<div class="row">
<p class="col-md-3">Tổng thanh toán:  </p>
<p style="font-size: larger;" class="col-md-9 text-red">{{$orders->total}}Đ</p>
</div>
</div>

  <div style="background-color:white" >
  <div class="card d-block m-auto py-3" style="width:100%">
    <div class="card-body ">
      <div class="d-flex justify-content-center border-bottom">  
          <h2  class="card-title pb-3 text-red">Chi tiết hóa đơn</h2>
    </div>
 <div style="overflow-x: auto;">
<table class="table table-borderless table-hover">
  <thead>
  <tr style="background-color: #f2f2f2;">
    <th>Tên sản phẩm</th>
    <th></th>
    <th>Mã hàng</th>
    <th>số lượng</th>
    <th>giá cả</th>
    <th>Thành tiền</th>
  </tr></thead>
  @foreach($detailsPro as $dl)
  <tr>   
  <td><img src="{{ url('product-images/'.$dl->productImage) }}" width="120em"></td>
    <td>{{$dl->productName}}</td>
    <td>{{$dl->productId}}</td>
    <td>{{$dl->quantity}}</td>
    <td>{{$dl->price}}</td>
    <td>{{$dl->QuanvsPrice}}</td>
  </tr>
  @endforeach
</table>
 </div>
    </div>
  </div>
 </div>
 <div class=" pt-3">

<p>Theo dõi và kiểm tra đơn hàng mình thường xuyên để theo dõi được quá trình đóng gói - vận chuyển của đơn hàng .Nếu quý khách
đã nhận được hàng thì vui lòng bấm vào nút bên phải để BookGarden xác nhận thông tin.
</p>
<div class="row mb-5">
<p class="col-md">Vui lòng thanh toán <strong class="text-red"> {{$orders->total}}Đ </strong> khi nhận hàng</p>
<div class="col-md">
<span class="float-right">
@if($details->process_status!=3 && $details->process_status !=4 )

<button type="button" class="btn btn-success" onclick=window.location.href="{{url('updateProcess/'.$details->orderId)}}"  >Đã nhận hàng</button>
<a class="border p-2 rounded-pill border-danger bg-danger text-white" href="{{url('dropOrder/'.$details->orderId)}}"  onclick="return confirm('Bạn có chắc chắn muốn hủy đơn hàng ?')" >Hủy Đơn</a>
@else
<button type="button" class="btn btn-outline-success  " onclick=window.location.href="{{url('user/indexUser')}}"  >Về trang chủ</button>
@endif
</span></div>
</div>
</div>


  </div>
    
</section>
  @endsection
</body>
</html>
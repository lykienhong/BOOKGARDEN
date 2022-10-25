<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>

</script>
</head>
<style>tr:nth-child(even) {background-color: #f2f2f2;}</style>
<body>
@extends('layout.layout-user')
    @section('content')


<section style="background-color: whitesmoke;"> 
<div  class="container py-5"style="background-color: white;" >
  <div class="row">
  <div class="ms-5 col border-end border-3">
  <h2 class="text-red">Thông tin khách hàng</h2>
    <p>Họ tên: {{$user->fullname}}</p>
    <p>email: {{$user->email}}</p>
    <p>Số điện thoại: (+84){{$user->telephone}}</p>
    <p>Địa chỉ: {{$collection->get('ship_add')}}</p>
  </div>
  
<div class="col ms-5">
<h2 class="text-red">Phương thức thanh toán</h2>
<p>Thanh toán khi nhận hàng</p>
<p>Phí vận chuyển (mặc định) : 30.000Đ </p>
<p>Tổng tiền hàng: {{$collection->get('total')}} Đ</p>
<div class="row">
<p class="col-md-3">Tổng thanh toán:  </p>
<p style="font-size: larger;" class="col-md-9 text-red">{{$collection->get('totalDeli')}}Đ</p>
</div>


</div>
  </div>
  <p style="text-align: center;" class="border-bottom border-double pt-1 " ></p>
  <div style="background-color:whitesmoke" >
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
    <th>Mã hàng</th>
    <th>số lượng</th>
    <th>giá cả</th>
    <th>Thành tiền</th>
  </tr></thead>
  @foreach($details as $dl)
  <tr>
    <td>{{$dl->productName}}</td>
    <td>{{$dl->productId}}</td>
    <td>{{$dl->quantity}}</td>
    <td>{{$dl->price}}</td>
    <td>{{$dl->quanPrice}}</td>
  </tr>
  @endforeach
</table>
 </div>
    </div>
  </div>
 </div>
  <p style="text-align: center;" class="border-bottom border-double pt-3"></p>
  <div class="float-right">
  <button class="btn btn-info " onclick=window.location.href="{{url('viewCart')}}" >Chỉnh sửa đơn hàng</button>
  <button  class="btn btn-info "  data-bs-toggle="modal" data-bs-target="#myModal" >Xác nhận đơn hàng</button>
  </div>
</div>
<!-- The Modal -->
<div class="modal fade" style="margin-top: 5%;" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
      </div>

      <!-- Modal body -->
      <div class="modal-body">
      <form action="{{url('afterOrder')}}" method="POST" >
{{ csrf_field() }}
        
  <input type="hidden" name="ship_address" value="{{$collection->get('ship_add')}}" >
  <input type="hidden" name="total" value="{{$collection->get('totalDeli')}}" >
  <input type="hidden" name="user_id" value="{{$user->id}}" >
  
        <img src="https://cachbothuocla.vn/wp-content/uploads/2019/03/tick-xanh.png" class="d-block m-auto" width="30%">
        <div style="text-align: center;">
        <p>Đơn hàng được khởi tạo thành công</p>
        <p>Qúy khách vui lòng xác nhận đơn hàng lần nữa để hoàn thành tất cả thủ tục - cũng như theo dõi và kiểm tra quá trình của đơn hàng </p>
        <button type="submit" class="btn btn-success" >Xác nhận</button>
        </div>

</form>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
      
      </div>

</section>

@endsection
</body>
</html>
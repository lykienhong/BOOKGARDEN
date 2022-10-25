<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>tr:nth-child(even) {background-color: #66ff99;}</style>
<body style="background-color: whitesmoke;">
@extends('layout.layout-user')
    @section('content')
  <section>

  <div class="container my-4 pb-5 pt-1" style="background-color: white">

<br>
<h3 class="text-red pb-3" style="text-align: center;">Lịch sử đặt hàng</h3>
<!-- Nav tabs -->
<ul class="nav nav-tabs m-auto justify-content-center"   role="tablist">
  <li class="nav-item w-25"  >
    <a class="nav-link active text-white bg-success " style="text-align: center;"   data-bs-toggle="tab" href="#all">Tất cả</a>
  </li>
  <li class="nav-item w-25">
    <a class="nav-link text-white bg-success"  style="text-align: center;"  data-bs-toggle="tab" href="#menu1">Đang đóng gói - vận chuyển </a>
  </li>
  <li class="nav-item w-25">
    <a class="nav-link text-white bg-success"  style="text-align: center;"  data-bs-toggle="tab" href="#menu2">Đã nhận hàng</a>
  </li>
  <li class="nav-item w-25">
    <a class="nav-link text-white bg-success"  style="text-align: center;"  data-bs-toggle="tab" href="#menu3">Đã hủy</a>
  </li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
  <div id="all"  style="overflow-x: auto;background-color: white;" class="container tab-pane active"><br>
  <table  class="table table-borderless table-hover">
                                <thead>
                                <tr style="background-color: #66ff99;">                             
                                <th>Mã hóa đơn</th>
                                    <th>Ngày đặt hàng</th>   
                                    <th>Tiến trình</th>
                                    <th>Tổng tiền</th>
                                    <th>Chi tiết</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($order as $o)
                                <tr> 
                                <td><h4>{{$o->orderId}}</h4></td>
                              <td>{{$o->order_date}}</td>
                              <td>Đang xử lý</td>
                              <td>{{$o->total}}</td>
                              <td><a  href="{{url('ViewOrderDetail/'.$o->orderId)}}" >Xem chi tiết hóa đơn</a></td>
                                </tr>
                                @endforeach
                                </tbody>
              </table>
  </div>
  <div id="menu1"   style="overflow-x: auto;background-color: white;" class="container tab-pane fade"><br>
  <table  class="table table-borderless table-hover">
                                <thead>
                                <tr style="background-color: #66ff99;">                             
                                <th>Mã hóa đơn</th>
                                    <th>Ngày đặt hàng</th>   
                                    <th>Tiến trình</th>
                                    <th>Tổng tiền</th>
                                    <th>Chi tiết</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($orderOne as $o)
                                <tr> 
                                <td><h4>{{$o->orderId}}</h4></td>
                              <td>{{$o->order_date}}</td>
                              <td>Đang đóng gói - vận chuyển </td>
                              <td>{{$o->total}}</td>
                              <td><a  href="{{url('ViewOrderDetail/'.$o->orderId)}}" >Xem chi tiết hóa đơn</a></td>
                                </tr>
                                @endforeach
                                </tbody>
              </table>
  </div>
  <div id="menu2"   style="overflow-x: auto;background-color: white;" class="container tab-pane fade"><br>
  <table  class="table table-borderless table-hover">
                                <thead>
                                <tr style="background-color: #66ff99;">                             
                                <th>Mã hóa đơn</th>
                                    <th>Ngày đặt hàng</th>   
                                    <th>Tiến trình</th>
                                    <th>Tổng tiền</th>
                                    <th>Chi tiết</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($orderThere as $o)
                                <tr> 
                                <td><h4>{{$o->orderId}}</h4></td>
                              <td>{{$o->order_date}}</td>
                              <td>Đã nhận hàng</td>
                              <td>{{$o->total}}</td>
                              <td><a  href="{{url('ViewOrderDetail/'.$o->orderId)}}">Xem chi tiết hóa đơn</a></td>
                                </tr>
                                @endforeach
                                </tbody>
              </table>
</div>
<div id="menu3"   style="overflow-x: auto;background-color: white;" class="container tab-pane fade"><br>
<table  class="table table-borderless table-hover">
                                <thead>
                                <tr style="background-color: #66ff99;">                             
                                    <th>Mã hóa đơn</th>
                                    <th>Ngày đặt hàng</th>   
                                    <th>Tiến trình</th>
                                    <th>Tổng tiền</th>
                                    <th>Chi tiết</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($orderFour as $o)
                                <tr> 
                                <td><h4>{{$o->orderId}}</h4></td>
                              <td>{{$o->order_date}}</td>
                              <td>Đang hủy</td>
                              <td>{{$o->total}}</td>
                              <td><a  href="{{url('ViewOrderDetail/'.$o->orderId)}}">Xem chi tiết hóa đơn</a></td>
                                </tr>
                                @endforeach
                                </tbody>
              </table>
</div>

</div>
</div>
  </section>
  @endsection
</body>
</html>
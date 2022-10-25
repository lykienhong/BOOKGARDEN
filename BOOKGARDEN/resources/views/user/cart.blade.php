<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <!-- Font Awesome -->
   <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    <title>Giỏ hàng</title>
</head>
<body>
@extends('layout.layout-user')
    @section('content')
    <section class="container my-5">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3  style="color: red;" > Tất cả đơn hàng</h3>
                            <h5></h5>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form action="{{url('orders')}}" method="POST">
                            {{ csrf_field() }}
                            <div class="form-group">
                            <i class="fas fa-map-marker-alt text-red"></i>
                           <label for="address" class="text-red">Địa chỉ nhận hàng:</label> 
                            <input type="text" name="address" placeholder="nhập địa chỉ nhận hàng" require id="address" class="form-control" >
                            @if($errors->has('address'))
                                    <p class="alert alert-danger "  >{{ $errors -> first('address')}}</p>
                            @endif
                            </div>
                            <table id="product" class="table table-borderless table-hover">
                                <thead>
                                <tr>
                                
                                    <th><h4>Sản phẩm</h4></th>
                                    <th></th>
                                    <th style="color:darkgray;">Số lượng</th>   
                                    <th style="color:darkgray;">Gía bán</th>     
                                    <th style="color:darkgray;">Thành tiền</th>     
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($cart as $c)
                             <tr > 
                          
                           <td><img class="w-50" src="{{ url('product-images/'.$c->productImage) }}"></td>
                           <td class="h5">{{$c->productName}}</td>               
                           <td class="text-red h4"><input readonly type="text" class="form-control border-0 w-25" value="{{$c->quantity}}" name="quantity"></td>
                           <td class="text-red h4"><input readonly type="text" class="form-control border-0 w-75" value="{{$c->price}}" name="price"></td>
                           <td class="text-red h4"><input readonly type="text" class="form-control border-0 w-75" value="{{$c->quanPrice}}" name="quanPrice"></td>
                           <td><button type="button" class="btn btn-danger" onclick=window.location.href="{{url('deleteCart/'.$c->productId)}}">Xóa</button></td>
                                </tr>
                                @endforeach
                                </tbody>
                        
                            </table>
                            <div class="float-right">
  <button type="button" class="btn btn-info " onclick=window.location.href="{{url('viewOrder')}}" >Xem lịch sử đơn hàng</button>
  <button type="submit" class="btn btn-info ">Đặt hàng</button>
  </div>
                        </form>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
    @endsection
</body>
</html>
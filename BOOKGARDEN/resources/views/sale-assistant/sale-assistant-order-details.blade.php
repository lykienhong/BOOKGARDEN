<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang chi tiết của đơn đặt hàng</title>
</head>
<body>
        <!-- lưu tại /resources/views/product/create.blade.php -->
    @extends('sale-assistant-layout.sale-assistant-layout')
    @section('title', 'admin - order details')
    @section('content')
        <section class="content">
            <div class="container-fluid">
            <div class="row">
                    <div class="offset-md-3 col-md-6">
                        @if(Session::has('err'))
                        {{Session::get('err')}};
                        @endif    
                    </div>    
            </div>
                <div class="row">
                    <div class="offset-md-3 col-md-6">
                        <!-- general form elements -->
                        <div class="card card-primary">
                            <div class="card-header">
                            <h3 class="card-title">Thông tin chi tiết của đơn hàng {{$orders->orderId}}</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form role="form" method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="txt-product-id">Mã đơn hàng</label>
                                        <input type="text" value="{{ $orders->orderId }}" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="txt-product-id">Ngày đặt hàng</label>
                                        <input type="datetime" value="{{ $orders->order_date }}" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="txt-product-id">Địa chỉ nhận hàng</label>
                                        <input type="text" value="{{ $orders->ship_address }}" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="txt-product-id">Sản phẩm</label>
                                        <table border="1">
                                            <tr>
                                                <th>Mã sản phẩm</th>
                                                <th>Tên sản phẩm</th>
                                                <th>Số lượng</th>
                                                <th>Giá tiền</th>
                                                <th>Thành tiền</th>
                                            </tr>
                                            @foreach($orderdetails as $od)
                                            <tr>
                                                <td>{{$od->productId}}</td>
                                                <td>{{$od->productName}}</td>
                                                <th>{{$od->quantity}}</th>
                                                <th>{{$od->price}}</th>
                                                <th>{{$od->QuanvsPrice}}</th>
                                            </tr>
                                            @endforeach
                                        </table>
                                    </div>
                                    <div class="form-group">
                                        <label for="txt-product-id">Tổng giá</label>
                                        <input type="text" value="{{ $orders->total }}" readonly>
                                    </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <h4><a href="{{url('sale-assistant/sale-assistant-order')}}">Trở về</a></h4>
                                </div>
                            </form>
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
            </div>
        </section>
    @endsection
    @section('script-section')
        <script src="{{ asset('plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>

        <script type="text/javascript">
            $(document).ready(function () {
                bsCustomFileInput.init();
            });
        </script>
    @endsection

</body>
</html>
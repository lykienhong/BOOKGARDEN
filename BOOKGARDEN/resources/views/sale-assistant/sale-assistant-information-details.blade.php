<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang thay đổi tên thể loại</title>
</head>
<body>
        <!-- lưu tại /resources/views/product/create.blade.php -->
    @extends('sale-assistant-layout.sale-assistant-layout')
    @section('title', 'sale-assistant - users information details')
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
                                <h3 class="card-title">Thông tin chi tiết của khách hàng {{$users->fullname}}</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form role="form">
                                {{ csrf_field() }}
                                <div class="card-body">
                                <div class="row"> 
                                        <div class="col">
                                    <div class="form-group">
                                        <label>Mã khách hàng</label>
                                        <input type="text" class="form-control" value="{{ $users->id }}" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label>Tên tài khoản</label>
                                        <input type="text" class="form-control" value="{{ $users->userName}}" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label>Họ tên khách hàng</label>
                                        <input type="text" class="form-control" value="{{ $users->fullname}}" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label>Giới tính</label>
                                        <input type="text" class="form-control" value="{{ $users->gender}}" readonly>
                                    </div>
                                    </div>
                                    <div class="col">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="text" class="form-control" value="{{ $users->email}}" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label>Số điện thoại</label>
                                        <input type="text" class="form-control" value="{{ $users->telephone}}" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label>Ngày sinh</label>
                                        <input type="date" class="form-control" value="{{ $users->birthday}}" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label>Số điện thoại</label>
                                        <input type="text" class="form-control" value="{{ $users->telephone}}" readonly>
                                    </div>
                                    </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Địa chỉ</label>
                                        <textarea type="text" class="form-control"row="3 "readonly>{{ $users->address}}</textarea>
                                    </div>  
                                    <div class="form-group mt-5">
                                        <label for="image">Ảnh đại diện</label>
                                        <img class="img-fluid d-block m-auto" src="{{ url('product-images/'.$users->avatar) }}"/>
                                    </div>                                      
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <h2><a href="{{url('sale-assistant/sale-assistant-information')}}">Trở về</a></h2>
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
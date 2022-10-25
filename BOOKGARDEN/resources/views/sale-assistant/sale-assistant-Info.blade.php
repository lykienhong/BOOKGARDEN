<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
@extends('sale-assistant-layout.sale-assistant-layout')
    @section('title', 'sale-assistant - sale information')
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
                        <div class="card card-primary mt-5">
                            <div class="card-header">
                             Trang thông tin cá nhân của nhân viên
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form role="form" method="POST" action="{{url('sale-assistant/sale_assistant_change_Info')}}">
                                {{ csrf_field() }}
                                <div class="card-body ">
                                <div class="row"> 
                                        <div class="col">
                                    <div class="form-group">
                                        <label>Mã nhân viên</label>
                                        <input type="text" class="form-control" value="{{   $sale_assistant->adminId }}" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label>Tên nhân viên</label>
                                        <input type="text" class="form-control" name="adminFName" value="{{   $sale_assistant->adminFName}}" >
                                    </div>
                                    @if($errors->has('adminFName'))
                                    <p class="alert alert-danger">{{ $errors -> first('adminFName')}}</p>
                              @endif
                             
                                    <div class="form-group">
                                        <label>Số điện thoại</label>
                                        <input type="text" class="form-control" name="adminPhone" value="{{   $sale_assistant->adminPhone}}" >
                                    </div>
                                    @if($errors->has('adminPhone'))
                                     <p class="alert alert-danger">{{ $errors -> first('adminPhone')}}</p>
                                @endif
                                   <div>
                                       <button type="submit" class="w-100 d-block m-auto btn-info rounded-pill">Thay đổi</button>
                                   </div>
                               
                                    </div>
                                    </div>
                                                                
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <h2><a href="{{url('sale-assistant/sale-assistant-index')}}">Trở về</a></h2>
                                </div>
                            </form>
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
            </div>
        </section>
    @endsection
</body>
</html>
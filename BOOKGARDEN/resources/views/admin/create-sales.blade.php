<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang đăng kí nhân viên</title>
</head>
<body>
        <!-- lưu tại /resources/views/product/create.blade.php -->
    @extends('admin-layout.admin-layout')
    @section('title', 'sale-assistant - create new')
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
                                <h3 class="card-title">Đăng kí nhân viên mới</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form role="form" action="{{ url('admin/post_create_sales') }}" method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="txt-admin-name">Tên đăng nhập</label>
                                        <input type="text" class="form-control" id="txt-admin-name" name="admin-name" placeholder="Nhập tên đăng nhập">
                                        @if($errors->has('admin-name'))
                                        <p class="alert alert-danger">{{ $errors -> first('admin-name')}}</p>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="txt-admin-password">Mật khẩu</label>
                                        <input type="password" class="form-control" id="txt-admin-password" name="admin-password" placeholder="Nhập mật khẩu">
                                        @if($errors->has('admin-password'))
                                        <p class="alert alert-danger">{{ $errors -> first('admin-password')}}</p>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="txt-admin-fullname">Họ tên</label>
                                        <input type="text" class="form-control" id="txt-admin-fullname" name="admin-fullname" placeholder="Nhập họ và tên">
                                        @if($errors->has('admin-fullname'))
                                        <p class="alert alert-danger">{{ $errors -> first('admin-fullname')}}</p>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="txt-admin-tel">Số điện thoại</label>
                                        <input type="tel" class="form-control" id="txt-admin-tel" name="admin-tel" placeholder="Nhập số điện thoại">
                                        @if($errors->has('admin-tel'))
                                        <p class="alert alert-danger">{{ $errors -> first('admin-tel')}}</p>
                                        @endif
                                    </div>
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Đăng kí nhân viên</button>
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
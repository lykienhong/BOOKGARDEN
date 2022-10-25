<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang tạo thể loại mới</title>
</head>
<body>
        <!-- lưu tại /resources/views/product/create.blade.php -->
    @extends('admin-layout.admin-layout')
    @section('title', 'category - create new')
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
                                <h3 class="card-title">Tạo thể loại sách</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form role="form" action="{{ url('admin/post_create_category') }}" method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="txt-category-name">Tên thể loại</label>
                                        <input type="text" class="form-control" id="txt-category-name" name="categoryname" placeholder="Nhập thể loại">
                                        @if($errors->has('categoryname'))
                                        <p class="alert alert-danger">{{ $errors -> first('categoryname')}}</p>
                                        @endif
                                    </div>
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Tạo thể loại mới</button>
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
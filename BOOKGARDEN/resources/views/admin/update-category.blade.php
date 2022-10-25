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
    @extends('admin-layout.admin-layout')
    @section('title', 'category - update new')
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
                                <h3 class="card-title">Thay đổi thông tin của {{$category->cateName}}</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form role="form" action="{{ url('admin/post_update_category/'.$category->cateId) }}" method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="txt-product-id">Mã thể loại</label>
                                        <input type="text" class="form-control" id="txt-category-id" name="categoryid"  value="{{ $category->cateId }}" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="txt-category-name">Tên thể loại</label>
                                        <input type="text" class="form-control" id="txt-category-name" name="categoryName" placeholder="Nhập tên thể loại" value="{{ $category->cateName }}">
                                        @if($errors->has('categoryName'))
                                        <p class="alert alert-danger">{{ $errors -> first('categoryName')}}</p>
                                        @endif
                                    </div>                                                             
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Thay đổi</button>
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
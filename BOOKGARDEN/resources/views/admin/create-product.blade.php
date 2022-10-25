<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang tạo sản phẩm</title>
</head>
<body>
        <!-- lưu tại /resources/views/product/create.blade.php -->
    @extends('admin-layout.admin-layout')
    @section('title', 'product - create new')
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
                                <h3 class="card-title">Tạo sản phẩm</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form role="form" action="{{ url('admin/post_create_product') }}" method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="txt-product-name">Tên sản phẩm</label>
                                        <input type="text" class="form-control" id="txt-product-name" name="product-name" placeholder="Nhập tên sản phẩm">
                                        @if($errors->has('product-name'))
                                        <p class="alert alert-danger">{{ $errors -> first('product-name')}}</p>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="txt-product-category">Thể loại</label>
                                        <select class="form-control" id="txt-product-category" name="product-category">
                                            @foreach($category as $item)
                                            <option value="<?= $item->cateId ?>">{{ $item -> cateName}}</option>
                                            @endforeach
                                        </select>
                                        @if($errors->has('product-category'))
                                        <p class="alert alert-danger">{{ $errors -> first('product-category')}}</p>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="txt-product-price">Giá sản phẩm</label>
                                        <input type="text" class="form-control" id="txt-product-price" name="product-price" placeholder="Nhập giá sản phẩm">
                                        @if($errors->has('product-price'))
                                        <p class="alert alert-danger">{{ $errors -> first('product-price')}}</p>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="txt-product-description">Mô tả sản phẩm</label>
                                        <textarea class="form-control" rows="3" id="txt-product-description" name="product-description" placeholder="Nhập mô tả sản phẩm"></textarea>
                                        @if($errors->has('product-description'))
                                        <p class="alert alert-danger">{{ $errors -> first('product-description')}}</p>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="txt-product-status">Tình trạng sản phẩm</label>
                                        
                                        <select class="form-control" id="txt-product-status" name="product-status">
                                            <option value = "Còn hàng">Còn hàng</option>
                                            <option value = "Hết hàng">Hết hàng</option>
                                        </select>
                                        @if($errors->has('product-status'))
                                        <p class="alert alert-danger">{{ $errors -> first('product-status')}}</p>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="image">Hình ảnh sản phẩm</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="product-image" name="product-image">
                                                <label class="custom-file-label" for="product-image">Chọn hình ảnh</label>
                                            </div>
                                            @if($errors->has('product-image'))
                                                <p class="alert alert-danger">{{ $errors -> first('product-image')}}</p>
                                                @endif
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Tạo sản phẩm</button>
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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang thay đổi thông tin sản phẩm</title>
</head>
<body>
        <!-- lưu tại /resources/views/product/create.blade.php -->
    @extends('admin-layout.admin-layout')
    @section('title', 'product - update new')
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
                                <h3 class="card-title">Thay đổi thông tin của {{$products->productName}}</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form role="form" action="{{ url('admin/post_update_product/'.$products->productId) }}" method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="txt-product-id">Mã sản phẩm</label>
                                        <input type="text" class="form-control" id="txt-product-id" name="product-id"  value="{{ $products->productId }}" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="txt-product-name">Tên sản phẩm</label>
                                        <input type="text" class="form-control" id="txt-product-name" name="productName" placeholder="Nhập tên sản phẩm" value="{{ $products->productName }}">
                                        @if($errors->has('productName'))
                                        <p class="alert alert-danger">{{ $errors -> first('productName')}}</p>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="txt-product-category">Thể loại</label>
                                        <select class="form-control" id="txt-product-category" name="productCategory">
                                            @foreach($category as $item)
                                            <option value="<?= $item->cateId ?>"@if($item->cateId == $products->cateId) selected @endif>{{ $item -> cateName}}</option>
                                            @endforeach
                                        </select>
                                        @if($errors->has('productCategory'))
                                        <p class="alert alert-danger">{{ $errors -> first('productCategory')}}</p>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="txt-product-price">Giá sản phẩm</label>
                                        <input type="text" class="form-control" id="txt-product-price" name="productPrice" placeholder="Nhập giá sản phẩm" value="{{ $products->price }}">
                                        @if($errors->has('productPrice'))
                                        <p class="alert alert-danger">{{ $errors -> first('productPrice')}}</p>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="txt-product-description">Mô tả sản phẩm</label>
                                        <textarea class="form-control" rows="3" id="txt-product-description" name="productDescription" placeholder="Nhập mô tả sản phẩm">{{ $products->description }}</textarea>
                                        @if($errors->has('productDescription'))
                                        <p class="alert alert-danger">{{ $errors -> first('productDescription')}}</p>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="txt-product-status">Tình trạng sản phẩm</label>
                                        <input type="text" class="form-control" name="productStatus" readonly value="{{ $products->productStatus }}">
                                        <select class="form-control" id="txt-product-status" name="productStatus">
                                            <option value = "Còn hàng" @if($products->productStatus =='Còn hàng') selected
                                                @endif>Còn hàng</option>
                                            <option value = "Hết hàng" @if($products->productStatus =='Hết hàng') selected
                                                @endif>Hết hàng</option>
                                        </select>
                                        @if($errors->has('productStatus'))
                                        <p class="alert alert-danger">{{ $errors -> first('productStatus')}}</p>
                                        @endif
                                    </div> 
                                    <div class="form-group">
                                        <label for="image">Hình ảnh sản phẩm</label>
                                        <img class="img-fluid" src="{{ url('product-images/'.$products->productImage) }}"/>
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
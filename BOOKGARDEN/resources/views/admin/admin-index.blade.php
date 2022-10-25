<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang chủ Admin</title>
</head>
<body>
        <!-- Lưu tại resources/views/product/index.blade.php -->
    @extends('admin-layout.admin-layout')
    @section('title', 'admin index')
    @section('content')
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Trang quản lí sản phẩm</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">DataTables</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Danh sách các sản phẩm của BOOKGARDEN</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="product" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>Mã sản phẩm</th>
                                    <th>Tên sản phẩm</th>
                                    <th>Thể loại</th>
                                    <th>Giá sản phẩm</th>
                                    <th>Mô tả sản phẩm</th>
                                    <th>Tình trạng sản phẩm</th>
                                    <th>Hình ảnh</th>
                                    <th>Khóa sản phẩm</th>
                                    <th>Chức năng</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($products as $p)
                                <tr>
                                    <td>{{ $p->productId }}</td>
                                    <td>{{ $p->productName}}</td>
                                    <td>{{ $p->cateName}}</td>
                                    <td>{{ $p->price }}</td>
                                    <td>{{ $p->description}}</td>
                                    <td>{{ $p->productStatus}}</td>
                                    <td><img width="100px" src="{{ url('product-images/'.$p->productImage) }}"/></td>
                                    @if($p->visiblePro == 0)
                                    <td>chưa khóa</td>
                                    @elseif($p->visiblePro == 1)
                                    <td>đã khóa</td>
                                    @endif 
                            
                                
                                    <td class="text-right">
                                        <a class="btn btn-primary btn-sm " href="{{ url('admin/update-product/'.$p->productId) }}">
                                            <i class="fas fa-pencil-alt"></i> Thay đổi
                                        </a>
                                        <a class="btn btn-danger btn-sm mt-2" href="{{ url('admin/product_lock/'.$p->productId)}}">
                                            <i class="fas fa-ban"></i> Khóa
                                        </a>
                                        <a class="btn btn-warning btn-sm mt-2" href="{{ url('admin/product_unlock/'.$p->productId)}}">
                                            <i class="fas fa-lock-open"></i> Mở khóa
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                <th>Mã sản phẩm</th>
                                    <th>Tên sản phẩm</th>
                                    <th>Thể loại</th>
                                    <th>Giá sản phẩm</th>
                                    <th>Mô tả sản phẩm</th>
                                    <th>Tình trạng sản phẩm</th>
                                    <th>Hình ảnh</th>
                                    <th>Khóa sản phẩm</th>
                                    <th>Chức năng</th>
                                </tr>
                                </tfoot>
                            </table>
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
    @section('script-section')
        <script>
            $(function () {
                $('#product').DataTable({
                    "paging": false,
                    "lengthChange": false,
                    "searching": true,
                    "ordering": true,
                    "info": false,
                    "autoWidth": true,
                });
            });
        </script>
    @endsection
</body>
</html>
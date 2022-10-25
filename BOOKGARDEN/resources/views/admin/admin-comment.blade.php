<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
</head>
<body>
        <!-- Lưu tại resources/views/product/index.blade.php -->
    @extends('admin-layout.admin-layout')
    @section('title', 'admin users comment')
    @section('content')
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Trang quản lí bình luận của người dùng</h1>
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
                            <h3 class="card-title">Danh sách bình luận của người dùng</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="product" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>Mã bình luận</th>
                                    <th>Mã sản phẩm</th>
                                    <th>Tên sản phẩm</th>
                                    <th>Tài khoản</th>
                                    <th>Họ tên người dùng</th>
                                    <th>Bình luận</th>
                                    <th>Chức năng</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($comment as $co)
                                <tr>
                                    <td>{{ $co->commentId }}</td>
                                    <td>{{ $co->productId}}</td>
                                    <td>{{ $co->productName }}</td>
                                    <td>{{ $co->userName}}</td>
                                    <td>{{ $co->fullname}}</td>
                                    <td>{{ $co->comment}}</td>
                                    <td class="text-right">
                                        <a class="btn btn-info btn-sm" href="{{ url('admin/admin_delete_comment/'.$co->commentId) }}" onclick="return confirm('Có chắc chắn muốn xóa ?')">
                                            <i class="fas fa-ban"></i> Xóa
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>Mã bình luận</th>
                                    <th>Mã sản phẩm</th>
                                    <th>Tên sản phẩm</th>
                                    <th>Tài khoản</th>
                                    <th>Họ tên người dùng</th>
                                    <th>Bình luận</th>
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
                    "ordering": false,
                    "info": false,
                    "autoWidth": false,
                });
            });
        </script>
    @endsection
</body>
</html>
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
    @section('title', 'admin sales assistant information')
    @section('content')
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Trang quản lí nhân viên</h1>
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
                            <h3 class="card-title">Danh sách các nhân viên</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="product" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>Mã nhân viên</th>
                                    <th>Tên đăng nhập</th>
                                    <th>Mật khẩu</th>
                                    <th>Họ tên</th>
                                    <th>Số điện thoại</th>
                                    <th>Chức năng</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($admin as $a)
                                <tr>
                                    @if($a->role == 2)
                                    <td>{{ $a->adminId }}</td>
                                    <td>{{ $a->adminName}}</td>
                                    <td>{{ $a->adminPassword}}</td>
                                    <td>{{ $a->adminFName }}</td>
                                    <td>{{ $a->adminPhone}}</td>
                                    <td class="text-right">
                                        <a class="btn btn-warning btn-sm" href="{{ url('admin/admin_delete_sales/'.$a->adminId) }}" onclick="return confirm('Bạn có chắc muốn xóa ?')">
                                            <i class="fas fa-trash"></i> Xóa
                                        </a>
                                    </td>
                                    @endif
                                </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>Mã nhân viên</th>
                                    <th>Tên đăng nhập</th>
                                    <th>Mật khẩu</th>
                                    <th>Họ tên</th>
                                    <th>Số điện thoại</th>
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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sale assistant</title>
</head>
<body>
        <!-- Lưu tại resources/views/product/index.blade.php -->
    @extends('sale-assistant-layout.sale-assistant-layout')
    @section('title', 'sale-assistant - users information')
    @section('content')
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Trang thông tin của người dùng</h1>
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
                            <h3 class="card-title">Danh sách của người dùng</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="product" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>Mã người dùng</th>
                                    <th>Tài khoản</th>
                                    <th>Họ tên người dùng</th>
                                    <th>Email</th>
                                    <th>Số điện thoại</th>
                                    <td>Chức năng</td>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $u)
                                <tr>
                                    <td>{{ $u->id }}</td>
                                    <td>{{ $u->userName }}</td>
                                    <td>{{ $u->fullname}}</td>
                                    <td>{{ $u->email}}</td>
                                    <td>{{ $u->telephone}}</td>
                                    <td class="text-right">
                                        <a class="btn btn-primary btn-sm" href="{{ url('sale-assistant/sale-assistant-information-details/'.$u->id)}}">
                                            <i class="fas fa-pencil-alt"></i> Chi tiết
                                        </a>
                                        
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>Mã người dùng</th>
                                    <th>Tài khoản</th>
                                    <th>Họ tên người dùng</th>
                                    <th>Email</th>
                                    <th>Số điện thoại</th>
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
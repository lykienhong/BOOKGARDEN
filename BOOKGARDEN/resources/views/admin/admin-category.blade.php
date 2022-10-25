<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang Admin - Thể loại</title>
</head>
<body>
        <!-- Lưu tại resources/views/product/index.blade.php -->
    @extends('admin-layout.admin-layout')
    @section('title', 'admin category')
    @section('content')
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Trang quản lí các thể loại sách</h1>
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
                            <h3 class="card-title">Danh sách các thể loại sách</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="product" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>Mã thể loại</th>
                                    <th>Thể loại sách</th>
                                    <th>Khóa thể loại</th>
                                    <th>Chức năng</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($category as $c)
                                <tr>
                                    <td>{{ $c->cateId }}</td>
                                    <td>{{ $c->cateName }}</td>
                                    @if($c->visible == 1)
                                    <td>
                                        Đã khóa  
                                    </td>
                                    @else
                                    <td>
                                        Chưa khóa
                                    </td>
                                    @endif
                                    <td class="text-right">
                                        <a class="btn btn-primary btn-sm" href="{{ url('admin/update-category/'.$c->cateId) }}">
                                            <i class="fas fa-pencil-alt"></i> Thay đổi
                                        </a>
                                        <a class="btn btn-danger btn-sm" href="{{ url('admin/category_lock/'.$c->cateId)}}">
                                            <i class="fas fa-ban"></i> Khóa
                                        </a>
                                        <a class="btn btn-warning btn-sm" href="{{ url('admin/category_unlock/'.$c->cateId)}}">
                                            <i class="fas fa-lock-open"></i> Mở khóa
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>Mã thể loại</th>
                                    <th>Thể loại sách</th>
                                    <th>Khóa thể loại</th>
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
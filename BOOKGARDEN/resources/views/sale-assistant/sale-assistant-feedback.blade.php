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
    @extends('sale-assistant-layout.sale-assistant-layout')
    @section('title', 'sale assistant users feedback')
    @section('content')
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Trang quản lí phản hồi của người dùng</h1>
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
                            <h3 class="card-title">Danh sách phản hồi của khách hàng</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="product" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>Mã phản hồi</th>
                                    <th>Mã người dùng</th>
                                    <th>Họ tên người dùng</th>
                                    <th>Email</th>
                                    <th>Ngày gửi</th>
                                    <th>Nội dung</th>
                                    <th>Trả lời khách hàng</th>
                                    <th>Chức năng</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($feedback as $f)
                                <tr>
                                    <td>{{ $f->feedbackId }}</td>
                                    <td>{{ $f->id}}</td>
                                    <td>{{ $f->fullname}}</td>
                                    <td>{{ $f->email}}</td>
                                    <td>{{ $f->feedbackDate }}</td>
                                    <td>{{ $f->descriptionFeedback}}</td>
                                    <td>{{ $f->replyFeedback}}</td>
                                    <td class="text-right">
                                        <a class="btn btn-primary btn-sm" href="{{ url('sale-assistant/sale-assistant-reply-feedback/'.$f->feedbackId)}}">
                                            <i class="fas fa-pencil-alt"></i> Phản hồi
                                        </a>
                                        
                                        
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>Mã phản hồi</th>
                                    <th>Mã người dùng</th>
                                    <th>Họ tên người dùng</th>
                                    <th>Email</th>
                                    <th>Ngày gửi</th>
                                    <th>Nội dung</th>
                                    <th>Trả lời khách hàng</th>
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
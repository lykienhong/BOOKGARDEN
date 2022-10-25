<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang quản lí của Admin</title>
</head>
<body>
        <!-- Lưu tại resources/views/product/index.blade.php -->
    @extends('admin-layout.admin-layout')
    @section('title', 'admin order')
    @section('content')
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Trang quản lí đơn đặt hàng</h1>
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
                            <h3 class="card-title">Danh sách các đơn hàng</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="product" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>Mã đơn hàng</th>
                                    <th>Mã khách hàng</th>
                                    <th>Tên khách hàng</th>
                                    <th>Địa chỉ nhận hàng</th>
                                    <th>Ngày đặt hàng</th>
                                    <th>Giá trị đơn hàng</th>
                                    <th>Tiến trình giao hàng</th>
                                    <th>Chức năng</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($orders as $o)
                                <tr>
                                    <td>{{ $o->orderId }}</td>
                                    <td>{{ $o->id}}</td>
                                    <td>{{ $o->fullname}}</td>
                                    <td>{{ $o->ship_address }}</td>
                                    <td>{{ $o->order_date}}</td>
                                    <td>{{ $o->total}}</td>


                                    @if($o->process_status == 0)
                                    <td>
                                        Đang xử lí
                                    </td>
                                    @elseif($o->process_status == 1)
                                    <td>
                                        Đang đóng gói
                                    </td>
                                    @elseif($o->process_status == 2)
                                    <td>
                                        Đang vận chuyển
                                    </td>
                                    @elseif($o->process_status == 3)
                                    <td>
                                        Đã nhận hàng
                                    </td>
                                    @else
                                    <td>
                                        Đã hủy
                                    </td>
                                    @endif


                                    
                                    <td class="text-right">
                                        @if($o->process_status != 3 && $o->process_status != 4)
                                        <a class="btn btn-primary btn-sm " href="{{ url('admin/admin-update-process/'.$o->orderId) }}">
                                            <i class="fas fa-pencil-alt"></i>Cập nhật tiến độ
                                        </a>
                                        <a class="btn btn-info btn-sm mt-2" href="{{ url('admin-order-details/'.$o->orderId)}}">
                                            <i class="fas fa-info-circle"></i>Chi tiết đơn hàng
                                        </a>
                                        <a class="btn btn-danger btn-sm mt-2" href="{{ url('admin/order_cancel/'.$o->orderId)}}" onclick="return confirm('Bạn có chắc chắn muốn hủy ?')">
                                            <i class="fas fa-ban"></i> Hủy đơn hàng
                                        </a>
                                        @else
                                        <a class="btn btn-info btn-sm" href="{{ url('admin-order-details/'.$o->orderId)}}">
                                            <i class="fas fa-info-circle"></i>Chi tiết đơn hàng
                                        </a>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>Mã đơn hàng</th>
                                    <th>Mã khách hàng</th>
                                    <th>Tên khách hàng</th>
                                    <th>Địa chỉ nhận hàng</th>
                                    <th>Ngày đặt hàng</th>
                                    <th>Giá trị đơn hàng</th>
                                    <th>Tiến trình giao hàng</th>
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
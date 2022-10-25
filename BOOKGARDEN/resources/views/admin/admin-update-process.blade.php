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
                                <h3 class="card-title">Cập nhật tiến trình giao hàng của đơn hàng số {{$orders->orderId}}</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form role="form" action="{{ url('admin/admin_post_update_process/'.$orders->orderId) }}" method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="form-group">
                                        <label for="txt-product-status">Tiến độ giao hàng</label>
                                        <input type="text" class="form-control" name="process_Status" readonly 
                                        value="{{ $orders->process_status }}">
                                        <select class="form-control" id="txt-process-status" name="processStatus">
                                            <option value = "0" @if($orders->process_status == 0) selected
                                                @endif
                                                @if($orders->process_status > 0) disabled
                                                @endif
                                                >Đang xử lí</option>
                                            <option value = "1" @if($orders->process_status == 1) selected
                                                @endif
                                                @if($orders->process_status > 1) disabled
                                                @endif
                                                >Đang đóng gói</option>
                                            <option value = "2" @if($orders->process_status == 2) selected
                                                @endif
                                                @if($orders->process_status >2) disabled
                                                @endif
                                                >Đang vận chuyển</option>
                                            <option value = "3" @if($orders->process_status == 3) selected
                                                @endif
                                                @if($orders->process_status >3) disabled
                                                @endif
                                                >Đã nhận hàng</option>
                                            <option value = "4" @if($orders->process_status == 4) selected
                                                @endif
                                                @if($orders->process_status >= 4 || $orders->process_status > 0) disabled
                                                @endif>Đã hủy</option>
                                        </select>
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
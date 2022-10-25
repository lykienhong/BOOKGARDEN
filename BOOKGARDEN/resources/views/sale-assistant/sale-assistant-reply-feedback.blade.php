<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang phản hồi khách hàng</title>
</head>
<body>
        <!-- lưu tại /resources/views/product/create.blade.php -->
    @extends('sale-assistant-layout.sale-assistant-layout')
    @section('title', 'sale -assistant feedback - reply feedback')
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
                                <h3 class="card-title">Phản hồi của khách hàng {{$feedback->fullname}}</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form role="form" action="{{ url('sale-assistant/sale_assistant_post_reply_feedback/'.$feedback->feedbackId) }}" method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Mã phản hồi</label>
                                        <input type="text" class="form-control" value="{{ $feedback->feedbackId }}" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="text" class="form-control" value="{{ $feedback->email}}" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label>Ngày gửi phản hồi</label>
                                        <input type="datetime" class="form-control" value="{{ $feedback->feedbackDate}}" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label>Phản hồi của cách hàng</label>
                                        <textarea type="text" class="form-control"row="8 "readonly>{{ $feedback->descriptionFeedback}}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Trả lời khách hàng</label>
                                        <textarea type="text" class="form-control"row="8" name="replyFeedBack" id="replyFeedBack" placeholder="Nhập vào đây">{{$feedback->replyFeedback}}</textarea>
                                    </div>                                                       
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Phản hồi</button>
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
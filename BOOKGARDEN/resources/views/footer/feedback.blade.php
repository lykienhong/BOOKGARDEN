<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body >
@extends('layout.layout-user')
    @section('content')
<section class="" >
<div class="container text-warning bg-success">
<form action="{{url('afterFeedback/'.$feedback->id)}}" method="POST" class="w-100 my-5 px-5 py-5">
{{ csrf_field() }}
<h1 style="text-align: center;font-family:Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif" class="text-white">Feedback</h1>
<div class="">
<div class="form-group">
 <span class="  ">
   <label  for="txt-name" class="text-white">Họ & tên: </label> &emsp;
        <input  type="text" id="txt-name" class="form-control" name="fullname" value="{{$feedback->fullname}}">
 </span></div>
  <div class="row  form-group">  
 <span class=" col-md-6">
        <label for="txt-email" class="text-white">Email :</label> &emsp; &emsp;
        <input type="text"  class="form-control" id="txt-email" name="email" value="{{$feedback->email}}" >
 </span>
 <span class=" col-md-6">
        <label for="txt-telephong" class="text-white">Số điện thoại :</label> &emsp;
        <input type="text" class="form-control" id="txt-telephone" name="telephone" value="{{$feedback->telephone}}">
 </span>
 </div>    
 <div class="form-group">
 <span class=" ">
        <label for="txt-feedback" class="text-white">Phản hồi:</label> &emsp;
        <textarea style="border: none;" id="txt-feedback" class="form-control" name="descriptionFeedback"  placeholder="Nhập phản hồi của bạn"></textarea>
        @if($errors->has('descriptionFeedback'))
                                    <p class="alert alert-danger">{{ $errors -> first('descriptionFeedback')}}</p>
         @endif
</span></div>  
</div>
<iframe class="mb-3" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.3193500371794!2d106.66408025017542!3d10.786834792276766!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752ed2392c44df%3A0xd2ecb62e0d050fe9!2sFPT-Aptech%20Computer%20Education%20HCM!5e0!3m2!1svi!2s!4v1622290705558!5m2!1svi!2s" width="100%" height="300" style="border:0;" allowfullscreen="" loading=""></iframe>
<button type="submit"  class="btn btn-info m-auto d-block w-50" @if($errors->all()==0) onclick="return confirm('Gửi phản hồi thành công')" @endif> Gửi </button>

</form>

</div>
</section>
@endsection
</body>
</html>
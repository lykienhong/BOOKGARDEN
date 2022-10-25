<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang thông tin cá nhân</title>
</head>
<style>
  
</style>

<body style="background-color: whitesmoke;">
@extends('layout.layout-user')
    @section('content')
    
<section class="container" > 
   <div class="row my-5" >
   <div class=" col-md-2 bg-white border-end  ">
    
  <div class="my-2"><img src="../product-images/{{$userr->avatar}}" width="30%" class="rounded-circle"><b>   {{$userr->fullname}}</b></div>
  
  <a href="{{url('reset/'.$userr->id)}}" class="my-3 fas fa-key"> Thay đổi mật khẩu  </a>
   <a class="fas fa-sign-in-alt " href="{{url('logout')}}"> Đăng xuất tài khoản</a>
   </div>
    <div style="background-color: white;" class=" col-md-10">
    <h3 class="border-bottom mb-4 my-2">Thông tin của tôi</h3>
    <div class="row">
    <div class="col-md-8">
    <form action="{{url('change/'.$userr->id)}}" style="width: 150%;" method="POST">
    {{ csrf_field() }}
        <label style="font-family:Arial, Helvetica, sans-serif;font-weight:normal;">Tên đăng nhập: </label>  
        <strong style="margin-left: 4%;">{{$userr->userName}}</strong><br><br>
    
       <div class="form-group row">
                    <label class="control-label col-md-2" for="txt-user-phone" style="font-family:Arial, Helvetica, sans-serif;font-weight:normal;">Họ tên:</label>
                    <div class="col-md-10">
                      <input type="text"  id="txt-user-phone" value="{{$userr->fullname}}" name="fullname">  <i class="fas fa-user-edit"></i>
                      @if($errors->has('fullname'))
                                    <p class="text-red">{{ $errors -> first('fullname')}}</p>
                   @endif
                    </div>
              </div>
            <div class="form-group row">
                    <label class="control-label col-md-2" for="txt-user-phone" style="font-family:Arial, Helvetica, sans-serif;font-weight:normal;">Số điện thoại:</label>
                    <div class="col-md-10">
                      <input type="text"  id="txt-user-phone" value="{{$userr->telephone}}" name="telephone">  <i class="fas fa-user-edit"></i>
                      @if($errors->has('telephone'))
                                    <p class="text-red">{{ $errors -> first('telephone')}}</p>
                   @endif
                    </div>
              </div>
           
             <div class="form-group row">  
                    <label class="control-label col-md-2" for="txt-user-email" style="font-family:Arial, Helvetica, sans-serif;font-weight:normal;">Email:</label>
                    <div class="col-md-10">
                      <input type="email"    id="txt-user-email" value="{{$userr->email}}" name="email">  <i class="fas fa-user-edit"></i>
                    </div>
                  </div>
              <div class="form-group row">
              <label style="font-family:Arial, Helvetica, sans-serif;font-weight:normal;" class="control-label col-md-2">Địa chỉ: </label> 
                  <textarea class="col-md-4" name="address"   rows="3" cols="5" >{{$userr->address}}</textarea>
                  @if($errors->has('address'))
                                    <p class="text-red " style="margin-left: 10em;">{{ $errors -> first('address')}}</p>
                   @endif
              </div>
              <div class="form-group row">
              <label style="font-family:Arial, Helvetica, sans-serif;font-weight:normal;" class="control-label col-md-2">Giới tính: </label> 
               <div class="input-group col-md-10">

               <input type="radio" name="gender"  id="radMale" value="Male"  @if($userr->gender =='Male') checked  @endif> <p class="ml-2 mr-4">Male</p>
                <input type="radio" name="gender" id="radfeMale" value="Female" @if($userr->gender =='Female') checked  @endif> <p class="ml-2">Female</p>
               </div>
              </div>
              <div class="form-group row">
              <label style="font-family:Arial, Helvetica, sans-serif;font-weight:normal;" class="control-label col-md-2">Ngày sinh: </label> 
              <input type="date" class="col-md-4" id="txtDOB" name="birthday" value="{{$userr->birthday}}">
              </div>
              <button type="submit" class="btn btn-success w-50 mt-5">Thay đổi</button>
    </form>
    </div>
    <div class="col-md-4 border-left">
    <img src="../product-images/{{$userr->avatar}}" class="mx-auto  d-block" width="30%" class="rounded-circle"><br>
    <p style="text-align: center; color:darkgrey" class="mt-2 ">Định dạng:.JPEG, .PNG, .JPG</p>
      <form method="POST" action="{{url('updateImage/'.$userr->id)}}" enctype="multipart/form-data" >
      {{ csrf_field() }}
                 <div class="input-group">
            <div class="custom-file">
               <input type="file" class="custom-file-input" id="avatar" name="avatar">
            <label class="custom-file-label" for="avatar">Chọn hình ảnh</label>
 </div>
 </div>
 
        <button type="submit" class="btn btn-outline-success mt-3 mx-auto d-block w-50">Lưu</button>
   
    </form>
    </div>
    </div>
   </div>
</div>
</section>
@endsection

</body>
</html>
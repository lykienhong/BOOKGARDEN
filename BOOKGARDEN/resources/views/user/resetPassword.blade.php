<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body style="background-color: whitesmoke;">
@extends('layout.layout-user')
    @section('content')
    <section class="container" > 
   <div class="row my-5" >
   <div style="background-color: whitesmoke;" class=" col-md-2">
  <span class="my-2"><img src="../product-images/{{$userr->avatar}}" width="30%" class="rounded-circle"><b>   {{$userr->userName}}</b></span>
  <br>
  <a href="{{url('user/information')}}" class="text-dark fas fa-users-cog mt-3" ><b> Sửa thông tin cá nhân </b> </a>
   </div>
    <div style="background-color: white;" class=" col-md-10">
    <h3 class="mt-2 ">Đổi mật khẩu</h3>
    <i >Để bảo mật tài khoản, vui lòng không chia sẻ mật khẩu cho người khác</i>
   
    <form action="{{url('afterReset/'.$userr->id)}}"class=" my-4 "  style="width: 100%;" method="POST">
    {{ csrf_field() }}
    <div style="display: flex;flex-direction:column;align-items:center" class="pb-5"> 

    <div class="form-inline my-3"  >
        <div class="form-group row">
        <label  class="col-md-6" for="txt-pass"  style="color:darkgrey;">Mật khẩu hiện tại: </label>
        <div class="col-md-6">
        <input type="password" class="form-control  m-auto" name="userPassword" id="txt-pass">
        </div>
        </div>
    </div>
    @if($errors->has('userPassword'))
                                    <p class="text-red">{{ $errors -> first('userPassword')}}</p>
         @endif
 
    <div class="form-inline my-3" >
        <div class="form-group row">
        <label  class="col-md-6" for="txt-passNew"  style="color:darkgrey;">Mật khẩu mới: </label>
        <div class="col-md-6">
        <input type="password" class="form-control  m-auto"   name="userPasswordNew" id="txt-passNew">
   
        </div>
        </div>
    </div>
    @if($errors->has('userPasswordNew'))
                                    <p class="text-red">{{ $errors -> first('userPasswordNew')}}</p>
         @endif
      <div class="form-inline my-3" >
        <div class="form-group row">
        <label  class="col-md-6" for="txt-passNews"  style="color:darkgrey;">Xác nhân mật khẩu : </label>
        <div class="col-md-6">
        <input type="password" class="form-control  m-auto"   name="userConfirmPasswordNew" id="txt-passNews">
    
        </div>
        </div>
    </div>
    @if($errors->has('userConfirmPasswordNew'))
                                    <p class="text-red">{{ $errors -> first('userConfirmPasswordNew')}}</p>
         @endif

  
    </div>
              <button type="submit" class="btn btn-success  w-50 d-block m-auto"  @if($errors->any()) onclick="return confirm('Thay đổi thành công')" @endif>Thay đổi</button>
              
    </form>
   
   </div>
</div>
</section>
    @endsection
</body>
</html>
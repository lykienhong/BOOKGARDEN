<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<script>

</script>
<body>
@extends('layout.layout')
    @section('content')
    <div class="container my-5">
        <div class="row">
               <div class="card col-md-6" style="width:400px">
                    <img class="card-img-top" width="100"  src="https://andrews.edu.vn/wp-content/uploads/invest_books_mbaandrews.jpg" alt="Card image" style="width:100%">
                    <div class="card-body">
                    <h3 class="card-text pt-5" style="text-align: center;" >BookGarden thế giới tri thức của riêng bạn</h3>
                    </div>
                </div>
                <div class="col-md-6 ">
   
                <form class="form" method="POST"  action="{{url('afterSignup')}}">
                {{ csrf_field() }}
                <div class="form-group pl-3">
                    <label class="control-label col-md-0" for="txt-user-fullname">Fullname:</label>
                    <div class="col-md-12">
                      <input type="text" class="form-control" id="txt-user-fullname" placeholder="Enter fullname" name="fullname">
                      @if($errors->has('fullname'))
                                    <p class="alert alert-danger">{{ $errors -> first('fullname')}}</p>
                   @endif
                    </div>
                  </div>
                  <div class="form-group pl-3">
                    <label class="control-label col-md-0" for="txt-user-username">User name:</label>
                    <div class="col-md-12">
                      <input type="text" class="form-control" id="txt-user-username" placeholder="Enter username" name="userName">
                      @if($errors->has('userName'))
                                    <p class="alert alert-danger">{{ $errors -> first('userName')}}</p>
                   @endif
                    </div>
                  </div>
                  <div class="form-group pl-3">
                    <label class="control-label col-md-0" for="txt-user-phone">Telephone:</label>
                    <div class="col-md-12">
                      <input type="text" class="form-control" id="txt-user-phone" placeholder="Enter phone" name="telephone">
                      @if($errors->has('telephone'))
                                    <p class="alert alert-danger">{{ $errors -> first('telephone')}}</p>
                   @endif
                    </div>
                  </div>
                  <div class="form-group pl-3">
                    <label class="control-label col-md-0" for="txt-user-email">Email:</label>
                    <div class="col-md-12">
                      <input type="email" class="form-control" id="txt-user-email" placeholder="Enter email" name="email">
                      @if($errors->has('email'))
                                    <p class="alert alert-danger">{{ $errors -> first('email')}}</p>
                   @endif
                    </div>
                  </div>
                  <div class="form-group pl-3">
                    <label class="control-label col-md-0" for="txt-user-password">Password:</label>
                    <div class="col-md-12">          
                      <input type="password" class="form-control" id="txt-user-password" placeholder="Enter password" name="userPassword">
                      @if($errors->has('userPassword'))
                                    <p class="alert alert-danger">{{ $errors -> first('userPassword')}}</p>
                   @endif
                    </div>
                  </div>
                  <div class="form-group pl-3">
                    <label class="control-label col-md-0" for="txt-user-password">Confirm Password:</label>
                    <div class="col-md-12">          
                      <input type="password" class="form-control" id="txt-user-C_password" placeholder="Enter confirm password" name="ConfirmUserPassword">
                      @if($errors->has('ConfirmUserPassword'))
                                    <p class="alert alert-danger">{{ $errors -> first('ConfirmUserPassword')}}</p>
                   @endif
                    </div>
                  </div>
            
                  <div class="form-group ">        
                    <div >
                      <button type="submit"  class="btn btn-success w-100" @if($errors->all()==0) onclick="return confirm('Đăng kí thành công')" @endif>Sign up</button>
                    </div>
                  </div>   
                </form>
                                  <!-- The Modal -->
                
                </div>
              </div>
              </div>
    @endsection
</body>
</html>
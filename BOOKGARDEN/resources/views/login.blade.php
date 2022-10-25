<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body  >
@extends('layout.layout')
    @section('content')
    <section class="py-1"  >
    <div class="container my-5" >
        <div class="row">
               <div class="card m-auto" style="width:400px">
                   <div class="card-header " style="font-size: 30px;">Login</div>
                    <div class="card-body">
                
                <form class="form  "  action="{{url('checkLogin')}}" method="POST">
                {{ csrf_field() }}
               
               <div class="form-group pl-3">
                 <label class="control-label col-md-0" for="txt-name">User name:</label>
                 <div class="col-md-12">
                   <input type="text" class="form-control" id="txt-name" placeholder="Enter username" name="userName">
                   @if($errors->has('userName'))
                                    <p class="alert alert-danger "  >{{ $errors -> first('userName')}}</p>
                   @endif
                 </div>
               </div>  
               <div class="form-group pl-3">
                 <label class="control-label col-md-0" for="txt-user-password">Password:</label>
                 <div class="col-md-12">          
                   <input type="password" class="form-control" id="txt-password" placeholder="Enter password" name="userPassword">
                   @if($errors->has('userPassword'))
                                    <p class="alert alert-danger">{{ $errors -> first('userPassword')}}</p>
                    @endif
                 </div>
               </div>
              
               <div class="form-group ">        
                 <div >
                   <button type="submit" class="btn btn-success w-100"  id="navUser">Log in</button>
                 </div>
               </div>   
             </form>
           
                    </div>
                    <div class="card-footer">
                    <a href="{{url('signUp')}}"> <button type="submit"  class="btn btn-outline-success w-100">Sign up </button></a>
             </div>
                </div>
              
              
              </div>
              </div></section>
    @endsection
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
   <!-- Tell the browser to be responsive to screen width -->
   <meta name="viewport" content="width=device-width, initial-scale=1">

   <!-- Font Awesome -->
   <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
   
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
   <!-- Ionicons -->
   <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
   <!-- DataTables -->
   <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.css') }}">
   <!-- Theme style -->
   <link rel="stylesheet" href="{{ asset('css/adminlte.min.css') }}">
   <!-- Google Font: Source Sans Pro -->
   <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">


</head>
<body>

<img class="w-100 " src="https://cdn0.fahasa.com/media/wysiwyg/Thang-12-2021/mega%20sale_1263%20x%2060%20NON%20LABEL.png">

<nav class=" navbar navbar-expand-sm navbar-success mt-1   ">

<div class="container">

  <div class="collapse navbar-collapse row" >
    <ul class="navbar-nav me-auto col-3">
      <li class="nav-item">
        <a class="navbar-link text-white  " style="font-size: 200% ;" href="{{url('user/indexUser')}}">B✿✿kGarden</a>
      </li>
    
    </ul>
    <form class="d-flex col-4" method="POST" action="{{url('user/searchUser')}}">
      {{ csrf_field() }}
        <input class="form-control me-2 w-100" name="nameProduct" type="text" placeholder="nhập tên sản phẩm">
    
        <button type="submit" class="btn btn-outline-light"  ><i class="fa fa-search text-white "></i></button> 
    
      </form>
      <div class="col-5">
    <button  class="btn " >
            <a class="fas fa-cart-plus text-white" href="{{url('viewCart')}}"> Giỏ hàng</a>
     </button> 
     <button  class="btn " >
            <a class="fas fa-envelope text-white" href="{{url('user/viewFeedback')}}"> Phản hồi</a>
     </button> 
    <button  class="btn  " >
            <a class="text-white" href="{{url('user/information')}}">
            <img class="pr-1 rounded-circle"  src="{{ url('product-images/'.$userr->avatar)}}" width="50em" >  
            {{$userr->fullname}}</a>
     </button> 
     </div>

   
  </div>
</div>  
</nav >


</body>
</html>

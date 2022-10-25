<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BOOKGARDEN</title>
</head>
<style>
.showHover:hover{
    background-color:whitesmoke
}
.dropdown:hover .dropdown-menu {
  display: block;
}
.card:hover{
  box-shadow: 10px 10px 5px grey;
}

#item:hover{
color: green;
}
.dropdown-menu{
  width: 20em;
}

  @media (min-width: 576px) {
    .dropdown-menu {
      width: 69em;
  margin-top: 20em;
    }
}

</style>
<script>
$(document).ready(function(){
  $("#pro").click(function(){
    location.replace('productdetails.blade.php');
  });
});
</script>
<body data-bs-spy="scroll" data-bs-target="#divv" data-bs-offset="50" >
        <!-- Lưu tại resources/views/product/index.blade.php -->
    @extends('layout.layout')
    @section('content')
   
<div class="container mt-3" >

<nav class="navbar navbar-expand navbar-success  mt-1 sticky-top">
<div class="">
<div class="dropdown  ">
Danh sách thể loại

    <button type="button" class="btn btn-success dropdown-toggle" data-bs-toggle="dropdown"> </button>
    <span class="border-start " style="padding-left: 11em;margin-left:13em"><b style="align-items:center;"> BookGarden kho sách điện tử uy tín - thế giới tri thức dành cho bạn</b></span>
    <div class="dropdown-menu bg-light" >

    
    <div class="row">
    @foreach($cate as $i) 
    @if($i->visible==0)
    <p  class="col"><a class="dropdown-item border-end border-2 " id="item" href="{{"searchCate/$i->cateId"}}">{{$i->cateName}}</a></p>
@endif
    @endforeach
    </div>
   


</div>

</div>

</div>

</nav>

<!---->

    <div id="demo" class="carousel slide" data-bs-ride="carousel">
<div class="container mt-3" id="divv">
    <div class="row">
        <div class="col-md-4 btn" onclick=window.location.href="{{url('#section')}}"> 
            <table class="table table-borderless border boder-success" >
                <tr>
                    <th colspan="2" style="text-align: center;" class="text-white bg-success ">Sự kiện</th>
                </tr>
                <tr>
                    <td><img width="100%" height="262x" src="https://nhasachphuongnam.com/images/promo/224/Banner_BK_290x198_3.jpg"></td>
                </tr>
            </table>
        </div>

        <!---->
    <div id="carouselExampleIndicators" class="carousel slide col-md-8" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner btn" onclick=window.location.href="{{url('#section')}}">
      <div class="carousel-item active">
        <img class="d-block w-100" src="https://cdn0.fahasa.com/media/magentothem/banner7/NCC_Bitex920x420_edit.jpg" alt="First slide">
      </div>
      <div class="carousel-item">
        <img class="d-block w-100" src="https://cdn0.fahasa.com/media/magentothem/banner7/NCC_DA_T1221_Silver920x420.jpg" alt="Second slide">
      </div>
      <div class="carousel-item">
        <img class="d-block w-100" src="https://cdn0.fahasa.com/media/magentothem/banner7/rs_920_x_420_non_label.png" alt="Third slide">
      </div>
    </div>
    </div>
</div>

<div class="row " >
    <div class="col-3 btn"  ><img width="100%" src="https://www.giaoduc.edu.vn/upload/images/2020/07/31/hiem-sach-thieu-nhi-cua-tac-gia-trong-nuoc-1.jpg" onclick=window.location.href="{{url('#section')}}"></div>
    <div class="col-3 btn"><img width="100%" height="95%" src="https://bloganchoi.com/wp-content/uploads/2019/05/sach-thieu-nhi-hay-7.jpg" onclick=window.location.href="{{url('#section')}}"></div>
    <div class="col-3 btn"><img width="100%" src="https://cth.edu.vn/wp-content/uploads/2018/01/sachtiengAnhCTmoi-1280x720.jpg" onclick=window.location.href="{{url('#section')}}"></div>
    <div class="col-3 btn"><img  width="100%" height="95%" src="https://static.tuoitre.vn/tto/i/s626/2016/05/26/3809ad4d.jpg" onclick=window.location.href="{{url('#section')}}"></div>
</div>
</div>
<div class=" p-1 border-bottom  border-success">
</div>

        <!-- Content Header (Page header) -->
        <section class="content-header" id="section">
            <div class="container-fluid">
                <div class="row mb-2" >
                  @foreach($products as $item)
                  @if($item->visiblePro == 0)
                    <div class="btn col-sm-3" onclick=window.location.href="{{url("productdetails/{$item->productId}")}}" >
                    <div class="card border border-success " id="index" >
                 <img class="card-img-top w-75 m-auto" src="product-images/{{$item->productImage}}"  alt="Card image" style="width:100%;">
                  <div class="card-body">
                    <p class="card-text " >{{$item->productName}}</p>
                  </div>
                </div>    
                    </div>
                    @endif
                 @endforeach
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
      

</div></div>
@endsection
   
</body>
</html>
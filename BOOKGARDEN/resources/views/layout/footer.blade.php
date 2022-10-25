<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>


</style>
<script>
function myFunction() {
  alert("Bạn phải đăng nhập để gửi phản hồi");
}
</script>
<body >
<footer class="text-center text-lg-start bg-success text-muted  " >
  <!-- Section: Social media -->
  <section class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom">

  </section>
  <!-- Section: Social media -->

  <!-- Section: Links  -->
  <section class="">
    <div class="container text-center text-md-start mt-5">
      <!-- Grid row -->
      <div class="row mt-3">
        <!-- Grid column -->
        <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
          <!-- Content -->
          <h6 class="text-uppercase fw-bold mb-4">
          <i class="fas fa-book"></i> BookGarden
          </h6>
          <p>
          BookGarden.com nhận đặt hàng trực tuyến và giao hàng tận nơi. 
          BookGarden thiên đường về sách dành cho riêng bạn
          </p>
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
          <!-- Links -->
          <h6 class="text-uppercase fw-bold mb-4">
            Dịch vụ
          </h6>
          <p>
            <a href="{{url('footer/dieukhoan')}}" class="text-reset">Điều khoản sử dụng</a>
          </p>
          <p>
            <a href="{{url('footer/chinhsach')}}" class="text-reset">Chính sách bảo mật</a>
          </p>
         

        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
          <!-- Links -->
          <h6 class="text-uppercase fw-bold mb-4">
            Hỗ trợ
          </h6>
          <p>
            <a href="{{url('login')}}" onclick="myFunction()" class="text-reset">Liên hệ với chúng tôi</a>
          </p> <p>
            <a href="{{url('footer/gioithieu')}}" class="text-reset">Giới thiệu BookGarden</a>
          </p>
       
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
          <!-- Links -->
          <h6 class="text-uppercase fw-bold mb-4">
            Contact
          </h6>
          <p>
            <i class="fas fa-envelope me-3"></i>
            info@example.com
          </p>
          <p><i class="fas fa-phone me-3"></i> + 01 234 567 88</p>
        </div>
        <!-- Grid column -->
      </div>
      <!-- Grid row -->
    </div>
  </section>
  <!-- Section: Links  -->

  <!-- Copyright -->
  <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
    © 2021 Copyright:
    <a class="text-reset fw-bold" href="#">BookGarden.com</a>
  </div>
  <!-- Copyright -->
</footer>
</body>
</html>
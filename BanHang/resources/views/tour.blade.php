<!DOCTYPE html>
<html lang="en">
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <body>
        <nav class="navbar navbar-expand-sm navbar">
            <div class="d-flex mb-3 ">
                <div class="p-2 ">
            <!-- Brand/logo -->
              <img src="public/img/logo.png" height="150" width="250">
                </div>
                <div class="p-2 ml-auto ">
            <!-- Links -->
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link" href="#">DU LỊCH</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">BOOK VÉ MÁY BAY</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">BOOK KHÁCH SẠN</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">DỊCH VỤ VISA</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">THUÊ XE</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">TIN TỨC</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">GIỚI THIỆU</a>
              </li>
            </ul>
                </div>
          </nav>
    <div class="container">
        <div class="row">
        @csrf
		@foreach ( $tour as $tours)
          <div class="col-sm-4 border border-primary" bg-secondary>
            <img src="{!! $tours['image'] !!}" height="200" width="350">
            <p>{!! $tours['name'] !!}</p>
            <p><i class="fa fa-clock-o"></i> Lịch trình: {!! $tours['schedule'] !!} </p>
            <p><i class="fa fa-calendar"></i> Khởi hành: {!! $tours['depart'] !!}</p>
            <div class="d-flex mb-3 ">
                <div class="p-2 "><i class="fa fa-user"></i> Số chỗ còn nhận: {!! $tours['number'] !!}</div>
                <div class="p-2 ml-auto"style="font-weight: bold;color:red;">{!! $tours['price'] !!}</div>
              </div>
          </div>
          @endforeach
        </div>
      </div>
    </body>
</html>

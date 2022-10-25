<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
@extends('layout.layout-user')
    @section('content')
    <section class="container">
        <div class="row my-5">
            <div class="col-md-2 border border-success border-bottom-0">
            <div class="my-2 border-bottom border-success pb-2"><img src="../product-images/{{$userr->avatar}}" width="30%" class="rounded-circle"><b>   {{$userr->fullname}}</b></div>
             <div class="mt-4">
                 <button class="btn btn-success d-block m-auto rounded-pill "  onclick=window.location.href="{{url('footer/feedback')}}" >Gửi feedback</button>
                </div> 
            </div>
            <div class="col-md-10" style="background-color: whitesmoke;">
            <table  class="table table-borderless table-hover">
                                <thead>
                                <tr style="background-color: #66ff99;">                             
                                    <th>Người nhận</th>   
                                    <th>Chi tiết</th>
                                    <th>Phản hồi</th>
                                    <th>Ngày gửi</th>
                                    <th>Ngày nhận </th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($feedback as $f)
                                <tr> 
                              <td>admin of BookGardern</td>
                              <td style="text-align:justify;">{{$f->descriptionFeedback}}</td>
                              <td style="text-align:justify;">{{$f->replyFeedback}}</td>
                              <td >{{$f->feedbackDate}}</td>
                              <td>{{$f->updated_at}}</td>
                   
                                </tr>
                                @endforeach
                                </tbody>
              </table>
            </div>

        </div>
    </section>
   @endsection
</body>
</html>
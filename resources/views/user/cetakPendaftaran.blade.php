<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Print Card</title>
    <!-- Fonts -->

    <!-- Styles -->
    <!-- Font Awesome -->
    <link rel="stylesheet" href="assets/css/bootstrap/bootstrap.css" type="text/css">


</head>

<body>

    <style>
        footer {
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
            height: 0;
        }

    </style>

    <br>

    <div style="width:90%; border: 1px solid #111;padding:20px;   margin: 0 auto">
        <img src="{{ public_path('static-image/logo.png') }}" style="width: 120px; float: left;" />

        <div>
            <h4 style=" text-align: center;margin-bottom:0;margin-top:0">Duta Bangsa University</h4>
            <h5 style=" text-align: center;margin-bottom:0;margin-top:0">{{$data->getEvent->event_name}}</h5>
            <h5 style=" text-align: center;margin-bottom:0;margin-top:0">{{date('d F Y', strtotime($data->getEvent->start_date))}} - {{date('d F Y', strtotime($data->getEvent->end_date))}}</h5>
        </div>

        <hr>
        <h5 style="margin-bottom:0">PARTICIPANT CARD</h5>
        <div class="" style="display: flex">
            <div class="">
                <table class="table">
                    <tr>
                        <td rowspan="4" class="mx-3" width="100" style="text-align: center"><img src="{{public_path($data->getMember->image)}}" height="100" style="object-fit: cover"></td>
                        <td>Name</td>
                        <td>:</td>
                        <td>{{$data->getMember->name}}</td>
                    </tr>
                    <tr>
                        <td>Passport</td>
                        <td>:</td>
                        <td>{{$data->getMember->passport}}</td>
                    </tr>
                    <tr>
                        <td>Date Of Birth</td>
                        <td>:</td>
                        <td>{{$data->getMember->dob}}</td>
                    </tr>
                    <tr>
                        <td>Date Of Birth</td>
                        <td>:</td>
                        <td>{{$data->getMember->institute}}</td>
                    </tr>
                </table>
            </div>
        </div>



        <div style="width:200px; margin-left:auto">
            <p style="text-align: center; margin-bottom:0">{{date('d F Y', strtotime(now("Asia/Jakarta")))}}</p>
            <p style="text-align: center;margin-top:0">Commitee Chairman</p>
            <br>
            <p style="text-align: center">( {{$data->getEvent->getComitee->name}} )</p>
        </div>
    </div>




    <!-- JS -->
    <script src="js/app.js"></script>
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>

</html>

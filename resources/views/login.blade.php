<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Login</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bona+Nova:ital,wght@0,400;0,700;1,400&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/myStyle.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}" type="text/css">
    <script src="{{ asset('js/swal.js') }}"></script>

    <!-- Styles -->
        <style>
            .captcha
            { font: italic bold 16px "Comic Sans MS", cursive, sans-serif;
                color:#a0a0a0;background-color:#c0c0c0;
                width:100px;border-radius: 5px;
                text-align:center;
                text-decoration:line-through;
            }
            .errmsg
            {color:#ff0000;}
        </style>

</head>


<body>
@if($errors->any())
    <script>
        swal("Login Gagal !", {
            icon: "warning",
            buttons: false,
            timer: 1000
        })
    </script>
@endif
	<div class="container">
		<div class="row">
			<div class="col-sm-12 col-md-12 col-lg-12">
				<div class="card login-content shadow-lg border-0">
					<div class="card-body">
						<div class="text-center">
							<img class="logo" src="https://cdn3.iconfinder.com/data/icons/galaxy-open-line-gradient-i/200/account-256.png">
						</div>
					<h3 class="text-logo">Login</h3>
					<br>
					<form class="text-center" method="post" onsubmit="return save()">
                        @csrf
						<input class="form-control border-0" type="email" name="email" placeholder="Type Your Email">
						<br>
						<input class="form-control border-0" type="password" name="password" placeholder="Type Your Password">
						<br>
                        <div id="captcha">
                            <span class='captcha' id="txtCaptcha"> </span><a onclick='createCaptcha()' class='mx-3' style="cursor: pointer" href='#'>recaptcha</a>
                        </div>
                        <input type="text" name="recaptcha" id="recaptcha" placeholder="Type the captcha" class="form-control"/></td>
                        <span id="errCaptcha" class="errmsg"></span>
                        <br>
						<button class="btn btn-primary btn-sm border-0" type="submit" name="submit">Login</button>
						<span class="d-block mt-2">New to HI UDB? <a class="ms-2 link" href="/register-page">Create an account.</a></span>
					</form>
					</div>

				</div>
			</div>
		</div>
	</div>

    <script src="{{ asset('bootstrap/js/jquery.js') }}"></script>
    <script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/myStyle.js') }}"></script>
<script>

    var captcha = [];

    $(document).ready(function () {
        createCaptcha()
    })
    function createCaptcha(){
        for(i=0; i<6 ; i++){
            if(i %2 ==0){
                captcha[i] = String.fromCharCode(Math.floor((Math.random()*26)+65));
                // captcha[i] = Math.floor((Math.random()*26)+65);
            }else{
                captcha[i] = Math.floor((Math.random()*10));
            }
        }
        console.log(captcha)
        var thecaptcha=captcha.join("");
        var elm = document.getElementById('captcha');
        $('#txtCaptcha').html(thecaptcha)
    }

    function save() {
        var recaptcha= document.getElementById("recaptcha").value;;
        var validRecaptcha=0;
        for(var j=0; j<6; j++){
            if(recaptcha.charAt(j)!= captcha[j]){
                validRecaptcha++;
            }
        }
        if (recaptcha === ""){
            document.getElementById('errCaptcha').innerHTML = 'Re-Captcha must be filled';
            return false;
        } else if (validRecaptcha>0 || recaptcha.length>6){
            document.getElementById('errCaptcha').innerHTML = 'Sorry, Wrong Re-Captcha';
            createCaptcha()
            return false;
        } else {
            document.getElementById('errCaptcha').innerHTML = '';
        }

    }
</script>

</body>



</html>

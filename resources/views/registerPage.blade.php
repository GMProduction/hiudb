<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Peminjaman Alat</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bona+Nova:ital,wght@0,400;0,700;1,400&display=swap"
          rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/myStyle.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/register.css') }}" type="text/css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <!-- Styles -->
    <script src="{{ asset('js/swal.js') }}"></script>

</head>


<body>

<style>
    .select2-selection__rendered {
        line-height: 36px !important;
    }

    .select2-container .select2-selection--single {
        height: auto !important;
    }

    .select2-selection__arrow {
        height: 36px !important;
    }
</style>

<div class="container">
    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12">
            <div class="card login-content shadow-lg border-0">
                <div class="card-body">

                    <h3 class="text-logo">Register</h3>
                    <br>
                    <form id="formRegister" method="post" onsubmit="return register()" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-2">
                                    <label for="name" class="form-label t">Name</label>
                                    <input type="text" class="form-control" id="name" name="name">
                                </div>
                                <div class="mb-2 text-left">
                                    <label for="email" class="form-label t">Email</label>
                                    <input type="email" class="form-control" id="email" name="email">
                                </div>
                                <div class="mb-2">
                                    <label for="password" class="form-label t">Password</label>
                                    <input type="password" class="form-control" id="password" name="password">
                                </div>
                                <div class="mb-2">
                                    <label for="password_confirmation" class="form-label t">Password</label>
                                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
                                </div>
                                <div class="mb-2">
                                    <label for="dob" class="form-label">Date Of Birth</label>
                                    <input type="date" class="form-control" id="dob" name="dob">
                                </div>
                                <div class="mb-2 text-left">
                                    <label for="phone" class="form-label">Phone</label>
                                    <input type="text" class="form-control" id="phone" name="phone">
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="mb-2 text-left">
                                    <label for="country" class="form-label t">Country</label>
                                    <select id="country" name="country" class="w-100" style="height: 100px"></select>
                                </div>

                                <div class="mb-2 text-left">
                                    <label for="institute" class="form-label t">Institude</label>
                                    <input type="text" class="form-control" id="institute" name="institute">
                                </div>

                                <label class="mb-2">Gender</label>
                                <div class="d-flex">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="gender"
                                               id="gender1" checked value="Pria">
                                        <label class="form-check-label" for="flexRadioDefault1">
                                            Man
                                        </label>
                                    </div>
                                    <div class="form-check ms-3">
                                        <input class="form-check-input" type="radio" name="gender"
                                               id="gender2" value="Wanita">
                                        <label class="form-check-label" for="flexRadioDefault2">
                                            Woman
                                        </label>
                                    </div>
                                </div>

                                <div class="mt-3 mb-2">
                                    <label for="passport" class="form-label">Passport Number</label>
                                    <input  type="text" class="form-control" id="passport" name="passport">
                                </div>
                                <div class="mt-3 mb-2">
                                    <label for="passport" class="form-label">Image Passport</label>
                                    <input class="form-control" type="file" id="url_passport" name="url_passport">
                                </div>


                                <div class="mb-2 text-left">
                                    <label for="address" class="form-label">Address</label>
                                    <textarea type="text" class="form-control" id="address" name="address"></textarea>
                                </div>

                                <div class="text-center mt-5">
                                    <button class="btn btn-primary btn-sm border-0 ms-auto" type="submit"
                                            name="submit">Register
                                    </button>
                                    <span class="d-block mt-2">Have an account ? <a class="ms-2 link"
                                                                                    href="/register">Sign In.</a></span>
                                </div>

                            </div>
                        </div>


                    </form>
                </div>

            </div>

            <div style="height: 50px"></div>

        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script src="{{ asset('bootstrap/js/jquery.js') }}"></script>
<script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('js/myStyle.js') }}"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $(function () {
        $("#datepicker").datepicker();
        getCountry();
        $("#country").select2();
    });

    function getCountry() {
        var select = $("#country");
        select.empty();
        $.get('https://restcountries.eu/rest/v2/all?fields=name', function (data) {
            $.each(data, function (key, value) {
                select.append('<option value="' + value['name'] + '">' + value['name'] + '</option>');
            })
        })
    }

    function register() {
        var form_data = new FormData($('#formRegister')[0]);
        swal({
            title: "Register",
            text: "Apa kamu yakin ingin data ",
            icon: "info",
            buttons: true,
            primariMode: true,
        })
            .then( (res) => {
                if (res) {

                    $.ajax({
                        type: "POST",
                        // url: '/register-',
                        data: form_data,
                        async: true,
                        processData: false,
                        contentType: false,
                        headers: {
                            'Accept': "application/json"
                        },
                        success: function (data, textStatus, xhr) {
                            if (xhr.status === 200) {
                                swal("Berhasil mendaftar!", {
                                    icon: "success",
                                }).then((dat) => {
                                    // window.location.reload();
                                });
                            } else {
                                swal(data['msg'])
                            }
                            console.log()
                        },
                        complete: function (xhr, textStatus) {
                            console.log(xhr.status);
                            console.log(textStatus);
                        },
                        error: function (error, xhr, textStatus) {
                            console.log("LOG ERROR", error.responseJSON.errors);
                            console.log("LOG ERROR", error.responseJSON.errors[Object.keys(error.responseJSON.errors)[0]][0]);
                            console.log(xhr.status);
                            console.log(textStatus);
                            swal(error.responseJSON.errors[Object.keys(error.responseJSON.errors)[0]][0])
                        }
                    })
                }
            });

        return false;
    }
</script>
</body>


</html>

@extends('user.base')
@section('title')
    Profil
@endsection
@section('content')

    {{--    <style>--}}
    {{--        .select2-selection__rendered {--}}
    {{--            line-height: 36px !important;--}}
    {{--        }--}}

    {{--        .select2-container .select2-selection--single {--}}
    {{--            height: auto !important;--}}
    {{--        }--}}

    {{--        .select2-selection__arrow {--}}
    {{--            height: 36px !important;--}}
    {{--        }--}}
    {{--    </style>--}}
    <section class="m-2">

        <div class="table-container">

            <h5 class="mb-3">Profil</h5>
            <hr>

            <div class="row">
                <div class="col-6">

                    <div class="mb-3">
                        <label class="form-label">Nama</label>
                        <p class="fw-bold">{{$user->getMember->name}}</p>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Negara</label>
                        <p class="fw-bold">{{$user->getMember->country}}</p>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Institusi</label>
                        <p class="fw-bold">{{$user->getMember->institute}}</p>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <p class="fw-bold">{{$user->email}}</p>
                    </div>
                </div>
                <div class="col-6">
                    <div class="mb-3">
                        <label class="form-label">Alamat</label>
                        <p class="fw-bold">{{$user->getMember->address}}</p>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Tanggal Lahir</label>
                        <p class="fw-bold">{{date('d F Y', strtotime($user->getMember->dob))}}</p>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Pasport</label>
                        <p class="fw-bold">{{$user->getMember->passport}}</p>
                        <a class="d-block" style="cursor: pointer" target="_blank"
                           href="{{$user->getMember->url_passport ?? ''}}">
                            <img src="{{$user->getMember->url_passport ?? ''}}"
                                 style="height: 50px; width: 100px; object-fit: cover"/>

                        </a>
                    </div>

                    <a type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#edit">Edit Profile</a>
                    <a type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#editAcc">Edit Acount</a>
                </div>


            </div>

            <!-- Modal detail participant-->
            <div class="modal  fade" id="edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Detail profile</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form id="formProfile" method="post" enctype="multipart/form-data" onsubmit="return editProfile()">
                                @csrf
                                <div class="box-border mt-4">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-2">
                                                <label for="namaeditbarang" class="form-label t">Name</label>
                                                <input type="text" class="form-control" id="name" name="name" value="{{$user->getMember->name}}">
                                            </div>
                                            <div class="mb-2 text-left">
                                                <label for="namaeditbarang" class="form-label t">Country</label>
                                                <select id="country" name="country" class="w-100" style="width: 100%"></select>
                                            </div>
                                            <div class="mb-2 text-left">
                                                <label for="namaeditbarang" class="form-label t">Institude</label>
                                                <input type="text" class="form-control" id="institute" name="institute" value="{{$user->getMember->institute}}">
                                            </div>
                                            <div class="mb-2 text-left">
                                                <label for="namaeditbarang" class="form-label t">Email</label>
                                                <input type="email" class="form-control" id="email" name="email" value="{{$user->email}}">
                                            </div>

                                            <div class="mb-2">
                                                <label for="ttlsiswa" class="form-label">Date Of Birth</label>
                                                <input type="date" class="form-control" id="dob" name="dob" value="{{$user->getMember->dob}}">
                                            </div>
                                        </div>

                                        <div class="col-lg-6">

                                            <label class="mb-2">Gender</label>
                                            <div class="d-flex" style="padding: 0 !important">
                                                <div class="form-check me-3">
                                                    <input class="form-check-input" type="radio" name="gender"
                                                           id="gender1" style="padding: 0 !important" value="Pria" {{$user->getMember->gender == 'Pria' ? 'checked' : ''}}>
                                                    <label class="form-check-label" for="gender1">
                                                        Male
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="gender"
                                                           id="gender2" style="padding: 0 !important" value="Wanita" {{$user->getMember->gender == 'Wanita' ? 'checked' : ''}}>
                                                    <label class="form-check-label" for="gender2">
                                                        Female
                                                    </label>
                                                </div>
                                            </div>

                                            <div class="mt-3 mb-2">
                                                <label for="passport" class="form-label">Passport Number</label>
                                                <input type="text" class="form-control" id="passport" name="passport" value="{{$user->getMember->passport}}">
                                            </div>
                                            <div class="mt-3 mb-2">
                                                <label for="passport" class="form-label">Image Passport</label>
                                                <input class="form-control" type="file" id="url_passport" name="url_passport">
                                                <a class="d-block mt-2" style="cursor: pointer" target="_blank"
                                                   href="{{$user->getMember->url_passport ?? ''}}">
                                                    <img src="{{$user->getMember->url_passport ?? ''}}"
                                                         style="height: 50px; width: 100px; object-fit: cover"/>

                                                </a>
                                            </div>

                                            <div class="mb-2 text-left">
                                                <label for="phone" class="form-label">Phone</label>
                                                <input type="text" class="form-control" id="phone" name="phone" value="{{$user->getMember->phone}}">
                                            </div>
                                            <div class="mb-2 text-left">
                                                <label for="address" class="form-label">Address</label>
                                                <textarea type="text" class="form-control" id="address" name="address">{{$user->getMember->address}}</textarea>
                                            </div>

                                            <div class="text-center mt-5">
                                                <button class="btn btn-primary btn-sm border-0 " type="submit"
                                                        name="submit">Save
                                                </button>

                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>

            <div class="modal  fade" id="editAcc" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Detail Account</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form id="formAccount" onsubmit="return editAccount()">
                                @csrf
                                <div class="box-border mt-4">
                                    <div class="row">
                                        <div class="col">
                                            <div class="mb-2">
                                                <label for="email" class="form-label t">Email</label>
                                                <input type="email" class="form-control" id="email" name="email" value="{{$user->email}}">
                                            </div>
                                            <div class="mb-2">
                                                <label for="password" class="form-label t">Password</label>
                                                <input type="password" class="form-control" id="password" name="password" value="********">
                                            </div>
                                            <div class="mb-2">
                                                <label for="password_confirmation" class="form-label t">Password Confirmation</label>
                                                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" value="********">
                                            </div>

                                            <div class="text-center mt-5">
                                                <button class="btn btn-primary btn-sm border-0 " type="submit"
                                                        name="submit">Edit
                                                </button>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </section>


@endsection

@section('script')

    <script>
        $(document).ready(function () {
            getCountry()

            // $("#country").select2();
        })

        function getCountry() {
            var select = $("#country");
            select.empty();
            $.get('https://restcountries.eu/rest/v2/all?fields=name', function (data) {
                $.each(data, function (key, value) {
                    if (value['name'] === '{{$user->getMember->country}}') {
                        select.append('<option value="' + value['name'] + '" selected>' + value['name'] + '</option>');
                    } else {
                        select.append('<option value="' + value['name'] + '">' + value['name'] + '</option>');
                    }
                })
            })
        }

        function editAccount() {
            var form_data = new FormData($('#formAccount')[0]);

            swal({
                title: "Edit Account",
                text: "Are you sure ?",
                icon: "info",
                buttons: true,
                primariMode: true,
            })
                .then((res) => {
                    if (res) {
                        $.ajax({
                            type: "POST",
                            url: '/user/profile/account',
                            data: form_data,
                            async: true,
                            processData: false,
                            contentType: false,
                            headers: {
                                'Accept': "application/json"
                            },
                            success: function (data, textStatus, xhr) {
                                console.log(data);

                                if (xhr.status === 200) {
                                    swal("Profile Updated ", {
                                        icon: "success",
                                    }).then((dat) => {
                                        window.location.reload();
                                    });
                                } else {
                                    swal(data['msg'])
                                }
                                console.log(data);
                            },
                            complete: function (xhr, textStatus) {
                                console.log(xhr.status);
                                console.log(textStatus);
                            },
                            error: function (error, xhr, textStatus) {
                                // console.log("LOG ERROR", error.responseJSON.errors);
                                // console.log("LOG ERROR", error.responseJSON.errors[Object.keys(error.responseJSON.errors)[0]][0]);
                                console.log(xhr.status);
                                console.log(textStatus);
                                console.log(error.responseJSON);
                                swal(error.responseJSON.errors[Object.keys(error.responseJSON.errors)[0]][0])
                            }
                        })
                    }
                });
            return false
        }

        function editProfile() {
            var form_data = new FormData($('#formProfile')[0]);

            swal({
                title: "Edit Profile",
                text: "Are you sure ?",
                icon: "info",
                buttons: true,
                primariMode: true,
            })
                .then((res) => {
                    if (res) {
                        $.ajax({
                            type: "POST",
                            data: form_data,
                            async: true,
                            processData: false,
                            contentType: false,
                            headers: {
                                'Accept': "application/json"
                            },
                            success: function (data, textStatus, xhr) {
                                console.log(data);

                                if (xhr.status === 200) {
                                    swal("Profile Updated ", {
                                        icon: "success",
                                    }).then((dat) => {
                                        window.location.reload();
                                    });
                                } else {
                                    swal(data['payload']['msg'])
                                }
                                console.log(data);
                            },
                            complete: function (xhr, textStatus) {
                                console.log(xhr.status);
                                console.log(textStatus);
                            },
                            error: function (error, xhr, textStatus) {
                                // console.log("LOG ERROR", error.responseJSON.errors);
                                // console.log("LOG ERROR", error.responseJSON.errors[Object.keys(error.responseJSON.errors)[0]][0]);
                                console.log(xhr.status);
                                console.log(textStatus);
                                swal(error.responseJSON.errors[Object.keys(error.responseJSON.errors)[0]][0])
                            }
                        })
                    }
                });
            return false
        }
    </script>

@endsection

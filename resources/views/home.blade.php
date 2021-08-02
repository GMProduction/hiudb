@extends('base')

@section('moreCss')
@endsection

@section('content')

    <section class="container">

        <div style="height: 130px"></div>
        <div class="row" id="nowEvent">
            <div id="" class="col-lg-5 shine" style="height: 400px">
            </div>

            <div class="col-lg-7">
                <p class="title-eventnow ms-2 shine" style="width: 100%; height: 50px" id=""></p>
                <p class="date-eventnow ms-2 shine" style="width: 100%; height: 20px" id=""></p>
                <p class="description-eventnow ms-2 mb-0 shine" style="width: 100%; height: 180px"></p>
                <div class="shine ms-2 my-3" style="height: 10px; width: 250px"></div>
                <br>
                <div style="height: 50px; width: 180px" class="shine ms-2"></div>
            </div>
        </div>

        <div style="height: 50px"></div>
        <div>
            <h4 class="mb-4">Incoming Event</h4>

            <div class="row" id="incomingEvent">
                <div class="col-lg-3">
                    <div class="cardku">
                        <div class="shine mb-0" style="height: 150px; width: 100%"></div>
                        <div class="content">
                            <p class="title mb-0 shine" style="height: 25px; width: 100%"></p>
                            <p class="date shine" style="height: 10px; width: 100%"></p>
                            <p class="description mb-0 shine" style="height: 55px; width: 100%"></p>

                        </div>
                    </div>
                </div>

                <div class="col-lg-3">
                    <div class="cardku">
                        <div class="shine mb-0" style="height: 150px; width: 100%"></div>
                        <div class="content">
                            <p class="title mb-0 shine" style="height: 25px; width: 100%"></p>
                            <p class="date shine" style="height: 10px; width: 100%"></p>
                            <p class="description mb-0 shine" style="height: 55px; width: 100%"></p>

                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="cardku">
                        <div class="shine mb-0" style="height: 150px; width: 100%"></div>
                        <div class="content">
                            <p class="title mb-0 shine" style="height: 25px; width: 100%"></p>
                            <p class="date shine" style="height: 10px; width: 100%"></p>
                            <p class="description mb-0 shine" style="height: 55px; width: 100%"></p>

                        </div>
                    </div>
                </div>

                <div class="col-lg-3">
                    <div class="cardku">
                        <div class="shine mb-0" style="height: 150px; width: 100%"></div>
                        <div class="content">
                            <p class="title mb-0 shine" style="height: 25px; width: 100%"></p>
                            <p class="date shine" style="height: 10px; width: 100%"></p>
                            <p class="description mb-0 shine" style="height: 55px; width: 100%"></p>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div style="height: 50px"></div>
        <div>
            <h4 class="mb-4">Past Event</h4>

            <div class="row" id="pastEvent">
                <div class="col-lg-3">
                    <div class="cardku">
                        <div class="shine mb-0" style="height: 150px; width: 100%"></div>
                        <div class="content">
                            <p class="title mb-0 shine" style="height: 25px; width: 100%"></p>
                            <p class="date shine" style="height: 10px; width: 100%"></p>
                            <p class="description mb-0 shine" style="height: 55px; width: 100%"></p>

                        </div>
                    </div>
                </div>

                <div class="col-lg-3">
                    <div class="cardku">
                        <div class="shine mb-0" style="height: 150px; width: 100%"></div>
                        <div class="content">
                            <p class="title mb-0 shine" style="height: 25px; width: 100%"></p>
                            <p class="date shine" style="height: 10px; width: 100%"></p>
                            <p class="description mb-0 shine" style="height: 55px; width: 100%"></p>

                        </div>
                    </div>
                </div>

                <div class="col-lg-3">
                    <div class="cardku">
                        <div class="shine mb-0" style="height: 150px; width: 100%"></div>
                        <div class="content">
                            <p class="title mb-0 shine" style="height: 25px; width: 100%"></p>
                            <p class="date shine" style="height: 10px; width: 100%"></p>
                            <p class="description mb-0 shine" style="height: 55px; width: 100%"></p>

                        </div>
                    </div>
                </div>

                <div class="col-lg-3">
                    <div class="cardku">
                        <div class="shine mb-0" style="height: 150px; width: 100%"></div>
                        <div class="content">
                            <p class="title mb-0 shine" style="height: 25px; width: 100%"></p>
                            <p class="date shine" style="height: 10px; width: 100%"></p>
                            <p class="description mb-0 shine" style="height: 55px; width: 100%"></p>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Tambah-->
        <div class="modal fade" id="register" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Form Register</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="form-register-event" onsubmit="return registerEvent()">
                            @csrf
                            <input id="id" name="id_event" hidden>
                            <div class="mb-3">
                                <label for="formFile" class="form-label">Payment Slip</label>
                                <input class="form-control" type="file" accept="image/*" name="payment" id="formFile" required>
                            </div>


                            <div class="mb-4"></div>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </section>



@endsection

@section('script')
    <script>
        $(document).ready(function () {
            getEventNow();
            incomingEvent();
            pastEvent();
        })

        $(document).on('click', '#register-now', function () {
            @if(auth()->user())
            $('#register').modal('show');
            @else
            $(this).attr('href', '/login');
            @endif
        });

        async function getEventNow() {
            $.get('/event-now', async function (data) {
                var row = $('#nowEvent');
                row.html('');
                if (data) {
                    $('#form-register-event #id').val(data['id']);
                    row.append('<img id="" class="col-lg-5" src="' + data['url_cover'] + '" height="400px">\n' +
                        '            <div class="col-lg-7" style="height: 400px">\n' +
                        '                <p class="title-eventnow ms-2 ">' + data['event_name'] + '</p>\n' +
                        '                <p class="date-eventnow ms-2 ">' + moment(data['start_date']).format('DD MMMM YYYY') + ' - ' + moment(data['end_date']).format('DD MMMM YYYY') + '</p>\n' +
                        '                <div class="description-eventnow ms-2" style="height: 170px">' + data['description'] + '</div>\n ' +
                        '                <label class="ms-2 d-block my-3 text-black-50">Remaining : ' + data['remaining'] + ' slot</label> \n' +
                        '                <a href="#!" id="register-now" class="btn btn-primary btn-lg  ms-2 mt-auto" >Register\n' +
                        '                    Now</a>\n' +
                        '            </div>')
                } else {
                    row.append('<div class="col d-flex justify-content-center align-items-center" style="height: 400px">No Ongoing Event</div>')
                }
            })
        }

        function incomingEvent() {
            $.get('/incoming-event', async function (data) {
                var row = $('#incomingEvent');
                row.html('');
                if (data.length > 0) {
                    $.each(data, await function (key, value) {
                        row.append('<div class="col-lg-3">\n' +
                            '                    <div class="cardku">\n' +
                            '                        <img src="' + value['url_cover'] + '" >\n' +
                            '                        <div class="content">\n' +
                            '                            <p class="title mb-0 " style="height: 25px; width: 100%">' + value['event_name'] + '</p>\n' +
                            '                            <p class="date " style="height: 10px; width: 100%">' + moment(value['start_date']).format('DD MMMM YYYY') + ' - ' + moment(value['end_date']).format('DD MMMM YYYY') + '</p>\n' +
                            '                            <div class="description mb-0 " style="height: 55px; width: 100%" >' + value['description'] + '</div>\n' +
                            '\n' +
                            '                        </div>\n' +
                            '                    </div>\n' +
                            '                </div>')
                    })
                } else {
                    row.append('<div class="col text-center">No Incoming Event</div>')
                }
            })
        }

        function pastEvent() {
            $.get('/past-event', async function (data) {
                var row = $('#pastEvent');
                row.html('');
                if (data.length > 0) {

                    $.each(data, await function (key, value) {
                        row.append('<div class="col-lg-3">\n' +
                            '                    <div class="cardku">\n' +
                            '                        <img src="' + value['url_cover'] + '" >\n' +
                            '                        <div class="content">\n' +
                            '                            <p class="title mb-0 " style="height: 25px; width: 100%">' + value['event_name'] + '</p>\n' +
                            '                            <p class="date " style="height: 10px; width: 100%">' + moment(value['start_date']).format('DD MMMM YYYY') + ' - ' + moment(value['end_date']).format('DD MMMM YYYY') + '</p>\n' +
                            '                            <div class="description mb-0 " style="height: 55px; width: 100%" >' + value['description'] + '</div>\n' +
                            '\n' +
                            '                        </div>\n' +
                            '                    </div>\n' +
                            '                </div>')
                    })
                } else {
                    row.append('<div class="col text-center">No Past Event</div>')
                }
            })
        }

        function registerEvent() {
            var form_data = new FormData($('#form-register-event')[0]);
            swal({
                title: "Register Event",
                text: "Are you sure to register event ",
                icon: "info",
                buttons: true,
                primariMode: true,
            })
                .then( (res) => {
                    if (res) {

                        $.ajax({
                            type: "POST",
                            url: '/register-event',
                            data: form_data,
                            async: true,
                            processData: false,
                            contentType: false,
                            headers: {
                                'Accept': "application/json"
                            },
                            success: function (data, textStatus, xhr) {
                                if (xhr.status === 200) {
                                    swal("Berhasil mendaftar !", {
                                        icon: "success",
                                    }).then((dat) => {
                                        window.location.reload();
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

@endsection

@extends('admin.base')
@section('title')
    Dashboard
@endsection
@section('content')

    <section class="m-2">


        <div class="table-container">

            <h5 class="mb-3">Peserta yang ingin mengikuti event</h5>

            <table class="table table-striped table-bordered ">
                <thead>
                <th>
                    #
                </th>
                <th>
                    Nama
                </th>
                <th>
                    Negara
                </th>
                <th>
                    Nama Event
                </th>

                <th>
                    Institusi
                </th>

                <th>
                    Email
                </th>

                <th>
                    Phone
                </th>
                <th>
                    Status
                </th>
                <th>
                    Action
                </th>

                </thead>
                @forelse($event->getParticipant as $key => $e)
                    <tr>
                        <td>
                            {{$key + 1}}
                        </td>
                        <td>
                            {{$e->getMember->name}}
                        </td>
                        <td>
                            {{$e->getMember->country}}

                        </td>
                        <td>
                            {{$event->event_name}}

                        </td>
                        <td>
                            {{$e->getMember->institute}}
                        </td>
                        <td>
                            {{$e->getMember->getUser->email}}
                        </td>
                        <td>
                            {{$e->getMember->phone}}
                        </td>
                        <td>
                           {{($e->status == '0' ? 'Menunggu' : ($e->status == '1' ? 'Diterima' : 'Ditolak'))}}
                        </td>
                        <td>
                            <a type="button" class="btn btn-primary btn-sm" data-passport-number="{{$e->getMember->passport}}" data-reason="{{$e->reason_of_reject}}"  data-event-id="{{$event->id}}" data-status="{{$e->status}}" id="detailDataParticipant" data-remaining="{{$event->remaining}}" data-event-name="{{$event->event_name}}"  data-passport="{{$e->getMember->url_passport}}" data-payment="{{$e->url_payment}}"
                            data-country="{{$e->getMember->country}}" data-email="{{$e->getMember->getUser->email}}" data-dob="{{$e->getMember->dob}}" data-address="{{$e->getMember->address}}" data-institute="{{$e->getMember->institute}}" data-name="{{$e->getMember->name}}" data-id="{{$e->id}}">Detail</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="9" class="text-center">Tidak ada data comitee</td>
                    </tr>

                @endforelse

            </table>

        </div>


    </section>


    <!-- Modal Tambah-->
    <div class="modal  fade" id="detail" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Detail Partisipan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>

                        <div class="row">
                            <div class="col-6">
                                <div class="box-border">
                                    <p>Profile Pendaftar</p>
                                    <hr>
                                    <div class="mb-3">
                                        <label class="form-label">Nama</label>
                                        <p class="fw-bold" id="name"></p>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Negara</label>
                                        <p class="fw-bold" id="country"></p>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Institusi</label>
                                        <p class="fw-bold" id="institute"></p>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Email</label>
                                        <p class="fw-bold" id="email"></p>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Alamat</label>
                                        <p class="fw-bold" id="address"></p>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Tanggal Lahir</label>
                                        <p class="fw-bold" id="dob"></p>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Paspor</label>
                                        <p class="fw-bold" id="passport_number"></p>

                                        <a class="d-block" id="passport" style="cursor: pointer" target="_blank"
                                           href="">
                                            <img src=""
                                                 style="height: 50px; width: 100px; object-fit: cover"/>

                                        </a>
                                    </div>
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="mb-3">
                                    <label class="form-label">Nama Event</label>
                                    <p class="fw-bold" id="name_event"></p>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Sisa Kuota</label>
                                    <p class="fw-bold" id="remaining"></p>
                                </div>


                                <div class="mb-3">
                                    <label class="form-label">Bukti Pembayaran</label>
                                    <a class="d-block" id="payment" style="cursor: pointer" target="_blank"
                                       href="">
                                        <img src=""
                                             style="height: 50px; width: 100px; object-fit: cover"/>

                                    </a>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Status</label>
                                    <p class="fw-bold" id="txtStatus"></p>
                                </div>

                                <div class="mb-3" id="ketAlasan">
                                    <label class="form-label">Alasan</label>
                                    <p class="fw-bold" id="txtAlasan"></p>
                                </div>

                                <div class="mb-4"></div>
                                <div id="btnKonfirmasi" class="">
                                    <a type="submit" id="konfirmasi" class="btn btn-primary konfirmasi" data-status="1" >Terima</a>
                                    <a class="btn btn-danger" id="alasanTolak">Tolak</a>
                                </div>

                            </div>
                        </div>

                    </form>
                </div>

            </div>
        </div>
    </div>


    <!-- Modal Tolak-->
    <div class="modal  fade" id="alasanMenolak" tabindex="-1" aria-labelledby="exampleModalLabel2" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel2">Detail </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div class="mb-3">
                        <label for="alassan" class="form-label">Alasan Menolak</label>
                        <textarea class="form-control" id="alassan" rows="3"></textarea>
                    </div>
                    <a type="submit" id="konfirmasi" class="btn btn-primary w-100 konfirmasi" data-status="2" >Kirim</a>


                </div>

            </div>
        </div>
    </div>
@endsection

@section('script')
<script>
    var eventId, participantId;

    $(document).on('click', '#detailDataParticipant', function () {
        var name = $(this).data('name');
        var email = $(this).data('email');
        var country = $(this).data('country');
        var passport = $(this).data('passport');
        var dob = moment($(this).data('dob')).format('DD MMMM YYYY');
        var payment = $(this).data('payment');
        var address = $(this).data('address');
        var institute = $(this).data('institute');
        var eventName = $(this).data('event-name');
        var remaining = $(this).data('remaining');
        var status = $(this).data('status');
        var reason = $(this).data('reason');
        var passportNumber = $(this).data('passport-number');
        var textSt = status === 2 ? 'Ditolak' : status === 1 ? 'Diterima' : 'Menunggu';
        eventId = $(this).data('event-id');
        participantId = $(this).data('id');
        $('#btnKonfirmasi').addClass('d-none');
        $('#detail #ketAlasan').removeClass('d-none');
// console.log(status)
        // $('#alasanMenolak #konfirmasi').attr('data-event-id', $(this).data('event-id')).attr('data-participant-id', $(this).data('id'));
        // $('#tolak').attr('data-event-id', $(this).data('event-id')).attr('data-participant-id', $(this).data('id'));
        if (status === 0) {
            $('#btnKonfirmasi').removeClass('d-none');
            $('#detail #ketAlasan').addClass('d-none');

        }
        $('#detail #txtStatus').html(textSt);
        $('#detail #passport_number').html(passportNumber);
        $('#detail #txtAlasan').html(reason);
        $('#detail #name_event').html(eventName);
        $('#detail #remaining').html(remaining);
        $('#detail #name').html(name);
        $('#detail #email').html(email);
        $('#detail #country').html(country);
        $('#detail #dob').html(dob);
        $('#detail #address').html(address);
        $('#detail #institute').html(institute);
        $('#detail #passport').attr('href', passport);
        $('#detail #passport img').attr('src', passport);
        $('#detail #payment').attr('href', payment);
        $('#detail #payment img').attr('src', payment);
        $('#detail').modal('show');
    })

    $(document).on('click','#alasanTolak', function () {
        $('#alasanMenolak #alassan').val('');
        $('#alasanMenolak').modal('show')
    })

    $(document).on('click', '#konfirmasi', function () {

        var status = $(this).data('status');
        var textSt = status === 2 ? 'Ditolak' : 'Diterima';
        var alasan = $('#alassan').val();

        console.log(eventId);
        console.log(participantId);
        console.log(status);
        let dataSend = {
            'status': status,
            '_token': '{{csrf_token()}}',
            'alasan': alasan
        }

        if (status === 2 && alasan === '') {
            swal('Harus mengisi alasan')
            return false
        }

        swal({
            title: "Participant " + textSt,
            text: "Apa kamu yakin ?",
            icon: "info",
            buttons: true,
            primariMode: true,
        })
            .then((res) => {
                if (res) {
                    $.ajax({
                        type: "POST",
                        url: '/admin/event/' + eventId + '/konfirmasi/' + participantId,
                        data: dataSend,
                        headers: {
                            'Accept': "application/json"
                        },
                        success: function (data, textStatus, xhr) {
                            if (xhr.status === 200) {
                                swal("Participant berhasil " + textSt, {
                                    icon: "success",
                                }).then((dat) => {
                                    window.location.reload();
                                });
                            } else {
                                swal(data['payload']['msg'])
                            }
                            console.log()
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
    })
</script>

@endsection

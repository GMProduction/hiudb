@extends('admin.base')
@section('title')
    Dashboard
@endsection
@section('content')
    <style>
        .h400 {
            height: 400px;
        }
    </style>
    <section class="m-2">


        <div class="table-container">

            <div class="d-flex justify-content-between align-items-center mb-3">
                <h5 class="mb-3">Peserta yang ingin mengikuti event</h5>

                <button type="button ms-auto" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                        data-bs-target="#tambahevent">Tambah Event
                </button>

            </div>

            <table class="table table-striped table-bordered ">
                <thead>
                <th>
                    #
                </th>
                <th>
                    Nama Event
                </th>
                <th>
                    Mulai
                </th>
                <th>
                    Selesai
                </th>

                <th>
                    Lokasi
                </th>
                <th>
                    Kuota
                </th>
                <th>
                    Sisa Kuota
                </th>
                <th>
                    Action
                </th>

                </thead>
                @forelse($event as $key => $e)
                    <tr>
                        <td>
                            {{$key + 1}}
                        </td>
                        <td>
                            {{$e->event_name}}
                        </td>
                        <td>
                            {{$e->start_date}}
                        </td>
                        <td>
                            {{$e->end_date}}
                        </td>
                        <td>
                            {{$e->event_location}}
                        </td>
                        <td>
                            {{$e->quota}}
                        </td>
                        <td>
                            {{$e->remaining}}
                        </td>
                        <td>
                            <a type="button" class="btn btn-primary btn-sm" id="detailData" data-id="{{$e->id}}">Detail
                            </a>
                            <button type="button" class="btn btn-success btn-sm" id="editData" data-id="{{$e->id}}">Edit
                            </button>
                            <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#detail">Hapus
                            </button>
                        </td>
                    </tr>
                @empty
                @endforelse

            </table>

        </div>


    </section>


    <!-- Modal detail-->
    <div class="modal  fade" id="detail" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Detail </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>

                        <div class="box-border">
                            <p>Event</p>
                            <hr>

                            <div class="row">

                                <div class="col-4">
                                    <div class="mb-3">
                                        <label class="form-label">Cover</label>
                                        <a class="d-block" id="cover" style="cursor: pointer" target="_blank"
                                           href="https://blue.kumparan.com/image/upload/fl_progressive,fl_lossy,c_fill,q_auto:best,w_640/v1555064738/mpnomhxtbuxt318u4gu1.jpg">
                                            <img src="https://blue.kumparan.com/image/upload/fl_progressive,fl_lossy,c_fill,q_auto:best,w_640/v1555064738/mpnomhxtbuxt318u4gu1.jpg"
                                                 style="height: 150px; width: 200px; object-fit: cover"/>

                                        </a>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Map</label>
                                        <a class="d-block" style="cursor: pointer" target="_blank"
                                           href="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3954.9920584448178!2d110.81791511530605!3d-7.57584207693839!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a1664d786aa4b%3A0xe2291734e194937c!2sJl.%20Gatot%20Subroto%20158-154%2C%20Jayengan%2C%20Kec.%20Serengan%2C%20Kota%20Surakarta%2C%20Jawa%20Tengah%2057152!5e0!3m2!1sen!2sid!4v1627715326856!5m2!1sen!2sid">
                                            <iframe
                                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3954.9920584448178!2d110.81791511530605!3d-7.57584207693839!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a1664d786aa4b%3A0xe2291734e194937c!2sJl.%20Gatot%20Subroto%20158-154%2C%20Jayengan%2C%20Kec.%20Serengan%2C%20Kota%20Surakarta%2C%20Jawa%20Tengah%2057152!5e0!3m2!1sen!2sid!4v1627715326856!5m2!1sen!2sid"
                                                width="200" height="150" style="border:0;" allowfullscreen=""
                                                loading="lazy"></iframe>

                                        </a>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="mb-3">
                                        <label class="form-label">Nama Event</label>
                                        <p class="fw-bold" id="name_event"></p>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Mulai</label>
                                        <p class="fw-bold" id="start_date"></p>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Selesai</label>
                                        <p class="fw-bold" id="end_date"></p>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Lokasi</label>
                                        <p class="fw-bold" id="location"></p>
                                    </div>


                                </div>

                                <div class="col-4">

                                    <div class="mb-3">
                                        <label class="form-label">Mulai Pendaftaran</label>
                                        <p class="fw-bold" id="start_register"></p>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Ahkir Pendaftaran</label>
                                        <p class="fw-bold" id="end_register"></p>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Sisa Kuota</label>
                                        <p class="fw-bold" id="remaining"></p>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="box-border mt-3">
                            <p>Partisipan</p>
                            <hr>

                            <div id="divTabel" style="" class="overflow-auto">
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
                                    <tbody id="tabel_participant">

                                    </tbody>

                                </table>
                            </div>

                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>



    <!-- Modal detail participant-->
    <div class="modal  fade" id="detail-participant" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                        <p class="fw-bold" id="name">Erfin Aditya</p>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Negara</label>
                                        <p class="fw-bold" id="country">Indonesia</p>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Institusi</label>
                                        <p class="fw-bold" id="institute">UDB</p>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Email</label>
                                        <p class="fw-bold" id="email">erfin@gmail.com</p>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Alamat</label>
                                        <p class="fw-bold" id="address">Sukoharjo Kota</p>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Tanggal Lahir</label>
                                        <p class="fw-bold" id="dob">12 Januari 2012</p>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Paspor</label>
                                        <a class="d-block" id="passport" style="cursor: pointer" target="_blank"
                                           href="https://blue.kumparan.com/image/upload/fl_progressive,fl_lossy,c_fill,q_auto:best,w_640/v1555064738/mpnomhxtbuxt318u4gu1.jpg">
                                            <img src="https://blue.kumparan.com/image/upload/fl_progressive,fl_lossy,c_fill,q_auto:best,w_640/v1555064738/mpnomhxtbuxt318u4gu1.jpg"
                                                 style="height: 50px; width: 100px; object-fit: cover"/>

                                        </a>
                                    </div>
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="mb-3">
                                    <label class="form-label">Nama Event</label>
                                    <p class="fw-bold" id="name_event">Dubafest</p>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Sisa Kuota</label>
                                    <p class="fw-bold" id="remaining">512</p>
                                </div>


                                <div class="mb-3">
                                    <label class="form-label">Bukti Pembayaran</label>
                                    <a class="d-block" id="payment" style="cursor: pointer" target="_blank"
                                       href="https://1.bp.blogspot.com/-MOHGve9IHeQ/XHvEjRpgyhI/AAAAAAAAIyQ/06yF5OyDDHQEwAqbc9SnzW7Sq0rx_RMdwCLcBGAs/s1600/IMG_20181120_064248_565.jpg">
                                        <img src="https://1.bp.blogspot.com/-MOHGve9IHeQ/XHvEjRpgyhI/AAAAAAAAIyQ/06yF5OyDDHQEwAqbc9SnzW7Sq0rx_RMdwCLcBGAs/s1600/IMG_20181120_064248_565.jpg"
                                             style="height: 50px; width: 100px; object-fit: cover"/>

                                    </a>
                                </div>

                                <div class="mb-4"></div>
                                <div id="btnKonfirmasi" class="">
                                    <a type="submit" id="konfirmasi" class="btn btn-primary konfirmasi" data-status="1" >Terima</a>
                                    <a class="btn btn-danger" data-bs-toggle="modal" href="#alasanMenolak"
                                       data-bs-target="#alasanMenolak">Tolak</a>
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

    <!-- Modal Tolak-->
    <div class="modal  fade" id="tambahevent" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Event</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>

                        <div class="row">
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="namaEvent" class="form-label">Nama Event</label>
                                    <input type="text" class="form-control" id="namaEvent">
                                </div>

                                <div class="mb-3">
                                    <label for="mulaiEvent" class="form-label">Mulai Event</label>
                                    <input type="text" class="form-control datepicker" id="mulaiEvent">
                                </div>


                                <div class="mb-3">
                                    <label for="akhirEvent" class="form-label">Akhir Event</label>
                                    <input type="text" class="form-control datepicker" id="akhirEvent">
                                </div>

                                <div class="mb-3">
                                    <label for="lokasiEvent" class="form-label">Lokasi</label>
                                    <input type="text" class="form-control" id="lokasiEvent">
                                </div>

                                <div class="mb-3">
                                    <label for="latitudeEvent" class="form-label">Latitude</label>
                                    <input type="text" class="form-control" id="latitudeEvent">
                                </div>

                                <div class="mb-3">
                                    <label for="LongitudeEvent" class="form-label">Longitude</label>
                                    <input type="text" class="form-control" id="LongitudeEvent">
                                </div>

                                <div class="mb-3">
                                    <label for="deskripsiEvent" class="form-label">Deskripsi</label>
                                    <textarea class="form-control" id="deskripsiEvent" rows="3"></textarea>
                                </div>

                            </div>
                            <div class="col-6">


                                <div class="mb-3">
                                    <label for="mulaiPendaftaranEvent" class="form-label">Mulai Pendaftaran</label>
                                    <input type="text" class="form-control datepicker" id="mulaiPendaftaranEvent">
                                </div>


                                <div class="mb-3">
                                    <label for="akhirPendaftaranEvent" class="form-label">Akhir Pendaftaran</label>
                                    <input type="text" class="form-control datepicker" id="ahkirPendaftaranEvent">
                                </div>


                                <div class="mb-3">
                                    <label for="kuotaEvent" class="form-label">Kuota</label>
                                    <input type="text" class="form-control" id="kuotaEvent">
                                </div>

                                <a>Pilih Comitee</a>
                                <select class="form-select" aria-label="Default select example" name="idguru">
                                    <option selected>Pilih Comitee</option>
                                    <option value="1">Erfin</option>
                                    <option value="2">Joko A</option>
                                    <option value="3">Joko B</option>
                                </select>

                                <div class="mb-4"></div>
                                <button type="submit" class="btn btn-primary ms-auto">Simpan</button>
                            </div>
                        </div>


                    </form>
                </div>

            </div>
        </div>
    </div>

@endsection

@section('script')

    <script>
        $(function () {
            $(".datepicker").datepicker();
        });

        $(document).on('click', '#detailData', async function () {
            var id = $(this).data('id');
            getDetailEvent(id);
            $('#detail').modal('show');
        })

        function getDetailEvent(id) {
            $.get('/admin/event/' + id, function (data) {
                $('#detail #name_event').html(data['event_name']);
                $('#detail #start_date').html(data['start_date']);
                $('#detail #end_date').html(data['end_date']);
                $('#detail #location').html(data['event_location']);
                $('#detail #remaining').html(data['remaining']);
                $('#detail #start_register').html(data['start_register_date']);
                $('#detail #end_register').html(data['end_register_date']);
                $('#detail #cover').attr('href', data['url_cover']);
                $('#detail #cover img').attr('src', data['url_cover'])
                var tabel = $('#tabel_participant');
                tabel.empty();
                $('#divTabel').removeClass('h400');

                if (data['get_participant'].length > 0) {
                    $.each(data['get_participant'], function (key, value) {
                        $('#divTabel').addClass('h400');
                        var member = value['get_member'];
                        var status = value['status'] === 0 ? 'Menunggu' : value['status'] === 1 ? 'Diterima' : 'Ditolak';
                        var row = '<tr>' +
                            '<td>' + parseInt(key + 1) + '</td>' +
                            '<td>' + member['name'] + '</td>' +
                            '<td>' + member['country'] + '</td>' +
                            '<td>' + member['institute'] + '</td>' +
                            '<td>' + member['get_user']['email'] + '</td>' +
                            '<td>' + member['phone'] + '</td>' +
                            '<td>' + status + '</td>' +
                            '<td><a type="button" class="btn btn-primary btn-sm" data-event-id="' + id + '" data-status="' + value['status'] + '" id="detailDataParticipant" data-remaining="' + data['remaining'] + '" data-event-name="' + data['event_name'] + '"  data-passport="' + member['url_passport'] + '" data-payment="' + value['url_payment'] + '" ' +
                            'data-country="' + member['country'] + '" data-email="' + member['get_user']['email'] + '" data-dob="' + member['dob'] + '" data-address="' + member['address'] + '" data-institute="' + member['institute'] + '" data-name="' + member['name'] + '" data-id="' + value['id'] + '">Detail</a></td>' +
                            '</tr>';
                        tabel.append(row);

                    })
                } else {
                    var row = '<tr><td colspan="8" class="text-center">Tidak ada pendaftar</td></tr>'
                    tabel.append(row);
                }
            })
        }

       $(document).on('click', '#konfirmasi', function () {
           var eventId = $(this).data('event-id');
           var participantId = $(this).data('participant-id');
           var status = $(this).data('status');
           var textSt = status === 2 ? 'Ditolak' : 'Diterima';
           var alasan = $('#alassan').val();

           console.log(eventId);
           console.log(participantId);
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
                                       getDetailEvent(eventId);
                                       $('#btnKonfirmasi').addClass('d-none');
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

        $(document).on('click', '#detailDataParticipant', function () {
            var name = $(this).data('name');
            var email = $(this).data('email');
            var country = $(this).data('country');
            var passport = $(this).data('passport');
            var dob = $(this).data('dob');
            var payment = $(this).data('payment');
            var address = $(this).data('address');
            var institute = $(this).data('institute');
            var eventName = $(this).data('event-name');
            var remaining = $(this).data('remaining');
            var status = $(this).data('status');
            $('#btnKonfirmasi').addClass('d-none');
            $('.konfirmasi').removeAttr('data-event-id').removeAttr('data-participant-id');
            $('.konfirmasi').attr('data-event-id', $(this).data('event-id')).attr('data-participant-id', $(this).data('id'));
            // $('#alasanMenolak #konfirmasi').attr('data-event-id', $(this).data('event-id')).attr('data-participant-id', $(this).data('id'));
            // $('#tolak').attr('data-event-id', $(this).data('event-id')).attr('data-participant-id', $(this).data('id'));
            if (status === 0) {
                $('#btnKonfirmasi').removeClass('d-none');

            }
            $('#detail-participant #name_event').html(eventName);
            $('#detail-participant #remaining').html(remaining);
            $('#detail-participant #name').html(name);
            $('#detail-participant #email').html(email);
            $('#detail-participant #country').html(country);
            $('#detail-participant #dob').html(dob);
            $('#detail-participant #address').html(address);
            $('#detail-participant #institute').html(institute);
            $('#detail-participant #passport').attr('href', passport);
            $('#detail-participant #passport img').attr('src', passport);
            $('#detail-participant #payment').attr('href', payment);
            $('#detail-participant #payment img').attr('src', payment);
            $('#detail-participant').modal('show');
        })


    </script>
@endsection

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

                <button type="button ms-auto" class="btn btn-primary btn-sm" id="addData">Tambah Event
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
                            {{date('d F Y', strtotime($e->start_date))}}
                        </td>
                        <td>
                            {{date('d F Y', strtotime($e->end_date))}}
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
                    <tr><td colspan="8">Tidak ada data event</td></tr>
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
                                        <a id="targetMap" class="d-block" style="cursor: pointer" target="_blank"
                                           href="">
                                            <iframe
                                                src=""
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

    <!-- Modal Tolak-->
    <div class="modal  fade" id="tambahevent" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Event</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="formTambahEvent" method="post" enctype="multipart/form-data">
                    @csrf
                        <input id="id" name="id" hidden>
                        <div class="row">
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="namaEvent" class="form-label">Nama Event</label>
                                    <input type="text" class="form-control" id="event_name" name="event_name" required>
                                </div>

                                <div class="mb-3">
                                    <label for="mulaiEvent" class="form-label">Mulai Event</label>
                                    <input type="date" class="form-control" id="start_date" name="start_date" required>
                                </div>


                                <div class="mb-3">
                                    <label for="akhirEvent" class="form-label">Akhir Event</label>
                                    <input type="date" class="form-control" id="end_date" name="end_date" required>
                                </div>

                                <div class="mb-3">
                                    <label for="lokasiEvent" class="form-label">Lokasi</label>
                                    <input type="text" class="form-control" id="event_location" name="event_location" required>
                                </div>

                                <div class="mb-3">
                                    <label for="latitudeEvent" class="form-label">Latitude</label>
                                    <input type="text" class="form-control" id="latitude" name="latitude">
                                </div>

                                <div class="mb-3">
                                    <label for="LongitudeEvent" class="form-label">Longitude</label>
                                    <input type="text" class="form-control" id="longitude" name="longitude">
                                </div>

                                <div class="mb-3">
                                    <label for="deskripsiEvent" class="form-label">Deskripsi</label>
                                    <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
                                </div>

                            </div>
                            <div class="col-6">


                                <div class="mb-3">
                                    <label for="mulaiPendaftaranEvent" class="form-label">Mulai Pendaftaran</label>
                                    <input type="date" class="form-control" id="start_register_date" name="start_register_date" required>
                                </div>


                                <div class="mb-3">
                                    <label for="akhirPendaftaranEvent" class="form-label">Akhir Pendaftaran</label>
                                    <input type="date" class="form-control" id="end_register_date" name="end_register_date" required>
                                </div>


                                <div class="mb-3">
                                    <label for="kuotaEvent" class="form-label">Kuota</label>
                                    <input type="text" class="form-control" id="quota" name="quota" required>
                                </div>
                                <div class="mb-3">
                                    <label for="kuotaEvent" class="form-label">Cover</label>
                                    <input type="file" class="form-control" accept="image/*" id="url_cover" name="url_cover" required>
                                    <a class="d-block mt-2" id="imgcover" style="cursor: pointer" target="_blank"
                                       href="">
                                        <img src=""
                                             style="height: 150px; width: 200px; object-fit: cover"/>

                                    </a>
                                </div>

                                <a>Pilih Comitee</a>
                                <select class="form-select" aria-label="Default select example" name="id_comitee" id="id_comitee" required>
                                    <option selected>Pilih Comitee</option>
                                    @foreach($comitee as $com)
                                        <option value="{{$com->id}}">{{$com->name}}</option>
                                    @endforeach
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

        var eventId, participantId;


        $(document).on('click', '#detailData', async function () {
            var id = $(this).data('id');
            getDetailEvent(id);
            $('#detail').modal('show');
        })

        $(document).on('click', '#addData', async function () {
            $('#formTambahEvent #event_name').val('');
            $('#formTambahEvent #start_date').val('');
            $('#formTambahEvent #end_date').val('');
            $('#formTambahEvent #event_location').val('');
            $('#formTambahEvent #latitude').val('');
            $('#formTambahEvent #longitude').val('');
            $('#formTambahEvent #start_register_date').val('');
            $('#formTambahEvent #end_register_date').val('');
            $('#formTambahEvent #quota').val('');
            $('#formTambahEvent textarea').val('');
            $('#formTambahEvent select').val('');
            $('#formTambahEvent #imgcover').addClass('d-none');
            $('#formTambahEvent #url_cover').attr('required','');

            $('#tambahevent').modal('show');
        })
        $(document).on('click', '#editData', async function () {
            var id = $(this).data('id');
            $('#formTambahEvent #id').val(id);
            $('#formTambahEvent #url_cover').removeAttr('required');

            $.get('/admin/event/' + id, function (data) {
                $('#formTambahEvent #event_name').val(data['event_name']);
                $('#formTambahEvent #start_date').val(data['start_date']);
                $('#formTambahEvent #end_date').val(data['end_date']);
                $('#formTambahEvent #event_location').val(data['event_location']);
                $('#formTambahEvent #latitude').val(data['latitude']);
                $('#formTambahEvent #longitude').val(data['longitude']);
                $('#formTambahEvent #start_register_date').val(data['start_register_date']);
                $('#formTambahEvent #end_register_date').val(data['end_register_date']);
                $('#formTambahEvent #quota').val(data['quota']);
                $('#formTambahEvent textarea').val(data['description']);
                $('#formTambahEvent select').val(data['id_comitee']);
                if(data['url_cover']){
                    $('#formTambahEvent #imgcover').removeClass('d-none').attr('href',data['url_cover']);
                    $('#formTambahEvent #imgcover img').attr('src',data['url_cover']);
                }
            })
            $('#tambahevent').modal('show');
        })

        $(document).on('click','#alasanTolak', function () {
            $('#alasanMenolak #alassan').val('');
            $('#alasanMenolak').modal('show')
        })
        function getDetailEvent(id) {
            $.get('/admin/event/' + id, function (data) {
                $('#detail #name_event').html(data['event_name']);
                $('#detail #start_date').html(moment(data['start_date']).format('DD MMMM YYYY'));
                $('#detail #end_date').html(moment(data['end_date']).format('DD MMMM YYYY'));
                $('#detail #location').html(data['event_location']);
                $('#detail #remaining').html(data['remaining']);
                $('#detail #start_register').html(moment(data['start_register_date']).format('DD MMMM YYYY'));
                $('#detail #end_register').html(moment(data['end_register_date']).format('DD MMMM YYYY'));
                $('#detail #cover').attr('href', data['url_cover']);
                $('#detail #cover img').attr('src', data['url_cover'])
                var tabel = $('#tabel_participant');
                tabel.empty();
                $('#divTabel').removeClass('h400');
                $('#targetMap').attr('href','https://maps.google.com/maps?q='+data['latitude']+','+data['longitude']+'&z=15&output=embed')
                $('#targetMap iframe').attr('src','https://maps.google.com/maps?q='+data['latitude']+','+data['longitude']+'&z=15&output=embed')
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
                            '<td><a type="button" class="btn btn-primary btn-sm" data-passport-number="'+member['passport']+'" data-reason="'+value['reason_of_reject']+'"  data-event-id="' + id + '" data-status="' + value['status'] + '" id="detailDataParticipant" data-remaining="' + data['remaining'] + '" data-event-name="' + data['event_name'] + '"  data-passport="' + member['url_passport'] + '" data-payment="' + value['url_payment'] + '" ' +
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
                                       getDetailEvent(eventId);
                                       $('#btnKonfirmasi').addClass('d-none');
                                       $('#alasanMenolak').modal('hide')
                                       $('#detail-participant #ketAlasan').addClass('d-none');

                                       if (status === 2){
                                           $('#detail-participant #ketAlasan').removeClass('d-none');
                                           $('#detail-participant #txtAlasan').html(alasan)
                                       }
                                       $('#detail-participant #txtStatus').html(textSt)
                                       $('#alassan').val('');
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
            $('#detail-participant #ketAlasan').removeClass('d-none');

            // $('#alasanMenolak #konfirmasi').attr('data-event-id', $(this).data('event-id')).attr('data-participant-id', $(this).data('id'));
            // $('#tolak').attr('data-event-id', $(this).data('event-id')).attr('data-participant-id', $(this).data('id'));
            if (status === 0) {
                $('#btnKonfirmasi').removeClass('d-none');
                $('#detail-participant #ketAlasan').addClass('d-none');

            }
            $('#detail-participant #txtStatus').html(textSt);
            $('#detail-participant #passport_number').html(passportNumber);
            $('#detail-participant #txtAlasan').html(reason);
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

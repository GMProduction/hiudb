@extends('comitee.base')
@section('title')
    Dashboard
@endsection
@section('content')

@section('css')
    <link rel="stylesheet" href="{{ asset('summernote/summernote.css') }}" type="text/css">
@endsection

<section class="m-2">

    <style>
        .h400 {
            height: 400px;
        }
    </style>
    <div class="table-container">

        <div class="d-flex justify-content-between align-items-center mb-3">
            <h5 class="mb-3">Event</h5>

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
                Status
            </th>
            <th>
                Lokasi
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
                    <td style=" {{$e->status == 'Registration' ? 'color: orange' : ($e->status == 'Incoming Event' ? 'color: green' : ($e->status == 'Ongoing Event' ? 'color:blue' : 'color: red'))}}">
                        {{$e->status}}
                    </td>
                    <td>
                        {{$e->event_location}}
                    </td>
                    <td>
                        {{$e->remaining}}
                    </td>
                    <td>
                        <a type="button" class="btn btn-primary btn-sm" data-id="{{$e->id}}" id="detailData">Detail
                        </a>
                        <a type="button" class="btn btn-success btn-sm" data-id="{{$e->id}}" id="editData">Edit
                        </a>

                    </td>
                </tr>
            @empty
                <tr>
                    <td class="text-center" colspan="7">Tidak ada event</td>
                </tr>
            @endforelse

        </table>

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
                                            <label class="form-label">Kuota</label>
                                            <p class="fw-bold" id="quota"></p>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Sisa Kuota</label>
                                            <p class="fw-bold" id="remaining"></p>
                                        </div>
                                        <div class="mb-3">
                                            <a class="btn btn-primary" id="report">Report Event</a>
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


        <div class="modal  fade" data-bs-backdrop="static" data-bs-keyboard="false" id="laporan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Laporan </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="fromReportEvent" onsubmit="return reportEvent()" enctype="multipart/form-data">
                            @csrf
                            <input id="id_report" name="id_report" hidden>
                            <textarea id="summernote" name="information"></textarea>
                            <button type="submit" class="btn-primary mt-3 p-2">Publish</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="modal  fade" id="tambahevent" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Event</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="formTambahEvent" method="post" enctype="multipart/form-data" onsubmit="return saveEvent()">
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
                                    <input type="file" class="form-control" accept="image/*" id="url_cover" name="url_cover">
                                    <a class="d-block mt-2" id="imgcover" style="cursor: pointer" target="_blank"
                                       href="">
                                        <img src=""
                                             style="height: 150px; width: 200px; object-fit: cover"/>

                                    </a>
                                </div>

                                <div class="mb-4"></div>
                                <button type="submit" class="btn btn-primary ms-auto">Simpan</button>
                            </div>
                        </div>


                    </form>
                </div>

            </div>
        </div>
    </div>

</section>


@endsection

@section('script')

    <script src="{{ asset('summernote/summernote.min.js') }}"></script>
    <script>
        var id_event, information, id_report;
        $(document).ready(function () {
            // $('#summernote').summernote();
        });

        $(document).on('click', '#detailData', async function () {
            var id = $(this).data('id');
            await getDetailEvent(id);
            $('#detail').modal('show')
        })

        $(document).on('click', '#report', async function () {
            $("#summernote").summernote("code", information);
            $('#laporan #id_report').val(id_report);
            $('#laporan').modal('show')
        })


        function saveEvent(){
            var title = 'Tambah Event';
            if ($('#formTambahEvent #id').val() !== ''){
                title = 'Edit Event';
            }
            saveData(title,'formTambahEvent');
            return false;
        }
        function reportEvent(){
            var form_data = new FormData($('#fromReportEvent')[0]);

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
                            url: '/commitee/event/report/'+id_event,
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
                                    swal("Data Updated ", {
                                        icon: "success",
                                        buttons: false,
                                        timer: 1000
                                    }).then((dat) => {
                                        // window.location.reload();
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

        async function getDetailEvent(id) {
            await $.get('/commitee/event/' + id, function (data) {
                $('#detail #name_event').html(data['event_name']);
                $('#detail #start_date').html(moment(data['start_date']).format('DD MMMM YYYY'));
                $('#detail #end_date').html(moment(data['end_date']).format('DD MMMM YYYY'));
                $('#detail #location').html(data['event_location']);
                $('#detail #remaining').html(data['remaining']);
                $('#detail #quota').html(data['quota']);
                $('#detail #start_register').html(moment(data['start_register_date']).format('DD MMMM YYYY'));
                $('#detail #end_register').html(moment(data['end_register_date']).format('DD MMMM YYYY'));
                $('#detail #cover').attr('href', data['url_cover']);
                $('#detail #cover img').attr('src', data['url_cover'])
                var tabel = $('#tabel_participant');
                id_event = data['id'];
                id_report = undefined;
                information = '';
                if (data['get_report']){
                    id_report = data['get_report']['id'];
                    information = data['get_report']['information'];
                }
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
                            '</tr>';
                        tabel.append(row);

                    })
                } else {
                    var row = '<tr><td colspan="8" class="text-center">Tidak ada pendaftar</td></tr>'
                    tabel.append(row);
                }
            })
        }

        $(document).on('click', '#addData', async function () {
            $('#formTambahEvent #event_name').val('');
            $('#formTambahEvent #start_date').val('');
            $('#formTambahEvent #end_date').val('');
            $('#formTambahEvent #event_location').val('');
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

            $.get('/commitee/event/' + id, function (data) {
                $('#formTambahEvent #event_name').val(data['event_name']);
                $('#formTambahEvent #start_date').val(data['start_date']);
                $('#formTambahEvent #end_date').val(data['end_date']);
                $('#formTambahEvent #event_location').val(data['event_location']);
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
    </script>

@endsection

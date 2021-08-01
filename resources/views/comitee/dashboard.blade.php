@extends('comitee.base')
@section('title')
    Dashboard
@endsection
@section('content')

@section('css')
    <link rel="stylesheet" href="{{ asset('summernote/summernote.css') }}" type="text/css">
@endsection

<section class="m-2">


    <div class="table-container">

        <h5 class="mb-3">Events</h5>

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
                    Sisa Kuota
                </th>

                <th>
                    Action
                </th>

            </thead>

            <tr>
                <td>
                    1
                </td>
                <td>
                    Dubafest
                </td>
                <td>
                    17 Agustus 2021
                </td>
                <td>
                    19 Agustus 2021
                </td>
                <td>
                    Surakarta
                </td>

                <td>
                    200
                </td>

                <td>
                    <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                        data-bs-target="#detail">Detail</button>

                </td>
            </tr>


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
                                            <label class="form-label">Paspor</label>
                                            <a class="d-block" style="cursor: pointer" target="_blank"
                                                href="https://blue.kumparan.com/image/upload/fl_progressive,fl_lossy,c_fill,q_auto:best,w_640/v1555064738/mpnomhxtbuxt318u4gu1.jpg">
                                                <img src="https://blue.kumparan.com/image/upload/fl_progressive,fl_lossy,c_fill,q_auto:best,w_640/v1555064738/mpnomhxtbuxt318u4gu1.jpg"
                                                    style="height: 150px; width: 200px; object-fit: cover" />

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
                                            <p class="fw-bold">DubaFest</p>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Mulai</label>
                                            <p class="fw-bold">17 Agustus 2021</p>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Selesai</label>
                                            <p class="fw-bold">19 Agustus 2021</p>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Lokasi</label>
                                            <p class="fw-bold">Solo</p>
                                        </div>


                                    </div>

                                    <div class="col-4">


                                        <div class="mb-3">
                                            <label class="form-label">Mulai Pendaftaran</label>
                                            <p class="fw-bold">10 Agustus 2021</p>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Ahkir Pendaftaran</label>
                                            <p class="fw-bold">16 Agustus 2021</p>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Sisa Kuota</label>
                                            <p class="fw-bold">512</p>
                                        </div>

                                        <div class="mb-3">
                                            <a type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                data-bs-target="#laporan">Buat Laporan</a>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="box-border mt-3">
                                <p>Partisipan</p>
                                <hr>

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
                                            Status Pembayaran
                                        </th>



                                    </thead>

                                    <tr>
                                        <td>
                                            1
                                        </td>
                                        <td>
                                            Erfin Aditya
                                        </td>
                                        <td>
                                            Indonesia
                                        </td>
                                        <td>
                                            Dubafest
                                        </td>
                                        <td>
                                            Stanford
                                        </td>
                                        <td>
                                            erfin@gmail.com
                                        </td>
                                        <td>
                                            089218319283
                                        </td>

                                        <td>
                                            Menunggu
                                        </td>


                                    </tr>


                                </table>

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
                        <form>
                            <div id="summernote"></div>
                            <button type="submit" class="btn-primary mt-3 p-2" >Publish</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>

</section>


@endsection

@section('script')

<script src="{{ asset('summernote/summernote.min.js') }}"></script>
<script>
    $(document).ready(function() {
        $('#summernote').summernote();
    });
</script>

@endsection

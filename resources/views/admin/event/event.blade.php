@extends('admin.base')
@section('title')
    Dashboard
@endsection
@section('content')

    <section class="m-2">


        <div class="table-container">

            <div class="d-flex justify-content-between align-items-center mb-3">
                <h5 class="mb-3">Peserta yang ingin mengikuti event</h5>

                <button type="button ms-auto" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                    data-bs-target="#tambahevent">Tambah Event</button>

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
                        Url
                    </th>

                    <th>
                        Kuota
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
                        hi.udb.com
                    </td>
                    <td>
                        200
                    </td>

                    <td>
                        <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                            data-bs-target="#detail">Detail</button>
                        <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal"
                            data-bs-target="#detail">Edit</button>
                        <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                            data-bs-target="#detail">Hapus</button>
                    </td>
                </tr>


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
                                        <label class="form-label">URL</label>
                                        <p class="fw-bold">udb.id</p>
                                    </div>

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
                                        Action
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
                                        <a type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                            data-bs-target="#detail-participant">Detail</a>
                                    </td>
                                </tr>


                            </table>

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
                                        <p class="fw-bold">Erfin Aditya</p>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Negara</label>
                                        <p class="fw-bold">Indonesia</p>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Institusi</label>
                                        <p class="fw-bold">UDB</p>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Email</label>
                                        <p class="fw-bold">erfin@gmail.com</p>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Alamat</label>
                                        <p class="fw-bold">Sukoharjo Kota</p>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Tanggal Lahir</label>
                                        <p class="fw-bold">12 Januari 2012</p>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Paspor</label>
                                        <a class="d-block" style="cursor: pointer" target="_blank"
                                            href="https://blue.kumparan.com/image/upload/fl_progressive,fl_lossy,c_fill,q_auto:best,w_640/v1555064738/mpnomhxtbuxt318u4gu1.jpg">
                                            <img src="https://blue.kumparan.com/image/upload/fl_progressive,fl_lossy,c_fill,q_auto:best,w_640/v1555064738/mpnomhxtbuxt318u4gu1.jpg"
                                                style="height: 50px; width: 100px; object-fit: cover" />

                                        </a>
                                    </div>
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="mb-3">
                                    <label class="form-label">Nama Event</label>
                                    <p class="fw-bold">Dubafest</p>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Sisa Kuota</label>
                                    <p class="fw-bold">512</p>
                                </div>

                                <div class="mt-3 mb-2">
                                    <label for="formFile" class="form-label">Paspor</label>
                                    <input class="form-control" type="file" id="formFile">
                                </div>



                                <div class="mb-3">
                                    <label class="form-label">Bukti Pembayaran</label>
                                    <a class="d-block" style="cursor: pointer" target="_blank"
                                        href="https://1.bp.blogspot.com/-MOHGve9IHeQ/XHvEjRpgyhI/AAAAAAAAIyQ/06yF5OyDDHQEwAqbc9SnzW7Sq0rx_RMdwCLcBGAs/s1600/IMG_20181120_064248_565.jpg">
                                        <img src="https://1.bp.blogspot.com/-MOHGve9IHeQ/XHvEjRpgyhI/AAAAAAAAIyQ/06yF5OyDDHQEwAqbc9SnzW7Sq0rx_RMdwCLcBGAs/s1600/IMG_20181120_064248_565.jpg"
                                            style="height: 50px; width: 100px; object-fit: cover" />

                                    </a>
                                </div>

                                <div class="mb-4"></div>
                                <button type="submit" class="btn btn-primary">Terima</button>
                                <a class="btn btn-danger" data-bs-toggle="modal" href="#alasanMenolak"
                                    data-bs-target="#alasanMenolak">Tolak</a>

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
                    <form>

                        <div class="row">


                            <div class="mb-3">
                                <label for="alassan" class="form-label">Alasan Menolak</label>
                                <textarea class="form-control" id="alassan" rows="3"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Kirim</button>

                        </div>

                    </form>
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
        $(function() {
            $(".datepicker").datepicker();
        });
    </script>
@endsection

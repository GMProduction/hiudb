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
                        <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                            data-bs-target="#detail">Detail</button>
                    </td>
                </tr>


            </table>

        </div>


    </section>


    <!-- Modal Tambah-->
    <div class="modal  fade" id="detail" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Detail </h5>
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
@endsection

@section('script')


@endsection

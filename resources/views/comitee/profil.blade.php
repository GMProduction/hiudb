@extends('user.base')
@section('title')
    Profil
@endsection
@section('content')

    <section class="m-2">


        <div class="table-container">

            <h5 class="mb-3">Profil</h5>
            <hr>

            <div class="row">
                <div class="col-6">

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
                </div>
                <div class="col-6">
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

                    <a type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#edit">Edit</a>
                </div>


            </div>

            <!-- Modal detail participant-->
            <div class="modal  fade" id="edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Detail Partisipan</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form>

                                <div class="box-border mt-4">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-2">
                                                <label for="namaeditbarang" class="form-label t">Name</label>
                                                <input type="text" class="form-control" id="namaeditbarang">
                                            </div>
                                            <div class="mb-2 text-left">
                                                <label for="namaeditbarang" class="form-label t">Country</label>
                                                <input type="text" class="form-control" id="namaeditbarang">
                                            </div>

                                            <div class="mb-2 text-left">
                                                <label for="namaeditbarang" class="form-label t">Institude</label>
                                                <input type="email" class="form-control" id="namaeditbarang">
                                            </div>


                                            <div class="mb-2 text-left">
                                                <label for="namaeditbarang" class="form-label t">Email</label>
                                                <input type="email" class="form-control" id="namaeditbarang">
                                            </div>

                                            <div class="mb-2">
                                                <label for="ttlsiswa" class="form-label">Date Of Birth</label>
                                                <input type="text" class="form-control" id="datepicker">
                                            </div>
                                        </div>

                                        <div class="col-lg-6">

                                            <label class="mb-2">Gender</label>
                                            <div class="d-flex" style="padding: 0 !important">
                                                <div class="form-check me-3">
                                                    <input class="form-check-input" type="radio" name="flexRadioDefault"
                                                        id="flexRadioDefault1" style="padding: 0 !important">
                                                    <label class="form-check-label" for="flexRadioDefault1">
                                                        Male
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="flexRadioDefault"
                                                        id="flexRadioDefault2" checked style="padding: 0 !important">
                                                    <label class="form-check-label" for="flexRadioDefault2">
                                                        Female
                                                    </label>
                                                </div>
                                            </div>



                                            <div class="mt-3 mb-2">
                                                <label for="formFile" class="form-label">Paspor</label>
                                                <input class="form-control" type="file" id="formFile">
                                            </div>

                                            <div class="mb-2 text-left">
                                                <label for="namaeditbarang" class="form-label t">Phone</label>
                                                <input type="email" class="form-control" id="namaeditbarang">
                                            </div>
                                            <div class="mb-2 text-left">
                                                <label for="namaeditbarang" class="form-label t">Address</label>
                                                <input type="email" class="form-control" id="namaeditbarang">
                                            </div>

                                            <div class="text-center mt-5">
                                                <button class="btn btn-primary btn-sm border-0 " type="submit"
                                                    name="submit">Save</button>

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


@endsection

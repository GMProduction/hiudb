@extends('user.base')
@section('title')
    Dashboard
@endsection
@section('content')

    <section class="m-2">


        <div class="table-container">

            <h5 class="mb-3">Events</h5>

            <table class="table table-striped table-bordered ">
                <thead>
                    <th>
                        #
                    </th>
                    <th>
                        Event Name
                    </th>
                    <th>
                        Date
                    </th>
                    <th>
                        Payment Slip
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
                        21 August 2021 - 24 August 2021
                    </td>
                    <td>
                        @php($status = 'waiting')
                        <span @if ($status = 'waiting') class="t-orange"
                            @elseif($status = "accepted")
                                        class="t-green"
                            @else
                                        class="t-red" @endif>

                            Waiting
                        </span>
                    </td>


                    <td>
                        <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                            data-bs-target="#detail-participant">Detail</button>
                    </td>
                </tr>

            </table>

            <!-- Modal detail participant-->
            <div class="modal  fade" id="detail-participant" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Detail Partisipan</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form>

                                <img src="https://image.freepik.com/free-vector/music-event-poster-template-with-abstract-shapes_1361-1316.jpg"
                                    width="100%" height="300px" style="object-fit: cover" />
                                <div class="box-border mt-4">
                                    <div class="row">

                                        <div class="col-6">


                                            <div class="mb-3">
                                                <label class="form-label">Event Name</label>
                                                <p class="fw-bold">Dubafest</p>
                                            </div>

                                            <div class="mb-3">
                                                <label class="form-label">Start Date</label>
                                                <p class="fw-bold">17 Agustus 2021</p>
                                            </div>

                                            <div class="mb-3">
                                                <label class="form-label">End Date</label>
                                                <p class="fw-bold">19 Agustus 2021</p>
                                            </div>

                                            <div class="mb-3">
                                                <label class="form-label">Location</label>
                                                <p class="fw-bold">Solo</p>
                                            </div>


                                        </div>

                                        <div class="col-6">


                                            <div class="mb-3">
                                                <label class="form-label mb-0">Payment Slip</label>
                                                <label class="form-label d-block" style="font-size: 0.8rem">(waiting for admin confirmation)</label>
                                                <a class="d-block" style="cursor: pointer" target="_blank"
                                                    href="https://1.bp.blogspot.com/-MOHGve9IHeQ/XHvEjRpgyhI/AAAAAAAAIyQ/06yF5OyDDHQEwAqbc9SnzW7Sq0rx_RMdwCLcBGAs/s1600/IMG_20181120_064248_565.jpg">
                                                    <img src="https://1.bp.blogspot.com/-MOHGve9IHeQ/XHvEjRpgyhI/AAAAAAAAIyQ/06yF5OyDDHQEwAqbc9SnzW7Sq0rx_RMdwCLcBGAs/s1600/IMG_20181120_064248_565.jpg"
                                                        style="height: 50px; width: 100px; object-fit: cover" />

                                                </a>
                                            </div>

                                            <div class="mb-4"></div>
                                            <a class="btn btn-success" href="https://wa.me/62912391872">Kontak Admin</a>

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

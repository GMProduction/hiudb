@extends('admin.base')

@section('title')
    Data Guru
@endsection

@section('content')

    @if (\Illuminate\Support\Facades\Session::has('success'))
        <script>
            swal("Berhasil!", "Berhasil Menambah data!", "success");
        </script>
    @endif

    <section class="m-2">

        <div class="table-container">


            <div class="d-flex justify-content-between align-items-center mb-3">
                <h5>Data Member</h5>

            </div>

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
                    Action
                </th>

                </thead>
                @forelse($user as $key => $u)
                    <tr>
                        <td>
                            {{$key + 1}}
                        </td>
                        <td>
                            {{$u->getMember->name ?? ''}}
                        </td>
                        <td>
                            {{$u->getMember->country ?? ''}}

                        </td>
                        <td>
                            {{$u->getMember->institute ?? ''}}

                        </td>
                        <td>
                            {{$u->email}}
                        </td>
                        <td>
                            {{$u->getMember->phone ?? ''}}

                        </td>

                        <td>
                            <a type="button" id="detailData" data-passport-img="{{$u->getMember->url_passport ?? ''}}" data-passport-number="{{$u->getMember->passport ?? ''}}" data-dob="{{$u->getMember->dob ?? ''}}" data-address="{{$u->getMember->address ?? ''}}" data-email="{{$u->email}}" data-institute="{{$u->getMember->institute ?? ''}}" data-country="{{$u->getMember->country ?? ''}}" data-name=" {{$u->getMember->name ?? ''}}" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                               data-bs-target="#detail-participant">Detail</a>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="7" class="text-center">Tidak ada data comitee</td></tr>

                @endforelse

            </table>

        </div>


        <div>


            <!-- Modal detail participant-->
            <div class="modal  fade" id="detail-participant" tabindex="-1" aria-labelledby="exampleModalLabel"
                 aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Detail Member</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">

                            <div class="row">
                                <div class="col-6">
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


                                </div>
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label class="form-label">Paspor</label>
                                        <p class="fw-bold" id="passportNumber">asdasd</p>
                                        <a id="passportImg" class="d-block" style="cursor: pointer" target="_blank"
                                           href="">
                                            <img src=""
                                                 style="height: 200px; object-fit: cover"/>

                                        </a>
                                    </div>
                                </div>


                            </div>

                        </div>

                    </div>
                </div>
            </div>


        </div>

    </section>

@endsection

@section('script')
    <script>
        $(document).ready(function () {

        })

        $(document).on('click', '#detailData', function () {
            $('#detail-participant #name').html($(this).data('name'));
            $('#detail-participant #country').html($(this).data('country'));
            $('#detail-participant #institute').html($(this).data('institute'));
            $('#detail-participant #email').html($(this).data('email'));
            $('#detail-participant #address').html($(this).data('address'));
            $('#detail-participant #dob').html(moment($(this).data('dob')).format('DD MMMM YYYY'));
            $('#detail-participant #passport_number').html($(this).data('passport-number'));
            $('#detail-participant #passportImg').attr('href',$(this).data('passport-img'));
            $('#detail-participant #passportImg img').attr('src',$(this).data('passport-img'));

            $('#detail-participant').modal('show');
        })

        function hapus(id, name) {
            swal({
                title: "Menghapus data?",
                text: "Apa kamu yakin, ingin menghapus data ?!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
                .then((willDelete) => {
                    if (willDelete) {
                        swal("Berhasil Menghapus data!", {
                            icon: "success",
                        });
                    } else {
                        swal("Data belum terhapus");
                    }
                });
        }
    </script>
    <script>
        $(function () {
            $("#datepicker").datepicker();
        });
    </script>
@endsection

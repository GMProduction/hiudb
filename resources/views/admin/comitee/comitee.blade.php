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
                <h5>Data Comitee</h5>
                <button type="button ms-auto" class="btn btn-primary btn-sm" id="addData">Tambah Data Comitee</button>
            </div>

            <table class="table table-striped table-bordered ">
                <thead>
                    <th>
                        #
                    </th>

                    <th>
                        Name
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
                @forelse($comitee as $key => $e)

                <tr>
                    <td>
                        {{$key + 1}}
                    </td>
                    <td>
                        {{$e->getComitee->name ?? ''}}
                    </td>
                    <td>
                        {{$e->email}}
                    </td>
                    <td>
                        {{$e->getComitee->phone ?? ''}}
                    </td>
                    <td>

                        <button type="button" class="btn btn-success btn-sm" id="editData" data-id="{{$e->id}}" data-phone="{{$e->getComitee->phone ?? ''}}" data-email="{{$e->email}}" data-name="{{$e->getComitee->name ?? ''}}">Ubah</button>
                        <button type="button" class="btn btn-danger btn-sm" onclick="hapus('id', 'nama') ">hapus</button>
                    </td>
                </tr>
                @empty
                    <tr><td colspan="5" class="text-center">Tidak ada data comitee</td></tr>
                @endforelse
            </table>

        </div>


        <div>


            <!-- Modal Tambah-->
            <div class="modal  fade" id="tambahComitee" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-md">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Tambah Comitee</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form id="formAdd" method="post" onsubmit="return reegister()">
                               @csrf
                                <input id="id" name="id" hidden>
                                <div class="mb-3">
                                    <label for="name" class="form-label">Name Lengkap</label>
                                    <input type="text" class="form-control" id="name" name="name">
                                </div>
                                <div class="mb-3">
                                    <label for="phone" class="form-label">No. Hp</label>
                                    <input type="number" class="form-control" id="phone" name="phone">
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">email</label>
                                    <input type="email"  class="form-control" id="email" name="email">
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" class="form-control" id="password" name="password">
                                </div>

                                <div class="mb-3">
                                    <label for="konfirmasi" class="form-label">Konfirmasi Password</label>
                                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
                                </div>

                                <div class="mb-4"></div>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </form>
                        </div>

                    </div>
                </div>
            </div>


        </div>

    </section>

@endsection

@section('script')
    <script>
        $(document).ready(function() {

        })

        $(document).on('click', '#addData', function () {
            $('#tambahComitee #id').val('');
            $('#tambahComitee #name').val('');
            $('#tambahComitee #email').val('');
            $('#tambahComitee #phone').val('');
            $('#tambahComitee #password').val('');
            $('#tambahComitee #password_confirmation').val('');
            $('#tambahComitee').modal('show')
        })

        $(document).on('click', '#editData', function () {
            $('#tambahComitee #id').val($(this).data('id'));
            $('#tambahComitee #name').val($(this).data('name'));
            $('#tambahComitee #email').val($(this).data('email'));
            $('#tambahComitee #phone').val($(this).data('phone'));
            $('#tambahComitee #password').val('*************');
            $('#tambahComitee #password_confirmation').val('*************');
            $('#tambahComitee').modal('show')
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

        function reegister() {
            swal({
                title: "Tambah data comitee",
                text: "Apa kamu yakin ?",
                icon: "info",
                buttons: true,
                primariMode: true,
            })
                .then((res) => {
                    if (res) {
                        $.ajax({
                            type: "POST",
                            data: $('#formAdd').serialize(),
                            headers: {
                                'Accept': "application/json"
                            },
                            success: function (data, textStatus, xhr) {
                                console.log(data)

                                if (xhr.status === 200) {
                                    swal("Berhasil", {
                                        icon: "success",
                                    }).then((dat) => {
                                        window.location.reload();

                                    });
                                } else {
                                    swal(data['msg'])
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
            return false;
        }
    </script>
    <script>
        $( function() {
          $( "#datepicker" ).datepicker();
        } );
        </script>
@endsection

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
                    Status
                </th>

                <th>
                    Action
                </th>

                </thead>
                @forelse($user->getMember->getParticipant as $key => $u)
                    <tr>
                        <td>
                            {{$key + 1}}
                        </td>
                        <td>
                            {{$u->getEvent->event_name}}
                        </td>
                        <td>
                            {{date('d M Y', strtotime($u->getEvent->start_date))}} - {{date('d M Y', strtotime($u->getEvent->end_date))}}
                        </td>
                        <td>
                            <span
                                @if($u->status == 0)
                                class="t-orange">
                                Waiting
                            @elseif($u->status == 1)
                                    class="t-green" >
                                    Accepted
                                @else
                                    class="t-red" >
                                    Rejected
                                @endif
                           </span>

                            </span>
                        </td>


                        <td>
                            <a type="button" class="btn btn-primary btn-sm" id="detailData" data-id-participant="{{$u->id}}" data-id-event="{{$u->id_event}}" data-payment="{{$u->url_payment}}"
                               data-reason="{{$u->reason_of_reject}}" data-status="{{$u->status}}" data-location="{{$u->getEvent->event_location}}" data-end="{{$u->getEvent->end_date}}"
                               data-start="{{$u->getEvent->start_date}}" data-event-name="{{$u->getEvent->event_name}}" data-cover="{{$u->getEvent->url_cover}}">Detail
                            </a>
                        </td>
                    </tr>
                @empty
                @endforelse
            </table>

            <!-- Modal detail participant-->
            <div class="modal  fade" id="detail" tabindex="-1" aria-labelledby="exampleModalLabel"
                 aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Detail Partisipan</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form>

                                <img id="cover" src=""
                                     width="100%" height="300px" style="object-fit: cover"/>
                                <div class="box-border mt-4">
                                    <div class="row">

                                        <div class="col-6">


                                            <div class="mb-3">
                                                <label class="form-label">Event Name</label>
                                                <p class="fw-bold" id="event_name"></p>
                                            </div>

                                            <div class="mb-3">
                                                <label class="form-label">Start Date</label>
                                                <p class="fw-bold" id="start"></p>
                                            </div>

                                            <div class="mb-3">
                                                <label class="form-label">End Date</label>
                                                <p class="fw-bold" id="end"></p>
                                            </div>

                                            <div class="mb-3">
                                                <label class="form-label">Location</label>
                                                <p class="fw-bold" id="location"></p>
                                            </div>
                                        </div>

                                        <div class="col-6">
                                            <div class="mb-3">
                                                <label class="form-label mb-0">Payment Slip</label>
                                                <a id="payment" class="d-block" style="cursor: pointer" target="_blank"
                                                   href="">
                                                    <img src=""
                                                         style="height: 50px; width: 100px; object-fit: cover"/>

                                                </a>
                                                <a id="btnChangePayment" class="btn btn-warning btn-sm mt-1" style="color: white">Change Payment</a>
                                            </div>

                                            <div class="mb-3">
                                                <label class="form-label mb-0">Status</label>
                                                <p class="fw-bold mb-0" style="" id="status"></p>
                                                <p class="fw-bold" id="reason" style="font-size: 0.8rem"></p>
                                            </div>
                                            <a class="btn btn-primary" id="btnRepair">Repair</a>
                                            <div class="mb-1"></div>

                                            <a class="btn btn-success" target="_blank" href="https://wa.me/62912391872">Contact Admin</a>
                                            <a class="btn btn-warning" href="" id="printCard">Print Card</a>

                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>

        </div>

        <div class="modal fade" id="modalPayment" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Form Register</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="form-register-event" onsubmit="return cangePayment()" enctype="multipart/form-data">
                            @csrf
                            <input id="id" name="id_event" hidden>
                            <div class="mb-3">
                                <label for="formFile" class="form-label">Payment Slip</label>
                                <input class="form-control" type="file" accept="image/*" name="payment" id="payment" required>
                            </div>
                            <div class="mb-4"></div>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>

    </section>


@endsection

@section('script')
    <script>

        var idParticipant;

        function cangePayment() {
            saveData('Change Payment Slip', 'form-register-event', '/user/chgange-payment/' + idParticipant)
            return false;
        }

       $(document).on('click','#btnRepair', function () {
           var form_data = {
               '_token': '{{csrf_token()}}'
           }
           swal({
               title: 'Repair Data',
               text: "Are you sure ?",
               icon: "info",
               buttons: true,
               primariMode: true,
           })
               .then((res) => {
                   if (res) {
                       $.ajax({
                           type: "POST",
                           data: form_data,
                           url: '/user/repair/'+idParticipant,
                           async: true,
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

                                           window.location.reload()
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
           return false;
       });

        $(document).on('click', '#btnChangePayment', function () {
            $('#modalPayment #id').val(idParticipant);
            $('#modalPayment #payment').val('');
            $('#modalPayment').modal('show');
        })

        $(document).on('click', '#detailData', function () {
            var status = $(this).data('status');
            var textStatus = '( Waiting for admin confirmation )';
            $('#detail #printCard').addClass('d-none')
            $('#reason').html('');
            idParticipant = $(this).data('id-participant');
            console.log(idParticipant)
            $('#btnChangePayment').addClass('d-none');
            $('#btnRepair').addClass('d-none');
            if (status === 1) {
                textStatus = '( Accepted )'
                $('#detail #printCard').removeClass('d-none')

            } else if (status === 2) {
                textStatus = '( Rejected )'
                $('#btnChangePayment').removeClass('d-none');
                $('#btnRepair').removeClass('d-none');
                $('#reason').html($(this).data('reason'));
            }
            $('#detail #cover').attr('src', $(this).data('cover'));
            $('#detail #payment').attr('href', $(this).data('payment'));
            $('#detail #printCard').attr('href', '/user/cetakPendaftaran/' + $(this).data('id-event'));
            $('#detail #payment img').attr('src', $(this).data('payment'));
            $('#detail #event_name').html($(this).data('event-name'));
            $('#detail #status').html(textStatus);
            $('#detail #start').html(moment($(this).data('start')).format('DD MMMM YYYY'));
            $('#detail #end').html(moment($(this).data('end')).format('DD MMMM YYYY'));
            $('#detail #location').html($(this).data('location'));
            $('#detail').modal('show')
        })
    </script>

@endsection

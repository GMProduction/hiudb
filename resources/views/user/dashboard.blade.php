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
                            class="t-orange" >
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
                            <a type="button" class="btn btn-primary btn-sm" id="detailData" data-id-event="{{$u->id_event}}"  data-payment="{{$u->url_payment}}" data-status="{{$u->status}}" data-location="{{$u->getEvent->event_location}}" data-end="{{$u->getEvent->end_date}}" data-start="{{$u->getEvent->start_date}}" data-event-name="{{$u->getEvent->event_name}}" data-cover="{{$u->getEvent->url_cover}}">Detail
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
                                                <label class="form-label d-block" style="font-size: 0.8rem" id="status"></label>
                                                <a id="payment" class="d-block" style="cursor: pointer" target="_blank"
                                                   href="">
                                                    <img src=""
                                                         style="height: 50px; width: 100px; object-fit: cover"/>

                                                </a>
                                            </div>

                                            <div class="mb-4"></div>
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

    </section>


@endsection

@section('script')
<script>
    $(document).on('click', '#detailData', function () {
        var status = $(this).data('status');
        var textStatus = '( Waiting for admin confirmation )';
        $('#detail #printCard').addClass('d-none')
        if (status === 1){
            textStatus = '( Accepted )'
            $('#detail #printCard').removeClass('d-none')

        }else if(status === 2){
            textStatus = '( Rejected )'
        }
        $('#detail #cover').attr('src',$(this).data('cover'));
        $('#detail #payment').attr('href',$(this).data('payment'));
        $('#detail #printCard').attr('href','/user/cetakPendaftaran/'+$(this).data('id-event'));
        $('#detail #payment img').attr('src',$(this).data('payment'));
        $('#detail #event_name').html($(this).data('event-name'));
        $('#detail #status').html(textStatus);
        $('#detail #start').html(moment($(this).data('start')).format('DD MMMM YYYY'));
        $('#detail #end').html(moment($(this).data('end')).format('DD MMMM YYYY'));
        $('#detail #location').html($(this).data('location'));
        $('#detail').modal('show')
    })
</script>

@endsection

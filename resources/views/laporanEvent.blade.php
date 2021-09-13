@extends('base')

@section('moreCss')
@endsection

@section('content')

    <section class="container">

        <div style="height: 130px"></div>
        <h4 class="fw-bold">{{$event->event_name}}</h4>


        {{-- COVER --}}
        <div class="w-100 mb-3">
            <img src="{{$event->url_cover}}" style="object-fit: cover; width: 100%;" />
        </div>
        <table class="table table-borderless">
            <tr>
                <td style="width: 100px">Committee</td>
                <td style="width: 10px">:</td>
                <td>{{$event->getComitee->name}}</td>
            </tr>
            <tr>
                <td>Date</td>
                <td>:</td>
                <td>{{date('d F Y', strtotime($event->start_date))}} - {{date('d F Y', strtotime($event->end_date))}}</td>
            </tr><tr>
                <td>Quota</td>
                <td>:</td>
                <td>{{$event->quota}}</td>
            </tr><tr>
                <td>Participant</td>
                <td>:</td>
                <td>{{$participant}}</td>
            </tr>
        </table>
        {{-- isi laporan --}}
        <div class="mt-3">
            <h5 class="fw-bold">Report Event</h5>
            <p>{!! $event->getReport->information !!}</p>
        </div>

        <div>

        </div>
    </section>


@endsection

@section('script')


@endsection

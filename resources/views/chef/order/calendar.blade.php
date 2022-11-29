@extends('layouts_admin.master')
@section('css')
    @toastr_css
@section('title')
    @lang('home.main')
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.css' />

@section('PageTitle')
    @lang('home.main')
@stop
<!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <h1>{{ trans('home.main') }}</h1>
                </div>
            </div>
        </div>
    </div>


    <h3>Calendar</h3>

    <div id='calendar'></div>


    <!-- row closed -->
@endsection
@section('js')
    @toastr_js
    @toastr_render

    <script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.js'></script>
    <script>
        $(document).ready(function() {
            // page is now ready, initialize the calendar...

            $('#calendar').fullCalendar(
                {

                // put your options and callbacks here
                events : [

                    {
                        title: '',
                        start: '',
                        url: 'xxx'
                    }
                ],
                    eventOnClick: function() {
                    alert('ssss')
                        // info.jsEvent.preventDefault(); // don't let the browser navigate
                        //
                        // if (info.event.url) {
                        //     window.open(info.event.url);
                        // }
                    }
            }
            )
        }).on('click', function(){
            alert(this.html);
        });
    </script>
@endsection

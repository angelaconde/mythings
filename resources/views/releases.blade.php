@extends('layouts.app')
@section('content')
    <div class="container">
        <div id="calendar"></div>
    </div>
@endsection

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
            locale: 'en',
            initialView: 'dayGridMonth',
            showNonCurrentDates: false,
            fixedWeekCount: false,
            selectable: false,
            height: "auto",
            handleWindowResize: true,
            events: "/getreleases",
        });
        calendar.render();
    });

</script>

{{-- Tweak to split long multiple words titles into multiple lines --}}
<style>
    .fc-event-main-frame {
        white-space: normal;
    }

</style>

@extends('layouts.app')
@section('content')
    <div class="container">
        <div id="calendar"></div>
    </div>
@endsection

<script src="{{ asset('js/releases.js') }}" defer></script>

{{-- Tweak to split long multiple words titles into multiple lines --}}
<style>
    .fc-event-main-frame {
        white-space: normal;
    }

</style>

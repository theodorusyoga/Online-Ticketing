@extends('master')

@section('content')

<section class="error-404">
    <h1>
        404
    </h1>
    <h3>Are You Looking For Me?</h3>
    <img src="/img/error-404.png" alt="404 Not Found" />
    <p>"Marilah kepada-Ku, semua yang letih lesu dan berbeban berat, Aku akan memberi kelegaan kepadamu." - Matius‬ ‭11:28</p>
</section>

@component('donation.volunteer')
@endcomponent

@component('dashboard.footer')
@endcomponent

@endsection

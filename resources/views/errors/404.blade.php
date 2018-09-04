@extends('master')

@section('content')

<section class="error-404">
    <h1>
        404
    </h1>
    <p>
        Apakah Engkau Mencari-Ku?
    </p>
    <p>"Mengapa kamu mencari Aku? Tidakkah kamu tahu, bahwa Aku harus berada di dalam rumah Bapa-Ku?" - Lukas 2:49</p>
    <img src="/img/error-404.png" alt="404 Not Found" />
</section>

@component('donation.volunteer')
@endcomponent

@component('dashboard.subfooter')
@endcomponent

@component('dashboard.footer')
@endcomponent

@endsection

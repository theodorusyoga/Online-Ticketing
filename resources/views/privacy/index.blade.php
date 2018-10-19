@extends('registerHome')

@section('styles')
<link href="/css/terms.css" rel="stylesheet" type="text/css">
@endsection

@section('content')

<div id="terms-and-conditions">
    @component('privacy.header')
    @endcomponent
    @component('privacy.privacylist')
    @endcomponent
</div>

@component('dashboard.footer')
@endcomponent

@component('donation.volunteer')
@endcomponent

@endsection

@section('scripts')
<script src="/js/register.js" type="text/javascript"></script>
@endsection

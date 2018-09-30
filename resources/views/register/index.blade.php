@extends('registerHome')

@section('styles')
<link href="/css/register.css" rel="stylesheet" type="text/css">
@endsection

@section('content')

<div id="register">
    @component('register.header')
    @endcomponent
    @component('register.pricing')
    @endcomponent
</div>

@component('register.terms')
@endcomponent

@component('dashboard.footer')
@endcomponent

@component('donation.volunteer')
@endcomponent

@endsection

@section('scripts')
<script src="/js/register.js" type="text/javascript"></script>
@endsection

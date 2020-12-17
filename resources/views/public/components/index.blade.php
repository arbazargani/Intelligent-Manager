@extends('public.template')

@section('title')
<title>{{ env('APP_NAME') }}</title>
@endsection

@section('content')
<p class="uk-text-lead">Welcome to <strong>intelligent manager</strong>, please take an action.</p>
<ul class="uk-list uk-list-circle">
    <li><a href="{{ route('Customers > Add') }}" class="uk-link-reset">Add customer</a>.</li>
    <li><a href="{{ route('Services > Add') }}" class="uk-link-reset">Add service</a>.</li>
    <li><a href="#" class="uk-link-reset"></a>Manage system.</li>
</ul>
@endsection
@extends('public.template')

@section('title')
<title>Services</title>
@endsection

@section('content')
<div id="customers-data-wrapper" class="uk-overflow-auto">
<h1 class="uk-heading-line uk-text-lead"><span>Services</span></h1>
    <table class="uk-table uk-table-small uk-table-divider uk-table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Customer</th>
                <th>Actions</th>
                <th>Register</th>
            </tr>
        </thead>
        <tbody>
            @foreach($services as $service)
            <tr>
                    <td><span>{{ $service->id }}</span></td>
                    <td><a class="uk-link-reset" href="{{ route('Service > Update', $service->hash) }}"><span>{{ $service->name }}</span></a></td>
                    <td><a class="uk-link-reset" href="{{ route('Customer > Show', $service->customer->hash) }}"><span>{{ $service->customer->name }}</span></a></td>
                    <td>
                        <span class="uk-text-success"><span uk-icon="icon: unlock"></span></span>
                        <span>|</span>
                        <a class="uk-link-reset" href="{{ route('Service > Update', $service->hash) }}"><span class="uk-text-primary"><span uk-icon="icon: cog"></span></span></a>
                    </td>
                    <td><span>{{ $service->created_at }}</span></td>
            </tr>
            </a>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
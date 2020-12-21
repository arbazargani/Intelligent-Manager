@extends('public.template')

@section('title')
<title>Customers</title>
@endsection

@section('content')
<div id="customers-data-wrapper" class="uk-overflow-auto">
<h1 class="uk-heading-line uk-text-lead"><span>Customers</span></h1>
    <table class="uk-table uk-table-small uk-table-divider uk-table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Company</th>
                <th>Services</th>
                <th>Register</th>
            </tr>
        </thead>
        <tbody>
            @foreach($customers as $customer)
            <tr>
                <td><span>{{ $customer->id }}</span></td>
                <td><span>{{ $customer->name }}</span></td>
                <td><span>{{ $customer->company_name }}</span></td>
                <td><a href="{{ route('Customer > Show', $customer->hash) }}"><span class="uk-label">Count: {{ $customer->services->count() }}</span></a></td>
                <td><span>{{ $customer->created_at }}</span></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
@extends('public.template')

@section('title')
<title>Customers</title>
<style>
    .alert-box {
        background: #f4645f;
        color: #fff;
        border-radius: 3px;
        margin: 10px 0 20px;
        padding: 10px;
    }

    .info-box {
        background: #3498db;
        color: #fff;
        border-radius: 3px;
        margin: 10px 0 20px;
        padding: 10px;
    }

    .warning-box {
        background: #e67e22;
        color: #fff;
        border-radius: 3px;
        margin: 10px 0 20px;
        padding: 10px;
    }

    .spaned {
        background: #fefefe;
        color: gray;
        padding: 0 1.5%;
        border-radius: 3px;
        color: black;
        
    }
</style>
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
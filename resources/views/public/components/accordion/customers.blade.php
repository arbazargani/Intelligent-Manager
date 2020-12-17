<div id="customers-data-wrapper" class="uk-overflow-auto">
<h1 class="uk-heading-line uk-text-lead"><span>Customers</span></h1>
    <table class="uk-table uk-table-small uk-table-divider">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Company</th>
                <th>Info</th>
                <th>Register</th>
            </tr>
        </thead>
        <tbody>
            @foreach($customers as $customer)
            <tr>
                <td>{{ $customer->id }}</td>
                <td>{{ $customer->name }}</td>
                <td>{{ $customer->company_name }}</td>
                <td>{{ $customer->customer_info }}</td>
                <td>{{ $customer->created_at }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<div class="table-responsive" >  
    <table class="table datatable table-bordered table-hover text-center">
        <thead>                  
            <tr>
                <th>@lang('Name')</th>
                <th>@lang('Code')</th>
                <th>@lang('Country')</th>
                <th>@lang('Url')</th>
                <th>@lang('Note')</th>
                <th>@lang('Created At')</th>             
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $payment_gateway->name }}</td>
                <td>{{ $payment_gateway->code }}</td>
                <td>
                    @foreach($payment_gateway->countries as $country)
                        {{ $country->name.', ' }}
                    @endforeach
                </td>
                <td>{{ $payment_gateway->url }}</td>
                <td>{{ $payment_gateway->note }}</td>
                <td>{{ \Carbon\Carbon::parse($payment_gateway->created_at)->diffForHumans() }}</td>
            </tr>
        </tbody>
    </table>
</div>
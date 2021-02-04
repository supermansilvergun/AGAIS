<div class="table-responsive" >  
    <table class="table datatable table-bordered table-hover text-center">
        <thead>                  
            <tr>
                <th>@lang('Name')</th>
                <th>@lang('Symbol')</th>
                <th>@lang('Code')</th>
                <th>@lang('ISO')</th>
                <th>@lang('Country')</th>
                <th>@lang('Url')</th>
                <th>@lang('Note')</th>
                <th>@lang('Created At')</th>             
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $currency->name }}</td>
                <td>{{ $currency->symbol }}</td>
                <td>{{ $currency->code }}</td>
                <td>{{ $currency->iso }}</td>
                <td>
                    @foreach($currency->countries as $country)
                        {{ $country->name.', ' }}
                    @endforeach
                </td>
                <td>{{ $currency->url }}</td>
                <td>{{ $currency->note }}</td>
                <td>{{ \Carbon\Carbon::parse($currency->created_at)->diffForHumans() }}</td>
            </tr>
        </tbody>
    </table>
</div>
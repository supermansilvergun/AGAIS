<div class="table-responsive" >  
    <table class="table datatable table-bordered table-hover text-center">
        <thead>                  
            <tr>
                <th>@lang('Name')</th>
                <th>@lang('Code')</th>
                <th>@lang('rif')</th>
                <th>@lang('Country')</th>
                <th>@lang('Url')</th>
                <th>@lang('Note')</th>
                <th>@lang('Created At')</th>             
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $bank->name }}</td>
                <td>{{ $bank->code }}</td>
                <td>{{ $bank->rif }}</td>
                <td>
                    @foreach($bank->countries as $country)
                        {{ $country->name.', ' }}
                    @endforeach
                </td>
                <td>{{ $bank->url }}</td>
                <td>{{ $bank->note }}</td>
                <td>{{ \Carbon\Carbon::parse($bank->created_at)->diffForHumans() }}</td>
            </tr>
        </tbody>
    </table>
</div>
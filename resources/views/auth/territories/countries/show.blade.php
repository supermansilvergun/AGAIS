<div class="table-responsive" >  
    <table class="table datatable table-bordered table-hover text-center">
        <thead>                  
            <tr>
                <th>@lang('Name')</th>
                <th>@lang('Code')</th>
                <th>@lang('Iso2')</th>
                <th>@lang('Iso3')</th>
                <th>@lang('Continent')</th>
                <th>@lang('Url')</th>
                <th>@lang('Note')</th>
                <th>@lang('Created At')</th>             
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $country->name }}</td>
                <td>{{ $country->code }}</td>
                <td>{{ $country->iso2 }}</td>
                <td>{{ $country->iso3 }}</td>
                <td>{{ $country->continent->name }}</td>
                <td>{{ $country->url }}</td>
                <td>{{ $country->note }}</td>
                <td>{{ \Carbon\Carbon::parse($country->created_at)->diffForHumans() }}</td>
            </tr>
        </tbody>
    </table>
</div>
           
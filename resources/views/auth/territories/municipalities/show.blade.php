<div class="table-responsive" >  
    <table class="table datatable table-bordered table-hover text-center">
        <thead>                  
            <tr>
                <th>@lang('Name')</th>
                <th>@lang('Code')</th>
                <th>@lang('State')</th>
                <th>@lang('Country')</th>
                <th>@lang('Url')</th>
                <th>@lang('Note')</th>
                <th>@lang('Created At')</th>             
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $municipality->name }}</td>
                <td>{{ $municipality->code }}</td>
                <td>{{ $municipality->state->name }}</td>
                <td>{{ $municipality->state->country->name }}</td>
                <td>{{ $municipality->url }}</td>
                <td>{{ $municipality->note }}</td>
                <td>{{ \Carbon\Carbon::parse($municipality->created_at)->diffForHumans() }}</td>
            </tr>
        </tbody>
    </table>
</div>
           
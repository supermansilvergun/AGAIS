<div class="table-responsive" >  
    <table class="table datatable table-bordered table-hover text-center">
        <thead>                  
            <tr>
                <th>@lang('Name')</th>
                <th>@lang('Code')</th>
                <th>@lang('Municipality')</th>
                <th>@lang('State')</th>
                <th>@lang('Country')</th>
                <th>@lang('Url')</th>
                <th>@lang('Note')</th>
                <th>@lang('Created At')</th>             
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $parish->name }}</td>
                <td>{{ $parish->code }}</td>
                <td>{{ $parish->municipality->name }}</td>
                <td>{{ $parish->municipality->state->name }}</td>
                <td>{{ $parish->municipality->state->country->name }}</td>
                <td>{{ $parish->url }}</td>
                <td>{{ $parish->note }}</td>
                <td>{{ \Carbon\Carbon::parse($parish->created_at)->diffForHumans() }}</td>
            </tr>
        </tbody>
    </table>
</div>
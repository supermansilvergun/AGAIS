<div class="table-responsive" >  
    <table class="table datatable table-bordered table-hover text-center">
        <thead>                  
            <tr>
                <th>@lang('Name')</th>
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
                <td>{{ $state->name }}</td>
                <td>{{ $state->code }}</td>
                <td>{{ $state->iso }}</td>
                <td>{{ $state->country->name }}</td>
                <td>{{ $state->url }}</td>
                <td>{{ $state->note }}</td>
                <td>{{ \Carbon\Carbon::parse($state->created_at)->diffForHumans() }}</td>
            </tr>
        </tbody>
    </table>
</div>
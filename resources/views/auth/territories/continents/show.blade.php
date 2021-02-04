<div class="table-responsive" >  
    <table class="table datatable table-bordered table-hover text-center">
        <thead>                  
            <tr>
                <th>@lang('Name')</th>
                <th>@lang('Code')</th>
                <th>@lang('Url')</th>
                <th>@lang('Note')</th>
                <th>@lang('Created At')</th>             
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $continent->name }}</td>
                <td>{{ $continent->code }}</td>
                <td>{{ $continent->url }}</td>
                <td>{{ $continent->note }}</td>
                <td>{{ \Carbon\Carbon::parse($continent->created_at)->diffForHumans() }}</td>
            </tr>
        </tbody>
    </table>
</div>
           
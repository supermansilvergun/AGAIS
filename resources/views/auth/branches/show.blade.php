<div class="table-responsive" >   
    <table class="table datatable table-bordered table-hover text-center">
        <thead>                  
            <tr>
                <th>@lang('Name')</th>
                <th>@lang('Code')</th>
                <th>@lang('Branch Display')</th>
                <th>@lang('Url')</th>
                <th>@lang('Note')</th>
                <th>@lang('Created At')</th>             
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $branch->name }}</td>
                <td>{{ $branch->code }}</td>
                <td>{{ $branch->display_name }}</td>
                <td>{{ $branch->url }}</td>
                <td>{{ $branch->note }}</td>
                <td>{{ \Carbon\Carbon::parse($branch->created_at)->diffForHumans() }}</td>
            </tr>
        </tbody>
    </table>
</div>

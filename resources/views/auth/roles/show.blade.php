<div class="table-responsive" >   
    <table class="table datatable table-bordered table-hover text-center">
        <thead>                  
            <tr>
                <th>@lang('Name')</th>
                <th>@lang('Code')</th>
                <th>@lang('Display Name')</th>
                <th>@lang('Url')</th>
                <th>@lang('Note')</th>
                <th>@lang('Created At')</th>             
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $role->name }}</td>
                <td>{{ $role->code }}</td>
                <td>{{ $role->display_name }}</td>
                <td>{{ $role->url }}</td>
                <td>{{ $role->note }}</td>
                <td>{{ \Carbon\Carbon::parse($role->created_at)->diffForHumans() }}</td>
            </tr>
        </tbody>
    </table>
</div>

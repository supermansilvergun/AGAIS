<div class="table-responsive" >   
    <table class="table datatable table-bordered table-hover text-center">
        <thead>                  
            <tr>
                <th>@lang('Name')</th>
                <th>@lang('Code')</th>
                <th>@lang('Acronym')</th>
                <th>@lang('Url')</th>
                <th>@lang('Note')</th>
                <th>@lang('Created At')</th>             
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $document->name }}</td>
                <td>{{ $document->code }}</td>
                <td>{{ $document->acronym }}</td>
                <td>{{ $document->url }}</td>
                <td>{{ $document->note }}</td>
                <td>{{ \Carbon\Carbon::parse($document->created_at)->diffForHumans() }}</td>
            </tr>
        </tbody>
    </table>
</div>

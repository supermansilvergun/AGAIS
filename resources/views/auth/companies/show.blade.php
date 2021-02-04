<div class="table-responsive" >  
    <table class="table datatable table-bordered table-hover text-center">
        <thead>                  
            <tr>
                <th>@lang('Name')</th>
                <th>@lang('Code')</th>
                <th>@lang('rif')</th>
                <th>@lang('Branch')</th>
                <th>@lang('Company Type')</th>
                <th>@lang('Company Scope')</th>
                <th>@lang('Country')</th>
                <th>@lang('State')</th>
                <th>@lang('Address')</th>
                <th>@lang('Email')</th>
                <th>@lang('Phone')</th>
                <th>@lang('Alt. Phone')</th>
                <th>@lang('Url')</th>
                <th>@lang('Note')</th>
                <th>@lang('Created At')</th>             
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $company->name }}</td>
                <td>{{ $company->code }}</td>
                <td>{{ $company->rif }}</td>
                <td>
                    @foreach($company->branches as $branch)
                        {{ $branch->name.', ' }}
                    @endforeach
                </td>
                <td>
                    @if($company->type == 'L')
                        @lang('Local')
                    @elseif($company->type == 'G')
                        @lang('Global')
                    @endif
                </td>
                <td>
                    @if($company->scope == 'M')
                        @lang('Micro')
                    @elseif($company->scope == 'L')
                        @lang('Little')
                    @elseif($company->scope == 'MD')
                        @lang('Middle')
                    @elseif($company->scope == 'MA')
                        @lang('Macro')
                    @endif
                </td>
                <td>
                    @foreach($company->countries as $country)
                        {{ $country->name.', ' }}
                    @endforeach
                </td>
                <td>
                    @foreach($company->states as $state)
                        {{ $state->name.', ' }}
                    @endforeach
                </td>
                <td>{{ $company->address }}</td>
                <td>{{ $company->email }}</td>
                <td>{{ $company->phone }}</td>
                <td>{{ $company->backup_phone }}</td>
                <td>{{ $company->url }}</td>
                <td>{{ $company->note }}</td>
                <td>{{ \Carbon\Carbon::parse($company->created_at)->diffForHumans() }}</td>
            </tr>
        </tbody>
    </table>
</div>
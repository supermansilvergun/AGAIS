@extends('adminlte::page')

@section('title', 'AGAIS | '.__('Employees').'')

@section('content_header')
    <h1 class="m-0 text-dark">@lang('Employees')</h1>
@stop

@section('content')
    <div class="card card-default">
        <div class="card-header">
            <h3 class="card-title">@lang('Employees List')</h3>
        </div>
        <div class="card-body">
            <a id="route" type="hidden" href="{{ route('employees.create') }}"></a>
            <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4 mb-4">
                <div class="dt-buttons btn-group flex-wrap">
                    <button class="btn btn-secondary btn-create" tabindex="0" aria-controls="dataTable" type="button">
                        <span>
                            <i class="fa fa-plus"></i> @lang('Create')
                        </span>
                    </button>
                    <a href="#"  target="_blank" class="btn btn-secondary">
                        <span>
                            <i class="fas fa-print"></i> Print
                        </span>
                    </a>
                </div>
            </div>
            <div class="row d-flex align-items-stretch">
                @foreach($employees as $employee)
                    <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch">
                        <div class="card bg-light">
                            <div class="card-header text-muted border-bottom-0">
                                {{ $employee->contractor }}
                            </div>
                            <div class="card-body pt-0">
                                <div class="row">
                                    <div class="col-7">
                                        <h2 class="lead">
                                            <b>{{ $employee->name." ".$employee->second_name." ".$employee->last_name." ".$employee->second_last_name }}</b>
                                        </h2>
                                        <p class="text-muted text-sm"><b>@lang('Display Name'): </b> 
                                            @foreach($employee->roles as $role)
                                                {{ $role->name }}
                                            @endforeach
                                        </p>
                                        <ul class="ml-4 mb-0 fa-ul text-muted">
                                            <li class="small pb-2">
                                                <span class="fa-li">
                                                    <i class="fas fa-lg fa-id-card"></i>
                                                </span> 
                                                {{ $employee->document->acronym }}: {{ $employee->identification }}
                                            </li>
                                            <li class="small pb-2">
                                                <span class="fa-li">
                                                    <i class="fas fa-lg fa-building"></i>
                                                </span> 
                                                @lang('Address'): {{ $employee->address }}
                                            </li>
                                            <li class="small pb-2">
                                                <span class="fa-li">
                                                    <i class="fas fa-lg fa-phone"></i>
                                                </span> 
                                                @lang('Phone'): {{ $employee->phone }}
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-5 text-center">
                                        <img src="/storage/{{ $employee->avatar }}" alt="" class="img-circle img-fluid">
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="text-right">
                                    <div class="btn-group">
                                        <button href="" type="button" class="btn btn-primary btn-create" title="{{ __('Create') }}"><i class="fa fa-user-plus"></i></button>
                                        <a href="{{ route('employees.edit', $employee) }}" type="button" class="btn btn-primary btn-edit" title="{{ __('Edit') }}"><i class="fa fa-edit"></i></a>
                                        <a href="{{ route('employees.show', $employee) }}" type="button" class="btn btn-primary btn-show" data-toggle="modal" data-target="#modal-show"  title="{{ __('Details') }}"><i class="fa fa-eye"></i></a>
                                        <a href="{{ route('employees.destroy', $employee) }}" type="button" class="btn btn-primary btn-delete" title="{{ __('Delete') }}"><i class="fa fa-trash"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            @include('partials.modal')
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            <nav aria-label="Contacts Page Navigation">
                <div class="pagination justify-content-center m-0">
                    {{ $employees->links() }}
                </div>
            </nav>
        </div>
        <!-- /.card-footer -->
    </div>
@stop
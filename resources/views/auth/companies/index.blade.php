@extends('adminlte::page')

@section('title', 'AGAIS | '.__('Companies').'')

@section('content_header')
    <h1 class="m-0 text-dark">@lang('Companies')</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title">@lang('Companies List')</h3>
                </div>
                <div class="card-body">
                    <a id="route" type="hidden" href="{{ route('companies.create') }}"></a>
                    {{ $dataTable->table([
                        'class' => 'table table-bordered table-hover text-center',
                        'width' => '100%'
                    ], true) }}
                    @include('partials.modal')
                </div>
            </div>
        </div>
    </div>
@stop
@section('js')
    {{ $dataTable->scripts() }}
@stop

@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.all-tasks.title')</h3>
    @can('all_task_create')
    <p>
        <a href="{{ route('admin.all_tasks.create') }}" class="btn btn-success">@lang('quickadmin.qa_add_new')</a>
        
    </p>
    @endcan

    @can('all_task_delete')
    <p>
        <ul class="list-inline">
            <li><a href="{{ route('admin.all_tasks.index') }}" style="{{ request('show_deleted') == 1 ? '' : 'font-weight: 700' }}">@lang('quickadmin.qa_all')</a></li> |
            <li><a href="{{ route('admin.all_tasks.index') }}?show_deleted=1" style="{{ request('show_deleted') == 1 ? 'font-weight: 700' : '' }}">@lang('quickadmin.qa_trash')</a></li>
        </ul>
    </p>
    @endcan


    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_list')
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped {{ count($all_tasks) > 0 ? 'datatable' : '' }} @can('all_task_delete') @if ( request('show_deleted') != 1 ) dt-select @endif @endcan">
                <thead>
                    <tr>
                        @can('all_task_delete')
                            @if ( request('show_deleted') != 1 )<th style="text-align:center;"><input type="checkbox" id="select-all" /></th>@endif
                        @endcan

                        <th>@lang('quickadmin.all-tasks.fields.name')</th>
                        <th>@lang('quickadmin.all-tasks.fields.task-belongs-to')</th>
                        <th>@lang('quickadmin.all-tasks.fields.in-analysis')</th>
                        <th>@lang('quickadmin.all-tasks.fields.in-process')</th>
                        <th>@lang('quickadmin.all-tasks.fields.done')</th>
                        @if( request('show_deleted') == 1 )
                        <th>&nbsp;</th>
                        @else
                        <th>&nbsp;</th>
                        @endif
                    </tr>
                </thead>
                
                <tbody>
                    @if (count($all_tasks) > 0)
                        @foreach ($all_tasks as $all_task)
                            <tr data-entry-id="{{ $all_task->id }}">
                                @can('all_task_delete')
                                    @if ( request('show_deleted') != 1 )<td></td>@endif
                                @endcan

                                <td field-key='name'>{{ $all_task->name }}</td>
                                <td field-key='task_belongs_to'>{{ $all_task->task_belongs_to }}</td>
                                <td field-key='in_analysis'>{{ Form::checkbox("in_analysis", 1, $all_task->in_analysis == 1 ? true : false, ["disabled"]) }}</td>
                                <td field-key='in_process'>{{ Form::checkbox("in_process", 1, $all_task->in_process == 1 ? true : false, ["disabled"]) }}</td>
                                <td field-key='done'>{{ Form::checkbox("done", 1, $all_task->done == 1 ? true : false, ["disabled"]) }}</td>
                                @if( request('show_deleted') == 1 )
                                <td>
                                    @can('all_task_delete')
                                                                        {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'POST',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.all_tasks.restore', $all_task->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_restore'), array('class' => 'btn btn-xs btn-success')) !!}
                                    {!! Form::close() !!}
                                @endcan
                                    @can('all_task_delete')
                                                                        {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.all_tasks.perma_del', $all_task->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_permadel'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                @endcan
                                </td>
                                @else
                                <td>
                                    @can('all_task_view')
                                    <a href="{{ route('admin.all_tasks.show',[$all_task->id]) }}" class="btn btn-xs btn-primary">@lang('quickadmin.qa_view')</a>
                                    @endcan
                                    @can('all_task_edit')
                                    <a href="{{ route('admin.all_tasks.edit',[$all_task->id]) }}" class="btn btn-xs btn-info">@lang('quickadmin.qa_edit')</a>
                                    @endcan
                                    @can('all_task_delete')
{!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.all_tasks.destroy', $all_task->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                    @endcan
                                </td>
                                @endif
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="10">@lang('quickadmin.qa_no_entries_in_table')</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('javascript') 
    <script>
        @can('all_task_delete')
            @if ( request('show_deleted') != 1 ) window.route_mass_crud_entries_destroy = '{{ route('admin.all_tasks.mass_destroy') }}'; @endif
        @endcan

    </script>
@endsection
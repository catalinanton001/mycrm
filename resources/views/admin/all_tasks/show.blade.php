@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.all-tasks.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_view')
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('quickadmin.all-tasks.fields.name')</th>
                            <td field-key='name'>{{ $all_task->name }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.all-tasks.fields.task-belongs-to')</th>
                            <td field-key='task_belongs_to'>{{ $all_task->task_belongs_to }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.all-tasks.fields.in-analysis')</th>
                            <td field-key='in_analysis'>{{ Form::checkbox("in_analysis", 1, $all_task->in_analysis == 1 ? true : false, ["disabled"]) }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.all-tasks.fields.in-process')</th>
                            <td field-key='in_process'>{{ Form::checkbox("in_process", 1, $all_task->in_process == 1 ? true : false, ["disabled"]) }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.all-tasks.fields.done')</th>
                            <td field-key='done'>{{ Form::checkbox("done", 1, $all_task->done == 1 ? true : false, ["disabled"]) }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.all_tasks.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
        </div>
    </div>
@stop



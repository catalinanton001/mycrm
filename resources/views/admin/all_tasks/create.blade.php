@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.all-tasks.title')</h3>
    {!! Form::open(['method' => 'POST', 'route' => ['admin.all_tasks.store']]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_create')
        </div>
        
        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('name', trans('quickadmin.all-tasks.fields.name').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('name', old('name'), ['class' => 'form-control', 'placeholder' => 'Name of Task', 'required' => '']) !!}
                    <p class="help-block">Name of Task</p>
                    @if($errors->has('name'))
                        <p class="help-block">
                            {{ $errors->first('name') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('task_belongs_to', trans('quickadmin.all-tasks.fields.task-belongs-to').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('task_belongs_to', old('task_belongs_to'), ['class' => 'form-control', 'placeholder' => 'Name of user', 'required' => '']) !!}
                    <p class="help-block">Name of user</p>
                    @if($errors->has('task_belongs_to'))
                        <p class="help-block">
                            {{ $errors->first('task_belongs_to') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('in_analysis', trans('quickadmin.all-tasks.fields.in-analysis').'', ['class' => 'control-label']) !!}
                    {!! Form::hidden('in_analysis', 0) !!}
                    {!! Form::checkbox('in_analysis', 1, old('in_analysis', false), []) !!}
                    <p class="help-block"></p>
                    @if($errors->has('in_analysis'))
                        <p class="help-block">
                            {{ $errors->first('in_analysis') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('in_process', trans('quickadmin.all-tasks.fields.in-process').'', ['class' => 'control-label']) !!}
                    {!! Form::hidden('in_process', 0) !!}
                    {!! Form::checkbox('in_process', 1, old('in_process', false), []) !!}
                    <p class="help-block"></p>
                    @if($errors->has('in_process'))
                        <p class="help-block">
                            {{ $errors->first('in_process') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('done', trans('quickadmin.all-tasks.fields.done').'', ['class' => 'control-label']) !!}
                    {!! Form::hidden('done', 0) !!}
                    {!! Form::checkbox('done', 1, old('done', false), []) !!}
                    <p class="help-block"></p>
                    @if($errors->has('done'))
                        <p class="help-block">
                            {{ $errors->first('done') }}
                        </p>
                    @endif
                </div>
            </div>
            
        </div>
    </div>

    {!! Form::submit(trans('quickadmin.qa_save'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop


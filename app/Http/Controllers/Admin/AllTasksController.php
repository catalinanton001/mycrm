<?php

namespace App\Http\Controllers\Admin;

use App\AllTask;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreAllTasksRequest;
use App\Http\Requests\Admin\UpdateAllTasksRequest;

class AllTasksController extends Controller
{
    /**
     * Display a listing of AllTask.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('all_task_access')) {
            return abort(401);
        }


        if (request('show_deleted') == 1) {
            if (! Gate::allows('all_task_delete')) {
                return abort(401);
            }
            $all_tasks = AllTask::onlyTrashed()->get();
        } else {
            $all_tasks = AllTask::all();
        }

        return view('admin.all_tasks.index', compact('all_tasks'));
    }

    /**
     * Show the form for creating new AllTask.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('all_task_create')) {
            return abort(401);
        }
        return view('admin.all_tasks.create');
    }

    /**
     * Store a newly created AllTask in storage.
     *
     * @param  \App\Http\Requests\StoreAllTasksRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAllTasksRequest $request)
    {
        if (! Gate::allows('all_task_create')) {
            return abort(401);
        }
        $all_task = AllTask::create($request->all());



        return redirect()->route('admin.all_tasks.index');
    }


    /**
     * Show the form for editing AllTask.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('all_task_edit')) {
            return abort(401);
        }
        $all_task = AllTask::findOrFail($id);

        return view('admin.all_tasks.edit', compact('all_task'));
    }

    /**
     * Update AllTask in storage.
     *
     * @param  \App\Http\Requests\UpdateAllTasksRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAllTasksRequest $request, $id)
    {
        if (! Gate::allows('all_task_edit')) {
            return abort(401);
        }
        $all_task = AllTask::findOrFail($id);
        $all_task->update($request->all());



        return redirect()->route('admin.all_tasks.index');
    }


    /**
     * Display AllTask.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('all_task_view')) {
            return abort(401);
        }
        $all_task = AllTask::findOrFail($id);

        return view('admin.all_tasks.show', compact('all_task'));
    }


    /**
     * Remove AllTask from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('all_task_delete')) {
            return abort(401);
        }
        $all_task = AllTask::findOrFail($id);
        $all_task->delete();

        return redirect()->route('admin.all_tasks.index');
    }

    /**
     * Delete all selected AllTask at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('all_task_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = AllTask::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }


    /**
     * Restore AllTask from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        if (! Gate::allows('all_task_delete')) {
            return abort(401);
        }
        $all_task = AllTask::onlyTrashed()->findOrFail($id);
        $all_task->restore();

        return redirect()->route('admin.all_tasks.index');
    }

    /**
     * Permanently delete AllTask from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function perma_del($id)
    {
        if (! Gate::allows('all_task_delete')) {
            return abort(401);
        }
        $all_task = AllTask::onlyTrashed()->findOrFail($id);
        $all_task->forceDelete();

        return redirect()->route('admin.all_tasks.index');
    }
}

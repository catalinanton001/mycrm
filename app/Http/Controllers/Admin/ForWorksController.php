<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;

class ForWorksController extends Controller
{
    public function index()
    {
        if (! Gate::allows('for_work_access')) {
            return abort(401);
        }
        return view('admin.for_works.index');
    }
}

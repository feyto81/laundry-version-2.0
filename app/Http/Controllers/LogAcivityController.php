<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\User;

class LogAcivityController extends Controller
{

    public function log()
    {
        $logs = DB::table('log_activity')
            ->leftJoin('users', 'log_activity.user_id', '=', 'users.id')
            ->select('log_activity.*', 'users.name')
            ->get();
        $user = User::all();
        $logs = \LogActivity::logActivityLists();
        return view('admin.logactivity.index', compact('logs', 'user'));
    }
}

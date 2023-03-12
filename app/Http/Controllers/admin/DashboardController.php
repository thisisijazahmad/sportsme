<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
class DashboardController extends Controller
{
    public function index()
    {
        $programs_count = DB::table('programs')->count();
        $messages = DB::table('messages')->count();
        $users = DB::table('users')->count();
        $active = 'dashboard';
        return view('admin.dashboard',compact('programs_count','active','messages','users'));
    }
    public function messagesList()
    {
        $messages = DB::table('messages')->select('users.*','messages.message')->leftjoin('users','users.id','messages.commenter_id')->paginate(10);
        return view('admin.setting.message',compact('messages'));
    }
    public function usersList()
    {
        $users = DB::table('users')->paginate(10);
        return view('admin.setting.users',compact('users'));
    }
}

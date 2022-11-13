<?php

namespace App\Http\Controllers;

use App\DataTables\GroupsDataTable;
use App\DataTables\GroupUsersDataTable;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class GroupsController extends Controller
{
    //
    public function store()
    {
    }

    //
    public function index(GroupsDataTable $dataTable)
    {
        return $dataTable->render('groups.index');
    }
    //
    public function users()
    {
        $users = Auth::user()->group->users;
        return view('groups.users', compact('users'));
    }

    public function toggleActive(User $user)
    {
        $user->active = !$user->active;
        $user->save();
        return redirect(route('groups.users'));
    }
}

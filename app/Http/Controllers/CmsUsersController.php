<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Outlet;
use Hash;
use File;
use DB;
use Spatie\Permission\Models\Role;

class CmsUsersController extends Controller
{
    public function index()
    {
        $data['page_title'] = "User Management";
        $data['page_sub_title'] = "Users";
        $data['user'] = User::all();
        return view('admin.user.index', $data);
    }

    public function create()
    {
        $data['page_title'] = "User Management";
        $data['page_sub_title'] = "Add New User";
        $data['outlet'] = Outlet::all();
        $data['roles'] = Role::all();
        return view('admin.user.add', $data);
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:2|max:20',
            'username' => 'required|min:2|max:20',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:5|max:20',
            'photo' => 'required',
            'outlet_id' => 'required',
            'role' => 'required|string|exists:roles,name',
            'status' => 'required',
        ]);
        $user = new User;
        $user->name = $request->name;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->outlet_id = $request->outlet_id;

        $user->status = $request->status;
        $photo = $request->file('photo');
        $tujuan_upload = 'avatar';
        $photo_name = time() . "_" . $photo->getClientOriginalName();
        $photo->move($tujuan_upload, $photo_name);
        $user->photo = $photo_name;
        $user->save();
        $user->syncRoles([$request->role]);
        if ($request->submit == "more") {
            return redirect()->route('cms_users.create')->with(['success' => 'User has been saved !']);
        } else {
            return redirect()->route('cms_users.index')->with(['success' => 'User has been saved']);
        };
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        File::delete('avatar/' . $user->photo);
        $user->delete();
        return redirect()->back()->with(['success' => 'User has been deleted']);
    }
    public function edit($id)
    {
        $data['page_title'] = "User Management";
        $data['page_sub_title'] = "Edit User";
        $data['outlet'] = Outlet::all();
        $data['roles'] = Role::all();
        $data['user'] = User::findOrFail($id);
        return view('admin.user.edit', $data);
    }
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|min:2|max:20',
            'username' => 'required|min:2|max:20',
            'email' => 'required|email',
            'outlet_id' => 'required',
            'role' => 'required|string|exists:roles,name',
            'status' => 'required',
        ]);
        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->outlet_id = $request->outlet_id;
        $user->status = $request->status;
        if ($request->get('password') != '') {
            $user->password = Hash::make($request->password);
        }
        if ($request->file('photo') != '') {
            File::delete('avatar/' . $user->photo);
            $photo = $request->file('photo');
            $tujuan_upload = 'avatar';
            $photo_name = time() . "_" . $photo->getClientOriginalName();
            $photo->move($tujuan_upload, $photo_name);
            $user->photo = $photo_name;
        }

        $result = $user->save();
        $user->syncRoles([$request->role]);
        // dd($user);
        if ($result) {
            return redirect()->route('cms_users.index')->with(['success' => 'User has been updated']);
        } else {
            return redirect()->back();
        }
    }

    public function active($id)
    {
        DB::table('users')
            ->where('id', $id)
            ->update(['status' => 1]);
        return redirect()->route('cms_users.index')->with(['success' => 'User has been unactive']);
    }

    public function unactive($id)
    {
        DB::table('users')
            ->where('id', $id)
            ->update(['status' => 0]);
        return redirect()->route('cms_users.index')->with(['success' => 'User has been active']);
    }
}

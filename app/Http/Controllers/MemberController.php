<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;

class MemberController extends Controller
{
    public function index()
    {
        $data['page_title'] = "Member";
        $data['page_sub_title'] = "Member";
        $data['member'] = Member::paginate();
        return view('admin.member.index', $data);
    }

    public function create()
    {
        $data['page_title'] = "Member";
        $data['page_sub_title'] = "Add New Member";
        return view('admin.member.add', $data);
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:2|max:20',
            'address' => 'required|min:2|max:20',
            'phone_number' => 'required|min:2|max:20',
        ]);
        $member = new Member;
        $member->name = $request->name;
        $member->address = $request->address;
        $member->phone_number = $request->phone_number;
        $member->gender = $request->gender;
        $member->save();
        if ($request->submit == "more") {
            return redirect()->route('member.create')->with(['success' => 'Member has been saved !']);
        } else {
            return redirect()->route('member.index')->with(['success' => 'Member has been saved']);
        };
    }

    public function destroy($id)
    {
        $member = Member::findOrFail($id);
        $member->delete();
        return redirect()->back()->with(['success' => 'Member has been deleted']);
    }

    public function edit($id)
    {
        $data['page_title'] = "Member";
        $data['page_sub_title'] = "Edit Member";
        $data['member'] = Member::findOrFail($id);
        return view('admin.member.edit', $data);
    }
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|min:2|max:20',
            'address' => 'required|min:2|max:20',
            'phone_number' => 'required|min:2|max:20',
            'gender' => 'required',
        ]);
        $member = Member::findOrFail($id);
        $member->name = $request->name;
        $member->address = $request->address;
        $member->phone_number = $request->phone_number;
        $member->gender = $request->gender;
        $result = $member->save();
        // dd($user);
        if ($result) {
            return redirect()->route('member.index')->with(['success' => 'Member has been updated']);
        } else {
            return redirect()->back();
        }
    }
}

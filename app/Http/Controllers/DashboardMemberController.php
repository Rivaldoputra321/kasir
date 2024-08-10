<?php

namespace App\Http\Controllers;

use App\Models\customer;
use Illuminate\Http\Request;

class DashboardMemberController extends Controller
{
    public function index()
    {
        
        return view('dashboard.dashboard_member.dashboard_member_index', [
            'members' => customer::all(),
        ]);

    }

    public function create()
    {
        return view('dashboard.dashboard_member.dashboard_member_add');
    }

    public function store(Request $request)
    {

        $validate = $request->validate([
            'name' => 'required|string|unique:customers,name',
            'alamat'=> 'required|string',
            'no_telp'=> 'required|unique:customers,no_telp',
        ]);

        $member = customer::create($request->all());
        return redirect()->route('dashboard_member.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function edit(string $name)
    {
        return view('dashboard.dashboard_member.dashboard_member_edit', [
            'member' => customer::where('name', $name)->firstOrFail(),
        ]);
    }

    public function update(Request $request, string $id)
    {
        $member = customer::findOrFail($id);
        
        $request->validate([
            'name' => 'required|string|max:255|unique:customers,name,' . $member->id,
            'alamat' => 'required',
            'no_telp' => 'required',            
        ]);


        $member->update($request->all());

        return redirect()->route('dashboard_member.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    

    /**
     * Update the specified resource in storage.
     */


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        customer::findOrFail($id)->delete();

        return redirect()->route('dashboard_member.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use Illuminate\Http\Request;

class BranchesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $branches = Branch::all();
        return view('branches.index', compact('branches'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('branches.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        if (auth()->user()->is_admin) {
            $this->validate($request, [
                'name' => 'required',
            ]);

            $branch = new Branch;
            $branch->name = $request->name;
            $branch->address = $request->address;
            $branch->save();

            session()->flash('success', '300');
            return redirect()->route('branches.index')->with('success', 'Created successfully!');
        } else {
            session()->flash('fail', '404');
            return redirect()->route('dashboard');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $branch = Branch::find($id);
        return view('branches.show', compact('branch'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (auth()->user()) {
            $branch = Branch::find($id);
            return view('branches.edit', compact('branch'));
        } else {
            session()->flash('fail', '404');
            return redirect()->route('dashboard');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (auth()->user()->is_admin) {
            $this->validate($request, [
                'name' => 'required',
            ]);

            $branch = Branch::find($id);
            $branch->name = $request->name;
            $branch->address = $request->address;

            $branch->update();
            $branch->save();

            session()->flash('success', '300');
            return redirect()->route('branches.index')->with('success', 'Updated successfully!');
        } else {
            session()->flash('fail', '404');
            return redirect()->route('dashboard');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (auth()->user()->is_admin) {
            $branch = Branch::find($id);
            $branch->delete();
            session()->flash('success', '300');
            return redirect()->route('branches.index')->with('success', 'Deleted Successfully!');
        } else {
            session()->flash('fail', '404');
            return redirect()->route('dashboard');
        }
    }
}

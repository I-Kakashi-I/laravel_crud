<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\Department;
use App\Models\Employee;
use App\Rules\PhoneNumber;
use Illuminate\Http\Request;

class EmployeesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::all();
        return view('employees.index', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $branches = Branch::get(['name', 'id']);
        $departments = Department::get(['name', 'id']);
        return view('employees.create', compact('branches', 'departments'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'number' => 'required|numeric|digits_between:10,11'
        ]);
//        'number' => ['required',new PhoneNumber ,'digits_between:10,20']
//        Employee::query()->create($request->only('name','email','birthday','number','position','address','gender','branch_id'));
        $employee = new Employee;
        $employee->name = $request->name;
        $employee->email = $request->email;
        $employee->birthday = $request->birthday;
        $employee->number = $request->number;
        $employee->position = $request->position;
        $employee->address = $request->address;
        $employee->gender = $request->gender;
        $employee->branch_id = $request->branch_id;
        $employee->department_id = $request->department_id;
        $employee->has_license = $request->has('has_license');
        $employee->save();

        session()->flash('success', '300');
        return redirect()->route('employee.index')->with('success', 'Created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $employee = Employee::find($id);
        return view('employees.show', compact('employee'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $employee = Employee::find($id);
        $branches = Branch::select('name','id')->get();
        $departments = Department::select('name','id')->get();
        return view('employees.edit', compact('employee','departments','branches'));
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
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'number' => 'required|numeric|digits_between:10,11'
        ]);

        $employee = Employee::find($id);
        $employee->name = $request->name;
        $employee->email = $request->email;
        $employee->birthday = $request->birthday;
        $employee->number = $request->number;
        $employee->position = $request->position;
        $employee->address = $request->addr;
        $employee->gender = $request->gender;
        $employee->branch_id = $request->branch_id;
        $employee->department_id = $request->department_id;
        $employee->has_license = $request->has_license;
        $employee->save();

        $employee->update();
        $employee->save();

        session()->flash('success', '300');
        return redirect()->route('employee.index')->with('success', 'Created successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return string
     */
    public function destroy($id)
    {
        $employee = Employee::find($id);
        $employee->delete();
        session()->flash('success', '300');
        return redirect()->route('employee.index')->with('success', 'Deleted Successfully!');
    }
}

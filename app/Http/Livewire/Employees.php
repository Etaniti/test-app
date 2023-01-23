<?php

namespace App\Http\Livewire;

use App\Classes\EmployeeHandler;
use Livewire\Component;
use Illuminate\Http\Request;
use App\Http\Requests\Employee\CreateRequest;
use App\Http\Requests\Employee\UpdateRequest;
use App\Models\Employee;

class Employees extends Component
{
    public $employees, $organization_id, $firstname, $middlename, $lastname, $birthdate, $inn, $snils;
    public $updateMode = false;

    public function create($organization_id)
    {
        return view("/organization/{{ $organization_id }}", compact('organization_id'));
    }

    public function store(CreateRequest $request)
    {
        $employee = new EmployeeHandler();
        return $employee->store($request);
    }

    public function show($id)
    {
        $employee = Employee::find($id);
        return view('employees.show', compact('employee'));
    }

    public function update(UpdateRequest $request, $id)
    {
        $employee = new EmployeeHandler();
        return $employee->update($request, $id);
    }

    public function delete($id)
    {
        $employee = Employee::where('id', $id)->firstOrFail();
        return view('livewire.employees.delete', compact('employee'));
    }

    public function destroy($id)
    {
        $employee = new EmployeeHandler();
        return $employee->destroy($id);
    }
}

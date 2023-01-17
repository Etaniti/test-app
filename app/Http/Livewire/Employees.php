<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Http\Request;
use App\Http\Livewire\Field;
use App\Models\Organization;
use App\Models\Employee;

class Employees extends Component
{
    public $employees, $organization_id, $firstname, $middlename, $lastname, $birthdate, $inn, $snils;
    public $updateMode = false;

    public function create($organization_id)
    {
        return view("/organization/{{ $organization_id }}", compact('organization_id'));
    }

    public function store(Request $request)
    {
        $data = $request->validate(
            [
                'firstname' => ['required', 'string', 'max:50'],
                'middlename' => ['required', 'string', 'max:50'],
                'lastname' => ['required', 'string', 'max:50'],
                'birthdate' => ['required', 'date'],
                'inn' => ['required', 'integer', 'digits:12', 'unique:employees'],
                'snils' => ['required', 'integer', 'digits:11', 'unique:employees']
            ],
            [
                'firstname' => 'Значение поля некорректно.',
                'middlename' => 'Значение поля некорректно.',
                'lastname' => 'Значение поля некорректно.',
                'birthdate' => 'Значение поля некорректно.',
                'inn' => 'Значение поля некорректно.',
                'snils' => 'Значение поля некорректно.'
            ]
        );

        Employee::create([
            'organization_id' => $request->organization_id,
            'firstname' => $request->firstname,
            'middlename' => $request->middlename,
            'lastname' => $request->lastname,
            'birthdate' => $request->birthdate,
            'inn' => $request->inn,
            'snils' => $request->snils
        ]);

        return back()->with('success', 'Сотрудник успешно добавлен.');

        $this->dispatchBrowserEvent('refresh-page');
    }

    public function show($id)
    {
        $employee = Employee::find($id);
        return view('employees.show', compact('employee'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate(
            [
                'firstname' => ['required', 'string', 'max:50'],
                'middlename' => ['required', 'string', 'max:50'],
                'lastname' => ['required', 'string', 'max:50'],
                'birthdate' => ['required', 'date'],
                'inn' => ['required', 'integer', 'digits:12'],
                'snils' => ['required', 'integer', 'digits:11']
            ],
            [
                'firstname' => 'Значение поля некорректно.',
                'middlename' => 'Значение поля некорректно.',
                'lastname' => 'Значение поля некорректно.',
                'birthdate' => 'Значение поля некорректно.',
                'inn' => 'Значение поля некорректно.',
                'snils' => 'Значение поля некорректно.'
            ]
        );

        $employee = Employee::whereId($id)->update([
            'organization_id' => $request->organization_id,
            'firstname' => $request->firstname,
            'middlename' => $request->middlename,
            'lastname' => $request->lastname,
            'birthdate' => $request->birthdate,
            'inn' => $request->inn,
            'snils' => $request->snils
        ]);

        return back()->with('success', 'Изменения сохранены.');

        $this->updateMode = false;
    }

    public function delete($id)
    {
        $employee = Employee::where('id', $id)->firstOrFail();
        return view('livewire.employees.delete', compact('employee'));
    }

    public function destroy($id)
    {
        $employee = Employee::where('id', $id)->firstOrFail();
        $employee->delete();

        return redirect("/")->with('success', 'Сотрудник удален.');
    }
}

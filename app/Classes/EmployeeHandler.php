<?php

namespace App\Classes;

use Illuminate\Http\Request;
use App\Http\Requests\Employee\CreateRequest;
use App\Http\Requests\Employee\UpdateRequest;
use App\Models\Employee;

class EmployeeHandler
{
    public function store(CreateRequest $request)
    {
        $data = $request->validated();

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

    public function update(UpdateRequest $request, $id)
    {
        $data = $request->validated();

        $employee = Employee::whereId($id)->update($data);

        return back()->with('success', 'Изменения сохранены.');

        $this->updateMode = false;
    }

    public function destroy($id)
    {
        $employee = Employee::where('id', $id)->firstOrFail();
        $employee->delete();

        return redirect("/")->with('success', 'Сотрудник удален.');
    }
}

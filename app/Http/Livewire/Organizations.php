<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use Illuminate\Http\Request;
use App\Http\Livewire\Field;
use App\Models\Organization;
use App\Models\Employee;

class Organizations extends Component
{
    public $organizations, $name, $ogrn, $oktmo;
    public $showCreateInputs = false;
    public $showUpdateInputs = false;
    public $updateMode = false;

    public function render()
    {
        $organizations = Organization::all();
        /* $organizations = Organization::sortByDesc('created_at', 'desc')->latest()->simplePaginate(10); */

        return view('livewire.organizations.index', compact('organizations'));
    }

    public function index()
    {
        $organizations = Organization::all();
        return view('home', compact('organizations'));
    }

    public function store(Request $request)
    {
        $data = $request->validate(
            [
                'name' => ['required', 'string', 'max:100'],
                'ogrn' => ['required', 'integer', 'digits:13', 'unique:organizations'],
                'oktmo' => ['required', 'integer', 'digits:11', 'unique:organizations'],
            ],
            [
                'name' => 'Значение поля некорректно.',
                'ogrn' => 'Значение поля некорректно.',
                'oktmo' => 'Значение поля некорректно.',
            ]
        );

        Organization::create([
            'name' => $request->name,
            'ogrn' => $request->ogrn,
            'oktmo' => $request->oktmo
        ]);

        return back()->with('success', 'Организация успешно добавлена.');

        $this->dispatchBrowserEvent('refresh-page');
    }

    public function show($id)
    {
        $organization = Organization::findOrFail($id);
        /* $employees = Employee::where('organization_id', $id)->get(); */
        /* $employees = Employee::find($id == $organization->id)->get(); */
        /* dd($employees); */
        return view('organization.show', compact('organization'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate(
            [
                'name' => ['required', 'string', 'max:100'],
                'ogrn' => ['required', 'integer', 'digits:13'],
                'oktmo' => ['required', 'integer', 'digits:11'],
            ],
            [
                'name' => 'Значение поля некорректно.',
                'ogrn' => 'Значение поля некорректно.',
                'oktmo' => 'Значение поля некорректно.',
            ]
        );

        $organization = Organization::whereId($id)->update([
            'name' => $request->name,
            'ogrn' => $request->ogrn,
            'oktmo' => $request->oktmo
        ]);

        return back()->with('success', 'Изменения сохранены.');

        $this->updateMode = false;
    }

    public function delete($id)
    {
        $organization = Organization::where('id', $id)->firstOrFail();
        return view('livewire.organizations.delete', compact('organization'));
    }

    public function destroy($id)
    {
        $organization = Organization::where('id', $id)->firstOrFail();
        $organization->employees()->delete();
        $organization->delete();

        return redirect("/")->with('success', 'Организация удалена.');
    }
}

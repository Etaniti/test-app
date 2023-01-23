<?php

namespace App\Http\Livewire;

use App\Classes\OrganizationHandler;
use Livewire\Component;
use Illuminate\Http\Request;
use App\Http\Requests\Organization\CreateRequest;
use App\Http\Requests\Organization\UpdateRequest;
use App\Models\Organization;

class Organizations extends Component
{
    public $organizations, $name, $ogrn, $oktmo;
    public $showCreateInputs = false;
    public $showUpdateInputs = false;
    public $updateMode = false;

    public function render()
    {
        $organizations = Organization::all();
        return view('livewire.organizations.index', compact('organizations'));
    }

    public function index()
    {
        $organizations = Organization::all();
        return view('home', compact('organizations'));
    }

    public function store(CreateRequest $request)
    {
        $organization = new OrganizationHandler();
        return $organization->store($request);
    }

    public function show($id)
    {
        $organization = Organization::findOrFail($id);
        return view('organizations.show', compact('organization'));
    }

    public function update(UpdateRequest $request, $id)
    {
        $organization = new OrganizationHandler();
        return $organization->update($request, $id);
    }

    public function delete($id)
    {
        $organization = Organization::where('id', $id)->firstOrFail();
        return view('livewire.organizations.delete', compact('organization'));
    }

    public function destroy($id)
    {
        $organization = new OrganizationHandler();
        return $organization->destroy($id);
    }
}

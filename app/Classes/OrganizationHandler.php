<?php

namespace App\Classes;

use Illuminate\Http\Request;
use App\Http\Requests\Organization\CreateRequest;
use App\Http\Requests\Organization\UpdateRequest;
use App\Models\Organization;

class OrganizationHandler
{
    public function store(CreateRequest $request)
    {
        $data = $request->validated();

        Organization::create($data);

        return back()->with('success', 'Организация успешно добавлена.');

        $this->dispatchBrowserEvent('refresh-page');
    }

    public function update(UpdateRequest $request, $id)
    {
        $data = $request->validated();

        $organization = Organization::whereId($id)->update($data);

        return back()->with('success', 'Изменения сохранены.');

        $this->updateMode = false;
    }

    public function destroy($id)
    {
        $organization = Organization::where('id', $id)->firstOrFail();
        $organization->employees()->delete();
        $organization->delete();

        return redirect("/")->with('success', 'Организация удалена.');
    }
}

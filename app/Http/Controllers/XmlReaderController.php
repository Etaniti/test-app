<?php

namespace App\Http\Controllers;

use App\Models\Organization;
use App\Models\Employee;
use Illuminate\Http\Request;

class XmlReaderController extends Controller
{
    public function index(Request $request)
    {
        if ($request->isMethod('POST')) {
            $xmlDataString = file_get_contents($request->xmlFile);
            $xmlObject = simplexml_load_string($xmlDataString);

            foreach ($xmlObject as $org) {
                $organization = new Organization();
                $organization->name = $org['name'];
                $organization->ogrn = $org['ogrn'];
                $organization->oktmo = $org['oktmo'];
                $organization->save();

                foreach ($org as $item) {
                    $employee = new Employee();
                    $employee->firstname = $item['firstname'];
                    $employee->middlename = $item['middlename'];
                    $employee->lastname = $item['lastname'];
                    $employee->birthdate = $item['birthdate'];
                    $employee->inn = $item['inn'];
                    $employee->snils = $item['snils'];
                    $employee->organization_id = $organization->id;
                    $employee->save();
                }
            }

            return back()->with('success', 'Данные сохранены успешно!');
        }
    }
}

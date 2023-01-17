@extends('layouts.app')

@section('content')
    <div class="container">
        <div>
            <div class="d-flex flex-row justify-content-between mt-2">
                <h3>Организация "{{ $organization->name }}"</h3>
                <a href="/" class="row btn btn-outline-primary d-inline-block px-5 py-2">Назад</a>
            </div>
            <div class="mt-4">
                <table class="table table-sm table-bordered table-hover">
                    <thead>
                        <tr>
                            <th class="text-center align-middle" rowspan="3">
                                Наименование организации
                            </th>
                            <th class="text-center align-middle" rowspan="3">
                                Основной государственный <br>
                                регистрационный номер (ОГРН)
                            </th>
                            <th class="text-center align-middle" rowspan="3">
                                Общероссийский классификатор территорий <br>
                                муниципальных образований (ОКТМО)
                            </th>
                        </tr>
                    </thead>
                    <tbody class="border-top-0">
                        <tr>
                            <td class="text-center align-middle">
                                {{ $organization->name }}
                            </td>
                            <td class="text-center align-middle">
                                {{ $organization->ogrn }}
                            </td>
                            <td class="text-center align-middle">
                                {{ $organization->oktmo }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="d-flex justify-content-center row">
                @include('livewire.organizations.update', ['organization' => $organization])
                @include('livewire.organizations.delete', ['organization' => $organization])
            </div>
            <div class="mt-5">
                <h4>Сотрудники организации "{{ $organization->name }}"</h4>
                <table class="table table-sm table-hover">
                    <thead>
                        <tr>
                            <th class="text-center align-middle">№</th>
                            <th class="text-center align-middle">Фамилия</th>
                            <th class="text-center align-middle">Имя</th>
                            <th class="text-center align-middle">Отчество</th>
                            <th class="text-center align-middle">Дата рождения</th>
                            <th class="text-center align-middle">Идентификационный номер<br>
                                налогоплательщика (ИНН)</th>
                            <th class="text-center align-middle">Страховой номер индивидуального<br>
                                лицевого счёта (СНИЛС)</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($organization->employees as $employee)
                            <tr>
                                <td class="text-center align-middle">{{ $loop->iteration }}</td>
                                <td class="text-center align-middle">{{ $employee->firstname }}</td>
                                <td class="text-center align-middle">{{ $employee->middlename }}</td>
                                <td class="text-center align-middle">{{ $employee->lastname }}</td>
                                <td class="text-center align-middle">{{ date('d-m-Y', strtotime($employee->birthdate)) }}
                                </td>
                                <td class="text-center align-middle">{{ $employee->inn }}</td>
                                <td class="text-center align-middle">{{ $employee->snils }}</td>
                                <td class="text-center align-middle">
                                    <a href="/employee/{{ $employee->id }}" class="text-primary">
                                        <button type="button"class="btn btn-outline-primary">Показать</button>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="d-flex justify-content-center row">
                    @include('livewire.employees.create', ['organization' => $organization])
                    {{-- <a href="/organization/{{ $organization->id }}/update" class="btn btn-outline-primary col-12 p-3 mb-2">
                        <span>Редактировать организацию</span>
                    </a> --}}
                </div>
            </div>
        </div>
    </div>
@endsection

@extends('layouts.app')

@section('content')
    <div class="container">
        <div>
            <div class="d-flex flex-row justify-content-between mt-2">
                <h3>Сотрудник {{ $employee->lastname }} {{ $employee->firstname }} {{ $employee->middlename }}</h3>
                <a href="/" class="row btn btn-outline-primary d-inline-block px-5 py-2">Назад</a>
            </div>
            <div class="mt-5">
                <table class="table table-sm table-hover">
                    <thead>
                        <tr>
                            <th class="text-center align-middle">Фамилия</th>
                            <th class="text-center align-middle">Имя</th>
                            <th class="text-center align-middle">Отчество</th>
                            <th class="text-center align-middle">Дата рождения</th>
                            <th class="text-center align-middle">Идентификационный номер<br>
                                налогоплательщика (ИНН)</th>
                            <th class="text-center align-middle">Страховой номер индивидуального<br>
                                лицевого счёта (СНИЛС)</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-center align-middle">{{ $employee->lastname }}</td>
                            <td class="text-center align-middle">{{ $employee->firstname }}</td>
                            <td class="text-center align-middle">{{ $employee->middlename }}</td>
                            <td class="text-center align-middle">{{ date('d-m-Y', strtotime($employee->birthdate)) }}
                            </td>
                            <td class="text-center align-middle">{{ $employee->inn }}</td>
                            <td class="text-center align-middle">{{ $employee->snils }}</td>
                        </tr>
                    </tbody>
                </table>
                <div class="d-flex justify-content-center row">
                    @include('livewire.employees.update', ['employee' => $employee])
                    @include('livewire.employees.delete', ['employee' => $employee])
                </div>
            </div>
        </div>
    </div>
@endsection

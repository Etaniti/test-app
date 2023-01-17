<div class="container">
    <div class="d-flex justify-content-center row ms-4 mt-3 mb-2">
        <button id="add_org_inputs" type="button" name="add" class="btn btn-outline-primary p-2"
            onclick="showUpdateInputs();">
            <span>Редактировать сотрудника</span>
        </button>
    </div>
    <div class="d-flex justify-content-center">
        <div id="updateForm" class="hidden my-4">
            <form action="/employees/{{ $employee->id }}" enctype="multipart/form-data" method="POST">
                @csrf
                @method('PATCH')
                <div class="card col-12 px-4 py-3">
                    <div class="card-body">
                        <div class="row justify-content-end">
                            <button type="button" class="btn-close" aria-label="Close" onclick="hideUpdateInputs();"></button>
                        </div>
                        <h4 class="card-title mb-4">Редактирование сотрудника </h4>

                        <div class="mb-3">
                            <label for="lastname" class="col-form-label fw-bold">Фамилия</label>
                            <input type="text" name="organization_id" value="{{ $employee->organization_id }}" hidden />
                            <input type="text" class="form-control" wire:model="lastname" name="lastname"
                            value="{{ $employee->lastname }}" autocomplete="ogrn" autofocus>
                            @error('lastname')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <!--Фамилия-->

                        <div class="mb-3">
                            <label for="firstname" class="col-form-label fw-bold">Имя</label>
                            <input type="text" class="form-control" wire:model="firstname" name="firstname"
                            value="{{ $employee->firstname }}" autocomplete="ogrn" autofocus>
                            @error('firstname')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <!--Имя-->

                        <div class="mb-3">
                            <label for="middlename" class="col-form-label fw-bold">Отчество</label>
                            <input type="text" class="form-control" wire:model="middlename" name="middlename"
                            value="{{ $employee->middlename }}" autocomplete="ogrn" autofocus>
                            @error('middlename')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <!--Отчество-->

                        <div class="mb-3">
                            <label for="birthdate" class="col-form-label fw-bold">Дата рождения</label>
                            <input type="date" class="form-control" wire:model="birthdate" name="birthdate"
                                value="{{ $employee->birthdate }}">
                            @error('birthdate')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <!--Дата рождения-->

                        <div class="mb-3">
                            <label for="inn" class="col-form-label fw-bold">Идентификационный номер
                                налогоплательщика (ИНН)</label>
                            <input type="text" class="form-control" wire:model="inn" name="inn"
                            value="{{ $employee->inn }}" autocomplete="ogrn" autofocus>
                            @error('inn')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <!--ИНН-->

                        <div class="mb-5">
                            <label for="snils" class="col-form-label fw-bold">Страховой номер индивидуального
                                лицевого счёта (СНИЛС)</label>
                            <input type="text" class="form-control" wire:model="snils" name="snils"
                            value="{{ $employee->snils }}" autocomplete="ogrn" autofocus>
                            @error('snils')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <!--СНИЛС-->

                        <div class="row">
                            <button type="submit" class="btn btn-outline-primary p-3">
                                Сохранить изменения
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    function showUpdateInputs() {
        document.getElementById('updateForm').style.display = 'block';
    }

    function hideUpdateInputs() {
        document.getElementById('updateForm').style.display = 'none';
    }
</script>

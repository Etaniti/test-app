<div class="container">
    <div class="d-flex justify-content-center row ms-4 mt-3 mb-2">
        <button id="add_org_inputs" type="button" name="add" class="btn btn-outline-primary p-3"
            onclick="showCreateInputs();">
            <span>Добавить сотрудника</span>
        </button>
    </div>
    <div class="d-flex justify-content-center mb-5">
        <div id="createForm" class="hidden my-4">
            <form action="/employees" enctype="multipart/form-data" method="POST">
                @csrf
                <div class="card col-12 px-4 py-3">
                    <div class="card-body">
                        <div class="row justify-content-end">
                            <button type="button" class="btn-close" aria-label="Close" onclick="hideCreateInputs();"></button>
                        </div>
                        <h4 class="card-title mb-4">Добавление сотрудника</h4>

                        <div class="mb-3">
                            <label for="lastname" class="col-form-label fw-bold">Фамилия</label>
                            <input type="text" name="organization_id" value="{{ $organization->id }}" hidden />
                            <input type="text" class="form-control" wire:model="lastname" name="lastname">
                            @error('lastname')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <!--Фамилия-->

                        <div class="mb-3">
                            <label for="firstname" class="col-form-label fw-bold">Имя</label>
                            <input type="text" class="form-control" wire:model="firstname" name="firstname">
                            @error('firstname')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <!--Имя-->

                        <div class="mb-3">
                            <label for="middlename" class="col-form-label fw-bold">Отчество</label>
                            <input type="text" class="form-control" wire:model="middlename" name="middlename">
                            @error('middlename')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <!--Отчество-->

                        <div class="mb-3">
                            <label for="birthdate" class="col-form-label fw-bold">Дата рождения</label>
                            <input type="date" class="form-control" wire:model="birthdate" name="birthdate"
                                value="{{ Carbon\Carbon::now()->toDateString() }}">
                            @error('birthdate')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <!--Дата рождения-->

                        <div class="mb-3">
                            <label for="inn" class="col-form-label fw-bold">Идентификационный номер
                                налогоплательщика (ИНН)</label>
                            <input type="text" class="form-control" wire:model="inn" name="inn">
                            @error('inn')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <!--ИНН-->

                        <div class="mb-5">
                            <label for="snils" class="col-form-label fw-bold">Страховой номер индивидуального
                                лицевого счёта (СНИЛС)</label>
                            <input type="text" class="form-control" wire:model="snils" name="snils">
                            @error('snils')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <!--СНИЛС-->

                        <div class="row">
                            <button type="submit" class="btn btn-outline-primary p-3">
                                Сохранить
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    function showCreateInputs() {
        document.getElementById('createForm').style.display = 'block';
    }

    function hideCreateInputs() {
        document.getElementById('createForm').style.display = 'none';
    }
</script>

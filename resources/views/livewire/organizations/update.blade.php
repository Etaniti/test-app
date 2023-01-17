<div class="container">
    <div class="d-flex justify-content-center row mt-3">
        <button id="add_org_inputs" type="button" class="btn btn-outline-primary p-2 mb-2" onclick="showUpdateInputs();">
            <span>Редактировать организацию</span>
        </button>
    </div>
    <div class="d-flex justify-content-center">
        <div id="updateForm" class="hidden my-4">
            <form action="/organizations/{{ $organization->id }}" enctype="multipart/form-data" method="POST">
                @csrf
                @method('PATCH')
                <div class="card col-11 px-4 py-3">
                    <div class="card-body">
                        <div class="row justify-content-end">
                            <button type="button" class="btn-close" aria-label="Close" onclick="hideUpdateInputs();"></button>
                        </div>
                        <h4 class="card-title mb-4">Редактирование организации "{{ $organization->name }}"</h4>

                        <div class="mb-3">
                            <label for="name" class="col-form-label fw-bold">Наименование организации</label>
                            <input type="text" class="form-control" wire:model="name" name="name"
                                value="{{ $organization->name }}" autocomplete="ogrn" autofocus>
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <!--Наименование организации-->

                        <div class="mb-3">
                            <label for="ogrn" class="col-form-label fw-bold">Основной государственный
                                регистрационный номер (ОГРН)</label>
                            <input type="text" class="form-control" wire:model="ogrn" name="ogrn"
                                value="{{ $organization->ogrn }}" autocomplete="ogrn" autofocus>
                            @error('ogrn')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <!--ОГРН-->

                        <div class="mb-5">
                            <label for="oktmo" class="col-form-label fw-bold">Общероссийский классификатор территорий
                                муниципальных образований (ОКТМО)</label>
                            <input type="text" class="form-control" wire:model="oktmo" name="oktmo"
                                value="{{ $organization->oktmo }}" autocomplete="ogrn" autofocus>
                            @error('oktmo')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <!--ОКТМО-->

                        <div class="row mb-1">
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

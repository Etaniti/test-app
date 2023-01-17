<div class="container">
    <div class="d-flex justify-content-center row my-4">
        <button id="add_org_inputs" type="button" name="add" wire:click="$toggle('showCreateInputs', true)"
            class="btn btn-outline-primary p-3 mb-2">
            <span>Добавить организацию</span>
        </button>
    </div>
    @if ($showCreateInputs)
        <div class="d-flex justify-content-center mb-5">
            <form action="/organizations" enctype="multipart/form-data" method="POST">
                @csrf
                <div class="card col-11 px-4 py-3">
                    <div class="card-body">
                        <h4 class="card-title mb-4">Добавление организации</h4>

                        <div class="mb-3">
                            <label for="name" class="col-form-label fw-bold">Наименование организации</label>
                            <input type="text" class="form-control" wire:model="name" name="name">
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <!--Наименование организации-->

                        <div class="mb-3">
                            <label for="ogrn" class="col-form-label fw-bold">Основной государственный
                                регистрационный номер (ОГРН)</label>
                            <input type="text" class="form-control" wire:model="ogrn" name="ogrn">
                            @error('ogrn')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <!--ОГРН-->

                        <div class="mb-5">
                            <label for="oktmo" class="col-form-label fw-bold">Общероссийский классификатор территорий
                                муниципальных образований (ОКТМО)</label>
                            <input type="text" class="form-control" wire:model="oktmo" name="oktmo">
                            @error('oktmo')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <!--ОКТМО-->

                        <div class="row mb-2">
                            <button type="submit" class="btn btn-outline-primary p-3">
                                Сохранить
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    @endif
</div>

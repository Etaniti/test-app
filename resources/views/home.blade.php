@extends('layouts.app')

@section('content')
    <div class="container">
        <div>
            <div class="row justify-content-center mt-3">
                @livewire('organizations', ['organizations' => $organizations])
            </div>
        </div>
        <div class="d-flex justify-content-center">
            <form action="/xml-upload" enctype="multipart/form-data" method="post">
                @csrf
                <div class="form-group row col-9 offset-1 mb-5">
                    <label for="file" class="col-form-label fw-bold mb-1">Выберите файл формата XML с данными об
                        организациях и сотрудниках</label>
                    <input type="file" class="form-control ms-2" name="xmlFile">
                    <div class="row mt-4 ms-2">
                        <button type="submit" class="btn btn-primary p-2">Сохранить</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

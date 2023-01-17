<div class="container">
    <div>
        @if (session()->has('success'))
            <div class="alert alert-success" role="alert">
                {{ session()->get('success') }}
            </div>
        @endif
        @if (session()->has('error'))
            <div class="alert alert-danger" role="alert">
                {{ session()->get('error') }}
            </div>
        @endif
    </div>
    <div class="mt-5">
        <table class="table table-sm table-bordered table-hover">
            <thead>
                <tr>
                    <th class="text-center align-middle">№</th>
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
                @foreach ($organizations as $organization)
                    <tr>
                        <td class="text-center align-middle">{{ $loop->iteration }}</td>
                        <td class="text-center align-middle">
                            <a href="/organization/{{ $organization->id }}" class="btn btn-outline-light text-dark text-small border-0">
                                {{ $organization->name }}
                            </a>
                        </td>
                        <td class="text-center align-middle">
                            {{ $organization->ogrn }}
                        </td>
                        <td class="text-center align-middle">
                            {{ $organization->oktmo }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div>
        @include('livewire.organizations.create')
    </div>
</div>

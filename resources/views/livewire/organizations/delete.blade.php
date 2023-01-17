<div class="container">
    <div class="d-flex justify-content-center row">
        <button type="button" class="btn btn-outline-secondary p-2 mb-2" onclick="showDeleteForm();">
            <span>Удалить организацию</span>
        </button>
    </div>
    <div class="d-flex justify-content-center flex-column">
        <div id="deleteForm" class="hidden justify-content-center mt-4 mb-4">
            <form action="/organizations/{{ $organization->id }}/delete" method="POST">
                @csrf
                @method("DELETE")
                <h5>Вы действительно хотите удалить организацию "{{ $organization->name }}"?</h5>
                <div class="mt-4">
                    <button type="submit" class="btn btn-danger d-inline-block p-2 ">Удалить</button>
                    <button type="button" class="btn btn-outline-secondary d-inline-block p-2 ms-2"
                        onclick="hideDeleteForm();">Отмена</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    function showDeleteForm() {
        document.getElementById('deleteForm').style.display = 'block';
    }

    function hideDeleteForm() {
        document.getElementById('deleteForm').style.display = 'none';
    }
</script>

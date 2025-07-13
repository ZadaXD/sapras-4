@foreach($sapras as $item)
<!-- Modal Edit SAPRAS -->
<div class="modal fade" id="modalEditSapras{{ $item->id }}" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <form action="{{ route('sapras.update', $item->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit SAPRAS</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    @include('sapras.form', ['sapras' => $item])
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-warning">Perbarui</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endforeach

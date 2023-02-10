

<div class="modal fade" id="ModalDelete{{ $item->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{ url('delete-product/'.$item->id) }}" method="GET">
          @csrf
          @method('DELETE')
        <div class="modal-body">
            Yakin Ingin Menghapus <b>{{ $item->id }}</b>
          <div class="card">
            <div class="card-header">
              
            
            </div>
        </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-outline-danger">Delete</button>
         
        </div>
        
         
      </form>
      </div>
    </div>
  </div>
{{-- </form> --}}
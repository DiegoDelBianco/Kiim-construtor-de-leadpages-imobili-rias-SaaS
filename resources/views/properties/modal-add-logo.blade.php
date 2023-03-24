
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Enviar Logotipo</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>

             <form method="POST" enctype="multipart/form-data" id="upload-image" action="{{ route('dashboard.teams.logo.store', [$team->id]) }}">
                    @csrf
                  <div class="modal-body">
                        <input type="file" name="image" placeholder="Choose image" id="image">
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Enviar</button>
                  </div>
            </form>
        </div>
      </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="addLeadModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Nova LeadPage Imóvel</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>

             <form method="POST" enctype="multipart/form-data" id="upload-image" action="">
                    @csrf
                  <div class="modal-body text-center">
                    <h2>Você deseja adicionar uma LeadPage a esse imóvel</h2>
                    <img style="display:inline" src="" alt="">
                    <title>Nova LeadPage Para o imóvel <span class="title"></span></title>
                    <select name="leadpage_template_id" id="leadpage_template_id">
                        <option value="1">Default</option>
                    </select>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Adicionar</button>
                  </div>
            </form>
        </div>
      </div>
    </div>
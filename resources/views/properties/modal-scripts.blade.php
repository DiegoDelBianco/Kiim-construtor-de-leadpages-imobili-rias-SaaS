
    <!-- Modal -->
    <div class="modal fade" id="scriptsModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Scripts Google e Facebook</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>

             <form method="POST" enctype="multipart/form-data" id="upload-image" action="{{ route('dashboard.teams.scripts.store', $team->id) }}">
                    @csrf
                  <div class="modal-body text-center">
                    <h2>Configure os scripts desse site.</h2>
                    @php
                        $disabled = $team->is_pro()? "" : "disabled";
                    @endphp
                    <label for="f_pixel">Pixel do facebook</label><br>
                    <input type="text" name="f_pixel" id="f_pixel" value="{{ old('f_pixel', $team->f_pixel) }}"><br />
                    <label for="g_analytics">ID o Analytics</label><br>
                    <input type="text" name="g_analytics" id="g_analytics" value="{{ old('g_analytics', $team->g_analytics) }}"><br />
                    <label for="g_adwords">Adwords <b>(Kiim PRO)</b></label><br>
                    <input {{ $disabled }} type="text" name="g_adwords" id="g_adwords" value="{{ old('g_adwords', $team->g_adwords) }}"><br />
                    <label for="g_tags">Google TagManeger <b>(Kiim PRO)</b></label><br>
                    <input {{ $disabled }} type="text" name="g_tags" id="g_tags" value="{{ old('g_tags', $team->g_tags) }}"><br />
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Adicionar</button>
                  </div>
            </form>
        </div>
      </div>
    </div>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $team->name }} - {{ $property->get_title() }}
            <a href="{{route('dashboard.properties.list', $team->id)}}" 
                class="btn btn-primary">Listar Imóveis</a> 
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 text-center">
                    <h1 style="font-size: 25px; font-weight: bold;">Fotos do Imóvel: {{ $property->get_title() }}</h1>
                    @if($property->cod != "")
                    <p>Cod:. {{$property->cod}} </p>
                    @endif
                    <!-- Validation Errors -->
                    <x-auth-validation-errors class="mb-4" :errors="$errors" />

                    @if(count($medias) == 0)
                    <p class="pt-2">Parce que essa propriedade ainda não tem nenhuma mídia cadastrada! <br />Você pode adicionar imagens clicando no botão abaixo:</p>

                    <button type="button" class="btn btn-primary mt-3" data-toggle="modal" data-target="#exampleModal">
                      Adicionar Imagens
                    </button>

                    @else
                    <div class="row list-medias">
                        @foreach($medias as $media)
                        @php
                            $thumbClass = ($media->id == $property->thumb->id ? "secondary" : "primary");
                            $disable = ($media->id == $property->thumb->id ? "disabled" : "");
                        @endphp
                        <div class="col-md-2 item-media p-2 m-2">
                            <img src="{{asset($media->path200(TRUE))}}" class="mb-2" alt="">

                            <form method="POST" enctype="multipart/form-data" id="upload-image" action="{{ route('dashboard.properties.media.thumb', [$team->id, $property->id, $media->id]) }}">
                                @csrf
                                <button href="#" 
                                    {{$disable}} 
                                    class="btn btn-{{ $thumbClass }}">
                                    Thumb
                                </button>
                                <button 
                                    type="button" 
                                    {{$disable}} 
                                    onclick='$("#deleteModal form").attr("action", "{{route("dashboard.properties.media.destroy", [$team->id, $property->id, $media->id])}}"); $("#deleteModal img").attr("src", "{{asset($media->path200(TRUE))}}")' 
                                    class="btn btn-danger" 
                                    data-toggle="modal" 
                                    data-target="#deleteModal">
                                  <i class="fa-solid fa-trash"></i>
                                </button>
                            </form>
                        </div>

                        @endforeach
                    </div>
                    <button type="button" class="btn btn-primary mt-3" data-toggle="modal" data-target="#exampleModal">
                      Adicionar Imagens
                    </button>

                    @endif
                </div>
            </div>
        </div>
    </div>





<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Enviar Mídia</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

         <form method="POST" enctype="multipart/form-data" id="upload-image" action="{{ route('dashboard.properties.media.store', [$team->id, $property->id]) }}">
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





<!-- Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Excluir Imagem</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

         <form method="POST" enctype="multipart/form-data" id="upload-image" action="">
                @csrf
              <div class="modal-body text-center">
                    <h2>Você deseja realmente excluir essa imagem?</h2>
                    <img style="display:inline" src="" alt="">
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-primary">Excluir</button>
              </div>
        </form>
    </div>
  </div>
</div>
</x-app-layout>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $team->name }} 
            <a href="{{route('dashboard')}}" 
                class="btn btn-primary">Listar sites</a>
        </h2>
    </x-slot>

    @php
    $domain = $team->domain==NULL? str_replace('<sub>', $team->sub_domain, config('app.sub')):$team->domain;
    @endphp

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 text-center">

                    <div class="row pb-3 mb-4" style="border-bottom: 1px solid #b9b9b9;" >
                        <div class="col-md-4">
                            <h2><b>{{$team->name}}</b></h2>
                            <b>Creci: </b>{{$team->creci}} <br />
                            <b>Criado em: </b>{{ $team->created_at }} <br />
                            {{count($team->properties)}} Imóveis <br />
                            <b>Site: </b><a target="_blank" href="{{$team->get_domain()}}">{{$team->get_domain()}}</a></p>
                        </div>
                        <div class="col-md-4 text-center">
                            @if($team->logo)
                                <p class="mb-0 pb-0"><img style="display:inline" src="{{asset($team->logo_src())}}" alt=""></p>
                                <button type="button" class="btn btn-primary mt-1" data-toggle="modal" data-target="#exampleModal">
                                  Alterar Logo
                                </button>
                            @else
                                <button type="button" class="btn btn-primary mt-3" data-toggle="modal" data-target="#exampleModal">
                                  Adicionar Logo
                                </button>
                            @endif
                        </div>
                    </div>
                    <h1 style="font-size: 25px; font-weight: bold;">Imóveis</h1>

                    @if(count($properties) == 0)
                    <p class="pt-2">Parce que esse Site ainda não tem nenhum imóvel cadastrado! <br />Você pode adicionar um imóvel clicando no botão abaixo:</p>
                    <a href="{{ route('dashboard.properties.create', $team->id) }}" class="btn btn-primary mt-3">Adicionar Imóvel</a>
                    @else

                    @foreach($properties as $property)
                    <div class="row line-list-team mt-3 p-3">
                        <div class="col-md-4">
                            <img src="{{asset($property->thumb_src())}}" alt="">
  
                        </div>
                        <div class="col-md-4">
                            @if($property->cod != "")
                                <p>Código: {{$property->cod}}</p>
                            @endif
                            <p>
                            @if($property->rent)
                            <b>Valor de Aluguel:</b> R$ {{$property->rent_price}} <br />
                            @endif
                            @if($property->sale)
                            <b>Valor de Venda:</b> R$ {{$property->sale_price}}
                            @endif
                            </p>
                            <p>
                                {{$property->street}} {{$property->number_street}}<br />
                                {{$property->neighborhood}} - {{$property->city}} - {{$property->state}}
                            </p> 
                        </div>
                        <div class="col-md-4">
                            <a class="pr-2" href="{{$domain}}/imovel/{{$property->id}}" target="_blank" title="Ver Site"><i class="fa-solid fa-arrow-up-right-from-square"></i></a>
                            <a class="pr-2" href="{{route('dashboard.properties.media.list', [$team->id, $property->id])}}" title="Imagens"><i class="fa-solid fa-image"></i></a>
                            <a class="pr-2" href="#" title="Editar Imóvel"><i class="fa-solid fa-pen-to-square"></i></a>
                            <a class="pr-2" href="#" title="Excluir"><i class="fa-solid fa-trash"></i></a>
                        </div>
                    </div>

                    @endforeach

                    <a href="{{ route('dashboard.properties.create', $team->id) }}" class="btn btn-primary mt-3">Adicionar Imóvel</a>
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
</x-app-layout>

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
                        <div class="col-md-4">

                            @if($team->pro)
                            <p>Pacote: Kiim Pro</p>
                            @else
                            <p>Pacote: Kiim Grátis <a href="#" class="btn btn-success"> Vire Kiim Pro </a> </p>
                            @endif
                            <p><a href="{{ route('dashboard.teams.template.show', [$team->id, $team->site_template_id]) }}" class="btn btn-primary" >Configurar Tema</a></p>
                            <p>
                                <button type="button" class="btn btn-primary mt-1" data-toggle="modal" data-target="#scriptsModal">
                                  Scripts
                                </button>
                            </p>
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
                            <b>Valor de Aluguel:</b> R$ {{number_format($property->rent_price, 2, ',', '.')}} <br />
                            @endif
                            @if($property->sale)
                            <b>Valor de Venda:</b> R$ {{number_format($property->sale_price, 2, ',', '.')}}
                            @endif
                            </p>
                            <p>
                                {{$property->street}} {{$property->number_street}}<br />
                                {{$property->neighborhood}} - {{$property->city}} - {{$property->state}}
                            </p> 
                        </div>
                        <div class="col-md-4">

                            <p>
                                <a class="pr-2" href="{{$property->property_link($domain)}}" target="_blank" title="Ver Site"><i class="fa-solid fa-arrow-up-right-from-square"></i></a>
                                <a class="pr-2" href="{{route('dashboard.properties.media.list', [$team->id, $property->id])}}" title="Imagens"><i class="fa-solid fa-image"></i></a>
                                <a class="pr-2" href="{{route('dashboard.properties.edit', [$team->id, $property->id])}}" title="Editar Imóvel"><i class="fa-solid fa-pen-to-square"></i></a>
                                <a 
                                    type="button"
                                    href="#" 
                                    onclick='$("#deleteModal form").attr("action", "{{route("dashboard.properties.destroy", [$team->id, $property->id])}}"); $("#deleteModal img").attr("src", "{{asset($property->thumb_src())}}"); $("#deleteModal .title").html("{{ $property->get_title() }}")' 
                                    data-toggle="modal" 
                                    data-target="#deleteModal"
                                    title="Excluir">
                                  <i class="fa-solid fa-trash"></i>
                                </a>
                            </p>
                            <p>
                                <a 
                                    type="button"
                                    href="#" 
                                    class="btn btn-primary"
                                    data-toggle="modal" 
                                    data-target="#addLeadModal"
                                    title="Nova Leadpage"
                                    onclick='$("#addLeadModal form").attr("action", "{{route("dashboard.properties.template.store", [$team->id, $property->id])}}");  $("#addLeadModal .title").html("{{ $property->get_title() }}")'  
                                    ><i class="fa-solid fa-plus"></i> LeadPage</a></p>
                            @if($property->list_leadpages != NULL)
                                @foreach($property->list_leadpages as $leadpage)
                                <div class="col-md-12" style="border: 1px solid #ddd; background-color: #fff; border-radius: 12px; padding: 8px; margin-bottom: 10px;">
                                    <p class="mb-0">
                                        <a href="{{route('dashboard.properties.template.show',[$team->id, $property->id, $leadpage->id])}}" class="btn btn-secondary" >
                                            <i class="fa-solid fa-pen-to-square"></i> 
                                            LeadPage (#{{$leadpage->id}}) 
                                        </a> 
                                        <a href="{{ $leadpage->get_url() }}" class="btn btn-secondary" target="_blank">
                                            <i class="fa-solid fa-arrow-up-right-from-square"></i>
                                        </a>
                                    </p>
                                </div>
                                @endforeach
                            @endif
                        </div>
                    </div>

                    @endforeach

                    <a href="{{ route('dashboard.properties.create', $team->id) }}" class="btn btn-primary mt-3">Adicionar Imóvel</a>
                    @endif
                </div>
            </div>
        </div>
    </div>



    @include('properties.modal-add-leadpage')
    @include('properties.modal-add-logo')
    @include('properties.modal-delete-property')
    @include('properties.modal-scripts')





</x-app-layout>

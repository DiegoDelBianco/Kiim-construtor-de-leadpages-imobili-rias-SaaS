<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Meus Sites') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 text-center">
                    <h1 style="font-size: 25px; font-weight: bold;">Meus sites imobiliários</h1>

                    @if(count($teams) == 0)
                    <p class="pt-2">Parce que você ainda não está administrando nenhum site! <br />Você pode ser incluido na equipe outro usuário, ou pode criar um novo site clicando no botão abaixo:</p>
                    <a href="{{ route('dashboard.teams.create') }}" class="btn btn-primary mt-3">Criar novo site</a>
                    @else

                    @foreach($list_teams as $team)
                    @php
                    $domain = $team->team->domain==NULL? str_replace('<sub>', $team->team->sub_domain, config('app.sub')):$team->team->domain;
                    @endphp
                    <div class="row line-list-team mt-3 p-3">
                        <div class="col-md-4">
                            @if($team->team->logo)
                                <img style="max-height: 80px; display:inline;" src="{{asset($team->team->logo_src())}}" alt="">
                            @else
                                {{$team->team->name}}
                            @endif
                        </div>
                        <div class="col-md-4">
                            <p>{{$team->team->name}}</p>
                            <a href="{{$domain}}" target="_blank">
                                {{$domain}}
                            </a>
                        </div>
                        <div class="col-md-4">
                            <a class="pr-2" href="{{ $domain }}" target="_blank" title="Ver Site"><i class="fa-solid fa-arrow-up-right-from-square"></i></a>
                            <a class="pr-2" href="{{route('dashboard.properties.list', $team->team->id)}}" title="Listar Imóveis"><i class="fa-solid fa-list"></i></a>
                            <a class="pr-2" href="{{route('dashboard.teams.edit', $team->team->id)}}" title="Editar Site"> <i class="fa-solid fa-pen-to-square"></i> </a>
                        </div>
                    </div>

                    @endforeach

                    <a href="{{ route('dashboard.teams.create') }}" class="btn btn-primary mt-3">Criar novo site</a>
                    @endif
                </div>
            </div>
        </div>
    </div>

</x-app-layout>

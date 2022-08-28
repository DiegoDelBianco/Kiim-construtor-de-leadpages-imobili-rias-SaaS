<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $team->name }} 
            <a href="{{route('dashboard.properties.list', $team->id)}}" 
                class="btn btn-primary">Listar Imóveis</a> 
        </h2>
    </x-slot>



    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 text-center">
                    <form method="POST" action="{{route('dashboard.properties.template.config.store',[$team->id, $property->id, $leadpage->id])}}">
                        @csrf
                        @foreach($vars as $variable)
                            @if($variable->type == 'string')
                                <label for="{{$variable->name}}"> {{$variable->label}} </label>
                                <input type="text" id="{{$variable->name}}" class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block mt-1 w-full" value="{{$variable->value}}" name='{{$variable->name}}'> <br>
                            @elseif($variable->type == 'integer')
                                <label for="{{$variable->name}}"> {{$variable->label}} </label>
                                <input type="numeric" id="{{$variable->name}}" class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block mt-1 w-full" value="{{$variable->value}}" name='{{$variable->name}}'> <br>
                            @elseif($variable->type == 'longtext')
                                <label for="{{$variable->name}}"> {{$variable->label}} </label>
                                <textarea type="text" id="{{$variable->name}}" class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block mt-1 w-full" name='{{$variable->name}}'>{{$variable->value}}</textarea> <br>
                            @endif
                        @endforeach
                        <input type="submit" class="btn btn-primary" value="Salvar">
                    </form>
                </div>
            </div>
        </div>
    </div>




</x-app-layout>

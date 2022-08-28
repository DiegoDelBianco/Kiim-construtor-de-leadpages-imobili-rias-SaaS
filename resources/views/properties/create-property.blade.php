<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{$team->name}}: {{ __('Adicionar imóvel') }}
            <a href="{{route('dashboard.properties.list', $team->id)}}" 
                class="btn btn-primary">Lista de imóveis</a>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <!-- Validation Errors -->
                    <x-auth-validation-errors class="mb-4" :errors="$errors" />

                    <form method="POST" action="{{ route('dashboard.properties.store', $team->id) }}">
                        @csrf

                        <!-- title -->
                        <div class="mt-3">
                            <x-label for="title" 
                                :value="__('Titulo do Imóvel')" />

                            <x-input id="title" 
                                class="block mt-1 w-full" 
                                type="text" name="title" 
                                :value="old('title')" 
                                autofocus />
                        </div>

                        <!-- Código de referência -->
                        <div class="mt-3">
                            <x-label for="cod" 
                                :value="__('Código de referência')" />

                            <x-input id="cod" 
                                class="block mt-1 w-full" 
                                type="text" name="cod" 
                                :value="old('cod')" 
                                autofocus />
                        </div>

                        <!-- property_type_id -->
                        <div class="mt-3">
                            <x-label for="property_type_id" 
                                :value="__('Tipo de imóvel')" />
                            @php
                                $list_types;
                                foreach($property_types as $type) 
                                    $list_types[$type->id] = $type->name;
                            @endphp
                            <x-select onchange="docType()" 
                                id="property_type_id" 
                                class="block mt-1 w-full" 
                                name="property_type_id" 
                                :options="$list_types" 
                                :selectedOptions="old('property_type_id')" 
                                required />
                        </div>

                        <!-- Código de referência -->
                        <div class="mt-3">
                            <x-label for="cep" 
                                :value="__('CEP')" />

                            <x-input id="cep" 
                                class="block mt-1 w-full" 
                                type="text" name="cep" 
                                :value="old('cep')" 
                                autofocus />
                        </div>

                        <!-- Código de referência -->
                        <div class="mt-3">
                            <x-label for="street" 
                                :value="__('Rua/Logradouro')" />

                            <x-input id="street" 
                                class="block mt-1 w-full" 
                                type="text" name="street" 
                                :value="old('street')" 
                                autofocus />
                        </div>

                        <!-- number_street -->
                        <div class="mt-3">
                            <x-label for="number_street" 
                                :value="__('Número')" />
                            <x-input id="number_street" 
                                class="block mt-1 w-full" 
                                type="text" name="number_street" 
                                :value="old('number_street')" 
                                autofocus />
                        </div>

                        <!-- neighborhood -->
                        <div class="mt-3">
                            <x-label for="neighborhood" 
                                :value="__('Bairro')" />
                            <x-input id="neighborhood" 
                                class="block mt-1 w-full" 
                                type="text" name="neighborhood" 
                                :value="old('neighborhood')" 
                                autofocus />
                        </div>

                        <!-- neighborhood_related -->
                        <div class="mt-3">
                            <x-label for="neighborhood_related" 
                                :value="__('Bairro Relacionado')" />
                            <x-input id="neighborhood_related" 
                                class="block mt-1 w-full" 
                                type="text" name="neighborhood_related" 
                                :value="old('neighborhood_related')" 
                                autofocus />
                        </div>

                        <?php // mapsLati ?>
                        <?php // mapsLong ?>

                        <!-- city -->
                        <div class="mt-3">
                            <x-label for="city" 
                                :value="__('Cidade')" />
                            <x-input id="city" 
                                class="block mt-1 w-full" 
                                type="text" name="city" 
                                :value="old('city')" 
                                autofocus />
                        </div>

                        <!-- state -->
                        <div class="mt-3">
                            <x-label for="state" 
                                :value="__('UF')" />
                            <x-input id="state" 
                                class="block mt-1 w-full" 
                                type="text" name="state" 
                                :value="old('state')" 
                                autofocus />
                        </div>

                        <!-- zone -->
                        <div class="mt-3">
                            <x-label for="zone" 
                                :value="__('Região')" />
                            <x-input id="zone" 
                                class="block mt-1 w-full" 
                                type="text" name="zone" 
                                :value="old('zone')" 
                                autofocus />
                        </div>

                        <?php // bedrooms ?>

                        <!-- bedrooms -->
                        <div class="mt-3">
                            <x-label for="bedrooms" 
                                :value="__('Quartos')" />
                            <x-input id="bedrooms" 
                                class="block mt-1 w-full" 
                                type="number" name="bedrooms" 
                                :value="old('bedrooms')" 
                                autofocus />
                        </div>
                        <?php // suites ?>

                        <!-- suites -->
                        <div class="mt-3">
                            <x-label for="suites" 
                                :value="__('Suítes')" />
                            <x-input id="suites" 
                                class="block mt-1 w-full" 
                                type="number" name="suites" 
                                :value="old('suites')" 
                                autofocus />
                        </div>

                        <!-- m2 -->
                        <div class="mt-3">
                            <x-label for="m2" 
                                :value="__('Metros quadrados')" />
                            <x-input id="m2" 
                                class="block mt-1 w-full" 
                                type="number" name="m2" 
                                :value="old('m2')" 
                                autofocus />
                        </div>

                        <!-- m2built -->
                        <div class="mt-3">
                            <x-label for="m2built" 
                                :value="__('Metros quadrados Construídos')" />
                            <x-input id="m2built" 
                                class="block mt-1 w-full" 
                                type="number" name="m2built" 
                                :value="old('m2built')" 
                                autofocus />
                        </div>
                        <?php // furnished ?>

                        <!-- furnished -->
                        <div class="mt-4">
                            <x-label for="furnished" 
                                :value="__('Este imóvel está imobiliado?')" />

                            <x-input
                                class="mt-1" 
                                type="radio" 
                                name="furnished" 
                                :value="1" 
                                id="furnished_yes"
                                :select="(old('furnished')==1)"
                                autofocus  /> 
                            <label for="furnished_yes">Sim</label>
                            <br />
                            <x-input
                                class="mt-1" 
                                type="radio" 
                                name="furnished" 
                                :value="0" 
                                id="furnished_no"
                                :select="(old('furnished')==0)"
                                autofocus /> 
                            <label for="furnished_no">Não</label>
                        </div>

                        <!-- bathrooms -->
                        <div class="mt-3">
                            <x-label for="bathrooms" 
                                :value="__('Banheiros')" />
                            <x-input id="numeric" 
                                class="block mt-1 w-full" 
                                type="number" name="bathrooms" 
                                :value="old('bathrooms')" 
                                autofocus />
                        </div>
                        <?php // parking ?>

                        <!-- parking -->
                        <div class="mt-3">
                            <x-label for="parking" 
                                :value="__('Vagas na garagem')" />
                            <x-input id="parking" 
                                class="block mt-1 w-full" 
                                type="number" name="parking" 
                                :value="old('parking')" 
                                autofocus />
                        </div>
                        <?php // rent ?>

                        <!-- rent -->
                        <div class="mt-4">
                            <x-label for="rent" 
                                :value="__('Este imóvel está disponivel para aluguel?')" />

                            <x-input
                                class="mt-1" 
                                type="radio" 
                                name="rent" 
                                :value="1" 
                                id="rent_yes"
                                :select="(old('rent')==1)"
                                autofocus  /> 
                            <label for="rent_yes">Sim</label>
                            <br />
                            <x-input
                                class="mt-1" 
                                type="radio" 
                                name="rent" 
                                :value="0" 
                                id="rent_no"
                                :select="(old('rent')==0)"
                                autofocus /> 
                            <label for="rent_no">Não</label>
                        </div>
                        <?php // rent_price ?>

                        <!-- rent_price -->
                        <div class="mt-3">
                            <x-label for="rent_price" 
                                :value="__('Preço do aluguel')" />
                            <x-input id="rent_price" 
                                class="block mt-1 w-full" 
                                type="text" name="rent_price" 
                                :value="old('rent_price')" 
                                autofcus />
                        </div>

                        <?php // rent_iptu ?>

                        <!-- rent_iptu -->
                        <div class="mt-3">
                            <x-label for="rent_iptu" 
                                :value="__('Preço do IPTU')" />
                            <x-input id="rent_iptu" 
                                class="block mt-1 w-full" 
                                type="text" name="rent_iptu" 
                                :value="old('rent_iptu')" 
                                autofcus />
                        </div>

                        <?php // sale ?>

                        <!-- sale -->
                        <div class="mt-4">
                            <x-label for="sale" 
                                :value="__('Este imóvel está disponivel para Venda?')" />

                            <x-input
                                class="mt-1" 
                                type="radio" 
                                name="sale" 
                                :value="1" 
                                id="sale_yes"
                                :select="(old('sale')==1)"
                                autofocus  /> 
                            <label for="sale_yes">Sim</label>
                            <br />
                            <x-input
                                class="mt-1" 
                                type="radio" 
                                name="sale" 
                                :value="0" 
                                id="sale_no"
                                :select="(old('sale')==0)"
                                autofocus /> 
                            <label for="sale_no">Não</label>
                        </div>
                        <?php // sale_price ?>

                        <!-- sale_price -->
                        <div class="mt-3">
                            <x-label for="sale_price" 
                                :value="__('Preço do imóvel')" />
                            <x-input id="sale_price" 
                                class="block mt-1 w-full" 
                                type="text" name="sale_price" 
                                :value="old('sale_price')" 
                                autofcus />
                        </div>
                        <?php // exchange ?>
                        <!-- exchange -->
                        <div class="mt-4">
                            <x-label for="exchange" 
                                :value="__('Este imóvel aceita Permuta?')" />

                            <x-input
                                class="mt-1" 
                                type="radio" 
                                name="exchange" 
                                :value="1" 
                                id="exchange_yes"
                                :select="(old('exchange')==1)"
                                autofocus  /> 
                            <label for="exchange_yes">Sim.</label>
                            <br />
                            <x-input
                                class="mt-1" 
                                type="radio" 
                                name="exchange" 
                                :value="0" 
                                id="exchange_no"
                                :select="(old('exchange')==0)"
                                autofocus /> 
                            <label for="exchange_no">Não.</label>
                        </div>

                        <?php // its_condominium ?>

                        <!-- its_condominium -->
                        <div class="mt-4">
                            <x-label for="its_condominium" 
                                :value="__('Este imóvel está em um condominio?')" />

                            <x-input
                                class="mt-1" 
                                type="radio" 
                                name="its_condominium" 
                                :value="1" 
                                id="its_condominium_yes"
                                :select="(old('its_condominium')==1)"
                                autofocus  /> 
                            <label for="its_condominium_yes">Sim</label>
                            <br />
                            <x-input
                                class="mt-1" 
                                type="radio" 
                                name="its_condominium" 
                                :value="0" 
                                id="its_condominium_no"
                                :select="(old('its_condominium')==0)"
                                autofocus /> 
                            <label for="its_condominium_no">Não</label>
                        </div>
                        <?php // condominium_price ?>

                        <!-- condominium_price -->
                        <div class="mt-3">
                            <x-label for="condominium_price" 
                                :value="__('Preço do Condominio')" />
                            <x-input id="condominium_price" 
                                class="block mt-1 w-full" 
                                type="text" name="condominium_price" 
                                :value="old('condominium_price')" 
                                autofcus />
                        </div>
                        <?php // shared_house ?>
                        <!-- shared_house -->
                        <div class="mt-4">
                            <x-label for="shared_house" 
                                :value="__('Este imóvel é compartilhado com outros inquilinos?')" />

                            <x-input
                                class="mt-1" 
                                type="radio" 
                                name="shared_house" 
                                :value="1" 
                                id="shared_house_yes"
                                :select="(old('shared_house')==1)"
                                autofocus  /> 
                            <label for="shared_house_yes">Sim</label>
                            <br />
                            <x-input
                                class="mt-1" 
                                type="radio" 
                                name="shared_house" 
                                :value="0" 
                                id="shared_house_no"
                                :select="(old('shared_house')==0)"
                                autofocus /> 
                            <label for="shared_house_no">Não</label>
                        </div>
                        <?php // description ?>

                        <!-- description -->
                        <div class="mt-3">
                            <x-label for="description" 
                                :value="__('Descrição')" />
                            <textarea name="description" id="description" >{{old('description')}}</textarea>
                        </div>
                        <?php // building ?>
                        <!-- building -->
                        <div class="mt-4">
                            <x-label for="building" 
                                :value="__('Este imóvel está Pronto?')" />

                            <x-input
                                class="mt-1" 
                                type="radio" 
                                name="building" 
                                :value="1" 
                                id="building_yes"
                                :select="(old('building')==1)"
                                autofocus  /> 
                            <label for="building_yes">Sim</label>
                            <br />
                            <x-input
                                class="mt-1" 
                                type="radio" 
                                name="building" 
                                :value="0" 
                                id="building_no"
                                :select="(old('building')==0)"
                                autofocus /> 
                            <label for="building_no">Não, Está em construção.</label>
                        </div>
                        <?php // end_build ?>

                        <!-- end_build -->
                        <div class="mt-3">
                            <x-label for="end_build" 
                                :value="__('Data de entrega')" />
                            <x-input id="end_build" 
                                class="block mt-1 w-full" 
                                type="date" name="end_build" 
                                :value="old('end_build')" 
                                autofcus />
                        </div>
                        <?php // status ?>
                        <?php // pets ?>
                        <!-- pets -->
                        <div class="mt-4">
                            <x-label for="pets" 
                                :value="__('Este imóvel aceita Pets?')" />

                            <x-input
                                class="mt-1" 
                                type="radio" 
                                name="pets" 
                                :value="1" 
                                id="pets_yes"
                                :select="(old('pets')==1)"
                                autofocus  /> 
                            <label for="pets_yes">Aceita.</label>
                            <br />
                            <x-input
                                class="mt-1" 
                                type="radio" 
                                name="pets" 
                                :value="0" 
                                id="pets_no"
                                :select="(old('pets')==0)"
                                autofocus /> 
                            <label for="pets_no">Não.</label>
                        </div>




                        <!-- ITENS -->
                        <div class="row">
                            <div class="col-md-12">
                                <label for="">Escolha os itens que agregam essa residência</label>
                            </div>
                            @foreach($items as $item)
                            <div class="col-md-3"> 
                                <input 
                                    type="checkbox" 
                                    {{ old("tem_".$item->id) == 'on' ? 'checked' : '' }}
                                    name="item_{{ $item->id }}" 
                                    id="item_{{ $item->id }}" 
                                    value="{{ $item->id }}"> 
                                <label for="item_{{ $item->id }}"> <i class="{{ $item->awesome_class_icon }}"></i> {{$item->name}} </label>
                            </div>
                            @endforeach
                        </div>



                        <div class="flex items-center justify-end mt-4">

                            <x-button class="ml-4">
                                {{ __('Criar') }}
                            </x-button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Criar novo site') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <!-- Validation Errors -->
                    <x-auth-validation-errors class="mb-4" :errors="$errors" />

                    <form method="POST" action="{{ route('dashboard.teams.store') }}">
                        @csrf

                        <h2 class="mt-2">Como vai ficar seu site?</h2>
                        <!-- Name -->
                        <div>
                            <x-label for="name" :value="__('Nome')" />

                            <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
                        </div>

                        <!-- sub_domain -->
                        <div class="mt-4">
                            <x-label for="sub_domain" 
                                :value="__('Dominio do seu site .kiim.com.br')" />

                            <x-input id="sub_domain" 
                                class="block mt-1 w-full" 
                                type="text" 
                                name="sub_domain" 
                                :value="old('sub_domain')" 
                                required autofocus />
                        </div>

                        <!-- domain -->
                        <div class="mt-4">
                            <x-label for="domain" 
                                :value="__('Dominio do seu site .com.br (Caso você já tenha um)')" />

                            <x-input id="domain" 
                                class="block mt-1 w-full" 
                                type="text" 
                                name="domain" 
                                :value="old('domain')" 
                                autofocus />
                        </div>

                        <?php // properties_auto_title ?>

                        <!-- creci -->
                        <div class="mt-4">
                            <x-label for="creci" 
                                :value="__('Creci')" />

                            <x-input id="creci" 
                                class="block mt-1 w-full" 
                                type="text" 
                                name="creci" 
                                :value="old('creci')" 
                                autofocus />
                        </div>


                        <h2 class="mt-5">Endereço do seu escritório ou imobiliária</h2>

                        <!-- show_address -->
                        <div class="mt-4">
                            <x-label for="show_address" 
                                :value="__('Quer deixar seu endereço visivel no site?')" />

                            <x-input
                                class="mt-1" 
                                type="radio" 
                                name="show_address" 
                                :value="1" 
                                id="show_address_yes"
                                :select="(old('show_address')==1)"
                                autofocus  /> 
                            <label for="show_address_yes">Deixar meu endereço visivel</label>
                            <br />
                            <x-input
                                class="mt-1" 
                                type="radio" 
                                name="show_address" 
                                :value="0" 
                                id="show_address_no"
                                :select="(old('show_address')==0)"
                                autofocus /> 
                            <label for="show_address_no">Esconder meu endereço</label>
                        </div>

                        <!-- CEP -->
                        <div class="mt-4">
                            <x-label for="cep" 
                                :value="__('CEP')" />

                            <x-input id="cep" 
                                class="block mt-1 w-full" 
                                type="text" 
                                name="cep" 
                                :value="old('cep')" 
                                autofocus />
                        </div>

                        <!-- street -->
                        <div class="mt-4">
                            <x-label for="street" 
                                :value="__('Endereço')" />

                            <x-input id="street" 
                                class="block mt-1 w-full" 
                                type="text" 
                                name="street" 
                                :value="old('street')" 
                                autofocus />
                        </div>

                        <!-- neighborhood -->
                        <div class="mt-4">
                            <x-label for="neighborhood" 
                                :value="__('Bairro')" />

                            <x-input id="neighborhood" 
                                class="block mt-1 w-full" 
                                type="text" 
                                name="neighborhood" 
                                :value="old('neighborhood')" 
                                autofocus />
                        </div>

                        <!-- city -->
                        <div class="mt-4">
                            <x-label for="city" 
                                :value="__('Cidade')" />

                            <x-input id="city" 
                                class="block mt-1 w-full" 
                                type="text" 
                                name="city" 
                                :value="old('city')" 
                                autofocus />
                        </div>

                        <!-- state -->
                        <div class="mt-4">
                            <x-label for="state" 
                                :value="__('UF')" />

                            <x-input id="state" 
                                class="block mt-1 w-full" 
                                type="text" 
                                name="state" 
                                :value="old('state')" 
                                autofocus />
                        </div>
                        <?php // mapsLati ?>
                        <?php // mapsLong ?>
                        <?php // facebook ?>
                        <?php // instagram ?>
                        <?php // youtube ?>
                        <?php // f_pixel ?>
                        <?php // g_analytics ?>
                        <?php // g_adwords ?>
                        <?php // g_tags ?>

                        <h2 class="mt-5">Dados de Contato no seu site</h2>
                        <!-- phone1 -->
                        <div class="mt-4">
                            <x-label for="phone1" 
                                :value="__('Telefone de contato')" />

                            <x-input id="phone1" 
                                class="block mt-1 w-full" 
                                type="text" 
                                name="phone1" 
                                :value="old('phone1')" 
                                autofocus />
                        </div>

                        <!-- phone2 -->
                        <div class="mt-4">
                            <x-label for="phone2" 
                                :value="__('Telefone de contato')" />

                            <x-input id="phone2" 
                                class="block mt-1 w-full" 
                                type="text" 
                                name="phone2" 
                                :value="old('phone2')" 
                                autofocus />
                        </div>
                        <?php // whatsapp ?>

                        <!-- whatsapp -->
                        <div class="mt-4">
                            <x-label for="whatsapp" 
                                :value="__('Link do Whatsapp')" />

                            <x-input id="whatsapp" 
                                class="block mt-1 w-full" 
                                type="text" 
                                name="whatsapp" 
                                :value="old('whatsapp')" 
                                autofocus />
                        </div>

                        <!-- Email Address -->
                        <div class="mt-4">
                            <x-label for="email" :value="__('E-mail')" />

                            <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
                        </div>
                        <?php // status ?>
                        <?php // visible ?>
                        <?php // site_template_id ?>
                        <?php // color1 ?>
                        <?php // color2 ?>
                        <?php // color3 ?>
                        <?php // color4 ?>
                        <?php // color5 ?>

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

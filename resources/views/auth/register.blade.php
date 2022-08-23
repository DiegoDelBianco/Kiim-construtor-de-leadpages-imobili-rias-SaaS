<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div>
                <x-label for="name" :value="__('Nome')" />

                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('E-mail')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <!-- Telefone -->
            <div class="mt-4">
                <x-label for="phone" :value="__('Telefone')" />

                <x-input id="phone" class="block mt-1 w-full" type="text" name="phone" :value="old('phone')" required />
            </div>

            <!-- Fisica ou Juridica -->
            <div class="mt-4">
                <x-label for="type_doc" :value="__('Tipo de pessoa')" />

                <x-select onchange="docType()" id="type_doc" class="block mt-1 w-full" type="text" name="type_doc" :options="['f'=>'Fisica', 'j' => 'Juridica']" :selectedOptions="old('type_doc')" required />
            </div>

            <!-- Documento -->
            <div class="mt-4">
                <x-label for="doc" :value="__('CPF/CNPJ')" />

                <x-input id="doc" class="block mt-1 w-full" type="text" name="doc" :value="old('doc')" required />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Senha')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Confirmar senha')" />

                <x-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Você já tem conta?') }}
                </a>

                <x-button class="ml-4">
                    {{ __('Criar') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
    <x-slot name="script_footer">
        
        <script src="{{asset('js/principal/jquery-3.6.0.min.js')}}"></script>
        
        <script src="{{asset('js/principal/jquery.mask.js')}}"></script>

        <script>
        //Mascara para o documento
        function docType(){

            let type_doc_input = $("select[name='type_doc']");
            let label_doc_input = $("label[for='doc']");
            let doc_input = $("input[name='doc']");

            var options = {
                onKeyPress: function (cpf, ev, el, op) {
                    var masks = ['000.000.000-00', '00.000.000/0000-00'];
                    doc_input.mask((type_doc_input.val() == "j") ? masks[1] : masks[0], op);
                }
            }

            type_doc_input.val() == "j" ? doc_input.mask('00.000.000/0000-00', options) : doc_input.mask('000.000.000-00#', options);
            if(type_doc_input.val() == "j"){
                doc_input.attr("min", 18);
                doc_input.attr("max", 18);
                label_doc_input.html('CNPJ');
            }else{
                doc_input.attr("min", 14);
                doc_input.attr("max", 14);
                label_doc_input.html('CPF');
            }
        }
        $(document).ready(function(){

            //Mascara para o telefone
            $('body').on('focus', "input[name='phone']", function(){
                var maskBehavior = function (val) {
                    return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
                },
                options = {
                    onKeyPress: function(val, e, field, options) {
                        field.mask(maskBehavior.apply({}, arguments), options);

                        if(field[0].value.length >= 14){
                            var val = field[0].value.replace(/\D/g, '');
                            if(/\d\d(\d)\1{7,8}/.test(val)){
                                field[0].value = '';
                                alert('Telefone Invalido');
                            }
                        }
                    }
                };
                $(this).mask(maskBehavior, options);
            });

            docType();

        });
        </script>
    </x-slot>
</x-guest-layout>

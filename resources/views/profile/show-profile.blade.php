<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Meu Perfil
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <!-- Validation Errors -->
                    <x-auth-validation-errors class="mb-4" :errors="$errors" />

                    <div class="row">
                        <div class="col-md-12">
                            <h1>Meus dados:
                             <button
                                type="button"
                                class="btn btn-primary"
                                data-toggle="modal" 
                                data-target="#exampleModal"
                                title="Excluir">
                              <i class="fa-solid fa-pen-to-square"></i>
                            </button></h1>
                            <p><b>Nome: </b> {{Auth::user()->name}} </p>
                            <p><b>E-mail: </b> {{Auth::user()->email}} </p>
                            <p><b>Telefone: </b> {{Auth::user()->phone}} </p>
                            <p><b>Tipo de pessoa: </b> {{Auth::user()->type_doc=='f'?'Fisica':'Juridica'}} </p>
                            <p><b>Documento: </b> {{Auth::user()->doc}} </p>
                            <p><b>Senha: </b> 
                                <button 
                                    type="button" 
                                    class="btn btn-primary"
                                    data-toggle="modal" 
                                    data-target="#profile-password-user-modal">
                                    Alterar senha
                                </button> 
                            </p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>




    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Atualizar meus dados</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>

             <form method="POST" enctype="multipart/form-data" id="upload-image" action="{{ route('dashboard.profile.update') }}">
                    @csrf
                  <div class="modal-body">

                        <!-- Name -->
                        <div>
                            <x-label for="name" :value="__('Nome')" />

                            <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name', Auth::user()->name)" required autofocus />
                        </div>

                        <!-- Email Address -->
                        <div class="mt-4">
                            <x-label for="email" :value="__('E-mail')" />

                            <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', Auth::user()->email)" required />
                        </div>

                        <!-- Telefone -->
                        <div class="mt-4">
                            <x-label for="phone" :value="__('Telefone')" />

                            <x-input id="phone" class="block mt-1 w-full" type="text" name="phone" :value="old('phone', Auth::user()->phone)" required />
                        </div>

                        <!-- Fisica ou Juridica -->
                        <div class="mt-4">
                            <x-label for="type_doc" :value="__('Tipo de pessoa')" />

                            <x-select onchange="docType()" id="type_doc" class="block mt-1 w-full" type="text" name="type_doc" :options="['f'=>'Fisica', 'j' => 'Juridica']" :selectedOptions="old('type_doc', Auth::user()->type_doc)" required />
                        </div>

                        <!-- Documento -->
                        <div class="mt-4">
                            <x-label for="doc" :value="__('CPF/CNPJ')" />

                            <x-input id="doc" class="block mt-1 w-full" type="text" name="doc" :value="old('doc', Auth::user()->doc)" required />
                        </div>





                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Salvar</button>
                  </div>
            </form>
        </div>
      </div>
    </div>









<div class="modal fade" tabindex="-1" role="dialog" id="profile-password-user-modal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">{{__("Altear Minha Senha")}}</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="POST" action="{{ route('dashboard.profile.password') }}" class="form-login">
          @csrf
          @method('PUT')
          <div class="modal-body">

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
                <x-label for="password_confirmation" :value="__('Confirmar Senha')" />

                <x-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required />
            </div>

            
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-success">{{ __('Salvar') }}</button>
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">{{ __('Cancelar') }}</button>
          </div>
      </form>
    </div>
  </div>
</div>
















        
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


</x-app-layout>

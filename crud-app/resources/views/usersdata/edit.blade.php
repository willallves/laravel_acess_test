<!-- Adicionando Javascript -->
<script type="text/javascript" >
    
    function limpa_formulário_cep() {
            //Limpa valores do formulário de cep.
            document.getElementById('address').value=("");
            document.getElementById('city').value=("");
            document.getElementById('state').value=("");
    }

    function meu_callback(conteudo) {
        if (!("erro" in conteudo)) {
            //Atualiza os campos com os valores.
            document.getElementById('address').value=(conteudo.logradouro)+ " " + (conteudo.bairro);
            document.getElementById('city').value=(conteudo.localidade);
            document.getElementById('state').value=(conteudo.uf);
        } //end if.
        else {
            //CEP não Encontrado.
            limpa_formulário_cep();
            alert("CEP não encontrado.");
        }
    }
        
    function pesquisacep(valor) {

        //Nova variável "cep" somente com dígitos.
        var cep = valor.replace(/\D/g, '');

        //Verifica se campo cep possui valor informado.
        if (cep != "") {

            //Expressão regular para validar o CEP.
            var validacep = /^[0-9]{8}$/;

            //Valida o formato do CEP.
            if(validacep.test(cep)) {

                //Preenche os campos com "..." enquanto consulta webservice.
                document.getElementById('address').value="...";
                document.getElementById('city').value="...";
                document.getElementById('state').value="...";
                
                //Cria um elemento javascript.
                var script = document.createElement('script');

                //Sincroniza com o callback.
                script.src = 'https://viacep.com.br/ws/'+ cep + '/json/?callback=meu_callback';

                //Insere script no documento e carrega o conteúdo.
                document.body.appendChild(script);

            } //end if.
            else {
                //cep é inválido.
                limpa_formulário_cep();
                alert("Formato de CEP inválido.");
            }
        } //end if.
        else {
            //cep sem valor, limpa formulário.
            limpa_formulário_cep();
        }
    };

    </script>

@extends('base') 
@section('main')
<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <h1 class="display-3">Update a UsersData</h1>

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        <br /> 
        @endif
        <form method="post" action="{{ route('usersdatas.update', $usersdata->id) }}">
            @method('PATCH') 
            @csrf
            <div class="form-group">

                <label for="name">Name:</label>
                <input type="text" class="form-control" name="name" value={{ $usersdata->name }} />
            </div>

            <div class="form-group">
                <label for="cpf">CPF:</label>
                <input type="text" class="form-control" name="cpf" value={{ $usersdata->cpf }} />
            </div>


            <div class="form-group">
                <label for="date_of_birth">Data de Nascimento:</label>
                <input type="text" class="form-control" name="date_of_birth" value={{ $usersdata->date_of_birth }} />
            </div>


            <div class="form-group">
                <label for="email">Email:</label>
                <input type="text" class="form-control" name="email" value={{ $usersdata->email }} />
            </div>

            <div class="form-group">
                <label for="phone">Phone:</label>
                <input type="text" class="form-control" name="phone" value={{ $usersdata->phone }} />
            </div>

            <div class="form-group">
                <label for="address">Endereco:</label>
                <input type="text" class="form-control" id="address" name="address" value={{ $usersdata->address }} />
            </div>

            <div class="form-group">
                <label for="city">Cidade:</label>
                <input type="text" class="form-control" id="city" name="city" value={{ $usersdata->city }} />
            </div>

            <div class="form-group">
                <label for="state">Estado:</label>
                <input type="text" class="form-control" id="state" name="state" value={{ $usersdata->state }} />
            </div>

            <div class="form-group">
                <label for="Zip_code">CEP:</label>
                <input type="text" class="form-control" id="Zip_code" name="Zip_code" onblur="pesquisacep(this.value);" value={{ $usersdata->Zip_code }} />
            </div>


            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>
@endsection
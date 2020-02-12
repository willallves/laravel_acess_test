@extends('base')

@section('main')
<div class="row">
 <div class="col-sm-8 offset-sm-2">
    <h1 class="display-3">Add a UserData</h1>
  <div>
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
      <form method="post" action="{{ route('usersdatas.store') }}">
          @csrf
          <div class="form-group">    
              <label for="name">Name:</label>
              <input type="text" class="form-control" name="name"/>
          </div>

          <div class="form-group">
              <label for="cpf">CPF:</label>
              <input type="text" class="form-control" name="cpf"/>
          </div>

          <div class="form-group">
              <label for="date_of_birth">Data de Nascimento:</label>
              <input type="text" class="form-control" name="date_of_birth"/>
          </div>
          <div class="form-group">
              <label for="email">E-mail:</label>
              <input type="text" class="form-control" name="email"/>
          </div>
          <div class="form-group">
              <label for="phone">Phone:</label>
              <input type="text" class="form-control" name="phone"/>
          </div>
          <div class="form-group">
              <label for="address">Endereco:</label>
              <input type="text" class="form-control" name="address"/>
          </div> 
          <div class="form-group">
              <label for="city">Cidade:</label>
              <input type="text" class="form-control" name="city"/>
          </div> 
          <div class="form-group">
              <label for="state">Estado:</label>
              <input type="text" class="form-control" name="state"/>
          </div>          
          <div class="form-group">
              <label for="Zip_code">CEP:</label>
              <input type="text" class="form-control" name="Zip_code"/>
          </div>                
          <button type="submit" class="btn btn-primary-outline">Add usersdata</button>
      </form>
  </div>
</div>
</div>
@endsection
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
                <input type="text" class="form-control" name="address" value={{ $usersdata->address }} />
            </div>

            <div class="form-group">
                <label for="city">Cidade:</label>
                <input type="text" class="form-control" name="city" value={{ $usersdata->city }} />
            </div>

            <div class="form-group">
                <label for="state">Estado:</label>
                <input type="text" class="form-control" name="state" value={{ $usersdata->state }} />
            </div>

            <div class="form-group">
                <label for="zip_code">CEP::</label>
                <input type="text" class="form-control" name="zip_code" value={{ $usersdata->zip_code }} />
            </div>


            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>
@endsection
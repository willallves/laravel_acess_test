@extends('base')

@if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div>
  @endif
</div>

@section('main')

<div class="row">
<div class="col-sm-12">
    <h1 class="display-3">UsersData</h1>   
    <div>
      <a style="margin: 19px;" href="{{ route('usersdatas.create')}}" class="btn btn-primary">New contact</a>
    </div> 

    <div class="col-sm-12">
 
  <table class="table table-striped">
    <thead>
        <tr>
          <td>ID</td>
          <td>Name</td>
          <td>CPF</td>
          <td>Data de Nascimento</td>
          <td>Email</td>
          <td>Phone</td>
          <td>Endereco</td>
          <td>Cidade</td>
          <td>Estado</td>
          <td>CEP</td>
          <td colspan = 2>Actions</td>
        </tr>
    </thead>
    <tbody>
        @foreach($usersdatas as $usersdata)
        <tr>
            <td>{{$usersdata->id}}</td>
            <td>{{$usersdata->name}}</td>
            <td>{{$usersdata->cpf}}</td>
            <td>{{$usersdata->date_of_birth}}</td>
            <td>{{$usersdata->email}}</td>
            <td>{{$usersdata->phone}}</td>
            <td>{{$usersdata->address}}</td>
            <td>{{$usersdata->city}}</td>
            <td>{{$usersdata->state}}</td>
            <td>{{$usersdata->Zip_code}}</td>
            <td>
                <a href="{{ route('usersdatas.edit',$usersdata->id)}}" class="btn btn-primary">Edit</a>
            </td>
            <td>
                <form action="{{ route('usersdatas.destroy', $usersdata->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
<div>
</div>
@endsection

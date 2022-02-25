
@extends('layouts.app_layout')


@section('conteudo')
<div class="container-fluid">
    <div class="row">
        <div class="col">
        <h3>Editar Membro</h3>
        <hr>


            <form action="{{route('edite')}}" method="POST">
            @csrf

            <input type="hidden" name="id" value="{{$membro->id}}">
                <div class="row">
                <div class="col-sm-4 offset-sm-4">

                    <div class="form-group">


                          <label for="nome">Nome</label>
                        <input type="text" name="nome"  class="form-control" value="{{$membro->nome}}">


                          <label for="cpf">cpf</label>
                        <input type="text" name="cpf"  class="form-control" value="{{$membro->cpf}}">

                          <label for="nascimento">Data Nascimento</label>
                        <input type="text" name="nascimento"  class="form-control" value="{{$membro->dataNascimento}}">
                    </div>

                    <div class="form-gruop">
                        <input type="submit" value="Editar" class="btn btn-primary my-2">
                    </div>
                </div>
                </div>
             </form>

        </div>
    </div>
</div>

@endsection

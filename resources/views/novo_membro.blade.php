
@extends('layouts.app_layout')


@section('conteudo')
<div class="container-fluid">
    <div class="row">
        <div class="col">
        <h3>NOVO MEMBRO</h3>
        <hr>


            <form action="{{route('novo_cadastro')}}" method="POST">
            @csrf
                <div class="row">
                <div class="col-sm-4 offset-sm-4">

                    <div class="form-group">


                          <label for="nome">Nome</label>
                        <input type="text" name="nome"  class="form-control">


                          <label for="cpf">cpf</label>
                        <input type="text" name="cpf"  class="form-control">

                          <label for="nascimento">Data Nascimento</label>
                        <input type="text" name="nascimento"  class="form-control">
                    </div>

                    <div class="form-gruop">
                        <input type="submit" value="Salvar" class="btn btn-primary my-2">
                    </div>
                </div>
                </div>
             </form>

        </div>
    </div>
</div>

@endsection

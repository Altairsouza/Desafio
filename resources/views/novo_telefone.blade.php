
@extends('layouts.app_layout')


@section('conteudo')
<div class="container-fluid">
    <div class="row">
        <div class="col">
        <h3>NOVO TELEFONE</h3>
        <hr>


            <form action="{{route('telefone_novo')}}" method="POST">
            @csrf

            
                <div class="row">
                <div class="col-sm-4 offset-sm-4">

                    <div class="form-group">


                          <label for="telefone">Teleofne</label>
                        <input type="text" name="telefone"  class="form-control">


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

@extends('layouts.app_layout')




@section('conteudo')
<div class="container-fluid">
 <div class="row">
     <div class="col">
         <h3>
           LISTA DE MEMBROS
        </h3>

            <div class="my-2">
<a href="{{route('novo_usuario')}}" class="btn btn-primary text-center">Novo Membro</a>
            </div>
            <hr>


            @if($telefones->count() === 0)
            <p>Nãp existem telefone(s) </p>

            @else
            <table class="table table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th>telefone</th>
                        <th class="text-end">Acões</th>
                    </tr>
                </thead>
            <tbody>
        @foreach ($telefones as $telefone )
        <tr>
            <td>{{$telefone->telefone}}</td>
            <td class="text-end"><a  href="{{-- {{route('editar_membro', ['id_usuario'=>$membro->id])}} --}}">EDITAR</a> </td>
            <td ><a  href="{{route('deletar_telefone', ['id_telefone'=>$telefone->id])}}">DELETAR</a> </td>


        </tr>
        @endforeach
    <tbody>
        </table>
        @endif
    </div>
        </div>
    </div>





    {{-- errors --}}


        @if ($errors->any())
        <div>
        <ul>
            @foreach ($errors->all() as $error )
            <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
    @endif
@endsection

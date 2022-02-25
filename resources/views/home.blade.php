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


            @if($membros->count() === 0)
            <p>Nãp existem membros </p>

            @else
            <table class="table table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th>Nome</th>
                        <th >Acões</th>
                        <th >Telefone</th>
                        <th >Endereço</th>
                    </tr>
                </thead>
            <tbody>
        @foreach ($membros as $membro )
        <tr>
            <td>{{$membro->nome}}</td>
            <td ><a  href="{{route('editar_membro', ['id_usuario'=>$membro->id])}}">EDITAR</a> 
             ><a  href="{{route('deletar', ['id_usuario'=>$membro->id])}}">DELETAR</a> </td>
            <td ><a  href="{{route('telefone', )}}">telefone</a> </td>
            <td ><a  href="{{route('endereco', )}}">endereco</a> </td>

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

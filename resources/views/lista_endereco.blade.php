@extends('layouts.app_layout')




@section('conteudo')
<div class="container-fluid">
 <div class="row">
     <div class="col">
         <h3>
           LISTA Endereço(S)
        </h3>


            <hr>


            @if($enderecos->count() === 0)
            <p>Nãp existem endereco(s) </p>

            @else
            <table class="table table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th>Endereço</th>
                        <th>logradouro</th>
                         <th>complemento</th>
                         <th>cep</th>
                          <th>numero</th>
                           <th>bairro</th>
                            <th>cidade</th>
                             <th>estado</th>
                    </tr>
                </thead>
            <tbody>
        @foreach ($enderecos as $endereco )
        <tr>
            <td>{{$endereco->endereco}}</td>
            <td>{{$endereco->logradouro}}</td>
            <td>{{$endereco->complemento}}</td>
            <td>{{$endereco->cep}}</td>
            <td>{{$endereco->numero}}</td>
            <td>{{$endereco->bairro}}</td>
            <td>{{$endereco->cidade}}</td>
            <td>{{$endereco->estado}}</td>



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

@extends('layouts.app_layout')




@section('conteudo')
<div class="container-fluid">
 <div class="row">
     <div class="col">
         <h3>
           LISTA TELEFONE(S)
        </h3>


            <hr>


            @if($telefones->count() === 0)
            <p>Nãp existem telefone(s) </p>

            @else
            <table class="table table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th>telefone</th>

                    </tr>
                </thead>
            <tbody>
        @foreach ($telefones as $telefone )
        <tr>
            <td>{{$telefone->telefone}}</td>

           


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

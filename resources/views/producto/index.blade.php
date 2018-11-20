@extends('layouts.app')

@section("titulo")
Home
@endsection

@section('contenedor')

<div class="container-fluid">
    <div class="box box-success">
        <div class="box-header">
            <i class="fa fa-comments-o"></i>
            <h3 class="box-title">Chat</h3>
        </div>
        <div class="box-body chat" id="chat-box">
            <table class="table">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>Precio</th>
                        <th>Cantidad</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($producto as $value)
                        <tr>
                            <th>{{$value->id}}</th>
                            <th>{{$value->nombre}}</th>
                            <th>{{$value->precio}}</th>
                            <th>{{$value->cantidad}}</th>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
</div>

@endsection

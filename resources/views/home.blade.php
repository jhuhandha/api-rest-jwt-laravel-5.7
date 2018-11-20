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
            <form action="" method="post">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">Nombre</label>
                            <input type="text" name="nombre" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">Precio</label>
                            <input type="text" name="precio" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">Cantidad</label>
                            <input type="text" name="cantidad" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-success pull-right">Guardar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

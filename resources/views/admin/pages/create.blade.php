@extends('adminlte::page')

@section('title', 'Cadastro na Agenda')

@section('content_header')
<h1>Cadastrar Nova Informação na Agenda</h1>
@stop

@section('content')
<div class='card'>
    <div class="card">
        <div class="card-body">
            <form action="{{route('admin.pages.cadastra')}}" class="form" method="POST">
                @csrf
                <div class="form-group">
                    <label>Nome:</label>
                    <input type="text" name="name" class="form-control" placeholder="Nome:">
                </div>

                <div class="form-group">
                    <label>Telefone:</label>
                    <input type="text" name="phone" class="form-control" placeholder="Telefone:">
                </div>

                <div class="form-group">
                    <label>Estado:</label>
                    <input type="text" name="name" class="form-control" placeholder="Nome:">
                </div>



                <div class="form-group">
                    <label>Cidade:</label>
                    <input type="text" name="name" class="form-control" placeholder="Nome:">
                </div>

                <div class="form-group">
                    <label for="cars" placeholder="informacoes:">Informações:</label>

                    <select name="cars" id="cars" class="form-control">
                        <option value="cliente">CLIENTE</option>
                        <option value="fornecedor">FORNECEDOR</option>
                        <option value="funcionario">FUNCIONARIO</option>

                    </select>

                </div>


                <div class="form-group">
                    <label>Categoria:</label>
                    <input type="text" name="name" class="form-control" placeholder="Nome:">
                </div>


                <div class="form-group">
                    <button type="submit" class="btn btn-dark"> Enviar</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
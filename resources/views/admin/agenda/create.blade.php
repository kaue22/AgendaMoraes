@extends('adminlte::page')

@section('title', 'Cadastro na Agenda')

@section('content_header')
<h1>Cadastrar Nova Informação na Agenda</h1>
@stop

@section('content')
<div class='card'>
    <div class="card">
        <div class="card-body">
            <form action="{{route('admin.agenda.cadastra')}}" class="form" method="POST">
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
                    <select name="estado" class="form-control">
                     
                        <option value=select[name='estado']>select[name='estado']</option>
                        
                    </select>
                </div>



                <div class="form-group">
                    <label>Cidade:</label>
                    <select name="cidade" class="form-control">
            
                        <option value=select[name='cidade']>Cidade</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="info" placeholder="informacoes:">Informações:</label>

                    <select name="info" class="form-control">
                        <option value="cliente">CLIENTE</option>
                        <option value="fornecedor">FORNECEDOR</option>
                        <option value="funcionario">FUNCIONARIO</option>

                    </select>

                </div>


                <div class="form-group">
                    <label>Categoria:</label>
                    <input type="text" name="categoria" class="form-control" placeholder="Categoria:">
                </div>


                <div class="form-group">
                    <button type="submit" class="btn btn-dark"> Enviar</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('js')
<script>
$.getJSON('https://servicodados.ibge.gov.br/api/v1/localidades/estados/', { id: 10, }, function (json) {

var options = '<option value="">–  –</option>';

for (var i = 0; i < json.length; i++) {

    options += '<option data-id="' + json[i].id + '" value="' + json[i].nome + '" >' + json[i].nome + '</option>';

}

$("select[name='estado']").html(options);

});


$("select[name='estado']").change(function () {

if ($(this).val()) {
    $.getJSON('https://servicodados.ibge.gov.br/api/v1/localidades/estados/' + $(this).find("option:selected").attr('data-id') + '/municipios', { id: $(this).find("option:selected").attr('data-id') }, function (json) {

        var options = '<option value="">–  –</option>';

        for (var i = 0; i < json.length; i++) {

            options += '<option value="' + json[i].nome + '" >' + json[i].nome + '</option>';

        }

        $("select[name='cidade']").html(options);

    });

} else {

    $("select[name='cidade']").html('<option value="">–  –</option>');

}

});





</script>
@stop
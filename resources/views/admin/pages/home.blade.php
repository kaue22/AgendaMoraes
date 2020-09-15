@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')


<h1>BEM VINDO</a></h1>
@stop

@section('content')
<body>
        Ola,<h3>{{auth()->user()->name}}</h3>
        Bem vindo a sua Agenda! <br/><br/>


        <figure>
  <img src="https://img.elo7.com.br/product/zoom/2979F29/agenda-2020-dois-dias-por-pagina-arquivo-digital-agenda-2020.jpg" alt="Agenda">	
 
</figure>
</body>
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">

@stop

@section('js')
<script>
    console.log('Hi!');
</script>
@stop
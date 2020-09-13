@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<h1>AGENDA MORAES</h1>

<h1>Cadastrar novo evento na agenda <a href="{{ route('admin.pages.create') }}" class="btn btn-dark">Add</a></h1>
@stop

@section('content')

@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script>
    console.log('Hi!');
</script>
@stop
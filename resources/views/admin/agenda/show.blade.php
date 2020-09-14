@extends('adminlte::page')

@section('title', 'Detalhes do plano ')

@section('content_header')
    <h1>Agenda</a></h1>
@stop

@section('content')
    <div class='card'>

        <div class="card-header">
            <ul>
                <li>
                    <strong>Nome: </strong>{{ $teste->name }}
                </li>

              
            </ul>

            <form action="{{ route('plans.destroy', $plan->url) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Deletar o plano</button>
            </form>
        </div>
    </div>
@endsection

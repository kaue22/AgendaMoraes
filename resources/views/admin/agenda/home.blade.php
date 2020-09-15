@extends('adminlte::page')

@section('title', 'Planos')

@section('content_header')
<h1>AGENDA MORAES</h1>

<h1>Cadastrar novo evento na agenda <a href="{{ route('admin.agenda.create') }}" class="btn btn-dark">Add</a></h1>
@stop

@section('content')
    <div class='card'>

        <div class="card-header">
           
                @csrf
                <input type="text" name="filter" placeholder="nome" class="form-control" value={{ $filters['filter'] ?? '' }}>
                <button type="submit" class="btn btn-dark">Filtrar</button>

            </form>
        </div>

        <div class="card-body">
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Telefone</th>
                        <th>Estado</th>
                        <th>Cidade</th>
                        <th>Informação</th>
                        <th>categoria</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($mostra ?? '' as $agenda)
                        <tr>
                            <td>
                                {{ $agenda->name }}
                            </td>
                            <td>
                                {{ $agenda->phone }}
                            </td>
                            <td>
                                {{ $agenda->estado }}
                            </td>
                            <td>
                                {{ $agenda->cidade }}
                            </td>
                            <td>
                                {{ $agenda->info }}
                            </td>
                            <td>
                                {{ $agenda->categoria }}
                            </td>
                        </tr>
                        
                    @endforeach

                </tbody>
                
            </table>
            
        </div>
   
@stop

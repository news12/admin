@extends('adminlte::page')

@section('title', 'Usuários')

@section('content_header')
    <h1>
        Meus Usuários
        <div class="text-right">
            <a href="{{ route('users.create') }}" class="btn btn-sm btn-outline-primary">Novo Usuário</a>
        </div>
    </h1>
@endsection

@section('content')

    <div class="card">
        <div class="card-body">
            <table class="table table-hover">
                <thead class="table table-secondary">
                <tr>
                    <th>Nome</th>
                    <th>E-mail</th>
                    <th>Ações</th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>
                            <a href="{{ route('users.edit', ['user' => $user->id]) }}" class="btn btn-sm btn-warning">Editar</a>
                            @if($loggedId !== intval($user->id))
                            <form class="d-inline"
                                  method="POST"
                                  action="{{ route('users.destroy', ['user' => $user->id]) }}"
                                  onsubmit="return confirm('Tem certeza que deseja excluir?')">
                                @method('DELETE')
                                @csrf
                                <button class="btn btn-sm btn-danger">Excluir</button>
                            </form>
                            @endif
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

    {{ $users->links()  }}

@endsection

@extends('admin.layouts.app')
@section('title', 'Editar Usuario')

@section('content')
<div class="flex gap-4 flex-col">
    <div>
        <a href="{{ route('users.index') }}">Voltar</a>
    </div>
    <div>    
        <div> Detalhes do Usuário</div>
        <div>
        {{ $user->name }}
        </div>
        <div>
        {{ $user->email }}
        </div>
    </div>
    <div class="flex gap-4 flex-col">
        <a href="{{ route('users.edit', $user->id) }}">
            <button class="bg-gray-400 px-3 py-2 rounded">Editar {{ $user->name }}</button>
        </a>

        @can('is-admin')
        <form action="{{ route('users.destroy', $user->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button class="bg-red-400 px-3 py-2 rounded">Deletar {{ $user->name }}</button>
        </form>
        @endcan
    </div>
</div>
@endsection
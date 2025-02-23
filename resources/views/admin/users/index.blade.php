@extends('admin.layouts.app')
@section('title', 'Lista de Usuários')
@section('content')

<x-alert/>

<div class="text-4xl">Lista de Usuários</div>
<div>
<a href="{{ route('users.create') }}"> <button class=" rounded px-4 py-3 bg-gray-800 text-white">Novo Usuário</button> </a>
</div>



<table class="bg-gray-200">
    <thead>
        <tr>
            <th>NOME</th>
            <th>EMAIL</th>
            <th>ACOES</th>
        </tr>
    </thead>
<tbody>
    @forelse ($users as $user)
        <tr>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>
                <a href="{{ route('users.edit', $user->id) }}">Editar</a>
                <span>|</span>
                <a href="{{ route('users.show', $user->id) }}">Detalhes</a>
            </td>
        </tr>
    @empty
        <tr>
            <td colspan="3">Nenhum usuário cadastrado</td>
        </tr>
    @endforelse
</tbody>
</table>
<div class="flex">  {{ $users->onEachSide(5)->links() }}</div>
@endsection
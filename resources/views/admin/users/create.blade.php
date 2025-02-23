@extends('admin.layouts.app')
@section('title', 'Adicionar Usuario')

@section('content')
<h2>Adicionar Usuario</h2>

<x-alert />

<form action="{{ route('users.store') }}" method="POST">
    @csrf
    <input type="text" name="name" placeholder="Nome" value="{{ old('name') }}">
    <input type="email" name="email" placeholder="Email" value="{{ old('email') }}">
    <input type="password" name="password" placeholder="Senha">
    <button type="submit">Cadastrar</button>
</form>
@endsection
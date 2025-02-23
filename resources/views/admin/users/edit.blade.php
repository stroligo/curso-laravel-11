@extends('admin.layouts.app')
@section('title', 'Editar Usuario')

@section('content')
<h2>Editar Usuario: {{ $user->name }}</h2>

<x-alert />

<form action="{{ route('users.update', $user->id) }}" method="POST">
    @csrf()
    @method('PUT')
    <input type="text" name="name" placeholder="Nome" value="{{ $user->name }}">
    <input type="email" name="email" placeholder="Email" value="{{ $user->email }}">
    <button type="submit">Editar</button>
</form>
@endsection
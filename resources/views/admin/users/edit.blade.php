@extends('admin.layouts.app')
@section('title', 'Editar Usuario')

@section('content')
<h2>Editar Usuario: {{ $user->name }}</h2>

<x-alert />

<form action="{{ route('users.update', $user->id) }}" method="POST">
    @method('PUT')
    @include('admin.users.partials.form')
</form>
@endsection
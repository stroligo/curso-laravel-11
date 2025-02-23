@extends('admin.layouts.app')
@section('title', 'Adicionar Usuario')

@section('content')
<h2>Adicionar Usuario</h2>

<form action="{{ route('users.store') }}" method="POST">
    @include('admin.users.partials.form')
</form>
@endsection
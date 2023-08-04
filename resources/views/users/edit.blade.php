@extends('layouts.app')

@section('title', 'Editar usuário')

@section('content')
<h1>Editar Usuário - {{ $user->name }}</h1>

@if ($errors->any())
    <ul class="errors">
        @foreach ($errors->all() as $error)
            <li class="error">{{ $error }}</li>
        @endforeach
    </ul>    
@endif

<form action="{{ route('users.update', $user->id) }}" method="post">
    {{-- <input type="hidden" name="_method" value="PUT"> --}}
    @method('PUT')
    @csrf
    <input type="text" name="name" id="name" placeholder="Nome:" value="{{ $user->name }}">
    <br><br>
    <input type="email" name="email" id="email" placeholder="E-mail:" value="{{ $user->email }}">
    <br><br>
    <input type="password" name="password" id="password" placeholder="Senha:">
    <br><br>
    <button type="submit">Enviar</button>
</form>

@endsection
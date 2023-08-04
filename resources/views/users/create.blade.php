@extends('layouts.app')

@section('title', 'Novo usuário')

@section('content')
<h1>Novo Usuário</h1>

@if ($errors->any())
    <ul class="errors">
        @foreach ($errors->all() as $error)
            <li class="error">{{ $error }}</li>
        @endforeach
    </ul>    
@endif

<form action="{{ route('users.store') }}" method="POST">
    @csrf
    <input type="text" name="name" id="name" placeholder="Nome:" value="{{ old('name') }}">
    <br><br>
    <input type="email" name="email" id="email" placeholder="E-mail:" value="{{ old('email') }}">
    <br><br>
    <input type="password" name="password" id="password" placeholder="Senha:">
    <br><br>
    <button type="submit">Enviar</button>
</form>

@endsection
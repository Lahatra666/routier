@extends('layout.app')

@foreach($errors->all() as $error)
    {{ $error }}
@endforeach

@section('content')
    <h1>Formulaire login</h1>
    <form method="POST" action="{{ route('authenticate') }}" >
        @csrf
        <p>Email : <input class="form-label" type="email" name="email" placeholder="email"></p>
        <p>Mot de passe <input class="form-label" type="text" name="password" placeholder="password"></p>
        <p><input type="submit" value="login"></p>
    </form>
@endsection
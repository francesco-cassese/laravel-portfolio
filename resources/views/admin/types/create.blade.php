@extends('layouts.admin');

@section('title','Aggiungi una tipologia');

@section('content');

<form action="{{ route("admin.types.store") }}" method="POST">

    @csrf

    <div class="mb-3">
        <label for="name" class="form-label">Nome</label>
        <input type="text" name="name" id="name" class="form-control">
    </div>

    <button type="submit" class="btn btn-primary">Salva</button>

</form>

@endsection

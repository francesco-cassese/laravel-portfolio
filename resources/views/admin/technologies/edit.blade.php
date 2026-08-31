@extends('layouts.admin');

@section('title','Modifica tecnologia');

@section('content');

<form action="{{ route("admin.technologies.update", $technology) }}" method="POST">

    @csrf
    @method('PUT')

    <div class="mb-3">
        <label for="name" class="form-label">Nome</label>
        <input type="text" name="name" id="name" value="{{ $technology->name }}" class="form-control">
    </div>

    <div class="mb-3">
        <label for="color" class="form-label">Colore</label>
        <input type="color" name="color" id="color" value="{{ $technology->color }}" class="form-control form-control-color">
    </div>

    <button type="submit" class="btn btn-primary">Salva</button>

</form>

@endsection

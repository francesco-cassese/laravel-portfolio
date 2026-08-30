@extends('layouts.admin');

@section('title','Modifica tipologia');

@section('content');

<form action="{{ route("admin.types.update", $type) }}" method="POST">

    @csrf
    @method('PUT')

    <div class="mb-3">
        <label for="name" class="form-label">Nome</label>
        <input type="text" name="name" id="name" value="{{ $type->name }}" class="form-control">
    </div>

    <button type="submit" class="btn btn-primary">Salva</button>

</form>

@endsection

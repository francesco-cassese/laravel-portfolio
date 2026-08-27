@extends('layouts.admin');

@section('title','Aggiungi un progetto');

@section('content');

<form action="{{ route("admin.projects.store") }}" method="POST">

    @csrf

    <div class="mb-3">
        <label for="title" class="form-label">Titolo</label>
        <input type="text" name="title" id="title" class="form-control">
    </div>

    <div class="mb-3">
        <label for="slug" class="form-label">Slug</label>
        <input type="text" name="slug" id="slug" class="form-control">
    </div>

    <div class="mb-3">
        <label for="description" class="form-label">Descrizione</label>
        <textarea name="description" id="description" rows="5" class="form-control"></textarea>
    </div>

    <div class="mb-3">
        <label for="image" class="form-label">Immagine</label>
        <input type="file" name="image" id="image" class="form-control">
    </div>

</form>

@endsection
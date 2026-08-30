@extends('layouts.admin');

@section('title','Aggiungi un progetto');

@section('content');

<form action="{{ route("admin.projects.store") }}" method="POST" enctype="multipart/form-data">

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
        <input type="file" name="image" id="image" class="form-control" accept="image/*">
        <div class="form-text">Formato consigliato 16:9, max 2MB.</div>
    </div>

    <div class="mb-3">
        <label for="repo_url" class="form-label">Link repository GitHub</label>
        <input type="url" name="repo_url" id="repo_url" class="form-control" placeholder="https://github.com/...">
    </div>

    <div class="mb-3">
        <label for="type_id" class="form-label">Tipologia</label>
        <select name="type_id" id="type_id" class="form-control">
            @foreach ($types as $type)
                <option value="{{ $type->id }}">{{ $type->name }}</option>
            @endforeach
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Salva</button>

</form>

@endsection
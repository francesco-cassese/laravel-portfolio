@extends('layouts.admin')

@section('page-title', 'Tecnologie')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="hero-title">Tecnologie</h1>
    <a href="{{ route('admin.technologies.create') }}" class="btn btn-primary">Nuova tecnologia</a>
</div>

<div class="card">
    <div class="card-body">
        <table class="table align-middle">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Colore</th>
                    <th class="text-end">Azioni</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($technologies as $technology)
                    <tr>
                        <td>{{ $technology->name }}</td>
                        <td>
                            <span class="badge" style="background-color: {{ $technology->color }}">{{ $technology->color }}</span>
                        </td>
                        <td class="text-end">
                            <a href="{{ route('admin.technologies.edit', $technology) }}" class="btn btn-sm btn-outline-primary">
                                <i class="bi bi-pencil"></i>
                            </a>
                            <button type="button" class="btn btn-sm btn-outline-danger" data-bs-toggle="modal" data-bs-target="#deleteModal-{{ $technology->id }}">
                                <i class="bi bi-trash"></i>
                            </button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="text-center text-secondary py-4">Nessuna tecnologia trovata</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@foreach ($technologies as $technology)
    <div class="modal fade" id="deleteModal-{{ $technology->id }}" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5">Elimina la tecnologia</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Vuoi eliminare "{{ $technology->name }}"?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annulla</button>
                    <form action="{{ route('admin.technologies.destroy', $technology) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <input type="submit" class="btn btn-outline-danger" value="Elimina definitivamente">
                    </form>
                </div>
            </div>
        </div>
    </div>
@endforeach

@endsection

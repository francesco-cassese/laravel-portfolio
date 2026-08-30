@extends('layouts.admin')

@section('page-title', 'Tipologie')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="hero-title">Tipologie</h1>
    <a href="{{ route('admin.types.create') }}" class="btn btn-primary">Nuova tipologia</a>
</div>

<div class="card">
    <div class="card-body">
        <table class="table align-middle">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th class="text-end">Azioni</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($types as $type)
                    <tr>
                        <td>{{ $type->name }}</td>
                        <td class="text-end">
                            <a href="{{ route('admin.types.edit', $type) }}" class="btn btn-sm btn-outline-primary">
                                <i class="bi bi-pencil"></i>
                            </a>
                            <button type="button" class="btn btn-sm btn-outline-danger" data-bs-toggle="modal" data-bs-target="#deleteModal-{{ $type->id }}">
                                <i class="bi bi-trash"></i>
                            </button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="2" class="text-center text-secondary py-4">Nessuna tipologia trovata</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@foreach ($types as $type)
    <div class="modal fade" id="deleteModal-{{ $type->id }}" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5">Elimina la tipologia</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Vuoi eliminare "{{ $type->name }}"?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annulla</button>
                    <form action="{{ route('admin.types.destroy', $type) }}" method="POST">
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

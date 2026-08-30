@extends('layouts.admin')

@section('page-title', 'Progetti')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="hero-title">Progetti</h1>
</div>

<div class="card">
    <div class="card-body">
        <table class="table align-middle">
            <thead>
                <tr>
                    <th>Immagine</th>
                    <th>Titolo</th>
                    <th>Slug</th>
                    <th>Type</th>
                    <th class="text-end">Azioni</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($projects as $project)
                    <tr>
                        <td>
                            @if ($project->image)
                                <img src="{{ asset('storage/' . $project->image) }}" alt="{{ $project->title }}" class="table-thumb">
                            @else
                                <span class="text-secondary">—</span>
                            @endif
                        </td>
                        <td>{{ $project->title }}</td>
                        <td>{{ $project->slug }}</td>
                        <td>
                            @if ($project->type)
                                {{ $project->type->name }}
                            @else
                                <span class="text-secondary">—</span>
                            @endif
                        </td>
                        <td class="text-end">
                            <a href="{{ route('admin.projects.show', $project) }}" class="btn btn-sm btn-outline-primary">
                                <i class="bi bi-eye"></i>
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center text-secondary py-4">Nessun progetto trovato</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection

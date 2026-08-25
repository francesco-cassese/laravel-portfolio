@extends('layouts.admin')

@section('page-title', __('Progetti'))

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="hero-title">{{ __('Progetti') }}</h1>
</div>

<div class="card">
    <div class="card-body">
        <table class="table align-middle">
            <thead>
                <tr>
                    <th>{{ __('Immagine') }}</th>
                    <th>{{ __('Titolo') }}</th>
                    <th>{{ __('Slug') }}</th>
                    <th class="text-end">{{ __('Azioni') }}</th>
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
                        <td class="text-end">
                            <a href="{{ route('admin.projects.show', $project) }}" class="btn btn-sm btn-outline-primary">
                                <i class="bi bi-eye"></i>
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center text-secondary py-4">{{ __('Nessun progetto trovato') }}</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection

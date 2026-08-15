@extends('layouts.admin')

@section('page-title', __('Dashboard'))

@section('content')
<div class="admin-hero mb-4">
    <div>
        <p class="hero-eyebrow">{{ __('Bentornato') }}</p>
        <h1 class="hero-title">{{ Auth::user()->name }}</h1>
        <p class="hero-subtitle">{{ __('Ecco un riepilogo del tuo portfolio') }} · {{ now()->format('d/m/Y') }}</p>
    </div>
    <i class="bi bi-stars hero-icon"></i>
</div>

<div class="row g-3 dashboard-stats">
    <div class="col-md-4">
        <div class="card stat-card">
            <div class="card-body d-flex align-items-center gap-3">
                <div class="stat-icon bg-primary-subtle text-primary">
                    <i class="bi bi-kanban"></i>
                </div>
                <div>
                    <p class="stat-label text-secondary mb-1">{{ __('Progetti') }}</p>
                    <p class="fs-2 fw-bold mb-0">0</p>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card stat-card">
            <div class="card-body d-flex align-items-center gap-3">
                <div class="stat-icon bg-success-subtle text-success">
                    <i class="bi bi-envelope"></i>
                </div>
                <div>
                    <p class="stat-label text-secondary mb-1">{{ __('Messaggi') }}</p>
                    <p class="fs-2 fw-bold mb-0">0</p>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card stat-card">
            <div class="card-body d-flex align-items-center gap-3">
                <div class="stat-icon bg-warning-subtle text-warning">
                    <i class="bi bi-people"></i>
                </div>
                <div>
                    <p class="stat-label text-secondary mb-1">{{ __('Utenti') }}</p>
                    <p class="fs-2 fw-bold mb-0">1</p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card quick-actions-card mt-4">
    <div class="card-body">
        <h2 class="quick-actions-title">{{ __('Azioni rapide') }}</h2>
        <div class="quick-actions">
            <a href="{{ route('profile.edit') }}" class="quick-action">
                <i class="bi bi-person-gear"></i>
                <span>{{ __('Modifica profilo') }}</span>
            </a>
            <a href="{{ url('/') }}" class="quick-action">
                <i class="bi bi-globe"></i>
                <span>{{ __('Vedi il sito') }}</span>
            </a>
        </div>
    </div>
</div>
@endsection

@extends('layouts.admin')

@section('page-title', __('Dashboard'))

@section('content')
<div class="row g-3">
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
@endsection

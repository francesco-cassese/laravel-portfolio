@extends('layouts.app')

@section('content')
<section class="home-hero">
    <div class="container py-5">
        <div class="row align-items-center">
            <div class="col-lg-7">
                <p class="hero-eyebrow">Portfolio</p>
                <h1 class="home-hero-title">Ciao, sono Francesco Cassese</h1>
                <p class="home-hero-subtitle">Sviluppatore web in formazione, mi piace costruire interfacce pulite e applicazioni solide.</p>
                <a href="#projects" class="btn btn-light btn-lg mt-3">Guarda i progetti</a>
            </div>
        </div>
    </div>
</section>

<section id="projects" class="container py-5">
    <h2 class="section-title text-center mb-4">Progetti</h2>

    <div class="row g-4">
        @forelse ($projects as $project)
            <div class="col-md-6 col-lg-4">
                <div class="card project-card h-100">
                    @if ($project->image)
                        <img src="{{ asset('storage/' . $project->image) }}" alt="{{ $project->title }}" class="card-img-top project-card-img">
                    @else
                        <div class="project-card-img project-card-img-placeholder">
                            <i class="bi bi-image"></i>
                        </div>
                    @endif
                    <div class="card-body d-flex flex-column">
                        @if ($project->type)
                            <span class="project-type-badge">{{ $project->type->name }}</span>
                        @endif
                        <h3 class="card-title project-card-title">{{ $project->title }}</h3>
                        <p class="card-text project-card-text">{{ Str::limit($project->description, 110) }}</p>
                        @if ($project->repo_url)
                            <a href="{{ $project->repo_url }}" target="_blank" rel="noopener" class="project-card-link mt-auto">
                                <i class="bi bi-github"></i> Vedi su GitHub
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        @empty
            <p class="text-center text-secondary">Nessun progetto ancora pubblicato.</p>
        @endforelse
    </div>
</section>

@endsection


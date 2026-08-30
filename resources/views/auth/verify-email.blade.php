@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Verifica il tuo indirizzo email</div>

                <div class="card-body">
                    @if (session('resent'))
                    <div class="alert alert-success" role="alert">
                        Un nuovo link di verifica è stato inviato al tuo indirizzo email.
                    </div>
                    @endif

                    Prima di continuare, controlla la tua email per il link di verifica.
                    Se non hai ricevuto l'email,
                    <form class="d-inline" method="POST" action="{{ route('verification.send') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">clicca qui per richiederne un altro</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

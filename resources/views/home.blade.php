@extends('layouts.default')

@section('content')
    <h4>Generer un raccourci de votre lien.</h4>
    <br>
    <form method="POST">
        {{ csrf_field() }}
        <div class="form-group">
            <input type="text" name="url" class="form-control{{ (isset($error)) ? " is-invalid" : "" }}" id="url" placeholder="Le lien à raccourcir...">
            <small class="form-text text-muted">Veuillez mettre un lien correcte qui respecte les normes</small>
        </div>
        <button type="submit" class="btn btn-primary">Raccourcir</button>
    </form>

    @if (isset($shorted))
        <br>
        <div class="alert alert-secondary" role="alert">
            Le lien à été generer: <a href="http://localhost:8000/{{ $shorted }}">localhost:8000/{{ $shorted }}</a>
        </div>
    @endif
@endsection
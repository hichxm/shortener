@extends('layouts.default')

@section('content')
    <h4>Contacter le developpeur.</h4>
    <br>
    <form method="POST">
        {{ csrf_field() }}
        @if(isset($success))
            <div class="alert alert-success" role="alert">
                L'email à bien été enregistré nous vous contacterons au plus vite.</a>
            </div>
        @endif
        @if(isset($error))
            <div class="alert alert-danger" role="alert">
                Une erreur est survenu verifier votre email et le contenu du text.</a>
            </div>
        @endif
        <div class="form-group">
            <input type="email" name="mail" class="form-control" id="mail" placeholder="name@example.com">
            <small class="form-text text-muted">Veuillez mettre votre email pour recevoir une reponse au plus vite.</small>
        </div>
        <div class="form-group">
            <textarea class="form-control" name="content" id="content" rows="3" placeholder="Contenu du mail...."></textarea>
            <small class="form-text text-muted">Veuillez detailler au mieux votre mail afin de recevoir une réponse plus explicite.</small>
        </div>
        <button type="submit" class="btn btn-primary">Envoyer</button>
    </form>
@endsection
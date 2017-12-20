@extends('layouts.default')

@section('content')
    <h4>Statistique du raccourciceur de lien.</h4>
    <br>
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Ref. code</th>
                <th scope="col">Lien</th>
                <th scope="col">Nombre de fois visité</th>
            </tr>
        </thead>
        <tbody>
            @foreach($items as $item)
                <tr>
                    <th scope="row">{{ $x++ }}</th>
                    <td class="text-uppercase"><a href="{{ route("home.shorted", $item->shorted) }}">{{ $item->shorted }}</a></td>
                    <td class="text-muted">{{ (strlen($item->link) > 70) ? substr($item->link, 0, 80) . "..." : $item->link }}</td>
                    <td class="text-center">{{ $item->used }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="row">
        <div class="col-sm-4">
            <div class="card bg-light mb-2" style="max-width: 20rem;">
                <div class="card-header text-center">Nombre de lien raccourci</div>
                <div class="card-body text-center">
                    <h4 class="card-title">{{$stats[1]->value}}</h4>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="card bg-light mb-2" style="max-width: 20rem;">
                <div class="card-header text-center">Nombre de lien visité</div>
                <div class="card-body text-center">
                    <h4 class="card-title">{{$stats[0]->value}}</h4>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="card bg-light mb-2" style="max-width: 20rem;">
                <div class="card-header text-center">Version du systeme</div>
                <div class="card-body text-center">
                    <h4 class="card-title">{{$stats[2]->value}}</h4>
                </div>
            </div>
        </div>
    </div>

    <br>
    <h4>Rechercher des informations sur un lien.</h4>
    <br>
    <form method="POST">
        {{ csrf_field() }}
        <div class="form-group">
            <input type="text" name="shorted" class="form-control{{ (isset($error)) ? " is-invalid" : "" }}" id="url" placeholder="Le lien raccourci.">
            <small class="form-text text-muted">Veuillez mettre le raccourci d'un lien ou le lien raccourci.</small>
        </div>
        @if (isset($error))
            <div class="alert alert-secondary" role="alert">
                Le lien envoyé est invalide.</a>
            </div>
        @endif
        <button type="submit" class="btn btn-primary">Rechercher</button>
    </form>

    @if(isset($search))
        <br>
        <div class="row">
            <div class="col-sm-4">
                <div class="card bg-light mb-2" style="max-width: 20rem;">
                    <div class="card-header text-center">Raccourci du lien</div>
                    <div class="card-body text-center">
                        <h4 class="card-title text-uppercase"><a href="{{ route("home.shorted", $search->shorted) }}">{{$search->shorted}}</a></h4>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="card bg-light mb-2" style="max-width: 20rem;">
                    <div class="card-header text-center">Nombre de fois visité</div>
                    <div class="card-body text-center">
                        <h4 class="card-title">{{$search->used}}</h4>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="card bg-light mb-2" style="max-width: 20rem;">
                    <div class="card-header text-center">Date de création</div>
                    <div class="card-body text-center">
                        <h4 class="card-title">{{$search->created_at}}</h4>
                    </div>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="card bg-light mb-2">
                    <div class="card-header text-center">Lien</div>
                    <div class="card-body text-center">
                        <h4 class="card-title">{{ (strlen($search->link) > 70) ? substr($search->link, 0, 80) . "..." : $search->link }}</h4>
                    </div>
                </div>
            </div>
        </div>
    @endif

@endsection
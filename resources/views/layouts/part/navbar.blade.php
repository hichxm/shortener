<li class="nav-item">
    <a class="nav-link{{ (Route::currentRouteName() == "home.view") ? " active" : "" }}{{ (Route::currentRouteName() == "home.store") ? " active" : "" }}" href="{{ route("home.view") }}">Nouveau</a>
</li>
<li class="nav-item">
    <a class="nav-link{{ (Route::currentRouteName() == "stats.view") ? " active" : "" }}{{ (Route::currentRouteName() == "stats.search") ? " active" : "" }}" href="{{ route("stats.view") }}">Statistique</a>
</li>
<li class="nav-item">
    <a class="nav-link{{ (Route::currentRouteName() == "contact.view") ? " active" : "" }}{{ (Route::currentRouteName() == "contact.store") ? " active" : "" }}" href="{{ route("contact.view") }}">Contact</a>
</li>
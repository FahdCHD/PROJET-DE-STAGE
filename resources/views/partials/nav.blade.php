@php $rolename = auth()->user()->role == 1 ? 'superadmin' : 
$rolename = auth()->user()->role == 2 ? 'admin' : 
$rolename = auth()->user()->role == 3 ? 'dephead' : 
$rolename = auth()->user()->role == 4 ? 'staff' : 
$rolename = auth()->user()->role == 5 ? 'client' : '' @endphp
<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
      <a class="navbar-brand" href="/home">Projet de stage</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse d-flex justify-content-between" id="navbarNav" >
        <div>
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="/{{$rolename}}">Home</a>
          </li>
        </div>
          @auth
          <div class="dropdown">
            <button class="btn btn-success dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                @if(auth()->user()->role == 1)
                    Super Admin
                @elseif(auth()->user()->role == 2)
                    Admin
                @elseif(auth()->user()->role == 3)
                    Department head
                @elseif(auth()->user()->role == 4)
                    Staff
                @elseif(auth()->user()->role == 5)
                    Client
                @endif
                | {{auth()->user()->name}} 
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" href="{{route('login.logout')}}">Déconnexion</a>
            </div>
          </div>
          @endauth
        </ul>
 
     
      </div>
    </div>
  </nav>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">

    <title>Document</title>
</head>
<body>
    <div class="container">
        <div >
          @if ($errors->any())
            <x-alert type="danger">
              <ul style="list-style: none">
                <li><h6>Errors:</h6></li>
              @foreach ($errors->all() as $error)
                 <li> {{$error}} </li>
              @endforeach
              </ul>
            </x-alert>        
          @endif
        <form method="POST" action="{{url('profiles/edit/'.$U->id)}}">
            @csrf
            @method('PUT')
            <div class="m-3">
               <div class="form-group">
                 <label class="form-label" >Nom</label>
                 <input type="text" class="form-control" name="name" aria-describedby="helpId" value="{{$U->name}}">
                 <small id="helpId" class="form-text text-muted">Help text</small>
               </div>
               {{-- @error('name')
               <div class="text-danger"> 
                    {{$message}}
              </div>
               @enderror --}}
            </div>
            <div class="m-3">
               <div class="form-group">
                 <label class="form-label" >Email</label>
                 <input type="email" class="form-control" name="email"  aria-describedby="helpId" value="{{$U->email}}">
                 <small id="helpId" class="form-text text-muted">Help text</small>
                 {{-- @error('email')
                 <div class="text-danger"> 
                      {{$message}}
                </div>
                 @enderror --}}
              </div>
            </div>
            <div class="m-3">
               <div class="form-group">
                 <label class="form-label" >Password</label>
                 <input type="password" class="form-control" name="password"  aria-describedby="helpId">            
                 <small id="helpId" class="form-text text-muted">Help text</small>
               </div>
            </div>
            <div class="m-3">
              <div class="form-group">
                <label class="form-label" >Password Confirmation</label>
                <input type="password" class="form-control" name="password_confirmation"  aria-describedby="helpId">
                <small id="helpId" class="form-text text-muted">Help text</small>
              </div>
           </div>
    
            <button type="submit" class="btn btn-primary btn-block">Modifier</button>
        </form>
        </div>
      </div>    
</body>
</html>

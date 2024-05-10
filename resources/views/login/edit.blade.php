<x-master>
  <div class="container">
    <div style="margin-left:550px">
    <form method="POST" action="{{route('update',auth()->user()->id)}}">
        @csrf
        @method('PUT')
        <div class="m-3">
           <div class="form-group">
             <label class="form-label" >Nom</label>
             <input type="text" class="form-control" name="name" aria-describedby="helpId" value="{{auth()->user()->name}}">
             <small id="helpId" class="form-text text-muted">Help text</small>
           </div>
        </div>
        <div class="m-3">
           <div class="form-group">
             <label class="form-label" >Email</label>
             <input type="email" class="form-control" name="email"  aria-describedby="helpId" value="{{auth()->user()->email}}">
             <small id="helpId" class="form-text text-muted">Help text</small>
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
</x-master>

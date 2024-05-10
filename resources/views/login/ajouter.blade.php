<x-master>
    <form method="POST" action="{{route('store')}}">
        @csrf
        <div class="m-3">
           <div class="form-group">
             <label class="form-label" >Nom</label>
             <input type="text" class="form-control" name="name" aria-describedby="helpId">
             <small id="helpId" class="form-text text-muted">Help text</small>
           </div>
        </div>
        <div class="m-3">
           <div class="form-group">
             <label class="form-label" >Email</label>
             <input type="email" class="form-control" name="email"  aria-describedby="helpId">
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

        <button type="submit" class="btn btn-primary btn-block">ajouter</button>
    </form>
</x-master>
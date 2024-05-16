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
        <br>
    <div style="width:300px; ">
        <div class="form-group">
            <form action="/profiles/search" method="get">
                <div class="input-group">
                    <input type="text" name="search" class="form-control" placeholder="search.." value="{{isset($search) ? $search:""}}" >&nbsp &nbsp
                    <button type="submit" class="btn btn-primary">Search</button>
                </div>
            </form>
        </div>
    </div>
    <div class="">
        <table class="table">
            <thead>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
                <th>Action</th>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td style="display: none">{{$user->id}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->name_role}}</td>
                        <td>
                            <div>
                            <a href="{{url('profiles/edit/'.$user->id)}}" style="width: 60%; margin-bottom: 3px" class="btn btn-success">Edit</a>
                            {{-- <a href="{{url('profiles/destroy/'.$user->id)}}"class="btn btn-danger">Delete</a> --}}
                            <form action="{{url('profiles/destroy/'.$user->id)}}" method="POST">
                                @method('DELETE')
                                @csrf
                                <button  style="width: 60%" class="btn btn-danger">Supprimer</button>
                            </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{$users->links()}}
    </div>
</div>
</body>
</html>
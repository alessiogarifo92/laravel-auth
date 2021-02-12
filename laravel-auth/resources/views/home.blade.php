@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Update profile picture</div>

                <div class="card-body">

                  <form class="" action="{{route('update-user')}}" method="post" enctype= 'multipart/form-data'>

                    @csrf
                    @method('post')

                    <input class='form-control border-0' type="file" name="profPic">

                    <br>

                    <input class="btn btn-primary" type="submit" value="save">

                    <a href="{{route('clear-user-pic')}}" class="btn btn-danger">delete</a>

                  </form>

                </div>
            </div>

            <br><br>

            <div class="card">
                <div class="card-header">User's Profile Picture</div>

                <div class="card-body">

                    @csrf
                    @method('post')

                    @if (Auth::user()-> profPic)

                      <h3>{{Auth::user()-> name}}'s profile picture</h3>

                      <img src="{{asset('storage/profPic/' . Auth::user()-> profPic)}}" alt="profile picture" width="450px">

                    @endif

                </div>
            </div>

        </div>
    </div>
</div>
@endsection

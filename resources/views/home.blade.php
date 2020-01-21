@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!

                    @foreach($polls as $poll)
                            <div class="card w-95">
                                <div class="card-body">
                                    <h5 class="card-title"> {{$poll["title"]}}</h5>
                                    <p class="card-text">{{$poll["description"]}}</p>
                                    <a href="{{route('user.vote', ['user'=> Auth::user() , 'poll' => $poll])}}" class="btn btn-primary">Start</a>
                                </div>
                            </div>
                           <br>

                    @endforeach


                </div>
            </div>
        </div>
    </div>
</div>
@endsection

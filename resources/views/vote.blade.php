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

                        Start this pole

                        @foreach($questions as $question)
                            <div class="card w-95">
                                <div class="card-body">
                                    <h5 class="card-title"> {{$question["title"]}}</h5>
                                    {{--<p class="card-text">{{$question["description"]}}</p>--}}
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

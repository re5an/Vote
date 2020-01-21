@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Dashboard</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <div class="">
                            <h2>Start : {{$poll->title}}</h2>
                        </div>

                            <hr>


{{--                        <form method="POST" action="{{ action('VoteController@submitVote') }}">--}}
                        <form method="POST" action="{{ route('user.submit.vote',['user'=>Auth::user(), 'poll'=>$poll->id]) }}">
                            {{csrf_field()}}
                            @foreach($questions as $question)

                                <h3>{{$question["question"]}}</h3><br>
                                <div class="form-check form-check-inline">
                                    <div class="form-group">

                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="question{{$question->id}}" id="inlineRadio1" value="agree">
                                            <label class="form-check-label" for="inlineRadio1">{{__('Agree')}}</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="question{{$question->id}}" id="inlineRadio2" value="notAgree">
                                            <label class="form-check-label" for="inlineRadio2">{{__('NOT Agree')}}</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="question{{$question->id}}" id="inlineRadio3" value="Neither">
                                            <label class="form-check-label" for="inlineRadio3">{{__('Neither')}}</label>
                                        </div>
                                    </div>

                                </div>

                                <br>
                                <hr>

                            @endforeach


                            <div class="col-auto my-1">
                                <button type="submit" class="btn btn-primary">{{__('Submit')}}</button>
                            </div>

                        </form>



                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

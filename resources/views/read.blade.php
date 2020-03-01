@extends('layouts.app')

@section('content')
        <ul class="list-group"></ul>
            <li class="list-group-item"><strong>From : </strong>{{$messages->userFrom->name}} <hr>
                <strong>Email : </strong>{{$messages->userFrom->email}} <hr>
            <strong>Subject : </strong>{{$messages->subject}}
            <hr>
            <strong>Message : </strong>{{$messages->body}}
            </li>
            <br>
            <a href="{{route('create',[$messages->userFrom->id,$messages->subject])}}" class="btn btn-primary d-flex justify-content-center">Replay</a>
        </ul>

@endsection
@extends('layouts.app')

@section('content')

    @if (count($messages))
        <ul class="list-group"></ul>
            @foreach ($messages as $message)
            <a href="{{route('read',$message->id)}}">
                <li class="list-group-item"><strong>FROM : {{$message->userFrom->name}} , {{$message->userFrom->email}} </strong><hr><strong> Subject</strong> : {{$message->subject}}</li>
            </a>
            @endforeach
        </ul>
    @else 
        <p>No Messages </p>
    @endif

@endsection

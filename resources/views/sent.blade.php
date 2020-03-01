@extends('layouts.app')

@section('content')
    @if (count($messages)>0)
        <ul class="list-group"></ul>
            @foreach ($messages as $message)
                <li class="list-group-item"><strong>To : {{$message->userTo->name}} , {{$message->userTo->email}} </strong><hr><strong> Subject</strong> : {{$message->subject}}</li>
            @endforeach
        </ul>
    @else 
    <p>No Messages </p>
    @endif
@endsection
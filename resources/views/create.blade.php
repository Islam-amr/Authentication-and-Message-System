@extends('layouts.app')

@section('content')
<form method="POST" action="{{route('send')}}">
    @csrf
    <div class="form-group">
        <label for="to">To</label>
        <select class="form-control" id="to" name="to">
            @foreach ($users as $user)
                <option value="{{$user->id}}">{{$user->email}} , {{$user->name}}</option>
            @endforeach
        </select>
      </div>
    <div class="form-group">
      <label for="subject">Subject</label>
        <input type="text" class="form-control" id="subject" name="subject"  value="{{$subject}}" placeholder="Enter Subject">
    </div>
    <div class="form-group">
        <label for="message">Message</label>
        <textarea class="form-control" id="message" name="message" rows="4" placeholder="Enter Message" ></textarea>
      </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
@endsection 
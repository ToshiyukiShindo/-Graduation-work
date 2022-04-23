@extends('layouts.lists')
@section('content')

    <body class="w-4/5 md:w-3/5 lg:w-2/5 m-auto">
        <h3 class="my-4 font-bold">{{'boards'}}</h3>
        <form class="my-4 py-2 px-4 rounded-lg bg-gray-300 text-sm flex flex-col md:flex-row flex-grow" action="{{ url('boards') }}" method="POST">
            @csrf
            <input  class="py-1 px-2 rounded text-center flex-initial" name="user_id" value={{Auth::user()->id}} style="width:50px;">
            <input class="py-1 px-2 rounded text-center flex-initial" type="text" name="user_name" value={{ Auth::user()->name }} maxlength="30" required>
            <input class="mt-2 md:mt-0 md:ml-2 py-1 px-2 rounded flex-auto w-50" type="text" name="message" placeholder="Input message." maxlength="200" autofocus required>
            <button class="mt-2 md:mt-0 md:ml-2 py-1 px-2 rounded text-center bg-gray-500 text-white" type="submit">Send</button>
        </form>
        <div class="my-2 p-2 rounded-lg">
            <ul>
                @foreach ($messages as $message)
                    <hr>
                    <p class="text-xs text-left">{{$message->created_at}} ＠{{$message->user_name}}</p>
                    <li class="w-75 mb-3 p-2 rounded-lg bg-white text-dark relative @if($message->user_name == Auth::user()->name) self @else other @endif" style="list-style:none;">
                        {{$message->message}}
                    </li>
                @endforeach
            </ul>
        </div>
    </body>
   
@endsection
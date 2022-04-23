@extends('layouts.lists')
@section('content')

    <body class="w-4/5 md:w-3/5 lg:w-2/5 m-auto">
        <h1 class="my-4 font-bold">{{'boards'}}</h1>
        <form class="my-4 py-2 px-4 rounded-lg bg-gray-300 text-sm flex flex-col md:flex-row flex-grow" action="/chat" method="POST">
            @csrf
            <input  class="py-1 px-2 rounded text-center flex-initial" name="user_identifier" value={{Auth::user()->id}} style="width:50px;">
            <input class="py-1 px-2 rounded text-center flex-initial" type="text" name="user_name" value={{ Auth::user()->name }} maxlength="20">
            <input class="mt-2 md:mt-0 md:ml-2 py-1 px-2 rounded flex-auto w-50" type="text" name="message" placeholder="Input message." maxlength="200">
            <button class="mt-2 md:mt-0 md:ml-2 py-1 px-2 rounded text-center bg-gray-500 text-white" type="submit">Send</button>
        </form>
        <div class="my-4 p-4 rounded-lg bg-blue-200">
            <ul>
                @foreach ($boards as $board)
                    <li class="truncate">{{$board->getData()}}</li>
                @endforeach
            </ul>
        </div>
    </body>
   
@endsection
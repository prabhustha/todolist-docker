<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
            </div>
            <br>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    
                    <h4 style="display: inline">To do list <a href="/create" class="font-semibold text-xl text-green-800 leading-tight px-8 " style="font-size: 1em; text-decoration: underline;" >Create</a></h4>
                   @if (session()->has('message'))
                       <div class="alert alert-success"></div>
                        {{session()->get('message')}}
                        @elseif ($errors->any())
                        @foreach ($errors as $error)
                            {{$error}}
                        @endforeach
                       @endif
                    @foreach ($todo as $todos)
                    
                        <li>
                            @if($todos->completed)
                           <span style="text-decoration:line-through">{{$todos->title}}</span> 
                           @else
                           {{$todos->title}}
                    @endif
                             <a href="{{asset('/edit'.'/'.$todos->id)}}" class="font-semibold text-xl text-blue-800 leading-tight px-8 " style="font-size: 1em; text-decoration: underline;">Edit</a>
                        <a href="{{asset('/status'.'/'.$todos->id)}}" class="font-semibold text-xl text-yellow-800 leading-tight px-8 " style="font-size: 1em; text-decoration: underline;">completed</a>
                        <a href="{{asset('/delete'.'/'.$todos->id)}}"  class="font-semibold text-xl text-red-800 leading-tight px-8 " style="font-size: 1em; text-decoration: underline;">Delete</a>
                        </li>
                    @endforeach
                </div>
            </div>
          
        </div>
    </div>
</x-app-layout>

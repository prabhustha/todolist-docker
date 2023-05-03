<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit ') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900" style="text-align: center">
                    <h1> Edit Todo List</h1>
                   @if ($errors->any())
                   @foreach ($errors->all() as $error)
                    {{$error}}                       
                   @endforeach
                       
                   @endif
                    <form action="/update" method="post">
                        @csrf
                        
                        <input type="text" name="title" value="{{$title}}">
                        <input type="hidden" name="id" value="{{$id}}">
                         <button type="submit" value="submit" style="background-color: blue;color:white">Edit</button>
                         <br>
                   <a href="/dashboard"  style="background-color: black;color:white">Back</a>
                      
                    </form>
                </div>
            </div>
          
        </div>
    </div>
</x-app-layout>
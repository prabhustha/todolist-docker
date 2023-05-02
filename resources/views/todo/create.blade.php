<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create ') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900" style="text-align: center">
                    <h1> Create Todo List</h1>
                    @if(session()->has('message'))
                        <div class="alert alert-success">
                            {{session()->get('message')}}
                        </div>
                        @elseif ($errors->any())
                        @foreach ($errors->all() as $error)
                            {{$error}}
                        @endforeach
                    @endif
                    <form action="/upload" method="post">
                        @csrf
                        <input type="text" name="title">
                         <button type="submit" value="submit" style="background-color: blue;color:white">Create</button>
                         <br>
                   <a href="/dashboard"  style="background-color: black;color:white">Back</a>
                      
                    </form>
                </div>
            </div>
          
        </div>
    </div>
</x-app-layout>
@extends('layouts.app')

@section('title')
Contacts
@endsection
@section('content')

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">


            @foreach($contacts as $contact)
            <div class="mt-2 max-w-sm bg-white rounded-lg border border-gray-200 shadow-md  dark:border-gray-700">
                <div class="flex flex-col items-center pb-10">

                    <h5 class="text-sm">ID : {{$contact->id}}</h5>
                    <h3 class="text-xl">Contact : {{$contact->phone}}</h3>
                    <span class="text-sm">Name : {{$contact->user->name}}</span>
                    <div class="flex mt-4 space-x-3 lg:mt-6">
                        <a class="btn btn-light mr-2" href='{{route("contacts.edit", $contact->id)}}'>Edit</a> |
                        <form method="POST" action="{{route('contacts.destroy', $contact->id)}}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="_method" value="delete" />
                            <button type="submit" class="btn btn-light ml-2">Delete</button>
                        </form>

                    </div>
                </div>
            </div>
            @endforeach


        </div>
    </div>
</div>
@endsection
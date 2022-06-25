@extends('layouts.app')

@section('title')
Contacts
@endsection
@section('content')

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <a class="text-left border-gray-100 text-green-600 block mx-5 mt-4" href="/contacts/create">create
                phones</a>

            <table class="table m-5 p-2">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($contacts as $contact)
                    <tr>
                        <th scope="row">{{$contact->id}}</th>
                        <td>{{$contact->contact}}</td>
                        <td>
                            <a class="btn btn-light" href='users/{{ $contact->id }}/edit'>Edit</a>
                            <form method="POST" action="/users/{{ $contact->id }}">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="hidden" name="_method" value="delete" />
                                <button type="submit" class="btn btn-light">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
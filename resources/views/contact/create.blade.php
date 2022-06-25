@extends('layouts.app')

@section('title')
New Contact
@endsection
@section('content')

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

            <div class="p-6 bg-white border-b border-gray-200">


                <span class="block sm:inline">@foreach ($errors->all() as $error)
                    {{ $error }}
                    @endforeach</span>


                <form method="POST" action="{{ route('contacts.store') }}">
                    @csrf

                    <!-- Email Address -->
                    <div>
                        <x-label for="email" :value="__('Phone')" />

                        <x-input id="phone" class="block mt-1 w-full" type="text" name="phone" :value="old('Phone')"
                            autofocus />
                    </div>

                    <div class="flex items-center  mt-4">

                        <x-button class="ml-3">
                            {{ __('Add') }}
                        </x-button>

                    </div>
                </form>

            </div>
        </div>
    </div>
</div>

@endsection
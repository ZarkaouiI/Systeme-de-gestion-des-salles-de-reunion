@extends('layouts.app')

@section('content')
    <div class="flex justify-center mt-20">
        <div class="w-4/12 bg-white p-6 rounded-lg">

            <form action="{{ route('password.request') }}">
                @csrf
                <div class="mb-4">
                    <label for="email" class="sr-only">Email</label>
                    <input type="email" name="email" id="email" placeholder="Votre adresse email" class="bg-gray-100 border-2 w-full p-4 rounded-lg" value="{{ old('email') }}">
                </div>
            </form>
            <form action="{{route('password.email') }}" method="post">
                @csrf
                <div>
                    <button type="submit" class="bg-blue-500 text-white px-4 py-3 rounded font-medium w-full">
                        Demander le lien
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection

@extends('layouts.app')

@section('content')
    <div class="flex justify-center mt-20">
        <div class="w-4/12 bg-white p-6 rounded-lg">
            @if (session('status'))
                <div class="bg-red-500 p-4 rounded-lg mb-6 text-white text-center">
                    {{ session('status') }}
                </div>
            @endif

            <form action="{{ route('forgotpassword') }}" method="post">
                @csrf
                @if (session('error'))
                    {{ session('error') }}
                @endif

                @if (session('success'))
                    {{ session('success') }}
                @endif
                <div class="mb-4">
                    <label for="email" class="sr-only">Email</label>
                    <input type="email" name="email" id="email" placeholder="Votre adresse email" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('email') border-red-500 @enderror" value="{{ old('email') }}">

                    @error('email')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div>
                    <button type="submit" class="bg-blue-500 text-white px-4 py-3 rounded font-medium w-full">
                        Envoyer
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection

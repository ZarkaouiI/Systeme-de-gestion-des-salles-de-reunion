@extends('layouts.app')

@section('content')
    <div class="flex justify-center mt-20">
        <div class="w-4/12 bg-white p-6 rounded-lg">
            <h2>Réinitialisation du mot de passe</h2>
            {{$user->email}}
            <form action="{{ route('resetpassword', $user->email) }}" method="post">
                @csrf
                @if (count($errors) > 0)
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                @endif
                <div class="mb-4">
                    <label for="password" class="sr-only">Mot de passe</label>
                    <input type="password" name="password" id="password" placeholder="Votre mot de passe" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('password') border-red-500 @enderror" value="">

                    @error('password')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="password_confirmation" class="sr-only">Mot de passe</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Confirmer votre mot de passe" class="bg-gray-100 border-2 w-full p-4 rounded-lg" value="">
                </div>
                <div>
                    <button type="submit" class="bg-blue-500 text-white px-4 py-3 rounded font-medium w-full">
                        Sauveguarder
                    </button>
                </div>
            </form>

        </div>
    </div>
@endsection

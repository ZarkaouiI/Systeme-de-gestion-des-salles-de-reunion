@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-4/12 bg-white p-6 rounded-lg">
            <form action="{{ route('save.meeting') }}" method="post">
                @csrf
                <div class="mb-4">
                    <label for="room">Choisir une salle pour la réunion</label>
                    <select name="room" id="room">
                        @foreach ($rooms as $room)
                            <option value="{{ $room->name}}">{{ $room->name }}</option>
                        @endforeach
                    </select>

                    @error('room')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div>
                    <button type="submit" class="bg-blue-500 text-white px-4 py-3 rounded font-medium w-full">
                        Enregistrer
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection

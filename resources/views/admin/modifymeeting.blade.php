@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-4/12 bg-white p-6 rounded-lg">
            <form action="{{ route('modifymeeting', $meeting) }}" method="post">
                @method('PUT')
                @csrf
                <div class="mb-4">
                    <label for="responsable">Le responsable de la réunion</label>
                    <input type="text" name="responsable" id="responsable" placeholder="Le responsable de la réunion" class="bg-gray-100 border-2 w-full p-4 rounded-lg" value="{{ $meeting->responsable }}">
                </div>

                <div class="mb-4">
                    <label for="date">La date de la réunion</label>
                    <input type="date" name="date" id="date" placeholder="La date de la réunion" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('date') border-red-500 @enderror" value="{{ $meeting->date }}">

                    @error('date')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="start">L'heure de début de la réunion</label>
                    <input type="time" name="start" id="start" placeholder="L'heure de la réunion" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('start') border-red-500 @enderror" value="{{ $meeting->start }}">

                    @error('start')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="end">L'heure de la fin de la réunion</label>
                    <input type="time" name="end" id="end" placeholder="L'heure de la fin de la réunion" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('end') border-red-500 @enderror" value="{{ $meeting->end }}">

                    @error('end')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="attendance">Nombre de participants</label>
                    <input type="text" name="attendance" id="attendance" placeholder="Nombre de participants" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('attendance') border-red-500 @enderror" value="{{ $meeting->attendance }}">

                    @error('attendance')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="room">Choisir une salle pour la réunion</label>
                    <select name="room" id="room">
                        @foreach ($rooms as $room)
                            {{-- Set the time for the room after choosing start and end --}}
                            <option value="{{ $room->name }}" class="bg-gray-100 border-2 w-full p-4 rounded-lg">{{ $room->name }}</option>
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
                        Modifier
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection

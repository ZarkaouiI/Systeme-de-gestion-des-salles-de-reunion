@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-4/12 bg-white p-6 rounded-lg">
            <form action="{{ route('modifyroom', $room) }}" method="post">
                @method('PUT')
                @csrf
                <div class="mb-4">
                    <label for="name" class="sr-only">Nom de la salle</label>
                    <input type="text" name="name" id="name" placeholder="Le nom de la salle" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('name') border-red-500 @enderror" value="{{ $room->name }}">

                    @error('name')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="capacity" class="sr-only">La capacité de la salle</label>
                    <input type="text" name="capacity" id="capacity" placeholder="La capacité de la salle" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('capacity') border-red-500 @enderror" value="{{ $room->capacity }}">

                    @error('capacity')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="description" class="sr-only">Description de la salle</label>
                    <textarea name="description" id="description" cols="30" rows="4" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('description') border-red-500 @enderror" placeholder="Description de la salle">{{ $room->description }}</textarea>

                    {{-- <input type="text" name="description" id="description" placeholder="La description de la salle" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('description') border-red-500 @enderror" value="{{ $room->description }}"> --}}


                    @error('description')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="flex justify-center">
                    <button type="submit" class="bg-blue-500 text-white px-4 py-3 rounded-lg w-5/12">
                        Modifier
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection

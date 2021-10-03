@extends('layouts.app')

@section('content')
    <div class="flex justify-center flex items-center">
        <div class="w-8/12 bg-white p-6 rounded-lg">
            <p class="font-bold text-gray-600">La liste des salles:</p>
            <br>
            <table class="border-collapse border border-blue-500 w-full">
                <thead>
                    <tr>
                        <th class="border border-blue-500">Salle</th>
                        <th class="border border-blue-500">Capacité</th>
                        <th class="border border-blue-500">description</th>
                        <th class="border border-blue-500">Actions</th>
                    </tr>
                </thead>
                @foreach ($rooms as $room)
                    <tbody>
                        <tr>
                            <td class="border border-blue-500">{{ $room->name }}</td>
                            <td class="border border-blue-500">{{ $room->capacity }}</td>
                            <td class="border border-blue-500">{{ $room->description }}</td>
                            <td class="border border-blue-500 align-center">
                                <form action="{{ route('deleteroom', $room->id) }}" method="post">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="text-white bg-red-500 w-full mb-1">Supprimer</button>
                                </form>
                                <form action="" method="post">
                                    @csrf
                                    <button type="submit" class="text-blue-500 bg-white w-full">Modifier</button>
                                </form>
                            </td>
                        </tr>
                    </tbody>
                @endforeach
            </table>
            <br>
            <p class="font-bold text-gray-600">Ajouter une nouvelle salle:</p>
            <br>
            <form action="{{ route('addroom') }}" method="post" class="w-4/12">
                @csrf
                <div class="mb-4">
                    <label for="name" class="sr-only">Nom de la salle</label>
                    <input type="text" name="name" id="name" placeholder="Le nom de la salle" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('name') border-red-500 @enderror" value="{{ old('name') }}">

                    @error('name')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="capacity" class="sr-only">La capacité de la salle</label>
                    <input type="text" name="capacity" id="capacity" placeholder="La capacité de la salle" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('capacity') border-red-500 @enderror" value="{{ old('capacity') }}">

                    @error('capacity')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="description" class="sr-only">Description de la salle</label>
                    <input type="text" name="description" id="description" placeholder="Description de la salle" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('description') border-red-500 @enderror" value="{{ old('description') }}">

                    @error('description')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div>
                    <button type="submit" class="bg-blue-500 text-white px-4 py-3 rounded font-medium w-5/12">
                        Ajouter
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection

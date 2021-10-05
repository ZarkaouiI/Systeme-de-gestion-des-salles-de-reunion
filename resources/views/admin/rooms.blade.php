@extends('layouts.app')

@section('content')
    <div class="flex justify-center flex items-center">
        <div class="w-8/12 bg-white p-6 rounded-lg">
            <p class="font-bold text-gray-600">La liste des salles:</p>
            <br>
            <div class="container">
                <table class="text-left w-full">
                    <thead class="bg-blue-500 flex text-white w-full">
                        <tr class="flex w-full mb-4">
                            <th class="p-4 w-1/4">Salle</th>
                            <th class="p-4 w-1/4">Capacité</th>
                            <th class="p-4 w-1/4">Description</th>
                            <th class="p-4 w-1/4">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-grey-light flex flex-col items-center justify-between overflow-y-scroll w-full" style="height: 30vh;">
                        @foreach ($rooms as $room)
                            <tr class="flex w-full mb-4">
                                <td class="p-4 w-1/4">{{ $room->name }}</td>
                                <td class="p-4 w-1/4">{{ $room->capacity }}</td>
                                <td class="p-4 w-1/4">{{ $room->description }}</td>
                                <td class="p-4 w-1/4">
                                    <form action="{{ route('deleteroom', $room->id) }}" method="post">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="text-white bg-red-500 w-full mb-1">Supprimer</button>
                                    </form>
                                    <form action="">
                                        @csrf
                                        <button type="submit" class="text-blue-500 bg-white w-full">Modifier</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <br>
            <br>
            <p class="font-bold text-gray-600">Ajouter une nouvelle salle:</p>
            <br>
            <div class="flex justify-center">
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
                        <textarea name="description" id="description" cols="30" rows="4" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('description') border-red-500 @enderror" value="{{ old('description') }}" placeholder="Description de la salle"></textarea>


                        @error('description')
                            <div class="text-red-500 mt-2 text-sm">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="flex justify-center">
                        <button type="submit" class="bg-blue-500 text-white px-4 py-3 rounded font-medium w-5/12">
                            Ajouter
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

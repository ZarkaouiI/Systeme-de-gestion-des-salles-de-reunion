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
                    </tr>
                </thead>
                @foreach ($rooms as $room)
                    <tbody>
                        <tr>
                            <td class="border border-blue-500 w-4/12">{{ $room->name }}</td>
                            <td class="border border-blue-500 w-4/12">{{ $room->capacity }}</td>
                            <td class="border border-blue-500 w-8/12">{{ $room->description }}</td>
                        </tr>
                    </tbody>
                @endforeach
            </table>
        </div>
    </div>
@endsection

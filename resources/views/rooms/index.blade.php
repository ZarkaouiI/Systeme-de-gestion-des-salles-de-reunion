@extends('layouts.app')

@section('content')
    <div class="flex justify-center flex items-center">
        <div class="container">
            <table class="text-left w-full">
                <thead class="bg-blue-500 flex text-white w-full">
                    <tr class="flex w-full mb-4">
                        <th class="p-4 w-1/4">Salle</th>
                        <th class="p-4 w-1/4">Capacité</th>
                        <th class="p-4 w-1/4">Description</th>
                    </tr>
                </thead>
                <tbody class="bg-grey-light flex flex-col items-center justify-between overflow-y-scroll w-full" style="height: 60vh;">
                    @foreach ($rooms as $room)
                        <tr class="flex w-full mb-4">
                            <td class="p-4 w-1/4">{{ $room->name }}</td>
                            <td class="p-4 w-1/4">{{ $room->capacity }}</td>
                            <td class="p-4 w-1/4">{{ $room->description }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

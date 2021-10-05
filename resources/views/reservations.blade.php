@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-8/12 bg-white p-6 rounded-lg">
            <p class="font-bold text-gray-600">La liste des réunions à venir:</p>
            <br>
            {{-- <table class="border-collapse border border-blue-500 w-full">
                <thead>
                    <tr>
                        <th class="border border-blue-500">Responsable</th>
                        <th class="border border-blue-500">le</th>
                        <th class="border border-blue-500">de</th>
                        <th class="border border-blue-500">à</th>
                        <th class="border border-blue-500">Salle</th>
                    </tr>
                </thead>
                @foreach ($meetings as $meeting)
                    <tbody>
                        <tr>
                            <td class="border border-blue-500">{{ $meeting->responsable }}</td>
                             <td class="border border-blue-500">{{ date('d-m-Y', strtotime($meeting->date))}}</td>
                            <td class="border border-blue-500">{{ $meeting->start }}</td>
                            <td class="border border-blue-500">{{ $meeting->end }}</td>
                            <td class="border border-blue-500">{{ $meeting->room }}</td>
                            @if (auth()->user()->name === $meeting->responsable)
                                <td class="border border-green-600 align-center">
                                    <form action="{{ route('deletemeeting', $meeting->id) }} " method="post">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="text-white bg-red-500 w-full mb-1">Annuler</button>
                                    </form>
                                </td>
                            @endif
                        </tr>
                    </tbody>
                @endforeach
            </table> --}}

            <div class="container">
                <table class="text-left w-full">
                    <thead class="bg-blue-500 flex text-white w-full">
                        <tr class="flex w-full mb-4">
                            <th class="p-4 w-1/4">Responsable</th>
                            <th class="p-4 w-1/4">Le</th>
                            <th class="p-4 w-1/4">De</th>
                            <th class="p-4 w-1/4">à</th>
                            <th class="p-4 w-1/4">Salle</th>
                            <th class="p-4 w-1/4"></th>
                        </tr>
                    </thead>
                    <tbody class="bg-grey-light flex flex-col items-center justify-between overflow-y-scroll w-full" style="height: 40vh;">
                        @foreach ($meetings as $meeting)
                            <tr class="flex w-full mb-4">
                                <td class="p-4 w-1/4">{{ $meeting->responsable }}</td>
                                <td class="p-4 w-1/4">{{ date('d-m-Y', strtotime($meeting->date))}}</td>
                                <td class="p-4 w-1/4">{{ $meeting->start }}</td>
                                <td class="p-4 w-1/4">{{ $meeting->end }}</td>
                                <td class="p-4 w-1/4">{{ $meeting->room }}</td>
                                @if (auth()->user()->name === $meeting->responsable)
                                    <td class="p-4 w-1/4">
                                        <form action="{{ route('deletemeeting', $meeting->id) }} " method="post">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" class="text-white bg-red-500 w-full mb-1">Annuler</button>
                                        </form>
                                    </td>
                                @else
                                    <td class="p-4 w-1/4"></td>
                                @endif
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <br>
            <div class="flex justify-center">
                <form action="{{ route('meetings') }}">
                    @csrf
                    <button type="submit" class="bg-blue-500 text-white px-4 py-3 rounded font-medium w-full">Planifier une réunion</button>
                </form>
            </div>
        </div>
    </div>
@endsection

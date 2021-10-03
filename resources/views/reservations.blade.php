@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-8/12 bg-white p-6 rounded-lg">
            <p class="font-bold text-gray-600">La liste des réunions à venir:</p>
            <br>
            <table class="border-collapse border border-blue-500 w-full">
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
                        </tr>
                    </tbody>
                @endforeach
            </table>
            <br>
            <div class="w-4/12 content-center">
                <form action="{{ route('meetings') }}">
                    @csrf
                    <button type="submit" class="bg-blue-500 text-white px-4 py-3 rounded font-medium w-full">Planifier une réunion</button>
                </form>
            </div>
        </div>
    </div>
@endsection

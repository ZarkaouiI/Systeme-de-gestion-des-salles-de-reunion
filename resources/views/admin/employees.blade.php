@extends('layouts.app')

@section('content')
    <div class="flex justify-center flex items-center">
        <div class="w-8/12 bg-white p-6 rounded-lg">
            <p class="font-bold text-gray-600">La liste des salariés:</p>
            <br>
            {{-- <table class="border-collapse border border-blue-800 w-full">
                <thead>
                    <tr>
                        <th class="border border-green-600">Nom complét</th>
                        <th class="border border-green-600">Email</th>
                        <th class="border border-green-600">Numéro de téléphone</th>
                        <th class="border border-green-600">Actions</th>
                    </tr>
                </thead>
                @foreach ($employees as $employee)
                    <tbody>
                        <tr>
                            <td class="border border-green-600">{{ $employee->name }}</td>
                            <td class="border border-green-600">{{ $employee->email }}</td>
                            <td class="border border-green-600">{{ $employee->phone }}</td>
                            <td class="border border-green-600 align-center">
                                <form action="{{ route('deleteemployee', $employee->id) }}" method="post">
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
                    </tbody>
                @endforeach
            </table> --}}

            <div class="container">
                <table class="text-left w-full">
                    <thead class="bg-blue-500 flex text-white w-full">
                        <tr class="flex w-full mb-4">
                            <th class="p-4 w-1/4">Nom complét</th>
                            <th class="p-4 w-1/4">Email</th>
                            <th class="p-4 w-1/4">Numéro de téléphone</th>
                            <th class="p-4 w-1/4">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-grey-light flex flex-col items-center justify-between overflow-y-scroll w-full" style="height: 30vh;">
                        @foreach ($employees as $employee)
                            <tr class="flex w-full mb-4">
                                <td class="p-4 w-1/4">{{ $employee->name }}</td>
                                <td class="p-4 w-1/4">{{ $employee->email }}</td>
                                <td class="p-4 w-1/4">{{ $employee->phone }}</td>
                                <td class="p-4 w-1/4">
                                    <form action="{{ route('deleteemployee', $employee->id) }}" method="post">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="text-white bg-red-500 w-full mb-1">Supprimer</button>
                                    </form>
                                    <form action="{{ route('modifyemployee', $employee->id) }}">
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
            <p class="font-bold text-gray-600">Ajouter un salarié:</p>
            <br>
            <div class="flex justify-center">
                <form action="{{ route('addemployee') }}" method="post" class="w-4/12">
                    @csrf
                    <div class="mb-4">
                        <label for="name" class="sr-only">Nom complét</label>
                        <input type="text" name="name" id="name" placeholder="Nom complét du salarié" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('name') border-red-500 @enderror" value="{{ old('name') }}">

                        @error('name')
                            <div class="text-red-500 mt-2 text-sm">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="email" class="sr-only">Email</label>
                        <input type="email" name="email" id="email" placeholder="L'adresse email du salarié" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('email') border-red-500 @enderror" value="{{ old('email') }}">

                        @error('email')
                            <div class="text-red-500 mt-2 text-sm">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="phone" class="sr-only">Numéro de téléphone</label>
                        <input type="text" name="phone" id="phone" placeholder="Le numéro de téléphone du salarié" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('phone') border-red-500 @enderror" value="{{ old('phone') }}">

                        @error('phone')
                            <div class="text-red-500 mt-2 text-sm">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="flex justify-center">
                        <button type="submit" class="bg-blue-500 text-white px-4 py-3 rounded-lg w-5/12">
                            Ajouter
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

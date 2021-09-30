@extends('layouts.app')

@section('content')
    <div class="flex justify-center mt-20">
        <div class="w-4/12 bg-white p-6 rounded-lg">
            <form action="{{ route('employees') }}" class="p-3">
                @csrf
                <button type="submit" class="bg-blue-500 text-white px-4 py-3 rounded font-medium w-full">Gérer les salariés</button>
            </form>
            <form action="{{ route('rooms') }}"  class="p-3">
                @csrf
                <button type="submit" class="bg-blue-500 text-white px-4 py-3 rounded font-medium w-full">Gérer les salles</button>
            </form>
            <form action="" method="post" class="p-3">
                @csrf
                <button type="submit" class="bg-blue-500 text-white px-4 py-3 rounded font-medium w-full">Planifier une réunion</button>
            </form>
        </div>
    </div>
@endsection

@extends('app')

@section('content')
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <div class="flex flex-col space-y-4">
        <div class="flex justify-around items-center">
            <h2 class="text-2xl font-bold">Show Repair</h2>
            <a class="bg-red-500 hover:bg-red-800 text-white font-bold py-2 px-4 rounded"
               href="{{ route('repairs.index') }}">
                Back
            </a>
        </div>

        <div class="bg-white p-6 rounded-lg shadow-md">
            <div class="mb-4">
                <strong class="block text-gray-700">Vehicle:</strong>
                <span class="text-gray-900">{{ $vehicle->mark }}</span>
            </div>
            <div class="mb-4">
                <strong class="block text-gray-700">Client:</strong>
                <span class="text-gray-900">{{ $client->userName }}</span>
            </div>
            <div class="mb-4">
                <strong class="block text-gray-700">Mechanic:</strong>
                <span class="text-gray-900">{{ $mechanic->userName }}</span>
            </div>
            <div class="mb-4">
                <strong class="block text-gray-700">Spare Parts:</strong>
                <ul>
                    @foreach ($repair->sparePart as $sparePart)
                        <li>{{ $sparePart->partName }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endsection

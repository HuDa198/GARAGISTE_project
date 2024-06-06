@extends('app')

@section('content')
@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif

<div class="flex flex-col items-center space-y-4">
    <div class="flex justify-around items-center w-full">
        <h2 class="text-2xl font-bold">Show Vehicle</h2>
        <a class="bg-red-500 hover:bg-red-800 text-white font-bold py-2 px-4 rounded" href="{{ route('vehicles.index') }}">
            Back
        </a>
    </div>
    
    <div class="bg-white p-6 rounded-lg shadow-md w-full max-w-lg min-h-[400px]">
        <div class="mb-4">
            <strong class="block text-gray-700">Mark:</strong>
            <span class="text-gray-900">{{ $vehicle->mark }}</span>
        </div>
        <div class="mb-4">
            <strong class="block text-gray-700">Model:</strong>
            <span class="text-gray-900">{{ $vehicle->model }}</span>
        </div>
        <div class="mb-4">
            <strong class="block text-gray-700">Fuel Type:</strong>
            <span class="text-gray-900">{{ $vehicle->fuelType }}</span>
        </div>
        <div class="mb-4">
            <strong class="block text-gray-700">Registration:</strong>
            <span class="text-gray-900">{{ $vehicle->registration }}</span>
        </div>
        <div class="mb-4">
            <strong class="block text-gray-700">Photos:</strong>
            <div class="mb-2">
                <img src="{{ asset('storage/' . $vehicle->photos) }}" alt="Vehicle photo" class="rounded-lg w-full max-w-xs mx-auto">
            </div>
        </div>
    </div>
</div>
@endsection

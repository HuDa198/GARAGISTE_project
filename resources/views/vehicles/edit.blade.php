@extends('app')

@section('content')
    @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
            <strong class="font-bold">Whoops!</strong> There were some problems with your input.
            <ul class="mt-2 list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="bg-gray-200 px-2 py-3 border-solid border-gray-200 border-b mb-4">
        <div class="flex justify-between items-center">
            <h2 class="text-2xl font-bold">Update Vehicle</h2>
            <a class="bg-red-500 hover:bg-red-800 text-white font-bold py-2 px-4 rounded"
                href="{{ route('vehicles.index') }}">
                Back
            </a>
        </div>
    </div>

    <form action="{{ route('vehicles.update', $vehicle->id) }}" method="POST" class="w-full max-w-lg mx-auto" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="bg-white p-6 rounded-lg shadow-md">
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="mark">Mark</label>
                <input
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    type="text" name="mark" value="{{ $vehicle->mark }}" placeholder="Mark"  disabled="true">
                @if ($errors->has('mark'))
                    <span class="text-red-500 text-sm">{{ $errors->first('mark') }}</span>
                @endif
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="model">Model</label>
                <input
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    type="text" name="model" value="{{ $vehicle->model }}" placeholder="Model"   disabled="true">
                @if ($errors->has('model'))
                    <span class="text-red-500 text-sm">{{ $errors->first('model') }}</span>
                @endif
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="fuelType">Fuel Type</label>
                <input
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    type="text" name="fuelType" value="{{ $vehicle->fuelType }}" placeholder="Fuel Type"  disabled="true">
                @if ($errors->has('fuelType'))
                    <span class="text-red-500 text-sm">{{ $errors->first('fuelType') }}</span>
                @endif
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="registration">Registration</label>
                <input
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    type="text" name="registration" value="{{ $vehicle->registration }}" placeholder="Registration">
                @if ($errors->has('registration'))
                    <span class="text-red-500 text-sm">{{ $errors->first('registration') }}</span>
                @endif
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="user_id">Client</label>
                <select
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    name="user_id">
                    @foreach ($clients as $client)
                        <option value="{{ $client->id }}" {{ $vehicle->user_id == $client->id ? 'selected' : '' }}>
                            {{ $client->userName }}
                        </option>
                    @endforeach
                </select>
                @if ($errors->has('user_id'))
                    <span class="text-red-500 text-sm">{{ $errors->first('user_id') }}</span>
                @endif
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="photo">Photo</label>
                <input
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    type="file" name="photo">
                @if ($errors->has('photo'))
                    <span class="text-red-500 text-sm">{{ $errors->first('photo') }}</span>
                @endif
                @if ($vehicle->photos)
                    <div class="mt-2">
                        <img src="{{ asset('storage/' . $vehicle->photos) }}" alt="Vehicle photo" class="rounded-lg w-full max-w-xs mx-auto">
                    </div>
                @endif
            </div>

            <div class="flex items-center justify-between">
                <button
                    class="bg-gray-900 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                    type="submit">
                    Update
                </button>
            </div>
        </div>
    </form>
@endsection

@extends('app')

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="bg-gray-200 px-2 py-3 border-solid border-gray-200 border-b">
        <div class="py-2">
            <h2>Add New Vehicle</h2>
        </div>
        <div class="flex justify-around">
            <a class="bg-red-500 hover:bg-red-800 text-white font-bold py-2 px-4 rounded" href="{{ route('clients.index') }}">
                Back</a>
            <a class="bg-green-500 hover:bg-green-800 text-white font-bold py-2 px-4 rounded"
                href="{{ route('clients.create') }}"> Create New Client</a>
        </div>
    </div>

    <form action="{{ route('vehicles.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="container mx-auto flex flex-wrap flex-center justify-center items-center">
            <div class="w-full max-w-lg">
                <div class="leading-loose">
                    <div class="max-w-xl m-4 p-10 bg-white rounded shadow-xl">

                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="mark">Mark</label>
                            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" name="mark" value="{{ old('mark') }}" placeholder="Mark">
                            @if ($errors->has('mark'))
                                <span class="text-red-500 text-sm">{{ $errors->first('mark') }}</span>
                            @endif
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="model">Model</label>
                            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" name="model" value="{{ old('model') }}" placeholder="Model">
                            @if ($errors->has('model'))
                                <span class="text-red-500 text-sm">{{ $errors->first('model') }}</span>
                            @endif
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="fuelType">Fuel Type</label>
                            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" name="fuelType" value="{{ old('fuelType') }}" placeholder="Fuel Type">
                            @if ($errors->has('fuelType'))
                                <span class="text-red-500 text-sm">{{ $errors->first('fuelType') }}</span>
                            @endif
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="registration">Registration</label>
                            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" name="registration" value="{{ old('registration') }}" placeholder="Registration">
                            @if ($errors->has('registration'))
                                <span class="text-red-500 text-sm">{{ $errors->first('registration') }}</span>
                            @endif
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="user_id">Client</label>
                            <select class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="user_id">
                                @foreach ($clients as $client)
                                    <option value="{{ $client->id }}">{{ $client->userName }}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('user_id'))
                                <span class="text-red-500 text-sm">{{ $errors->first('user_id') }}</span>
                            @endif
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="photo">Photo</label>
                            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="file" name="photo">
                            @if ($errors->has('photo'))
                                <span class="text-red-500 text-sm">{{ $errors->first('photo') }}</span>
                            @endif
                        </div>

                        <div class="flex items-center justify-between">
                            <button class="bg-gray-900 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                                Submit
                            </button>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection

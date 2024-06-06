@extends('app')

@section('content')
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <div class="flex flex-col space-y-4">
        <div class="flex justify-around items-center">
            <h2 class="text-2xl font-bold">Show Mechanic</h2>
            <a class="bg-red-500 hover:bg-red-800 text-white font-bold py-2 px-4 rounded"
               href="{{ route('mechanics.index') }}">
                Back
            </a>
        </div>

        <div class="bg-white p-6 rounded-lg shadow-md">
            <div class="mb-4">
                <strong class="block text-gray-700">UserName:</strong>
                <span class="text-gray-900">{{ $mechanic->userName }}</span>
            </div>
            <div class="mb-4">
                <strong class="block text-gray-700">Last Name:</strong>
                <span class="text-gray-900">{{ $mechanic->lastName }}</span>
            </div>
            <div class="mb-4">
                <strong class="block text-gray-700">First Name:</strong>
                <span class="text-gray-900">{{ $mechanic->firstName }}</span>
            </div>
            <div class="mb-4">
                <strong class="block text-gray-700">Phone Number:</strong>
                <span class="text-gray-900">{{ $mechanic->phoneNumber }}</span>
            </div>
            <div class="mb-4">
                <strong class="block text-gray-700">Address:</strong>
                <span class="text-gray-900">{{ $mechanic->adress }}</span>
            </div>
            <div class="mb-4">
                <strong class="block text-gray-700">Email:</strong>
                <span class="text-gray-900">{{ $mechanic->email }}</span>
            </div>
        </div>
    </div>
@endsection
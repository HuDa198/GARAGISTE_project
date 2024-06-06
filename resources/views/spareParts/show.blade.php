@extends('app')

@section('content')
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <div class="flex flex-col space-y-4">
        <div class="flex justify-around items-center">
            <h2 class="text-2xl font-bold">Show Spare Part</h2>
            <a class="bg-red-500 hover:bg-red-800 text-white font-bold py-2 px-4 rounded"
               href="{{ route('spareparts.index') }}">
                Back
            </a>
        </div>

        <div class="bg-white p-6 rounded-lg shadow-md">
            <div class="mb-4">
                <strong class="block text-gray-700">Part Name:</strong>
                <span class="text-gray-900">{{ $sparePart->partName }}</span>
            </div>
            <div class="mb-4">
                <strong class="block text-gray-700">Part Reference:</strong>
                <span class="text-gray-900">{{ $sparePart->partReference }}</span>
            </div>
            <div class="mb-4">
                <strong class="block text-gray-700">Supplier:</strong>
                <span class="text-gray-900">{{ $sparePart->supplier }}</span>
            </div>
            <div class="mb-4">
                <strong class="block text-gray-700">Price:</strong>
                <span class="text-gray-900">{{ $sparePart->price }}</span>
            </div>
        </div>
    </div>
@endsection

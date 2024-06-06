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
            <h2 class="text-2xl font-bold">Update Spare Part</h2>
            <a class="bg-red-500 hover:bg-red-800 text-white font-bold py-2 px-4 rounded" href="{{ route('spareparts.index') }}">
                Back
            </a>
        </div>
    </div>

    <form action="{{ route('spareparts.update', $sparePart->id) }}" method="POST" class="w-full max-w-lg mx-auto">
        
        @csrf
        @method('PUT')

        <div class="bg-white p-6 rounded-lg shadow-md">
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="partName">Part Name</label>
                <input
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    type="text" name="partName" value="{{ $sparePart->partName }}" placeholder="Part Name" autofocus>
                @if ($errors->has('partName'))
                    <span class="text-red-500 text-sm">{{ $errors->first('partName') }}</span>
                @endif
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="partReference">Part Reference</label>
                <input
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    type="text" name="partReference" value="{{ $sparePart->partReference }}" placeholder="Part Reference">
                @if ($errors->has('partReference'))
                    <span class="text-red-500 text-sm">{{ $errors->first('partReference') }}</span>
                @endif
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="supplier">Supplier</label>
                <input
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    type="text" name="supplier" value="{{ $sparePart->supplier }}" placeholder="Supplier">
                @if ($errors->has('supplier'))
                    <span class="text-red-500 text-sm">{{ $errors->first('supplier') }}</span>
                @endif
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="price">Price</label>
                <input
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    type="text" name="price" value="{{ $sparePart->price }}" placeholder="Price">
                @if ($errors->has('price'))
                    <span class="text-red-500 text-sm">{{ $errors->first('price') }}</span>
                @endif
            </div>

            <div class="flex items-center justify-between">
                <button
                    class="bg-gray-900 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                    type="submit">
                    Submit
                </button>
            </div>
        </div>
    </form>
@endsection

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
            <h2>Add New Spare Part</h2>
        </div>
        <a class="bg-red-500 hover:bg-red-800 text-white font-bold py-2 px-4 rounded" href="{{ route('spareparts.index') }}">
            Back</a>
    </div>

    <form action="{{ route('spareparts.store') }}" method="POST">
        @csrf
        <div class="container mx-auto flex flex-wrap flex-center justify-center items-center">
            <div class="w-full max-w-lg">
                <div class="leading-loose">
                    <div class="max-w-xl m-4 p-10 bg-white rounded shadow-xl">
                        <div class="">
                            <label class="block text-sm text-gray-600" for="partName">Part Name</label>
                            @if ($errors->has('partName'))
                                <span class="text-red-500 text-left">{{ $errors->first('partName') }}</span>
                            @endif
                            <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" type="text" name="partName"
                                value="{{ old('partName') }}" placeholder="Part Name" autofocus>
                        </div>

                        <div class="">
                            <label class="block text-sm text-gray-600" for="partReference">Part Reference</label>
                            <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" type="text"
                                name="partReference" value="{{ old('partReference') }}" placeholder="Part Reference">
                            @if ($errors->has('partReference'))
                                <span class="text-red-500 text-left">{{ $errors->first('partReference') }}</span>
                            @endif
                        </div>

                        <div class="">
                            <label class="block text-sm text-gray-600" for="supplier">Supplier</label>
                            <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" type="text" name="supplier"
                                value="{{ old('supplier') }}" placeholder="Supplier">
                            @if ($errors->has('supplier'))
                                <span class="text-red-500 text-left">{{ $errors->first('supplier') }}</span>
                            @endif
                        </div>

                        <div class="">
                            <label class="block text-sm text-gray-600" for="price">Price</label>
                            <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" type="number" name="price"
                                value="{{ old('price') }}" placeholder="Price">
                            @if ($errors->has('price'))
                                <span class="text-red-500 text-left">{{ $errors->first('price') }}</span>
                            @endif
                        </div>

                        <div class="mt-4">
                            <button class="px-6 py-2 text-white font-light tracking-wider bg-gray-900 rounded">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection

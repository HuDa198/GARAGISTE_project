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
            <h2 class="text-2xl font-bold">Update Client</h2>
            <a class="bg-red-500 hover:bg-red-800 text-white font-bold py-2 px-4 rounded" href="{{ route('mechanics.index') }}">
                Back
            </a>
        </div>
    </div>

    <form action="{{ route('mechanics.update', $mechanic->id) }}" method="POST" class="w-full max-w-lg mx-auto">
        
        @csrf
        @method('PUT')

        <div class="bg-white p-6 rounded-lg shadow-md">
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="username">User Name</label>
                <input
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    type="text" name="username" value="{{ $mechanic->userName }}" placeholder="User Name" autofocus>
                @if ($errors->has('username'))
                    <span class="text-red-500 text-sm">{{ $errors->first('username') }}</span>
                @endif
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="firstname">First Name</label>
                <input
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    type="text" name="firstname" value="{{ $mechanic->firstName }}" placeholder="First Name">
                @if ($errors->has('firstname'))
                    <span class="text-red-500 text-sm">{{ $errors->first('firstname') }}</span>
                @endif
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="lastname">Last Name</label>
                <input
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    type="text" name="lastname" value="{{ $mechanic->lastName }}" placeholder="Last Name">
                @if ($errors->has('lastname'))
                    <span class="text-red-500 text-sm">{{ $errors->first('lastname') }}</span>
                @endif
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="phone_number">Phone Number</label>
                <input
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    type="text" name="phone_number" value="{{ $mechanic->phoneNumber }}" placeholder="06/07-000-000-00">
                @if ($errors->has('phone_number'))
                    <span class="text-red-500 text-sm">{{ $errors->first('phone_number') }}</span>
                @endif
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="address">Address</label>
                <input
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    type="text" name="address" value="{{ $mechanic->adress }}" placeholder="Address">
                @if ($errors->has('address'))
                    <span class="text-red-500 text-sm">{{ $errors->first('address') }}</span>
                @endif
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="email">Email</label>
                <input
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    type="email" name="email" value="{{ $mechanic->email }}" placeholder="name@example.com">
                @if ($errors->has('email'))
                    <span class="text-red-500 text-sm">{{ $errors->first('email') }}</span>
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

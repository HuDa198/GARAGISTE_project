@extends('home')

@section('content')
    <main class="login-form">
        <div class="container">
            <div class="flex justify-center">
                <div class="w-full md:w-8/12">
                    <div class="bg-white shadow-md rounded px-6 py-4">
                        <div class="text-xl font-bold mb-4">Reset Password</div>
                        <form action="{{ route('reset.password.post') }}" method="POST">
                            @csrf

                            <div class="mb-4">
                                <label for="validation_number" class="block text-sm font-medium text-gray-700">Validation Number</label>
                                <input type="number" id="validation_number" name="validation_number" class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" required autofocus>
                                @error('validation_number')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="email" class="block text-sm font-medium text-gray-700">E-Mail Address</label>
                                <input type="email" id="email" name="email" class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" required autofocus>
                                @error('email')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                                <input type="password" id="password" name="password" class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" required autofocus>
                                @error('password')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirm Password</label>
                                <input type="password" id="password_confirmation" name="password_confirmation" class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" required autofocus>
                                @error('password_confirmation')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="flex items-center justify-between">
                                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                                    Reset Password
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection

@extends('home')

@section('content')
    <main class="login-form">
        <div class="mb-2 border border-gray-300 rounded shadow-sm w-full md:w-1/2 lg:w-1/2">
            <div class="bg-gray-200 px-2 py-3 border-b border-gray-300">
                Reset Password
            </div>

            @if (Session::has('message'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                    <span class="block sm:inline">{{ Session::get('message') }}</span>
                </div>
            @endif

            <form action="{{ route('forget.password.post') }}" method="POST" class="p-3">
                @csrf

                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                        <label for="email_address" class="block uppercase tracking-wide text-gray-700 text-xs font-light mb-1">
                            E-Mail Address
                        </label>
                        <input type="text" id="email_address" name="email" required autofocus
                            class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white-500">
                        @error('email')
                            <span class="text-red-500 text-left">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="w-full md:col-6 md:offset-3">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-800 text-white font-bold py-2 px-4 rounded-full">
                        Send Password Reset Link
                    </button>
                </div>
            </form>
        </div>
    </main>
@endsection

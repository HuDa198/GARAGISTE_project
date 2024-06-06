@extends('app')
@section('content')
    @if (session('success'))
        <div class="bg-green-300 mb-2 border border-green-300 text-green-600 px-4 py-3 rounded relative" role="alert">
            <strong class="font-bold">Congratulations!</strong>
            <span class="block sm:inline">{{ session('success') }}</span>
            <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                <svg class="fill-current h-6 w-6 text-green" role="button" xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 20 20">
                    <title>Close</title>
                    <path
                        d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z" />
                </svg>
            </span>
        </div>
    @endif
    <div class="container mx-auto py-20">
        <div class="flex justify-center mb-8">
            <img src="{{ asset('images/home1.png') }}" alt="Garagiste Logo" width="1100">
        </div>
        <h1 class="text-3xl font-bold text-center mb-8">Welcome to Garagiste</h1>
        <div class="flex justify-center">
            <a href="{{ route('login.show') }}"
                class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded transition duration-300">Start</a>
        </div>
    </div>

    <script>
        // Add event listener to the close icon
        document.querySelector('.bg-green-300 svg[role="button"]').addEventListener('click', function() {
            // Hide the alert or perform any other close action
            document.querySelector('.bg-green-300').style.display = 'none';
        });
    </script>
@endsection

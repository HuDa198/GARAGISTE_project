@extends('authentification.layouts.auth-master')

@section('content')
    <main class="h-screen font-sans login bg-cover">
        <div class="container mx-auto h-full flex flex-1 justify-center items-center">

            <div class="w-full max-w-lg">
                <div class="leading-loose">
                    <form method="post" action="{{ route('login.perform') }}"
                        class="max-w-xl m-4 p-10 bg-white rounded shadow-xl">
                        @if (session('message'))
                            <div class="bg-green-300 mb-2 border border-green-300 text-green-600 px-4 py-3 rounded relative"
                                role="alert">
                                <strong class="font-bold">Congratulations!</strong>
                                <span class="block sm:inline">{{ session('message') }}</span>
                                <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                                    <svg class="fill-current h-6 w-6 text-green" role="button"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <title>Close</title>
                                        <path
                                            d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z" />
                                    </svg>
                                </span>
                            </div>
                        @endif
                        @csrf

                        <p class="text-gray-800 font-medium text-center text-lg font-bold">Login</p>

                        @include('authentification.layouts.partials.messages')

                        <div class="">

                            <label class="block text-sm text-gray-00" for="floatingName">Email or Username</label>
                            <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" type="text"
                                placeholder="User Name" autofocus name='username'>

                        </div>

                        
                        <div class="mt-2">

                            <label for="floatingPassword" class="block text-sm text-gray-600">Password</label>
                            <input class="w-full px-5  py-1 text-gray-700 bg-gray-200 rounded" name="password"
                                type="password" placeholder="*******">
                        </div>

                        <div class="mt-4 items-center justify-between">
                            <button class="px-4 py-1 text-white font-light tracking-wider bg-gray-900 rounded"
                                type="submit">Login</button>
                            <a class="inline-block right-0 align-baseline  font-bold text-sm text-500 hover:text-blue-800"
                                href="{{ route('forget.password.get') }}">
                                Forgot Password?
                            </a>
                        </div>
                        <a class="inline-block right-0 align-baseline font-bold text-sm text-500 hover:text-blue-800"
                            href="{{ Route('register.show') }}">
                            Not registered ?
                        </a>
                    </form>

                </div>
            </div>
        </div>
    </main>

    <script>
        // Add event listener to the close icon
        document.querySelector('.bg-green-300 svg[role="button"]').addEventListener('click', function() {
            // Hide the alert or perform any other close action
            document.querySelector('.bg-green-300').style.display = 'none';
        });
    </script>
@endsection

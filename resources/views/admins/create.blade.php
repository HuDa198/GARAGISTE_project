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
            <h2>Add New Admin</h2>
        </div>
        <a class="bg-red-500 hover:bg-red-800 text-white font-bold py-2 px-4 rounded" href="{{ route('admins.index') }}">
            Back</a>
    </div>



    <form action="{{ route('admins.store') }}" method="POST">
        @csrf
        <div class="container mx-auto flex flex-wrap flex-center justify-center items-center">
            <div class="w-full max-w-lg">
                <div class="leading-loose">
                    <div class="max-w-xl m-4 p-10 bg-white rounded shadow-xl">



                        <div class="">
                            <label class="block text-sm text-gray-600" for="floatingUserName">User Name</label>
                            @if ($errors->has('username'))
                                <span class="text-red-500 text-left">{{ $errors->first('username') }}</span>
                            @endif
                            <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" type="text" name="username"
                                value="{{ old('username') }}" {{-- required="required" --}} placeholder="User Name" autofocus>
                        </div>


                        <!-- First set of input fields -->
                        <div class="">
                            <label class="block text-sm text-gray-600" for="floatingFistName">First Name</label>
                            <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" type="text"
                                name="firstname" {{-- required="required" --}} placeholder="First Name"
                                value="{{ old('firstname') }}">
                            @if ($errors->has('firstname'))
                                <span class="text-red-500 text-left">{{ $errors->first('firstname') }}</span>
                            @endif
                        </div>



                        <div class="">
                            <label class="block text-sm text-gray-600" for="floatingLastName">Last Name</label>
                            <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" type="text" name="lastname"
                                {{-- required="required" --}} placeholder="Last Name" value="{{ old('lastname') }}">
                            @if ($errors->has('lastname'))
                                <span class="text-red-500 text-left">{{ $errors->first('lastname') }}</span>
                            @endif
                        </div>

                        <div class="form-group form-floating mb-3">
                            <label class="block text-sm text-gray-600" for="floatingPhoneNumber">Phone Number</label>
                            <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" type="text"
                                name="phone_number" {{-- required="required" --}} placeholder="06/07-000-000-00"
                                {{--  pattern="^(06|07)\d{8}$" --}} value="{{ old('phone_number') }}">
                            @if ($errors->has('phone_number'))
                                <span class="text-red-500 text-left">{{ $errors->first('phone_number') }}</span>
                            @endif



                        </div>

                        <!-- Second set of input fields -->
                        <div class="mt-2">
                            <label class="block text-sm text-gray-600" for="floatingAdress">Address</label>

                            <textarea class="w-full px-2 py-2 text-gray-700 bg-gray-200 rounded" name="address" placeholder="Address"
                                {{-- required="required" --}} rows="5"></textarea>
                            @if ($errors->has('address'))
                                <span class="text-red-500 text-left">{{ $errors->first('address') }}</span>
                            @endif

                        </div>

                    </div>
                </div>
            </div>
            <div class="w-full max-w-lg">
                <div class="leading-loose">
                    <div class="max-w-xl m-4 p-10 bg-white rounded shadow-xl">



                        <!-- First set of input fields -->
                        <div class="mt-2">
                            <label class="block text-sm text-gray-600" for="floatingEmail">Email address</label>
                            @if ($errors->has('email'))
                                <span class="text-red-500 text-left">{{ $errors->first('email') }}</span>
                            @endif
                            <input class="w-full px-5 py-4 text-gray-700 bg-gray-200 rounded" id="cus_email" name="email"
                                type="email" {{-- required="required" --}} placeholder="name@example.com"
                                value="{{ old('email') }}">
                        </div>


                        <div class="mt-2">

                            <label for="floatingPassword" class="block text-sm text-gray-600">Password</label>
                            <input class="w-full px-5  py-1 text-gray-700 bg-gray-200 rounded"
                                value="{{ old('password') }}" name="password" type="password" {{-- required="required" --}}
                                placeholder="*******">
                            @if ($errors->has('password'))
                                <span class="text-red-500 text-left">{{ $errors->first('password') }}</span>
                            @endif
                        </div>
                        <div class="mt-2">
                            <label for="floatingConfirmPassword" class="block text-sm text-gray-600">Confirm
                                Password</label>
                            <input class="w-full px-5  py-1 text-gray-700 bg-gray-200 rounded" name="password_confirmation"
                                type="password" {{-- required="required" --}} placeholder="*******"
                                value="{{ old('password_confirmation') }}">
                            @if ($errors->has('password_confirmation'))
                                <span class="text-red-500 text-left">{{ $errors->first('password_confirmation') }}</span>
                            @endif
                        </div>
                        <div class="mt-4  ">
                            <button
                                class="px-6 py-2 text-white  font-light tracking-wider bg-gray-900 rounded">submit</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </form>
@endsection

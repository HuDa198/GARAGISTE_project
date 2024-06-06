@extends('authentification.layouts.auth-master')

@section('content')


    <main class="h-full font-sans login bg-cover">
        <form method="post" action="{{ route('register.perform') }}">
            @csrf

            <h1 class="text-white text-4xl font-bold pt-3 ">Register</h1>

            <div class="container mx-auto flex flex-wrap flex-center justify-center items-center">
                <div class="w-full max-w-lg">
                    <div class="leading-loose">
                        <div class="max-w-xl m-4 p-10 bg-white rounded shadow-xl">



                            <div class="">
                                <label class="block text-sm text-gray-600" for="floatingUserName">User Name</label>
                                @if ($errors->has('username'))
                                        <span class="text-red-500 text-left">{{ $errors->first('username') }}</span>
                                    @endif
                                <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" type="text"
                                    name="username" value="{{ old('username') }}" {{-- required="required" --}}
                                    placeholder="User Name" autofocus>
                            </div>



                            <!-- First set of input fields -->
                            <div class="">
                                <label class="block text-sm text-gray-600" for="floatingFistName">First Name</label>
                                <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" type="text"
                                    name="firstname" {{-- required="required" --}} placeholder="First Name" value="{{ old('firstname') }}">
                                    @if ($errors->has('firstname'))
                                        <span class="text-red-500 text-left">{{ $errors->first('firstname') }}</span>
                                    @endif
                            </div>



                            <div class="">
                                <label class="block text-sm text-gray-600" for="floatingLastName">Last Name</label>
                                <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" type="text"
                                    name="lastname" {{-- required="required" --}} placeholder="Last Name" value="{{ old('lastname') }}">
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




                <div class="container mx-auto h-full flex flex-1 justify-center items-center">
                    <div class="w-full max-w-lg">
                        <div class="leading-loose">
                            <div class="max-w-xl m-4 p-10 bg-white rounded shadow-xl">


                                <div class="form-group mb-3">
                                    <label class="block text-sm text-gray-600" for="floatingUserType">User Type</label>
                                    <select
                                        class="form-select bg-gray-200 rounded p-4 block w-full mt-1 rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                        id="user_type" name="user_type" {{-- required --}}>
                                        <option value="" disabled selected>Select User Type</option>
                                        <option value="client">Client</option>
                                        <option value="mechanic">Mechanic</option>
                                    </select>
                                    @if ($errors->has('user_type'))
                                    <span class="text-red-500 text-left">{{ $errors->first('user_type') }}</span>
                                @endif
                                </div>





                                <!-- First set of input fields -->
                                <div class="mt-2">
                                    <label class="block text-sm text-gray-600" for="floatingEmail">Email address</label>
                                    @if ($errors->has('email'))
                                        <span class="text-red-500 text-left">{{ $errors->first('email') }}</span>
                                    @endif
                                    <input class="w-full px-5 py-4 text-gray-700 bg-gray-200 rounded" id="cus_email"
                                        name="email" type="email" {{-- required="required" --}} placeholder="name@example.com"
                                        value="{{ old('email') }}">
                                </div>


                                <div class="mt-2">

                                    <label for="floatingPassword" class="block text-sm text-gray-600">Password</label>
                                    <input class="w-full px-5  py-1 text-gray-700 bg-gray-200 rounded"
                                        value="{{ old('password') }}"  name="password" type="password"
                                        {{-- required="required" --}} placeholder="*******" >
                                        @if ($errors->has('password'))
                                        <span class="text-red-500 text-left">{{ $errors->first('password') }}</span>
                                    @endif




                                </div>
                                <div class="mt-2">

                                    <label for="floatingConfirmPassword" class="block text-sm text-gray-600">Confirm
                                        Password</label>
                                    <input class="w-full px-5  py-1 text-gray-700 bg-gray-200 rounded" 
                                        name="password_confirmation" type="password" {{-- required="required" --}}
                                        placeholder="*******" value="{{ old('password_confirmation') }}">
                                        @if ($errors->has('password_confirmation'))
                                        <span class="text-red-500 text-left">{{ $errors->first('password_confirmation') }}</span>
                                    @endif
                                </div>






                            </div>
                            <div class="container mx-auto  flex flex-center justify-center items-center ">
                                <div class="w-full max-w-lg p-2">
                                    <div class="max-w-xl m-1 bg-white rounded shadow-xl p-1">
                                        <div class="mt-4 ">
                                            <button
                                                class="px-6 py-2 text-white font-light tracking-wider bg-gray-900 rounded"
                                                >Register</button>
                                        </div>
                                        <div class="mt-6">
                                            <a class="inline-block right-0 align-baseline font-bold text-sm text-500 hover:text-blue-800"
                                                href={{ route('login.show') }}>
                                                Already have an account ?
                                            </a>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>


                    </div>
                </div>



            </div>


        </form>
    </main>











    {{-- //////////////////////////////////// --}}

    {{-- @if ($errors->has('email'))
<span class="text-red-500 text-left">{{ $errors->first('email') }}</span>
@endif  

   

            <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="name@example.com" required="required" autofocus>
            <label for="floatingEmail">Email address</label>
            @if ($errors->has('email'))
                <span class="text-danger text-left">{{ $errors->first('email') }}</span>
            @endif
        </div>

        <div class="form-group form-floating mb-3">
            
            @if ($errors->has('username'))
                <span class="text-danger text-left">{{ $errors->first('username') }}</span>
            @endif
        </div>
        
        <div class="form-group form-floating mb-3">
            <input type="password" class="form-control" name="password" value="{{ old('password') }}" placeholder="Password" required="required">
            <label for="floatingPassword">Password</label>
            @if ($errors->has('password'))
                <span class="text-danger text-left">{{ $errors->first('password') }}</span>
            @endif
        </div>

        <div class="form-group form-floating mb-3">
            <input type="password" class="form-control" name="password_confirmation" value="{{ old('password_confirmation') }}" placeholder="Confirm Password" required="required">
            <label for="floatingConfirmPassword">Confirm Password</label>
            @if ($errors->has('password_confirmation'))
                <span class="text-danger text-left">{{ $errors->first('password_confirmation') }}</span>
            @endif
        </div>

        <button class="w-100 btn btn-lg btn-primary" type="submit">Register</button>
        

    </form>
@endsection --}}

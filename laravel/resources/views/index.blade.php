@extends('layout')

@section('content')
    <div class="flex justify-center items-center h-screen">
        <div class="w-full rounded-lg shadow border md:mt-0 max-w-md xl:p-0 bg-gray-600 border-gray-700">
            <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                <h1 class="text-xl font-bold leading-tight text-gray-200 md:text-2xl">
                    Login
                </h1>

                @if (isset($errors) && count($errors) > 0)
                    @foreach ($errors->all() as $error)
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                            <span class="block sm:inline">{{ $error }}</span>
                        </div>
                    @endforeach
                @endif

                <form class="space-y-4 md:space-y-6" method="POST" action="{{ route('login.action') }}">
                    @csrf

                    <div>
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-300">Email</label>
                        <input type="email" name="email" id="email"
                            class="border sm:text-sm rounded-lg block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-gray-200 focus:ring-blue-500 focus:border-blue-500"
                            placeholder="name@example.com" required="">
                    </div>
                    <div>
                        <label for="password" class="block mb-2 text-sm font-medium text-gray-300">Password</label>
                        <input type="password" name="password" id="password" placeholder="••••••••"
                            class="border sm:text-sm rounded-lg block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-gray-200 focus:ring-blue-500 focus:border-blue-500"
                            required="">
                    </div>
                    <div class="flex items-center justify-between">
                        <div class="flex items-start">
                            <div class="flex items-center h-5">
                                <input id="remember" aria-describedby="remember" type="checkbox" name="remember"
                                    class="w-4 h-4 border border-gray-300 rounded bg-gray-700 border-gray-600 focus:ring-primary-600 ring-offset-gray-800">
                            </div>
                            <div class="ml-3 text-sm">
                                <label for="remember" class="text-gray-300">Remember me</label>
                            </div>
                        </div>
                    </div>
                    <button type="submit"
                        class="w-full text-white font-medium rounded-lg text-sm px-5 py-2.5 text-center bg-blue-600 hover:bg-blue-700 focus:ring-blue-800">Sign
                        in</button>
                </form>
            </div>
        </div>
    </div>
@endsection

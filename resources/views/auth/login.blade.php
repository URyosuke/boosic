@extends('layouts.app')
@section('content')
@include('commons.errors')

<div class="w-full h-screen font-sans bg-cover bg-gray-900">
    <div class="container flex items-center justify-center flex-1 h-full mx-auto">
        <div class="w-full max-w-lg z-10">
            <div class="leading-loose">
                <form action="{{ route('login') }}" method="post" class="max-w-sm p-10 m-auto rounded shadow-xl bg-white/25">
                    @csrf
                    <p class="mb-8 text-2xl font-light text-center text-white">
                        ログイン
                    </p>
                    <div class="mb-2">
                        <div class=" relative ">
                            <input type="email" name="email" value="{{ old('email') }}" id="login-with-bg-email" class=" rounded-lg border-transparent flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" placeholder="email"/>
                        </div>
                    </div>
                    <div class="mb-2">
                        <div class=" relative ">
                            <input type="password" name="password" id="login-with-bg-password" class=" rounded-lg border-transparent flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" placeholder="password"/>
                        </div>
                    </div>
                    <div class="flex items-center justify-between mt-4">
                        <button type="submit" class="py-2 px-4  bg-indigo-600 hover:bg-indigo-700 focus:ring-indigo-500 focus:ring-offset-indigo-200 text-white w-full transition ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2  rounded-lg ">
                            ログイン
                        </button>
                    </div>
                    <div class="text-center">
                        <a class="right-0 inline-block text-sm font-light align-baseline text-500 hover:text-gray-800">
                            Login an account
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection()
@extends('auth.layouts')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-indigo-100 to-white flex items-center justify-center p-4">
    <div class="bg-white rounded-lg shadow-xl overflow-hidden w-full max-w-4xl">
        <div class="flex flex-col md:flex-row">
            <!-- Logo and School Name Section -->
            <div class="bg-indigo-600 text-white p-8 md:w-1/2 flex flex-col items-center justify-center space-y-6">
                <h1 class="text-3xl font-bold text-center">E-Point Siswa</h1>
                <div class="w-40 h-40 bg-white rounded-full p-3 shadow-lg">
                    <img src="{{ asset('storage/logo.png') }}" alt="Logo Sekolah" class="w-full h-full object-contain">
                </div>
                <h3 class="text-xl font-semibold text-center">SMKN 4 TASIKMALAYA</h3>
            </div>
            
            <!-- Login Form Section -->
            <div class="p-8 md:w-1/2">
                <h1 class="text-3xl font-bold text-indigo-800 mb-6 text-center md:text-left">Login</h1>
                
                <!-- Error Messages -->
                @if ($errors->any())
                    <div class="mb-4 p-4 rounded-md bg-red-50 border border-red-200">
                        <div class="flex">
                            <div class="flex-shrink-0">
                                <!-- Error Icon -->
                                <svg class="h-5 w-5 text-red-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                                </svg>
                            </div>
                            <div class="ml-3">
                                <h3 class="text-sm font-medium text-red-800">
                                    Ada {{ $errors->count() }} kesalahan dalam form:
                                </h3>
                                <div class="mt-2 text-sm text-red-700">
                                    <ul class="list-disc pl-5 space-y-1">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif

                <!-- Session Status Message -->
                @if (session('status'))
                    <div class="mb-4 p-4 rounded-md bg-green-50 border border-green-200">
                        <div class="flex">
                            <div class="flex-shrink-0">
                                <!-- Success Icon -->
                                <svg class="h-5 w-5 text-green-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                </svg>
                            </div>
                            <div class="ml-3">
                                <p class="text-sm font-medium text-green-800">
                                    {{ session('status') }}
                                </p>
                            </div>
                        </div>
                    </div>
                @endif
                
                <form action="{{ route('authenticate') }}" method="post" class="space-y-6">
                    @csrf
                    
                    <div class="space-y-2">
                        <label for="email" class="block text-sm font-medium text-gray-700">Email Address</label>
                        <input 
                            type="email" 
                            id="email" 
                            name="email" 
                            value="{{ old('email') }}" 
                            required 
                            class="w-full px-4 py-2 border @error('email') border-red-500 @else border-gray-300 @enderror rounded-md focus:outline-none focus:ring-2 @error('email') focus:ring-red-500 focus:border-red-500 @else focus:ring-indigo-500 focus:border-indigo-500 @enderror"
                        >
                        @error('email')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div class="space-y-2">
                        <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                        <input 
                            type="password" 
                            id="password" 
                            name="password" 
                            required 
                            class="w-full px-4 py-2 border @error('password') border-red-500 @else border-gray-300 @enderror rounded-md focus:outline-none focus:ring-2 @error('password') focus:ring-red-500 focus:border-red-500 @else focus:ring-indigo-500 focus:border-indigo-500 @enderror"
                        >
                        @error('password')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div class="text-right">
                        <a href="#" class="text-sm text-indigo-600 hover:text-indigo-800">Lupa password?</a>
                    </div>
                    
                    <button 
                        type="submit" 
                        class="w-full py-2 px-4 bg-gradient-to-r from-indigo-600 to-indigo-800 text-white font-medium rounded-md hover:from-indigo-700 hover:to-indigo-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-all duration-200"
                    >
                        Login
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
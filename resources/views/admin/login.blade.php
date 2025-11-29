@extends('layouts.main')

@section('title', 'Login Admin')

@section('content')

<div class="min-h-[60vh] flex items-center justify-center px-4 py-6">

    <div class="w-full max-w-md">
        
        <div class="bg-white/5 backdrop-blur-md rounded-2xl p-8 border border-white/10 shadow-2xl">
            
            <h2 class="text-3xl font-bold text-slate-200 mb-8 text-center">
                Login Admin
            </h2>

            <form action="{{ route('admin.login') }}" method="POST" class="space-y-6">
                @csrf

                <div>
                    <label class="block text-sm font-medium text-slate-400 mb-2">Email Admin</label>
                    <input type="email" 
                           name="email" 
                           placeholder="admin@example.com" 
                           required
                           class="w-full px-4 py-3 bg-white/10 border border-white/20 rounded-lg 
                                  text-slate-200 placeholder-slate-500 
                                  focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent
                                  transition-all">
                </div>

                <div>
                    <label class="block text-sm font-medium text-slate-400 mb-2">Password</label>
                    <input type="password" 
                           name="password" 
                           placeholder="••••••••" 
                           required
                           class="w-full px-4 py-3 bg-white/10 border border-white/20 rounded-lg 
                                  text-slate-200 placeholder-slate-500 
                                  focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent
                                  transition-all">
                </div>

                <button type="submit" 
                        class="w-full px-6 py-3 bg-gradient-to-r from-indigo-600 to-purple-600 
                               hover:from-indigo-700 hover:to-purple-700 text-white rounded-lg 
                               font-semibold transition-all duration-200 shadow-lg hover:shadow-xl
                               transform hover:-translate-y-0.5">
                    Login
                </button>

            </form>

        </div>

    </div>

</div>

@endsection
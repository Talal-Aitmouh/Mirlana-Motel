@extends('master')

@section('contenu')
    <div class="max-w-md mx-auto bg-amber-50 p-8 rounded-lg shadow-lg border border-amber-200">
        <h2 class="text-3xl font-bold mb-6 text-amber-800 text-center">Bienvenue</h2>
        
        @if ($errors->any())
            <div class="bg-red-100 text-red-600 p-4 rounded-lg mb-6 border-l-4 border-red-500">
                <ul>
                    @foreach($errors->all() as $error)
                        <li class="ml-2">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}" class="space-y-6">
            @csrf

            <div class="space-y-2">
                <label for="email" class="block text-amber-900 font-medium">Email</label>
                <input 
                    name="email" 
                    type="email" 
                    required 
                    class="w-full p-3 border border-amber-300 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-amber-500 bg-white" 
                    value="{{ old('email') }}"
                >
            </div>

            <div class="space-y-2">
                <label for="password" class="block text-amber-900 font-medium">Mot de passe</label>
                <input 
                    name="password" 
                    type="password" 
                    required 
                    class="w-full p-3 border border-amber-300 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-amber-500 bg-white"
                >
            </div>

            <div class="flex items-center">
                <input 
                    type="checkbox" 
                    name="remember" 
                    id="remember" 
                    class="h-4 w-4 text-amber-600 focus:ring-amber-500 border-amber-300 rounded"
                >
                <label for="remember" class="ml-2 block text-amber-800">
                    Se souvenir de moi
                </label>
            </div>

            <button 
                type="submit" 
                class="w-full bg-blue-700 hover:bg-amber-800 text-white font-bold py-3 px-4 rounded-lg transition duration-200 ease-in-out transform hover:-translate-y-1 hover:shadow-lg"
            >
                Se connecter
            </button>

            <div class="relative py-4">
                <div class="absolute inset-0 flex items-center">
                    <div class="w-full border-t border-amber-300"></div>
                </div>
                <div class="relative flex justify-center">
                    <span class="bg-amber-50 px-4 text-sm text-amber-600">ou</span>
                </div>
            </div>

            <p class="text-center text-amber-800">
                Pas encore inscrit ? 
                <a href="{{ route('register') }}" class="text-amber-600 hover:text-amber-800 font-semibold underline">
                    Créer un compte
                </a>
            </p>
        </form>
    </div>
@endsection
@extends('master')

@section('contenu')
<div class="bg-amber-50 p-6 rounded-lg shadow-md border border-amber-200">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-amber-800">Ajouter une chambre</h2>
        
        <a href="{{ route('chambres.index') }}" class="bg-amber-100 hover:bg-amber-200 text-amber-800 px-4 py-2 rounded-lg transition duration-200 flex items-center">
            <i class="fas fa-arrow-left mr-2"></i> Retour
        </a>
    </div>

    @if ($errors->any())
        <div class="bg-red-100 text-red-600 p-4 mb-6 rounded-lg border-l-4 border-red-500">
            <ul>
                @foreach($errors->all() as $error)
                    <li class="ml-2">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('chambres.store') }}" method="POST" class="bg-white p-6 rounded-lg shadow-sm border border-amber-100">
        @csrf

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="space-y-4">
                <div>
                    <label for="description" class="block text-amber-800 font-medium mb-2">Description</label>
                    <input 
                        type="text" 
                        name="description" 
                        id="description"
                        value="{{ old('description') }}" 
                        class="w-full p-3 border border-amber-300 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-amber-500"
                    >
                </div>

                <div>
                    <label for="superficie" class="block text-amber-800 font-medium mb-2">Superficie (m²)</label>
                    <input 
                        type="number" 
                        name="superficie" 
                        id="superficie"
                        value="{{ old('superficie', 20) }}" 
                        class="w-full p-3 border border-amber-300 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-amber-500"
                    >
                </div>

                <div>
                    <label for="etage" class="block text-amber-800 font-medium mb-2">Étage</label>
                    <select 
                        name="étage" 
                        id="etage"
                        class="w-full p-3 border border-amber-300 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-amber-500 bg-white"
                    >
                        <option value="">-- Choisir l'étage --</option>
                        @foreach (['RDC', '1', '2', '3'] as $etage)
                            <option value="{{ $etage }}" @selected(old('étage') == $etage)>
                                {{ $etage }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="space-y-4">
                <div>
                    <label for="prix" class="block text-amber-800 font-medium mb-2">Prix (MAD)</label>
                    <input 
                        type="text" 
                        name="prix" 
                        id="prix"
                        value="{{ old('prix') }}" 
                        class="w-full p-3 border border-amber-300 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-amber-500"
                    >
                </div>

                <div>
                    <label for="type_id" class="block text-amber-800 font-medium mb-2">Type de chambre</label>
                    <select 
                        name="type_id" 
                        id="type_id"
                        class="w-full p-3 border border-amber-300 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-amber-500 bg-white"
                    >
                        <option value="">-- Choisir un type --</option>
                        @foreach ($types as $type)
                            <option value="{{ $type->id }}" @selected(old('type_id') == $type->id)>
                                {{ $type->titre }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>

        <div class="mt-8 flex justify-end">
            <button type="submit" class="bg-amber-700 hover:bg-amber-800 text-white px-6 py-3 rounded-lg transition duration-200 flex items-center font-medium">
                <i class="fas fa-save mr-2"></i> Enregistrer
            </button>
        </div>
    </form>
</div>
@endsection

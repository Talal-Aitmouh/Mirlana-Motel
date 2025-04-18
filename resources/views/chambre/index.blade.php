@extends('master')

@section('contenu')
<div class="bg-amber-50 p-6 rounded-lg shadow-md border border-amber-200">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-amber-800">Gestion des Chambres</h2>
        
        <div class="flex gap-3">
            <a href="{{ route('chambres.create') }}" class="bg-blue-700 hover:bg-amber-800 text-white px-4 py-2 rounded-lg transition duration-200 flex items-center">
                <i class="fas fa-plus mr-2"></i> Ajouter une chambre
            </a>

            <a href="{{ route('logout') }}" 
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();" 
                class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-lg transition duration-200 flex items-center">
                <i class="fas fa-sign-out-alt mr-2"></i> Déconnexion
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                @csrf
            </form>
        </div>
    </div>
    
    <div class="overflow-x-auto">
        <table class="w-full border-collapse">
            <thead>
                <tr class="bg-amber-200 text-amber-900">
                    <th class="p-3 text-left rounded-tl-lg">ID</th>
                    <th class="p-3 text-left">Description</th>
                    <th class="p-3 text-left">Superficie</th>
                    <th class="p-3 text-left">Étage</th>
                    <th class="p-3 text-left">Prix</th>
                    <th class="p-3 text-left">Type</th>
                    <th class="p-3 text-center rounded-tr-lg">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($chambres as $chambre)
                    <tr class="border-b border-amber-100 hover:bg-amber-50/70 transition-colors">
                        <td class="p-3">{{ $chambre->id }}</td>
                        <td class="p-3">{{ $chambre->description }}</td>
                        <td class="p-3">{{ $chambre->superficie }} m²</td>
                        <td class="p-3">{{ $chambre->étage }}</td>
                        <td class="p-3 font-medium">{{ $chambre->prix }} MAD</td>
                        <td class="p-3">
                            <span class="bg-amber-100 text-amber-800 px-2 py-1 rounded-full text-sm">
                                {{ $chambre->type->titre }}
                            </span>
                        </td>
                        <td class="p-3">
                            <div class="flex justify-center gap-3">
                                <!-- Afficher -->
                                <a href="{{ route('chambres.show', $chambre) }}" 
                                   class="text-amber-600 hover:text-amber-800 transition-colors" 
                                   title="Afficher">
                                    <i class="fas fa-eye"></i>
                                </a>

                                <!-- Modifier -->
                                <a href="{{ route('chambres.edit', $chambre) }}" 
                                   class="text-amber-600 hover:text-amber-800 transition-colors" 
                                   title="Modifier">
                                    <i class="fas fa-edit"></i>
                                </a>

                                <!-- Supprimer -->
                                <form action="{{ route('chambres.destroy', $chambre) }}" 
                                      method="POST" 
                                      onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette chambre?');">
                                    @csrf
                                    @method('DELETE')
                                    <button class="text-red-600 hover:text-red-800 transition-colors" 
                                            title="Supprimer">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
                
                @if(count($chambres) == 0)
                    <tr>
                        <td colspan="7" class="p-4 text-center text-gray-500">
                            Aucune chambre disponible
                        </td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>
@endsection
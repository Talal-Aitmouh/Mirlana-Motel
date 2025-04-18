@extends('master')

@section('contenu')
<div class="bg-amber-50 p-6 rounded-lg shadow-md border border-amber-200">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-amber-800 border-b-2 pb-2 border-amber-300">Détails de la chambre</h2>
        
        <div class="flex gap-2">
            <a href="{{ route('chambres.index') }}" class="bg-amber-100 hover:bg-amber-200 text-amber-800 px-4 py-2 rounded-lg transition duration-200 flex items-center">
                <i class="fas fa-arrow-left mr-2"></i> Retour
            </a>
            
            <a href="{{ route('chambres.edit', $chambre) }}" class="bg-amber-700 hover:bg-amber-800 text-white px-4 py-2 rounded-lg transition duration-200 flex items-center">
                <i class="fas fa-edit mr-2"></i> Modifier
            </a>
        </div>
    </div>

    <div class="bg-white p-6 rounded-lg shadow-sm border border-amber-100">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <p class="mb-4">
                    <span class="block text-amber-800 font-medium mb-1">Description</span>
                    <span class="text-gray-800">{{ $chambre->description }}</span>
                </p>
                
                <p class="mb-4">
                    <span class="block text-amber-800 font-medium mb-1">Superficie</span>
                    <span class="text-gray-800">{{ $chambre->superficie }} m²</span>
                </p>
                
                <p class="mb-4">
                    <span class="block text-amber-800 font-medium mb-1">Étage</span>
                    <span class="text-gray-800">{{ $chambre->étage }}</span>
                </p>
            </div>
            
            <div>
                <p class="mb-4">
                    <span class="block text-amber-800 font-medium mb-1">Prix</span>
                    <span class="text-amber-700 font-bold text-xl">{{ $chambre->prix }} MAD</span>
                </p>
                
                <p class="mb-4">
                    <span class="block text-amber-800 font-medium mb-1">Type</span>
                    <span class="inline-block bg-amber-100 text-amber-800 px-3 py-1 rounded-full text-sm">
                        {{ $chambre->type->titre }}
                    </span>
                </p>
            </div>
        </div>
    </div>

    <div class="mt-8">
        <h3 class="text-xl font-semibold text-amber-800 mb-4 flex items-center">
            <i class="fas fa-calendar-alt mr-2"></i> Réservations
        </h3>
        
        @if ($reservations->isEmpty())
            <div class="bg-white p-6 rounded-lg border border-amber-100 text-center">
                <p class="text-gray-600 italic">Aucune réservation pour cette chambre.</p>
            </div>
        @else
            <div class="space-y-4">
                @foreach ($reservations as $res)
                    <div class="border border-amber-100 p-5 rounded-lg bg-white shadow-sm hover:shadow-md transition-shadow">
                        <div class="flex justify-between items-center">
                            <div>
                                <div class="flex items-center mb-2">
                                    <i class="fas fa-user text-amber-600 mr-2"></i>
                                    <strong class="text-amber-800">Client #{{ $res->user_id }}</strong>
                                </div>
                                <div class="flex items-center text-gray-700">
                                    <div class="mr-4">
                                        <i class="fas fa-calendar-check text-amber-600 mr-1"></i> 
                                        Arrivée: <span class="font-medium">{{ $res->date_arrivée }}</span>
                                    </div>
                                    <div>
                                        <i class="fas fa-calendar-times text-amber-600 mr-1"></i> 
                                        Départ: <span class="font-medium">{{ $res->date_depart }}</span>
                                    </div>
                                </div>
                            </div>
                            <a href="#" class="text-amber-600 hover:text-amber-800 font-medium flex items-center transition-colors">
                                Voir détails <i class="fas fa-chevron-right ml-1"></i>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</div>
@endsection
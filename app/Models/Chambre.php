<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chambre extends Model
{

    use HasFactory;
    protected $fillable = [
        'type_id', 'description', 'superficie', 'étage', 'prix'
    ];

    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    public function reservations()
    {
        return $this->hasMany(ChambreUser::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'chambre_user')
                    ->withPivot('date_arrivée', 'date_depart')
                    ->withTimestamps();
    }
}

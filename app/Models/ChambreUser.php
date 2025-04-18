<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChambreUser extends Model
{

    use HasFactory;
    protected $table = 'chambre_user';

    protected $fillable = [
        'chambre_id', 'user_id', 'date_arrivée', 'date_depart'
    ];

    public function chambre()
    {
        return $this->belongsTo(Chambre::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GeneralInformation extends Model
{
    use HasFactory;

    protected $fillable = [
        'mision',
        'vision',
        'horarios',
        'email',
        'telefono',
        'whatsapp',
        'instagram',
        'facebook',
    ];
}

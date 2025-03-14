<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Employer extends Model
{
    use HasFactory;

    // Indique que l'ID est un UUID et qu'il n'est pas auto-incrémenté
    public $incrementing = false;
    protected $keyType = 'string';

    // Remplir les champs modifiables

    protected $fillable = [
        'user_id',
        'nom',
        'prenom',
        'tel',
        'mail',
        'lien_linkedin',
        'adresse',
        'profession',
        'image',
        'a_propos',
        'ifu'

    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Générer un UUID pour chaque nouvel enregistrement
    protected static function booted()
    {
        static::creating(function ($employer) {
            $employer->id = (string) Str::uuid();
        });
    }
}

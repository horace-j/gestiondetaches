<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;

class Notification extends Model
{
    use HasFactory;

    protected $fillable = ['titre', 'message', 'is_read'];
    public $incrementing = false;
    protected $keyType = 'string';

    // Générer automatiquement un UUID lors de la création
    protected static function boot()
    {
        parent::boot();
        static::creating(function ($notification) {
            $notification->id = (string) Str::uuid();
        });
    }
}

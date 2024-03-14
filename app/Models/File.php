<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class File extends Model
{
    use HasFactory;
    protected $fillable = ['path','name','size','uuid'];

    public function user():BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public static function booted()
    {
        static::creating(function($file){
            $uuid = Str::uuid();
            $file->uuid = $uuid;
        });

        static::deleted(function($file){
            
            Storage::disk('s3')->delete($file->path); //borra en AWS Cloud.
        });
    }

    public function link()
    {
        return $this->hasOne(FileShare::class);
    }
    
}

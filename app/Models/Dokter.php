<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Dokter extends Model
{
    use HasFactory;
    protected $guarded = [];

    /**
     * Get the spesialis that owns the Dokter
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function spesialis(): BelongsTo //Ctrl+Alt+I
    {
        return $this->belongsTo(Spesialis::class,);
    }
}

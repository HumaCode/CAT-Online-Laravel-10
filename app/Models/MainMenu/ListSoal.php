<?php

namespace App\Models\MainMenu;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ListSoal extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $table = 'question';


    /**
     * Get the kategoriUjian that owns the ListSoal
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function kategoriUjian(): BelongsTo
    {
        return $this->belongsTo(KategoriUjian::class, 'kategori_id', 'id');
    }
}

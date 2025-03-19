<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Family extends Model
{
    use HasUuids, SoftDeletes;

    protected $table = 'families';

    protected $fillable = [
        'relationship_id',
        'name',
        'dob',
    ];

    /**
     * Get the hubungan that owns the Family
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function hubungan()
    {
        return $this->belongsTo(Relationship::class, 'relationship_id', 'id');
    }
}

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
        'parent_id',
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


    /**
     * Get the parent of the Family
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function parent()
    {
        return $this->belongsTo(Family::class, 'parent_id');
    }

    /**
     * Get the children of the Family
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function children()
    {
        return $this->hasMany(Family::class, 'parent_id');
    }

}

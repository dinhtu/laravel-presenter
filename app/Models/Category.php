<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Kyslik\ColumnSortable\Sortable;

/**
 * @property int $id
 * @property string $name
 * @property string $created_at
 * @property string $updated_at
 */
class Category extends Model
{
    use HasFactory, SoftDeletes, Sortable;

    /**
     * @var array
     */
    protected $fillable = ['name', 'created_at', 'updated_at'];

    protected $appends = [
        'edit_url', 'destroy_url',
    ];

    public function getEditUrlAttribute()
    {
        return route('admin.category.edit', $this->id);
    }

    public function getDestroyUrlAttribute()
    {
        return route('admin.category.destroy', $this->id);
    }
}

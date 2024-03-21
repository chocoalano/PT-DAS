<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Model;
use App\Models\Permissions;

class PermissionGroup extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
    ];

    public function permission(): HasMany
    {
        return $this->hasMany(Permissions::class, 'permission_group_id', 'id');
    }
}

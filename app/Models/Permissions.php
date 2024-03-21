<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Permission\Models\Permission;
use App\Models\PermissionGroup;

class Permissions extends Permission
{
    use HasFactory;

    protected $fillable = [
        'permission_group_id',
    ];

    public function group(): BelongsTo
    {
        return $this->belongsTo(PermissionGroup::class);
    }
}

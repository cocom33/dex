<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Index extends Model
{
    use HasFactory;

    use SoftDeletes;

    protected $fillable = [
        'image',
        'name',
        'id_wp',
        'refine',
        'type',
        'weapon_type',
        'weapon_element',
        'awaken',
        'label',
        'dismantle',
        'skill_1',
        'skill_1_desc',
        'skill_2',
        'skill_2_desc',
    ];
}

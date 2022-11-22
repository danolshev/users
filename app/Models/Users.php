<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    use HasFactory;

    /**
     * {@inheritdoc}
     */
    const CREATED_AT = 'created';

    /**
     * {@inheritdoc}
     */
    const UPDATED_AT = null;

    protected $fillable = [
        'name',
        'email',
        'notes',
    ];
}

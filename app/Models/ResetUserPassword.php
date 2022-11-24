<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResetUserPassword extends Model
{
    use HasFactory;
    /**
     * The name of the "updated at" column.
     *
     * @var string
     */
    const UPDATED_AT = null;

    protected $fillable = [
        'email',
        'code',
        'created_at'
    ];
}

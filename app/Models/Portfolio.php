<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'description',
        'project_link',
        'image',
        'user_id',
    ];

    /**
     * Get the user that owns the portfolio item.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

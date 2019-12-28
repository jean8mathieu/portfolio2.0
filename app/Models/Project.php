<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    /**
     * Table name
     *
     * @var string
     */
    protected $table = 'projects';

    /**
     * Fillable values
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'title',
        'summary',
        'description',
        'cover',
        'url',
        'repo_url'
    ];

    /**
     * Get user model
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}

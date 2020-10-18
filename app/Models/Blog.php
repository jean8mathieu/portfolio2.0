<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Blog extends Model
{
    use SoftDeletes;

    /**
     * Table name
     *
     * @var string
     */
    protected $table = 'blogs';

    /**
     * Relationship
     *
     * @var array
     */
    protected $with = ['tags', 'user'];

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
        'markdown_description',
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

    /**
     * Get the tags object (Depracted)
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function tags_old()
    {
        return $this->belongsToMany(Tag::class);
    }

    /**
     * Get the tags object
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphToMany
     */
    public function tags()
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }
}

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
        'slug',
        'summary',
        'description',
        'markdown_description',
        'cover'
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

    /**
     * Get the first paragraph
     *
     * @return bool|string
     */
    public function getFirstParagraph()
    {
        return  substr(
            $this->markdown_description,
            strpos(
                $this->markdown_description,
                "<p"
            ),
            strpos(
                $this->markdown_description,
                "</p>"
            )+4
        );

    }

    /**
     * Get the slug of the blog
     */
    public function getSlug()
    {
        return $this->slug ?? $this->id;
    }
}

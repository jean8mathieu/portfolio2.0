<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tag extends Model
{
    use SoftDeletes;

    /**
     * Type constant
     */
    const TYPE_BACKEND = 'primary';
    const TYPE_FRONTEND = 'success';
    const TYPE_DATABASE = 'warning';

    /**
     * Type options
     *
     * @var array
     */
    public static $types = [
        self::TYPE_BACKEND => "Back-End",
        self::TYPE_FRONTEND => "Front-End",
        self::TYPE_DATABASE => "Database"
    ];

    /**
     * Valid type
     *
     * @var array
     */
    public static $typesKeys = [
        self::TYPE_BACKEND,
        self::TYPE_FRONTEND,
        self::TYPE_DATABASE
    ];

    /**
     * Table name
     *
     * @var string
     */
    protected $table = 'tags';

    /**
     * Relationship
     *
     * @var array
     */
    protected $with = ['user'];

    /**
     * Fillable value
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'type',
        'user_id'
    ];

    /**
     * Get the projects
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function projects()
    {
        return $this->belongsToMany(Project::class);
    }

    /**
     * Get the user
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    /**
     * Generate the button for tag
     *
     * @return string
     */
    public function getButton()
    {
        $route = route('home.tag', [$this]);
        $types = Tag::$types;
        return "<a href='{$route}'
                class='badge badge-{$this->type} fs-14'
                data-toggle='tooltip'
                title='{$types[$this->type]}'>
                {$this->name}
            </a>";
    }
}

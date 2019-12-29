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
     * Table name
     *
     * @var string
     */
    protected $table = 'tags';

    /**
     * Fillable value
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'type'
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
}

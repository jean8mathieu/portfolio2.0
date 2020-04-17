<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Experience extends Model
{
    use SoftDeletes;

    /**
     * Table name
     *
     * @var string
     */
    protected $table = 'experiences';

    /**
     * Fillable values
     *
     * @var array
     */
    protected $fillable = [
        'position',
        'company_name',
        'started_at',
        'ended_at',
        'location',
        'description',
        'markdown_description',
    ];
}

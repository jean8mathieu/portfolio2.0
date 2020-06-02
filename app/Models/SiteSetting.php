<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SiteSetting extends Model
{
    use SoftDeletes;

    /**
     * Table name
     *
     * @var string
     */
    protected $table = 'site_settings';

    /**
     * Fillable values
     *
     * @var array
     */
    protected $fillable = [
        'key',
        'value'
    ];

    /**
     * Get the value of the site setting
     *
     * @param $key
     * @return mixed
     */
    public static function get($key)
    {
        if($value = self::where('key', $key)->first()) {
            return $value->value;
        }

        return "";
    }

    /**
     * Set or create the value for the site setting
     *
     * @param $key
     * @param $value
     * @return mixed
     */
    public static function set($key, $value)
    {
        return self::updateOrCreate([
            'key' => $key
        ], [
            'value' => $value
        ]);
    }
}

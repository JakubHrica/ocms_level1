<?php namespace AppLogger\Logger\Models;

use Model;
use Route;

/**
 * Log Model
 *
 * @link https://docs.octobercms.com/3.x/extend/system/models.html
 */
class Log extends Model
{
    use \October\Rain\Database\Traits\Validation;

    /**
     * @var string table name
     */
    public $table = 'applogger_logger_logs';

    /**
     * @var array rules for validation
     */
    public $rules = [
        'arrival' => 'required|max:20',
        'name' => 'required|string|max:30',
        'late' => 'required|boolean|max:1',
    ];

    protected $fillable = ['arrival', 'name', 'late'];
}
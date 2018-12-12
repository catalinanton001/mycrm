<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class AllTask
 *
 * @package App
 * @property string $name
 * @property string $task_belongs_to
 * @property tinyInteger $in_analysis
 * @property tinyInteger $in_process
 * @property tinyInteger $done
*/
class AllTask extends Model
{
    use SoftDeletes;

    protected $fillable = ['name', 'task_belongs_to', 'in_analysis', 'in_process', 'done'];
    protected $hidden = [];
    
    
    
}

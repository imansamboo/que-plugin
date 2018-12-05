<?php
/**
 * Created by PhpStorm.
 * User: admirer
 * Date: 12/4/18
 * Time: 12:25 PM
 */

namespace PPF\Ques\App;
use Illuminate\Database\Eloquent\Model;


class Que extends Model
{
    protected $fillable = ['name', 'timeout'];
}
<?php
/**
 * Created by PhpStorm.
 * User: proms
 * Date: 6/19/2018
 * Time: 6:35 PM
 */

namespace App;
use Illuminate\Database\Eloquent\Model;

class Freshy extends Model
{
    protected $guard = 'web';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','surname','nickname','gender','faculty','telephone','line','facebook','religion','disfood','vegetarian','islamic','disease','disdrug','sosname','sossurname','sosrelationship','sostel1','sostel2',
    ];

}
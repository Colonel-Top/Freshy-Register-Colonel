<?php
/**
 * Created by PhpStorm.
 * User: proms
 * Date: 6/19/2018
 * Time: 6:35 PM
 */

namespace App;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $guard = 'web';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'freshy_id','seat_id',
    ];

}
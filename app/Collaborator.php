<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model;

class Collaborator extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'collaborators';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'sector', 'full_name', 'birth_date', 'salary', 'status'
    ];
}

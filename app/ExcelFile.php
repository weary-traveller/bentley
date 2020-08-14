<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExcelFile extends Model
{
    public $incrementing = false;
    // protected $primaryKey = 'data_id';
    public $timestamps = false;
    
    protected $fillable = [
    	'data_id', 'building_name', 'floor_number', 'room_number', 'capacity'
	];

	protected $hidden = [
        'id',
    ];
}

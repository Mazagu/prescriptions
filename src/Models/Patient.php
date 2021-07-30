<?php 

namespace Bluesourcery\Prescription\Models;

use Bluesourcery\Prescription\Database\Factories\PatientFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    protected $fillable = [
    	'name',
    	'lastname',
    	'id_card',
    ];

    protected static function newFactory()
    {
        return PatientFactory::new();
    }
}
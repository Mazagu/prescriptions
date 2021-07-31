<?php 

namespace Bluesourcery\Prescription\Models;

use Bluesourcery\Prescription\Database\Factories\DrugFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Drug extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'code',
        'prescription_id',
        'posology'
    ];

    protected static function newFactory()
    {
        return DrugFactory::new();
    }
}
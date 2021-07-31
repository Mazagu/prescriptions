<?php 

namespace Bluesourcery\Prescription\Models;

use Bluesourcery\Prescription\Database\Factories\PrescriptionFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prescription extends Model
{
    use HasFactory;

    protected $fillable = [
        'patient_id'
    ];

    protected static function newFactory()
    {
        return PrescriptionFactory::new();
    }
}
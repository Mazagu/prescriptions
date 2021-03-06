<?php 

namespace Bluesourcery\Prescription\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrescriptionLog extends Model
{
    use HasFactory;

    protected $fillable = [
        'prescription_id',
        'action',
        'parameters'
    ];
}
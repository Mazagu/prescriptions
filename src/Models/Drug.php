<?php 

namespace Bluesourcery\Prescription\Models;

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
}
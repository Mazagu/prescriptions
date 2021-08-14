<?php 

namespace Bluesourcery\Prescription\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DrugLog extends Model
{
    use HasFactory;

    protected $fillable = [
        'drug_id',
        'action',
        'parameters'
    ];
}
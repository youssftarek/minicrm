<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Company;

class Employee extends Model
{
    use HasFactory;
    protected $fillable=['first_name',
    'last_name',
    'company_id',
    'email',
    'phone',
    'occupation'];

    // public function company():BelongsTo
    // {
    //     return $this->belongsTo(Company::class , 'company_id', 'id');
    // }
}

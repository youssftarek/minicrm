<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Employee;
class Company extends Model
{
    use HasFactory;
    protected $fillable=['name','email','website','revenue'];

    public function employees():HasMany
    {
        return $this->hasMany(Employee::class, 'company_id', 'id');
    }
}


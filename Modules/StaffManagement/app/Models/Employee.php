<?php

namespace Modules\StaffManagement\app\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $table = 'employees';

    protected $primaryKey = 'id';

    protected $fillable = [
        'employee_ref_id',
        'name',
        'email',
        'contact',
        'designation',
        'status',
        'monthly_salary_package',
        'monthly_tax_value',
        'net_salary',
        'yearly_increasing_bonus',
        'yearly_net_salary',

    ];
}

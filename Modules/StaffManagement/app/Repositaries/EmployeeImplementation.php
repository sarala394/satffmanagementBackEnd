<?php

namespace Modules\StaffManagement\app\Repositaries;

use Modules\StaffManagement\app\Models\Employee;
// use Modules\LabourManagement\app\Models\Job_labour;
use Carbon\Carbon;


class EmployeeImplementation implements EmployeeInterface
{

    // Labour Store
    public function store($data)
    {

        // Create New Labour
        $employee = new Employee();

        $employee->employee_ref_id = $data['employee_ref_id'];

        $employee->name = $data['name'];

        $employee->email = $data['email'];

        $employee->contact = $data['contact'];

        $employee->designation = $data['designation'];

        $employee->status = $data['status'];

        $employee->monthly_salary_package = $data['monthly_salary_package'];

        $employee->monthly_tax_value = $data['monthly_tax_value'];

        $employee->net_salary = $data['net_salary'];

        $employee->yearly_increasing_bonus = $data['yearly_increasing_bonus'];

        $employee->yearly_net_salary = $data['yearly_net_salary'];

        $employee->save();

        return $employee;
    }

    public function update($data, $id)
    {
        $employee = Employee::find($id['id']);

        $employee->contact = $data['contact'];

        $employee->monthly_salary_package = $data['monthly_salary_package'];

        $employee->monthly_tax_value = $data['monthly_tax_value'];

        $employee->net_salary = $data['net_salary'];

        $employee->yearly_increasing_bonus = $data['yearly_increasing_bonus'];

        $employee->yearly_net_salary = $data['yearly_net_salary'];

        $employee->save();

        return $employee;
    }

    // Get All Labours / Filter Labours Data
    public function getEmployees($data)
    {
        if (!empty($data['search_data'])) {

            $searchData = $data['search_data'];
            $allemployees  = Employee::select('employee_ref_id', 'name', 'email', 'contact', 'designation', 'status')
                ->where('contact', 'LIKE', '%' . $searchData . '%')
                ->get();
        } else {
            $allemployees  = Employee::select('employee_ref_id', 'name', 'email', 'contact', 'designation', 'status')
                ->get();
        }
        return $allemployees;
    }

    // Labour Delete
    public function deleteLabour($id)
    {
    }
}

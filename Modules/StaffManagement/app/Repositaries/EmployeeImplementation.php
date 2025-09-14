<?php

namespace Modules\StaffManagement\app\Repositaries;

use Modules\StaffManagement\app\Models\Employee;
use Carbon\Carbon;


class EmployeeImplementation implements EmployeeInterface
{

    public function store($data)
    {

        // Create New Employee
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

        // calculate yealry net salary
        $yearly_net_salary = ($data['net_salary'] * 12) + $data['yearly_increasing_bonus'];

        $employee->yearly_net_salary = $yearly_net_salary;

        $employee->save();

        return $employee;
    }

    // Update Employee
    public function update($data, $id)
    {
        $employee = Employee::find($id['id']);

        $employee->contact = $data['contact'];

        $employee->monthly_salary_package = $data['monthly_salary_package'];

        $employee->monthly_tax_value = $data['monthly_tax_value'];

        $employee->net_salary = $data['net_salary'];

        $employee->yearly_increasing_bonus = $data['yearly_increasing_bonus'];

        // calculate yealry net salary
        $yearly_net_salary = ($data['net_salary'] * 12) + $data['yearly_increasing_bonus'];

        $employee->yearly_net_salary = $yearly_net_salary;

        $employee->save();

        return $employee;
    }

    // Get All Employees / Filter Employees Data
    public function getEmployees($data)
    {
        if (!empty($data['search_data'])) {

            $searchData = $data['search_data'];
            $allemployees  = Employee::select('id', 'employee_ref_id', 'name', 'email', 'contact', 'designation', 'status', 'monthly_salary_package', 'monthly_tax_value', 'net_salary', 'yearly_increasing_bonus', 'yearly_net_salary')
                ->where('contact', 'LIKE', '%' . $searchData . '%')
                ->get();
        } else {
            $allemployees  = Employee::select('id', 'employee_ref_id', 'name', 'email', 'contact', 'designation', 'status', 'monthly_salary_package', 'monthly_tax_value', 'net_salary', 'yearly_increasing_bonus', 'yearly_net_salary')
                ->get();
        }
        return $allemployees;
    }

    // Get All Information with salary details / Filter Employees Data
    public function getAllEmployees($data)
    {
        if (!empty($data['search_data'])) {

            $searchData = $data['search_data'];
            $allemployeesInfo  = Employee::select('employee_ref_id', 'name', 'email', 'contact', 'designation', 'monthly_salary_package', 'monthly_tax_value', 'net_salary', 'yearly_increasing_bonus', 'yearly_net_salary')
                ->where('contact', 'LIKE', '%' . $searchData . '%')
                ->orWhere('employee_ref_id', 'LIKE', '%' . $searchData . '%')
                ->orWhere('name', 'LIKE', '%' . $searchData . '%')
                ->orWhere('email', 'LIKE', '%' . $searchData . '%')
                ->orWhere('designation', 'LIKE', '%' . $searchData . '%')
                ->get();
        } else {
            $allemployeesInfo  = Employee::select('employee_ref_id', 'name', 'email', 'contact', 'designation', 'monthly_salary_package', 'monthly_tax_value', 'net_salary', 'yearly_increasing_bonus', 'yearly_net_salary')
                ->get();
        }
        return $allemployeesInfo;
    }

    // Get Total Count - Employees
    public function getTotEmployees()
    {
        $totemployees = Employee::count();
        return $totemployees;
    }

    // Employees Delete
    public function deleteEmployee($id)
    {
    }
}

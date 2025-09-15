<?php

namespace Modules\StaffManagement\app\Repositaries;


interface EmployeeInterface
{

    // Employee store
    public function store($data);

    // Employee update
    public function updateEmployee($data, $id);

    // Employees all
    public function getEmployees($data);

    // Employees all Info
    public function getAllEmployees($data);

    // Total Employees
    public function getTotEmployees();

    // Employee delete
    public function deleteEmployee($id);

}

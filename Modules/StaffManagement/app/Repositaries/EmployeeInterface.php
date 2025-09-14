<?php

namespace Modules\StaffManagement\app\Repositaries;


interface EmployeeInterface
{

    // labour store
    public function store($data);

    // labour update
    public function update($data, $id);

    // labour all
    public function getEmployees($data);

    // labour delete
    public function deleteLabour($id);

}

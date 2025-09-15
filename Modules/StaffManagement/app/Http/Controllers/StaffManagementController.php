<?php

namespace Modules\StaffManagement\app\Http\Controllers;

use App\Http\Controllers\Controller;
use Modules\StaffManagement\app\Models\Employee;
use Modules\StaffManagement\app\Repositaries\EmployeeInterface;
use Modules\StaffManagement\app\Http\Requests\AddEmployeeRequest;
use Modules\StaffManagement\app\Http\Requests\UpdateEmployeeRequest;
use Modules\StaffManagement\app\Http\Requests\SearchEmployeeRequest;
use Modules\StaffManagement\app\Http\Requests\SearchInfoRequest;
use Illuminate\Http\Request;
use Exception;

class StaffManagementController extends Controller
{

    protected $interface;

    public function __construct(EmployeeInterface $employeeinterface)
    {
        $this->interface = $employeeinterface;
    }


    // Store New Employee
    public function store(AddEmployeeRequest $request)
    {

        // data validation from the request class
        $validateddata = $request->validated();
        try {
            $response = $this->interface->store($validateddata);
            return response()->json(
                ['data' => $response],
                200
            );
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }



    // Update Employee Details
    public function update(UpdateEmployeeRequest $request, Employee $id)
    {

        // data validation from the request class
        $validateddata = $request->validated();
        try {
            $response = $this->interface->updateEmployee($validateddata, $id);
            return response()->json(
                ['data' => $response],
                200
            );
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }


    // Get All Employees / Filter Employees
    public function index(SearchEmployeeRequest $request)
    {
        $validateddata = $request->validated();
        try {
            $response = $this->interface->getEmployees($validateddata);
            return response()->json(
                ['data' => $response],
                200
            );
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    // Get All Information / Filter Employees
    public function getallinfo(SearchInfoRequest $request)
    {
        $validateddata = $request->validated();
        try {
            $response = $this->interface->getAllEmployees($validateddata);
            return response()->json(
                ['data' => $response],
                200
            );
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    // Get total count -- employees
    public function totalemployees()
    {
        try {
            $response = $this->interface->getTotEmployees();
            return response()->json(
                ['data' => $response],
                200
            );
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    // Delete Employees
    public function destroy($id)
    {
        try {
            $response = $this->interface->deleteEmployee($id);
            return response()->json(
                ['data' => $response],
                200
            );
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}

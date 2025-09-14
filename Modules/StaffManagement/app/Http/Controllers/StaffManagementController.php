<?php

namespace Modules\StaffManagement\app\Http\Controllers;

use App\Http\Controllers\Controller;
use Modules\StaffManagement\app\Models\Employee;
use Modules\StaffManagement\app\Repositaries\EmployeeInterface;
use Modules\StaffManagement\app\Http\Requests\AddEmployeeRequest;
use Modules\StaffManagement\app\Http\Requests\UpdateEmployeeRequest;
use Modules\StaffManagement\app\Http\Requests\SearchEmployeeRequest;
use Illuminate\Http\Request;
use Exception;

class StaffManagementController extends Controller
{

    protected $interface;

    public function __construct(EmployeeInterface $employeeinterface)
    {
        $this->interface = $employeeinterface;
    }


    // Store New Labour
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



    // Update Labour Details
    public function update(UpdateEmployeeRequest $request, Employee $id)
    {
        // data validation from the request class
        $validateddata = $request->validated();
        try {
            $response = $this->interface->update($validateddata, $id);
            return response()->json(
                ['data' => $response],
                200
            );
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }


    // Get All Employees / Filter Labours
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
}

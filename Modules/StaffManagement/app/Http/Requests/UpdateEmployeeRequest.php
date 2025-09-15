<?php

namespace Modules\StaffManagement\app\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEmployeeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'contact' => "string",
            'monthly_salary_package' =>  "numeric",
            'monthly_tax_value' =>  "numeric",
            'net_salary' =>  "numeric",
            'yearly_increasing_bonus' =>  "numeric",
            'yearly_net_salary' =>  "",
        ];
    }
}

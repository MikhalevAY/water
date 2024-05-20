<?php

namespace App\Http\Requests\MeterData;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'customer_account' => 'required|exists:customers,account',
            'comment' => 'nullable|string',
            'indication' => 'nullable',
            'month' => 'required|int|min:1|max:12',
            'year' => 'required',
            'staff_iin' => 'required',
            'consumed_volume' => 'required',
            'counter_serial' => 'nullable',
            'total_consumption'=> 'nullable|numeric',
            'cost_services_begin'=> 'nullable|numeric',
            'cost_subsidies_begin'=> 'nullable|numeric',
            'total_consumption_norm'=> 'nullable|numeric',
            'total_consumption_col'=> 'nullable|numeric',
            'total_consumption_epuv'=> 'nullable|numeric',
            'total_consumption_bz'=> 'nullable|numeric',
            'total_consumption_cs'=> 'nullable|numeric',
            'cost_services_begin_norm'=> 'nullable|numeric',
            'cost_services_begin_col'=> 'nullable|numeric',
            'cost_services_begin_epuv'=> 'nullable|numeric',
            'cost_services_begin_bz'=> 'nullable|numeric',
            'cost_services_begin_cs'=> 'nullable|numeric',
            'cost_subsidies_begin_norm'=> 'nullable|numeric',
            'cost_subsidies_begin_col'=> 'nullable|numeric',
            'cost_subsidies_begin_epuv'=> 'nullable|numeric',
            'cost_subsidies_begin_bz'=> 'nullable|numeric',
            'cost_subsidies_begin_cs'=> 'nullable|numeric',
            'to_full_pay'=> 'nullable|integer',
            'total_consumption_all'=> 'nullable|numeric',
            'cost_services_begin_all'=> 'nullable|numeric',
            'cost_subsidies_begin_all'=> 'nullable|numeric',
            'photos[]' => 'nullable|array',
            'photos.*' => 'image|mimes:jpeg,png,jpg|max:16384',
        ];
    }
}

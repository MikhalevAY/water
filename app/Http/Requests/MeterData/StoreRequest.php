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
            'indication' => 'nullable',
            'month' => 'required|int|min:1|max:12',
            'year' => 'required',
            'staff_iin' => 'required',
            'consumed_volume' => 'required',
            'counter_serial' => 'nullable',
            'photos[]' => 'nullable|array',
            'photos.*' => 'image|mimes:jpeg,png,jpg|max:16384',
        ];
    }
}

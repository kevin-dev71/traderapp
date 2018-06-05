<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class TradeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->user();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {

        switch ($this->method()) {
            case 'GET':
            case 'DELETE':
                return [];
            case 'POST':
            case 'PUT': {
                return [
                    'point' => 'required|numeric|between:-99.99,99.99',
                    'instrument_id' => [
                        'required',
                        Rule::exists('instruments', 'id')
                    ],
                    'market_id' => [
                        'required',
                        Rule::exists('markets', 'id')
                    ]
                ];
            }
        }
    }
}

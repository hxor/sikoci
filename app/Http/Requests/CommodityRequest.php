<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Commodity;

class CommodityRequest extends FormRequest
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
        $data = Commodity::find($this->commodity);

        switch ($this->method()) {
            case 'GET':
            case 'DELETE':
                {
                    return [];
                }
            case 'POST':
                {
                    return [
                        'slug' => 'required|string|unique:commodities,slug',
                        'title' => 'required|string|min:2|unique:commodities,title',
                        'commodity_category_id' => 'required|integer'
                    ];
                }
            case 'PUT':
                {
                    return [
                        'slug' => 'required|string|unique:commodities,slug,' . $data->id,
                        'title' => 'required|string|min:2|unique:commodities,title,' . $data->id,
                        'commodity_category_id' => 'required|integer'
                    ];
                }
            case 'PATCH':
                {
                    return [
                        'slug' => 'required|string|unique:commodities,slug,' . $data->id,
                        'title' => 'required|string|min:2|unique:commodities,title,' . $data->id,
                        'commodity_category_id' => 'required|integer'
                    ];
                }
            default:
                break;
        }
    }
}

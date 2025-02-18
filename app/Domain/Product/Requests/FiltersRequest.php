<?php

namespace App\Domain\Product\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FiltersRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => 'string|nullable',
            'categoryName' => 'string|nullable',
            'priceFrom' => 'numeric|nullable',
            'priceTo' => 'numeric|nullable',
            'active' => 'boo|nullable'
        ];
    }
}

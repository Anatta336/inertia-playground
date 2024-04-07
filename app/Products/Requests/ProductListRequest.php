<?php

namespace App\Products\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Request for listing products with pagination, sorting, and searching.
 */
class ProductListRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'page'    => 'integer|min:1',
            'perPage' => 'integer|min:1',
            'sort'    => 'string',
            'search'  => 'string'
        ];
    }

    public function page()
    {
        return $this->input('page', 1);
    }

    public function perPage()
    {
        return $this->input('perPage', 10);
    }

    public function sort()
    {
        return $this->input('sort', 'id');
    }

    public function search()
    {
        return $this->input('search', '');
    }
}
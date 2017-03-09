<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\salesinvoices;

class CreatesalesinvoicesRequest extends FormRequest
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
        return salesinvoices::$rules;
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'invoiceNo.required' => 'Nomor Faktur harus di isi',
            'invoiceDate.required' => 'Tanggal Faktur harus di isi',
            'soID.required' => 'Faktur Pemesanan harus di isi'
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\salespayments;

class UpdatesalespaymentsRequest extends FormRequest
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
        return salespayments::$rules;
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'paymentNo.required' => 'Pilih Customer terlebih dahulu untuk mengisi Nomor Faktur',
            'paymentDate.required' => 'Tanggal Faktur harus di isi',
            'customerID.required' => 'Customer harus di isi',
            'totalPaid.min:1' => 'Total Pembayaran tidak boleh kosong'
        ];
    }
}

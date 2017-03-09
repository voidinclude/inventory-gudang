<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\customers;

class UpdatecustomersRequest extends FormRequest
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
        return customers::$rules;
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'customerCode.required' => 'Kode Customer harus di isi',
            'customerName.required' => 'Nama Customer harus di isi',
            'contactPerson.required' => 'Kontak harus di isi',
            'address.required' => 'Alamat harus di isi',
            'city.required' => 'Kode Customer harus di isi',
            'phonecp1.required' => 'Nomor HP harus di isi',
            'email.email' => 'Gunakan alamat email yang benar'
        ];
    }
}

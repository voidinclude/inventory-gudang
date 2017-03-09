<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted'             => ':attribute ini harus disetujui.',
    'active_url'           => ':attribute bukan URL valid.',
    'after'                => ':attribute harus berupa tanggal setelah :date.',
    'after_or_equal'       => ':attribute harus berupa tanggal setelah atau sama dengan :date.',
    'alpha'                => ':attribute hanya boleh berisi huruf.',
    'alpha_dash'           => ':attribute hanya boleh berisi huruf, angka, dan tanda hubung.',
    'alpha_num'            => ':attribute hanya boleh berisi huruf, dan angka.',
    'array'                => ':attribute harus berupa array.',
    'before'               => ':attribute harus berupa tanggal sebelum :date.',
    'before_or_equal'      => ':attribute harus berupa tanggal sebelum atau sama dengan :date.',
    'between'              => [
        'numeric' => ':attribute harus di antara :min dan :max.',
        'file'    => ':attribute harus di antara :min dan :max kilobytes.',
        'string'  => ':attribute harus di antara :min dan :max karakter.',
        'array'   => ':attribute harus di antara :min dan :max items.',
    ],
    'boolean'              => ':attribute field harus benar atau salah.',
    'confirmed'            => ':attribute konfirmasi tidak sesuai.',
    'date'                 => ':attribute bukan format tanggal yang benar.',
    'date_format'          => ':attribute tidak sesuai format :format.',
    'different'            => ':attribute dan :other harus berbeda.',
    'digits'               => ':attribute harus berupa :digits digits.',
    'digits_between'       => ':attribute harus di antara :min dan :max digits.',
    'dimensions'           => ':attribute memiliki dimensi gambar yang tidak sesuai.',
    'distinct'             => ':attribute memiliki nilai yang sama.',
    'email'                => ':attribute Harus alamat e-mail yang valid.',
    'exists'               => ':attribute yang dipilih tidak valid.',
    'file'                 => ':attribute harus berupa file/dokumen.',
    'filled'               => ':attribute harus diisi.',
    'image'                => ':attribute harus berupa gambar.',
    'in'                   => ':attribute yang dipilih tidak valid.',
    'in_array'             => ':attribute tidak ada di :other.',
    'integer'              => ':attribute harus berupa angka.',
    'ip'                   => ':attribute harus IP address yang benar.',
    'json'                 => ':attribute harus berupa JSON string yang benar.',
    'max'                  => [
        'numeric' => ':attribute harus lebih besar dari :max.',
        'file'    => ':attribute tidak boleh lebih besar dari :max kilobytes.',
        'string'  => ':attribute tidak boleh lebih besar dari :max characters.',
        'array'   => ':attribute tidak boleh lebih banyak dari :max items.',
    ],
    'mimes'                => 'The :attribute must be a file of type: :values.',
    'mimetypes'            => 'The :attribute must be a file of type: :values.',
    'min'                  => [
        'numeric' => ':attribute harus minimal :min.',
        'file'    => ':attribute harus minimal :min kilobytes.',
        'string'  => ':attribute harus minimal :min characters.',
        'array'   => ':attribute harus minimal :min items.',
    ],
    'not_in'               => ':attribute tidak sesuai.',
    'numeric'              => ':attribute harus angka.',
    'present'              => ':attribute harus diisi.',
    'regex'                => ':attribute format tidak sesuai.',
    'required'             => ':attribute harus diisi.',
    'required_if'          => ':attribute harus diisi jika :other adalah :value.',
    'required_unless'      => ':attribute harus diisi jika lebih sedikit :other dari :values.',
    'required_with'        => ':attribute harus diisi ketika :values diisi.',
    'required_with_all'    => ':attribute harus diisi ketika :values diisi.',
    'required_without'     => ':attribute harus diisi ketika :values kosong.',
    'required_without_all' => ':attribute harus diisi ketika satu dari :values diisi.',
    'same'                 => ':attribute dan :other tidak sesuai.',
    'size'                 => [
        'numeric' => ' :attribute harus :size.',
        'file'    => ' :attribute harus :size kilobytes.',
        'string'  => ' :attribute harus :size characters.',
        'array'   => ' :attribute harus :size items.',
    ],
    'string'               => ' :attribute harus string.',
    'timezone'             => ' :attribute harus sesuai zona.',
    'unique'               => ' :attribute sudah ada.',
    'uploaded'             => ' :attribute gagal di upload.',
    'url'                  => ' :attribute format tidak sesuai.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */

    'attributes' => [],

];

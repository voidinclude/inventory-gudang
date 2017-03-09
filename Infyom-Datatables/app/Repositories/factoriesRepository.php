<?php

namespace App\Repositories;

use App\Models\factories;
use InfyOm\Generator\Common\BaseRepository;

class factoriesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'factoryCode',
        'factoryName',
        'factoryType',
        'status',
        'note'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return factories::class;
    }
}

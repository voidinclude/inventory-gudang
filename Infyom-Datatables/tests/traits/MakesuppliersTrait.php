<?php

use Faker\Factory as Faker;
use App\Models\suppliers;
use App\Repositories\suppliersRepository;

trait MakesuppliersTrait
{
    /**
     * Create fake instance of suppliers and save it in database
     *
     * @param array $suppliersFields
     * @return suppliers
     */
    public function makesuppliers($suppliersFields = [])
    {
        /** @var suppliersRepository $suppliersRepo */
        $suppliersRepo = App::make(suppliersRepository::class);
        $theme = $this->fakesuppliersData($suppliersFields);
        return $suppliersRepo->create($theme);
    }

    /**
     * Get fake instance of suppliers
     *
     * @param array $suppliersFields
     * @return suppliers
     */
    public function fakesuppliers($suppliersFields = [])
    {
        return new suppliers($this->fakesuppliersData($suppliersFields));
    }

    /**
     * Get fake data of suppliers
     *
     * @param array $postFields
     * @return array
     */
    public function fakesuppliersData($suppliersFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'supplierCode' => $fake->word,
            'supplierName' => $fake->word,
            'address' => $fake->text,
            'city' => $fake->word,
            'phone' => $fake->word,
            'fax' => $fake->word,
            'contactPerson' => $fake->word,
            'email' => $fake->word,
            'createdDate' => $fake->word,
            'createdUserID' => $fake->randomDigitNotNull,
            'modifiedDate' => $fake->word,
            'modifiedUserID' => $fake->word,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $suppliersFields);
    }
}

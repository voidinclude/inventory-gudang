<?php

use Faker\Factory as Faker;
use App\Models\customers;
use App\Repositories\customersRepository;

trait MakecustomersTrait
{
    /**
     * Create fake instance of customers and save it in database
     *
     * @param array $customersFields
     * @return customers
     */
    public function makecustomers($customersFields = [])
    {
        /** @var customersRepository $customersRepo */
        $customersRepo = App::make(customersRepository::class);
        $theme = $this->fakecustomersData($customersFields);
        return $customersRepo->create($theme);
    }

    /**
     * Get fake instance of customers
     *
     * @param array $customersFields
     * @return customers
     */
    public function fakecustomers($customersFields = [])
    {
        return new customers($this->fakecustomersData($customersFields));
    }

    /**
     * Get fake data of customers
     *
     * @param array $postFields
     * @return array
     */
    public function fakecustomersData($customersFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'customerCode' => $fake->word,
            'customerName' => $fake->word,
            'contactPerson' => $fake->word,
            'address' => $fake->word,
            'address2' => $fake->text,
            'village' => $fake->word,
            'district' => $fake->word,
            'city' => $fake->word,
            'zipCode' => $fake->randomDigitNotNull,
            'province' => $fake->word,
            'phone' => $fake->word,
            'fax' => $fake->word,
            'phonecp1' => $fake->word,
            'phonecp2' => $fake->word,
            'email' => $fake->word,
            'note' => $fake->text,
            'npwp' => $fake->word,
            'pkpName' => $fake->word,
            'category' => $fake->word,
            'status' => $fake->word,
            'createdDate' => $fake->word,
            'createdUserID' => $fake->randomDigitNotNull,
            'modifiedDate' => $fake->word,
            'modifiedUserID' => $fake->randomDigitNotNull,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $customersFields);
    }
}

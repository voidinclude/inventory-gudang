<?php

use Faker\Factory as Faker;
use App\Models\company;
use App\Repositories\companyRepository;

trait MakecompanyTrait
{
    /**
     * Create fake instance of company and save it in database
     *
     * @param array $companyFields
     * @return company
     */
    public function makecompany($companyFields = [])
    {
        /** @var companyRepository $companyRepo */
        $companyRepo = App::make(companyRepository::class);
        $theme = $this->fakecompanyData($companyFields);
        return $companyRepo->create($theme);
    }

    /**
     * Get fake instance of company
     *
     * @param array $companyFields
     * @return company
     */
    public function fakecompany($companyFields = [])
    {
        return new company($this->fakecompanyData($companyFields));
    }

    /**
     * Get fake data of company
     *
     * @param array $postFields
     * @return array
     */
    public function fakecompanyData($companyFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'companyCode' => $fake->word,
            'companyName' => $fake->word,
            'contactPerson' => $fake->word,
            'address' => $fake->text,
            'village' => $fake->word,
            'district' => $fake->word,
            'city' => $fake->word,
            'zipcode' => $fake->word,
            'province' => $fake->word,
            'phone' => $fake->word,
            'fax' => $fake->word,
            'phonecp' => $fake->word,
            'email' => $fake->word,
            'print_address' => $fake->text,
            'faktur_address' => $fake->text,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $companyFields);
    }
}

<?php

use Faker\Factory as Faker;
use App\Models\receives;
use App\Repositories\receivesRepository;

trait MakereceivesTrait
{
    /**
     * Create fake instance of receives and save it in database
     *
     * @param array $receivesFields
     * @return receives
     */
    public function makereceives($receivesFields = [])
    {
        /** @var receivesRepository $receivesRepo */
        $receivesRepo = App::make(receivesRepository::class);
        $theme = $this->fakereceivesData($receivesFields);
        return $receivesRepo->create($theme);
    }

    /**
     * Get fake instance of receives
     *
     * @param array $receivesFields
     * @return receives
     */
    public function fakereceives($receivesFields = [])
    {
        return new receives($this->fakereceivesData($receivesFields));
    }

    /**
     * Get fake data of receives
     *
     * @param array $postFields
     * @return array
     */
    public function fakereceivesData($receivesFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'invoiceID' => $fake->randomDigitNotNull,
            'customerID' => $fake->randomDigitNotNull,
            'invoiceTotal' => $fake->randomDigitNotNull,
            'receiveTotal' => $fake->randomDigitNotNull,
            'refundTotal' => $fake->randomDigitNotNull,
            'createdDate' => $fake->word,
            'createdUserID' => $fake->randomDigitNotNull,
            'modifiedDate' => $fake->word,
            'modifiedUserID' => $fake->randomDigitNotNull,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $receivesFields);
    }
}

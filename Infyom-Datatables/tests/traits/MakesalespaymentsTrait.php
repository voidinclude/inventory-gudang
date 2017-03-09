<?php

use Faker\Factory as Faker;
use App\Models\salespayments;
use App\Repositories\salespaymentsRepository;

trait MakesalespaymentsTrait
{
    /**
     * Create fake instance of salespayments and save it in database
     *
     * @param array $salespaymentsFields
     * @return salespayments
     */
    public function makesalespayments($salespaymentsFields = [])
    {
        /** @var salespaymentsRepository $salespaymentsRepo */
        $salespaymentsRepo = App::make(salespaymentsRepository::class);
        $theme = $this->fakesalespaymentsData($salespaymentsFields);
        return $salespaymentsRepo->create($theme);
    }

    /**
     * Get fake instance of salespayments
     *
     * @param array $salespaymentsFields
     * @return salespayments
     */
    public function fakesalespayments($salespaymentsFields = [])
    {
        return new salespayments($this->fakesalespaymentsData($salespaymentsFields));
    }

    /**
     * Get fake data of salespayments
     *
     * @param array $postFields
     * @return array
     */
    public function fakesalespaymentsData($salespaymentsFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'paymentNo' => $fake->word,
            'invoiceID' => $fake->randomDigitNotNull,
            'paymentDate' => $fake->word,
            'payType' => $fake->word,
            'bankNo' => $fake->word,
            'bankName' => $fake->word,
            'bankAC' => $fake->word,
            'effectiveDate' => $fake->word,
            'total' => $fake->randomDigitNotNull,
            'customerID' => $fake->randomDigitNotNull,
            'customerName' => $fake->word,
            'customerAddress' => $fake->text,
            'ref' => $fake->word,
            'note' => $fake->text,
            'staffID' => $fake->randomDigitNotNull,
            'staffName' => $fake->word,
            'createdDate' => $fake->word,
            'createdUserID' => $fake->randomDigitNotNull,
            'modifiedDate' => $fake->word,
            'modifiedUserID' => $fake->randomDigitNotNull,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $salespaymentsFields);
    }
}

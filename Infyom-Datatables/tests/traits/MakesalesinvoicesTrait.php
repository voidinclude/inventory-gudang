<?php

use Faker\Factory as Faker;
use App\Models\salesinvoices;
use App\Repositories\salesinvoicesRepository;

trait MakesalesinvoicesTrait
{
    /**
     * Create fake instance of salesinvoices and save it in database
     *
     * @param array $salesinvoicesFields
     * @return salesinvoices
     */
    public function makesalesinvoices($salesinvoicesFields = [])
    {
        /** @var salesinvoicesRepository $salesinvoicesRepo */
        $salesinvoicesRepo = App::make(salesinvoicesRepository::class);
        $theme = $this->fakesalesinvoicesData($salesinvoicesFields);
        return $salesinvoicesRepo->create($theme);
    }

    /**
     * Get fake instance of salesinvoices
     *
     * @param array $salesinvoicesFields
     * @return salesinvoices
     */
    public function fakesalesinvoices($salesinvoicesFields = [])
    {
        return new salesinvoices($this->fakesalesinvoicesData($salesinvoicesFields));
    }

    /**
     * Get fake data of salesinvoices
     *
     * @param array $postFields
     * @return array
     */
    public function fakesalesinvoicesData($salesinvoicesFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'invoiceNo' => $fake->word,
            'invoiceDate' => $fake->word,
            'soID' => $fake->word,
            'status' => $fake->word,
            'paymentType' => $fake->word,
            'expiredDate' => $fake->word,
            'ppn' => $fake->word,
            'total' => $fake->word,
            'discount' => $fake->word,
            'grandtotal' => $fake->word,
            'customerID' => $fake->word,
            'customerName' => $fake->word,
            'customerAddress' => $fake->word,
            'staffID' => $fake->word,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $salesinvoicesFields);
    }
}

<?php

use Faker\Factory as Faker;
use App\Models\SalesPrice;
use App\Repositories\SalesPriceRepository;

trait MakeSalesPriceTrait
{
    /**
     * Create fake instance of SalesPrice and save it in database
     *
     * @param array $salesPriceFields
     * @return SalesPrice
     */
    public function makeSalesPrice($salesPriceFields = [])
    {
        /** @var SalesPriceRepository $salesPriceRepo */
        $salesPriceRepo = App::make(SalesPriceRepository::class);
        $theme = $this->fakeSalesPriceData($salesPriceFields);
        return $salesPriceRepo->create($theme);
    }

    /**
     * Get fake instance of SalesPrice
     *
     * @param array $salesPriceFields
     * @return SalesPrice
     */
    public function fakeSalesPrice($salesPriceFields = [])
    {
        return new SalesPrice($this->fakeSalesPriceData($salesPriceFields));
    }

    /**
     * Get fake data of SalesPrice
     *
     * @param array $postFields
     * @return array
     */
    public function fakeSalesPriceData($salesPriceFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'customerID' => $fake->randomDigitNotNull,
            'productID' => $fake->randomDigitNotNull,
            'productCode' => $fake->word,
            'price' => $fake->word,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $salesPriceFields);
    }
}

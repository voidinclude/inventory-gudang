<?php

use Faker\Factory as Faker;
use App\Models\purchase_price;
use App\Repositories\purchase_priceRepository;

trait Makepurchase_priceTrait
{
    /**
     * Create fake instance of purchase_price and save it in database
     *
     * @param array $purchasePriceFields
     * @return purchase_price
     */
    public function makepurchase_price($purchasePriceFields = [])
    {
        /** @var purchase_priceRepository $purchasePriceRepo */
        $purchasePriceRepo = App::make(purchase_priceRepository::class);
        $theme = $this->fakepurchase_priceData($purchasePriceFields);
        return $purchasePriceRepo->create($theme);
    }

    /**
     * Get fake instance of purchase_price
     *
     * @param array $purchasePriceFields
     * @return purchase_price
     */
    public function fakepurchase_price($purchasePriceFields = [])
    {
        return new purchase_price($this->fakepurchase_priceData($purchasePriceFields));
    }

    /**
     * Get fake data of purchase_price
     *
     * @param array $postFields
     * @return array
     */
    public function fakepurchase_priceData($purchasePriceFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'supplierID' => $fake->randomDigitNotNull,
            'productID' => $fake->randomDigitNotNull,
            'productCode' => $fake->word,
            'price' => $fake->word,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $purchasePriceFields);
    }
}

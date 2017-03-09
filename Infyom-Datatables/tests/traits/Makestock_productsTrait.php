<?php

use Faker\Factory as Faker;
use App\Models\stock_products;
use App\Repositories\stock_productsRepository;

trait Makestock_productsTrait
{
    /**
     * Create fake instance of stock_products and save it in database
     *
     * @param array $stockProductsFields
     * @return stock_products
     */
    public function makestock_products($stockProductsFields = [])
    {
        /** @var stock_productsRepository $stockProductsRepo */
        $stockProductsRepo = App::make(stock_productsRepository::class);
        $theme = $this->fakestock_productsData($stockProductsFields);
        return $stockProductsRepo->create($theme);
    }

    /**
     * Get fake instance of stock_products
     *
     * @param array $stockProductsFields
     * @return stock_products
     */
    public function fakestock_products($stockProductsFields = [])
    {
        return new stock_products($this->fakestock_productsData($stockProductsFields));
    }

    /**
     * Get fake data of stock_products
     *
     * @param array $postFields
     * @return array
     */
    public function fakestock_productsData($stockProductsFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'productID' => $fake->randomDigitNotNull,
            'factoryID' => $fake->randomDigitNotNull,
            'stockIN' => $fake->randomDigitNotNull,
            'stockOut' => $fake->randomDigitNotNull,
            'note' => $fake->text,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $stockProductsFields);
    }
}

<?php

use Faker\Factory as Faker;
use App\Models\salesorderitem;
use App\Repositories\salesorderitemRepository;

trait MakesalesorderitemTrait
{
    /**
     * Create fake instance of salesorderitem and save it in database
     *
     * @param array $salesorderitemFields
     * @return salesorderitem
     */
    public function makesalesorderitem($salesorderitemFields = [])
    {
        /** @var salesorderitemRepository $salesorderitemRepo */
        $salesorderitemRepo = App::make(salesorderitemRepository::class);
        $theme = $this->fakesalesorderitemData($salesorderitemFields);
        return $salesorderitemRepo->create($theme);
    }

    /**
     * Get fake instance of salesorderitem
     *
     * @param array $salesorderitemFields
     * @return salesorderitem
     */
    public function fakesalesorderitem($salesorderitemFields = [])
    {
        return new salesorderitem($this->fakesalesorderitemData($salesorderitemFields));
    }

    /**
     * Get fake data of salesorderitem
     *
     * @param array $postFields
     * @return array
     */
    public function fakesalesorderitemData($salesorderitemFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'soID' => $fake->word,
            'productID' => $fake->randomDigitNotNull,
            'productName' => $fake->word,
            'sku' => $fake->word,
            'price' => $fake->randomDigitNotNull,
            'qty' => $fake->randomDigitNotNull,
            'note' => $fake->text,
            'createdDate' => $fake->word,
            'createdUserID' => $fake->randomDigitNotNull,
            'modifiedDate' => $fake->word,
            'modifiedUserID' => $fake->randomDigitNotNull,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $salesorderitemFields);
    }
}

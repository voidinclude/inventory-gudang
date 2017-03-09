<?php

use Faker\Factory as Faker;
use App\Models\produk;
use App\Repositories\produkRepository;

trait MakeprodukTrait
{
    /**
     * Create fake instance of produk and save it in database
     *
     * @param array $produkFields
     * @return produk
     */
    public function makeproduk($produkFields = [])
    {
        /** @var produkRepository $produkRepo */
        $produkRepo = App::make(produkRepository::class);
        $theme = $this->fakeprodukData($produkFields);
        return $produkRepo->create($theme);
    }

    /**
     * Get fake instance of produk
     *
     * @param array $produkFields
     * @return produk
     */
    public function fakeproduk($produkFields = [])
    {
        return new produk($this->fakeprodukData($produkFields));
    }

    /**
     * Get fake data of produk
     *
     * @param array $postFields
     * @return array
     */
    public function fakeprodukData($produkFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'productCode' => $fake->word,
            'productName' => $fake->word,
            'unit' => $fake->randomDigitNotNull,
            'note' => $fake->text,
            'stock' => $fake->randomDigitNotNull,
            'image' => $fake->text,
            'status' => $fake->randomDigitNotNull,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $produkFields);
    }
}

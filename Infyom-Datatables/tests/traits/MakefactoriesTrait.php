<?php

use Faker\Factory as Faker;
use App\Models\factories;
use App\Repositories\factoriesRepository;

trait MakefactoriesTrait
{
    /**
     * Create fake instance of factories and save it in database
     *
     * @param array $factoriesFields
     * @return factories
     */
    public function makefactories($factoriesFields = [])
    {
        /** @var factoriesRepository $factoriesRepo */
        $factoriesRepo = App::make(factoriesRepository::class);
        $theme = $this->fakefactoriesData($factoriesFields);
        return $factoriesRepo->create($theme);
    }

    /**
     * Get fake instance of factories
     *
     * @param array $factoriesFields
     * @return factories
     */
    public function fakefactories($factoriesFields = [])
    {
        return new factories($this->fakefactoriesData($factoriesFields));
    }

    /**
     * Get fake data of factories
     *
     * @param array $postFields
     * @return array
     */
    public function fakefactoriesData($factoriesFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'factoryCode' => $fake->word,
            'factoryName' => $fake->word,
            'factoryType' => $fake->word,
            'status' => $fake->word,
            'note' => $fake->text,
            'createdDate' => $fake->word,
            'createdUserID' => $fake->randomDigitNotNull,
            'modifiedDate' => $fake->word,
            'modifiedUserID' => $fake->randomDigitNotNull,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $factoriesFields);
    }
}

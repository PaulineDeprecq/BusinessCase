<?php

namespace App\DataFixtures;

use Faker\Factory;
use Faker\Generator as FakerGenerator;
use \Faker\Provider\Fakecar;
use Nelmio\Alice\Loader\NativeLoader;

class BCNativeLoader extends NativeLoader
{
    protected function createFakerGenerator(): FakerGenerator
    {
        $generator = Factory::create('fr_FR');
        $generator->addProvider(new Fakecar($generator));
        return $generator;
    }
}
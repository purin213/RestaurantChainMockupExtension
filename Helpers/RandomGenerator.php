<?php
namespace Helpers;

use Faker\Factory;
use Models\User;
use Models\Employee;
use Models\RestaurantChain;
use Models\RestaurantLocation;

class RandomGenerator {

    public static function user(): User {

        $faker = Factory::create();

        return new User(
            $faker->randomNumber(),
            $faker->firstName(),
            $faker->lastName(),
            $faker->email,
            $faker->password,
            $faker->phoneNumber,
            $faker->address,
            $faker->dateTimeThisCentury,
            $faker->dateTimeBetween('-10 years', '+20 years'),
            $faker->randomElement(['admin', 'user', 'editor'])
        );
    }

    public static function users(int $min, int $max): array {

        $faker = Factory::create();
        $users = [];
        $numOfUsers = $faker->numberBetween($min, $max);
        for ($i = 0; $i < $numOfUsers; $i++) {
            $users[] = self::user();
        }

        return $users;
    }

    public static function employee(): Employee {
        $faker = Factory::create();

        return new Employee(
            $faker->randomNumber(),
            $faker->firstName(),
            $faker->lastName(),
            $faker->email,
            $faker->password,
            $faker->phoneNumber,
            $faker->address,
            $faker->dateTimeThisCentury,
            $faker->dateTimeBetween('-10 years', '+20 years'),
            $faker->randomElement(['admin', 'user', 'editor']),
            $faker->jobTitle(),
            $faker->numberBetween(1000, 5000),
            $faker->dateTimeThisCentury,
            [$faker->randomElement(['employee of the month', 'best customer service'])],
        );
    }

    public static function employees(int $min, int $max): array {

        $faker = Factory::create();
        $employees = [];
        $randNum = $faker->numberBetween($min, $max);
        for ($i = 0; $i < $randNum; $i++) {
            $employees[] = self::employee();
        }

        return $employees;
    }

    public static function restaurantLocation(): RestaurantLocation {

        $faker = Factory::create();
        $fullAddress = [
            "streetAddress" => $faker->streetAddress(),
            "city" => $faker->city(),
            "state" => $faker->state(),
            "postcode" => $faker->postcode()
        ];

        return new RestaurantLocation(
            $faker->company(),
            implode(", ", $fullAddress),
            $fullAddress["city"],
            $fullAddress["state"],
            $fullAddress["postcode"],
            self::employees(3, 50),
            true,
            rand(0,1) == 1,
        );
    }

    public static function restaurantLocations(): array {

        $faker = Factory::create();
        $restaurantLocations = [];
        $randNum = $faker->numberBetween(3, 12);

        for ($i = 0; $i < $randNum; $i++) {
            $restaurantLocations[] = self::restaurantLocation();
        }

        return $restaurantLocations;
    }

    public static function restaurantChain(): RestaurantChain {

        $faker = Factory::create();
        $restaurantLocation = self::restaurantLocations();

        $totalEmployeeCount = 0;
        foreach ($restaurantLocation as $restaurantLocationI){
            $totalEmployeeCount += count($restaurantLocationI->getClassVariable("employees"));
        }

        return new RestaurantChain(
            $faker->company(),
            $faker->numberBetween(1850, 2025),
            $faker->catchPhrase(),
            $faker->domainName(),
            $faker->phoneNumber(),
            $faker->bs(),
            $faker->name(),
            rand(0,1) == 1,
            $faker->country(),
            $faker->name(),
            $totalEmployeeCount,
            $faker->numberBetween(1000, 5000),
            $restaurantLocation,
            $faker->randomElement(['fast food', 'italian', 'mexican', 'bolivian']),
            count($restaurantLocation),
            $faker->company(),
        );
    }

    public static function restaurantChains(): array {

        $faker = Factory::create();
        $restaurantChains = [];
        $randNum = $faker->numberBetween(5, 20);
        for ($i = 0; $i < $randNum; $i++) {
            $restaurantChains[] = self::restaurantChain();
        }

        return $restaurantChains;
    }
}?>

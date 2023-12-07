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

    public static function employee(int $salary): Employee {
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
            $salary,
            $faker->dateTimeThisCentury,
            [$faker->randomElement(['employee of the month', 'best customer service'])],
        );
    }

    public static function employees(int $employeeCount, int $salaryMin, int $salaryMax): array {

        $faker = Factory::create();
        $employees = [];
        for ($i = 0; $i < $employeeCount; $i++) {
            $employees[] = self::employee($faker->numberBetween($salaryMin, $salaryMax));
        }

        return $employees;
    }

    public static function restaurantLocation(
        int $employeeCount, int $salaryMin, int $salaryMax, int $postCode
        ): RestaurantLocation {

        $faker = Factory::create();
        $fullAddress = [
            "streetAddress" => $faker->streetAddress(),
            "city" => $faker->city(),
            "state" => $faker->state(),
            "postcode" => $postCode
        ];

        return new RestaurantLocation(
            $faker->company(),
            implode(", ", $fullAddress),
            $fullAddress["city"],
            $fullAddress["state"],
            $fullAddress["postcode"],
            self::employees($employeeCount, $salaryMin, $salaryMax),
            true,
            rand(0,1) == 1,
        );
    }

    public static function restaurantLocations(
        int $numberOfEmployees, int $salaryMin, int $salaryMax,
        int $numberOfLocations, int $postcodeMin, int $postcodeMax
    ): array {

        $randomPostcode = Factory::create()->numberBetween($postcodeMin, $postcodeMax);
        $employeePerLocation = $numberOfEmployees / $numberOfLocations;
        $restaurantLocations = [];

        for ($i = 0; $i < $numberOfLocations; $i++) {
            $restaurantLocations[] = self::restaurantLocation($employeePerLocation, $salaryMin, $salaryMax, $randomPostcode);
        }

        return $restaurantLocations;
    }

    public static function restaurantChain(
        int $numberOfEmployees, int $salaryMin, int $salaryMax,
        int $numberOfLocations, int $postcodeMin, int $postcodeMax
    ): RestaurantChain {

        $restaurantLocations = self::restaurantLocations($numberOfEmployees, $salaryMin, $salaryMax, $numberOfLocations, $postcodeMin, $postcodeMax);
        $faker = Factory::create();

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
            $numberOfEmployees,
            $faker->numberBetween(1000, 5000),
            $restaurantLocations,
            $faker->randomElement(['fast food', 'italian', 'mexican', 'bolivian']),
            $numberOfLocations,
            $faker->company(),
        );
    }

    public static function restaurantChains(
        int $numberOfEmployees, int $salaryMin, int $salaryMax,
        int $numberOfLocations, int $postcodeMin, int $postcodeMax
    ): array {

        $faker = Factory::create();
        $restaurantChains = [];
        $randNum = $faker->numberBetween(5, 20);
        for ($i = 0; $i < $randNum; $i++) {
            $restaurantChains[] = self::restaurantChain($numberOfEmployees, $salaryMin, $salaryMax, $numberOfLocations, $postcodeMin, $postcodeMax);
        }

        return $restaurantChains;
    }
}?>

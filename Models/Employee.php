<?php
namespace Models;

use DateTime;

class Employee extends User {

    private string $jobTitle;
    private float $salary;
    private DateTime $startDate;
    private array $awards;

    public function __construct(
            int $id, string $firstName, string $lastName, string $email, string $password,
            string $phoneNumber, string $address, DateTime $birthDate,
            DateTime $membershipExpirationDate, string $role,
            string $jobTitle, float $salary, DateTime $startDate, array $awards
        ){
        parent::__construct($id, $firstName, $lastName, $email, $password, $phoneNumber,
             $address, $birthDate, $membershipExpirationDate, $role
        );
        $this->jobTitle = $jobTitle;
        $this->salary = $salary;
        $this->startDate = $startDate;
        $this->awards = $awards;
    }

    public function toHTML(): string
    {
        return sprintf("
            <tr>
                <th scope='row'>%s</th>
                <td>%s</td>
                <td>%s %s</td>
                <td>%s</td>
            </tr>",
            $this->id,
            $this->jobTitle,
            $this->firstName,
            $this->lastName,
            $this->startDate->format('Y-m-d H:i:s'),
        );
    }
    /*

    public function toString(): string{
        return sprintf(
            "ID: %s, Title: %s, Name: %s %s, Join Date: %s",
            $this->id, $this->jobTitle, $this->firstName, $this->lastName, $this->startDate
        );
    }
    public function toArray(): array{
        return [
            'id' => $this->id,
            'firstName' => $this->firstName,
            'lastName' => $this->lastName,
            'email' => $this->email,
            'hashedPassword' => $this->hashedPassword,
            'phoneNumber' => $this->phoneNumber,
            'address' => $this->address,
            'birthDate' => $this->birthDate->format('Y-m-d'),
            'role' => $this->role
        ];
    }
    */
}

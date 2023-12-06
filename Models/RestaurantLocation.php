<?php

namespace Models;

use Interfaces\FileConvertible;
use Traits\GetterTrait;

class RestaurantLocation implements FileConvertible
{
    use GetterTrait;

    protected string $name;
    protected string $address;
    protected string $city;
    protected string $state;
    protected string $zipCode;
    protected array $employees;
    protected bool $isOpen;
    protected bool $hasDriveThru;

    public function __construct(string $name, string $address,
        string $city, string $state, string $zipCode, array $employees,
        bool $isOpen, bool $hasDriveThru
    ){
            $this->name = $name;
            $this->address = $address;
            $this->city = $city;
            $this->state = $state;
            $this->zipCode = $zipCode;
            $this->employees = $employees;
            $this->isOpen = $isOpen;
            $this->hasDriveThru = $hasDriveThru;
    }

    public function toHTML(): string
    {
        $employeeList = "";
        foreach($this->employees as $employee){
                $employeeList .= $employee->toHTML();
        }

        return sprintf("
            <div class='accordion mx-4' id='accordionPanelsStayOpenExample'>
                <div class='accordion-item'>
                    <h2 class='accordion-header'>
                        <button class='accordion-button collapsed' type='button' data-bs-toggle='collapse' data-bs-target='#panelsStayOpen-%s' aria-expanded='false' aria-controls='panelsStayOpen-%s'>
                            %s
                        </button>
                    </h2>
                    <div id='panelsStayOpen-%s' class='accordion-collapse collapse'>
                        <div class='accordion-body'>
                            <h2>Employees</h2>
                            <table class='table'>
                                <thead>
                                    <tr>
                                        <th scope='col'>ID</th>
                                        <th scope='col'>Title</th>
                                        <th scope='col'>Name</th>
                                        <th scope='col'>Join Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    %s
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            ",
            $this->zipCode,
            $this->zipCode,
            $this->name,
            $this->zipCode,
            $employeeList
        );
    }

    public function toString(): string
    {
        return sprintf(
            "Name: %s\nAddress: %s\nCity: %s\nState: %s\nZip Code: %s\nEmployees: %s\nIs Open: %s\nHas Drive through: %s\n",
            $this->name,
            $this->address,
            $this->city,
            $this->state,
            $this->zipCode,
            $this->employees,
            $this->isOpen,
            $this->hasDriveThru,
        );
    }

    public function toMarkdown(): string
    {
        $stringedEmployees = implode(' ', $this->employees);
        return "## Name: {$this->name}
                 - Address: {$this->address}
                 - City: {$this->city}
                 - State: {$this->state}
                 - Zip Code: {$this->zipCode}
                 - Employees: {$stringedEmployees}
                 - Is Open: {$this->isOpen}
                 - Has Drive Through: {$this->hasDriveThru}
                 ";
    }

    public function toArray(): array
    {
        return [
            "Name" => $this->name,
            "Address" => $this->address,
            "City" => $this->city,
            "State" => $this->state,
            "Zip Code" => $this->zipCode,
            "Employees" => $this->employees,
            "Is Open" => $this->isOpen,
            "Has Drive Through" => $this->hasDriveThru,
        ];
    }
}

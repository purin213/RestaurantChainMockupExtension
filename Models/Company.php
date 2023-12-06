<?php

namespace Models;

use Interfaces\FileConvertible;
use Traits\GetterTrait;

class Company implements FileConvertible
{
    use GetterTrait;

    private string $name;
    private int $foundingYear;
    private string $description;
    private string $website;
    private string $phone;
    private string $industry;
    private string $ceo;
    private bool $isPublicalyTraded;
    private string $country;
    private string $founder;
    private int $totalEmployees;

    public function __construct(string $name, int $foundingYear, string $description, string $website, string $phone, string $industry, string $ceo, bool $isPublicalyTraded, string $country, string $founder, int $totalEmployees)
    {
        $this->name = $name;
        $this->foundingYear = $foundingYear;
        $this->description = $description;
        $this->website = $website;
        $this->phone = $phone;
        $this->industry = $industry;
        $this->ceo = $ceo;
        $this->isPublicalyTraded = $isPublicalyTraded;
        $this->country = $country;
        $this->founder = $founder;
        $this->totalEmployees = $totalEmployees;
    }
    public function toString(): string
    {
        return sprintf(
            "Name: %s\nFounding Year: %s\nDescription: %s\nWebsite: %s\nPhone: %s\nIndustry: %s\nCeo: %s\nIs Publicaly Traded: %s\nCountry: %s\nFounder: %s\nTotal Employees: %s\n",
            $this->name,
            $this->foundingYear,
            $this->description,
            $this->website,
            $this->phone,
            $this->industry,
            $this->ceo,
            $this->isPublicalyTraded,
            $this->country,
            $this->founder,
            $this->totalEmployees
        );
    }

    public function toHTML(): string
    {
        return sprintf("
            <div class='company-card'>
                <div class='avatar'>SAMPLE</div>
                <h2>%s , since %s</h2>
                <p>%s</p>
                <p>%s</p>
                <p>%s</p>
                <p>%s</p>
                <p>%s</p>
                <p>%s</p>
                <p>%s</p>
                <p>%s</p>
                <p>%s</p>
                <p>%s</p>
                <p>%s</p>
            </div>",
            $this->name,
            $this->foundingYear,
            $this->description,
            $this->website,
            $this->phone,
            $this->industry,
            $this->ceo,
            $this->isPublicalyTraded,
            $this->country,
            $this->founder,
            $this->totalEmployees
        );
    }

    public function toMarkdown(): string
    {
        return "## User: {$this->name}
                 - Founding Year: {$this->foundingYear}
                 - Description: {$this->description}
                 - Website: {$this->website}
                 - Phone: {$this->phone}
                 - Industry: {$this->industry}
                 - Ceo: {$this->ceo}
                 - Is publicaly traded: {$this->isPublicalyTraded}
                 - Country: {$this->country}
                 - Founder: {$this->founder}
                 - Total Employees: {$this->totalEmployees}";
    }

    public function toArray(): array
    {
        return [
            'name' => $this->name,
            'foundingYear' => $this->foundingYear,
            'description' => $this->description,
            'website' => $this->website,
            'phone' => $this->phone,
            'industry' => $this->industry,
            'ceo' => $this->ceo,
            'isPublicalyTraded' => $this->isPublicalyTraded,
            'country' => $this->country,
            'founder' => $this->founder,
            'totalEmployees' => $this->totalEmployees
        ];
    }
}

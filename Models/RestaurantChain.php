<?php
namespace Models;

class RestaurantChain extends Company
{
    private int $chainId;
    private array $restaurantLocation;
    private string $cuisineType;
    private int $numberOfLocations;
    private string $parentCompany;

    public function __construct(string $name, int $foundingYear, string $description,
        string $website, string $phone, string $industry, string $ceo,
        bool $isPublicalyTraded, string $country, string $founder, int $totalEmployees,
        int $chainId, array $restaurantLocation, string $cuisineType,
        int $numberOfLocations, string $parentCompany
        ){
        parent::__construct($name, $foundingYear, $description, $website,
             $phone, $industry, $ceo, $isPublicalyTraded,
            $country, $founder, $totalEmployees
        );
        $this->chainId = $chainId;
        $this->restaurantLocation = $restaurantLocation;
        $this->cuisineType = $cuisineType;
        $this->numberOfLocations = $numberOfLocations;
        $this->parentCompany = $parentCompany;
    }
    public function toHTML(): string
    {
        $locationList = "";
        foreach($this->restaurantLocation as $restaurantLocation){
            $locationList .= $restaurantLocation->toHTML();
        }

        return sprintf("
            <div class='d-flex justify-content-center p-2 m-2'>
                <h1>%s</h1>
            </div>
            %s
        ",
            $this->parentCompany,
            $locationList
        );
    }

    public function toString(): string
    {
        $locationList = "";
        foreach($this->restaurantLocation as $restaurantLocation){
            $locationList .= $restaurantLocation->toHTML();
        }
        return sprintf(
            "CompanyName: %s, Locations: %s",
            $this->parentCompany,
            $locationList
        );
    }

}

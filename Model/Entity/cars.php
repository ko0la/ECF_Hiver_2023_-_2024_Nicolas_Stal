<?php

class Cars {
    private int $id;
    private string $carName;
    private int $mileage;
    private float $price;
    private int $firstCirculation;
    private string $photoNames;

    public function __construct(int $id, string $carName, int $mileage,$price,  int $firstCirculation, string $photoNames) {
        $this->id = $id;
        $this->carName = $carName;
        $this->mileage = $mileage;
        $this->price = $price;
        $this->firstCirculation = $firstCirculation;
        $this->photoNames = $photoNames;
        
}}
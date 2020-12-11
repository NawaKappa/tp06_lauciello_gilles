<?php

class Product implements JsonSerializable
{
    protected $id;
    protected $productName;
    protected $description;
    protected $img;
    protected $price;

    public function __get($property) {
        if (property_exists($this, $property)) {
          return $this->$property;
        }
      }
    
      public function __set($property, $value) {
        if (property_exists($this, $property)) {
          $this->$property = $value;
        }
    }


    public function jsonSerialize()
    {
        return array(
            'id' => $this->id,
            'productName'=> $this->productName,
            'description' => $this->description,
            'img' => $this->img,
            'price' => $this->price,
        );
    }
}
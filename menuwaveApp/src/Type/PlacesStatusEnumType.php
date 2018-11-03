<?php
namespace App\Type;

class PlacesStatusEnumType extends EnumType
{
    protected $name = 'placesStatus';
    protected $values = array('Not Verified', 'Verified', 'Closed');
}
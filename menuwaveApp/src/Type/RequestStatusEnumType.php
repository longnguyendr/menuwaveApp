<?php
namespace App\Type;

class RequestStatusEnumType extends EnumType
{
    protected $name = 'requestStatus';
    protected $values = array('Open', 'Closed');
}

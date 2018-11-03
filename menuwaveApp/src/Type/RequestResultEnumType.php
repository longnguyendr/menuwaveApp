<?php
namespace App\Type;

class RequestResultEnumType extends EnumType
{
    protected $name = 'requestResult';
    protected $values = array('Accepted', 'Rejected');
}

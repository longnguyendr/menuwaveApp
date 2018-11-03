<?php
namespace App\Type;

class RequestEnumType extends EnumType
{
    protected $name = 'requestenum';
    protected $values = array('User Report Place Closed', 'User Deleted Account', 'User Request Verify Place', 'User Delete Place');
}

<?php
namespace App\Type;

class VoteEnumType extends EnumType
{
    protected $name = 'voteenum';
    protected $values = array('Up', 'Down');
}

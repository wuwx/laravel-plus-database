<?php

namespace Wuwx\LaravelPlusDatabase;

use Illuminate\Database\Query\Grammars\MySqlGrammar;

class MySql57Grammar extends MySqlGrammar
{
    protected function wrapJsonSelector($value)
    {
        $path = explode('->', $value);
        $field = $this->wrapValue(array_shift($path));
        return sprintf('%s->>\'$.%s\'', $field, collect($path)->map(function ($part) {
            return '"'.$part.'"';
        })->implode('.'));
    }
}

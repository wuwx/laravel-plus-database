<?php

namespace Wuwx\LaravelPlusDatabase;

use Illuminate\Database\MySqlConnection;

class MySql57Connection extends MySqlConnection
{
    protected function getDefaultQueryGrammar()
    {
        return $this->withTablePrefix(new MySql57Grammar);
    }
}

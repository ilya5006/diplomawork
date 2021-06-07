<?php

function getMysqli(string $host, string $username, string $password, string $name)
{
    return new mysqli($host, $username, $password, $name);
}

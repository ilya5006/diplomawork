<?php

function getMysqli($host, $username, $password, $name)
{
    return new mysqli($host, $username, $password, $name);
}
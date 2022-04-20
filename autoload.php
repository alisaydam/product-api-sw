<?php

spl_autoload_register(function ($className) {
    include dirname(__FILE__) . "/" . str_replace("\\", DIRECTORY_SEPARATOR, $className) . ".php";
});

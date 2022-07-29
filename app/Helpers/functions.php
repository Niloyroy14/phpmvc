<?php

function view(string $path):void{
    require_once VIEWS . '/' . $path;
}
<?php

class Dashboard_model
{
    private object $db;

    public function __construct()
    {
        $this->db = new Database;
    }

}
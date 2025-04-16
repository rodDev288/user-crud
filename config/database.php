<?php

class database {
    public static function connect() {
        return new PDO("mysql:host=localhost;dbname=user_crud", "root", "");
    }
}
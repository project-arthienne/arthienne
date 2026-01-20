<?php

class Validator
{
    public static function name(string $value): bool
    {
        return preg_match('/^[A-Za-z\s]{2,}$/', $value);
    }

    public static function email(string $value): bool
    {
        return filter_var($value, FILTER_VALIDATE_EMAIL);
    }

    public static function phone(string $value): bool
    {
        return preg_match('/^[0-9]{7,15}$/', $value);
    }

    public static function password(string $value): bool
    {
        return strlen($value) >= 8;
    }

    public static function required(array $fields): bool
    {
        foreach ($fields as $field) {
            if (!isset($field) || trim($field) === '') {
                return false;
            }
        }
        return true;
    }
}

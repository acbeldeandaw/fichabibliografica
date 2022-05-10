<?php

class Message
{

    public static function addSuccessMessage($message)
    {
        $_SESSION['messages'][] = "alertify.success('$message');";
    }

    public static function addErrorMessage($message)
    {
        $_SESSION['messages'][] = "alertify.error('$message');";
    }

    public static function showMessages()
    {
        if (isset($_SESSION['messages'])) {
            foreach ($_SESSION['messages'] as $message) {
                print $message;
            }
            unset($_SESSION['messages']);
        }
    }

    public static function isEmpty()
    {
        if (isset($_SESSION['messages'])) {
            return false;
        } else {
            return true;
        }
    }
}

<?php

class Session
{
    static public function start($id)
    {
        $_SESSION['session_userId'] = $id;
    }

    static public function exists()
    {
        return isset($_SESSION['session_userId']);
    }

    static public function getSessionUserId()
    {
        if (isset($_SESSION['session_userId'])) {
            return $_SESSION['session_userId'];
        } else {
            return false;
        }
    }

    static public function close()
    {
        unset($_SESSION['session_userId']);
    }
}

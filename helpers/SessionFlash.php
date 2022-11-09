<?php

class SessionFlash
{
    public static function set(string $msg): void
    {
        $_SESSION['msg'] = $msg;
    }
    public static function get():string
    {   
        $msg = $_SESSION['msg'];
        self::delete();
        return $msg;
    }
    public static function delete():void
    {
        unset($_SESSION['msg']);
    }
    public static function exist():bool
    {
        return isset($_SESSION['msg']);
    }
}

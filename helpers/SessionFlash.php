<?php

class SessionFlash
{
    public static function set(bool $color,string $msg): void
    {
        $_SESSION['color'] = $color;
        $_SESSION['msg'] = $msg;
    }
    public static function get():array
    {   
        $msg = [$_SESSION['color'],$_SESSION['msg']];
        self::delete();
        return $msg;
    }
    public static function delete():void
    {
        unset($_SESSION['msg']);
        unset($_SESSION['color']);
    }
    public static function exist():bool
    {
        return isset($_SESSION['msg']);
    }
}

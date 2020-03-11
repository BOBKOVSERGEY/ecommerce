<?php


namespace App\Classes;


class Request
{

    /**
     * return all request that we are interested in
     * @param bool $is_array
     * @return mixed
     */
    public static function all($is_array = false)
    {
        $result = [];

        if (count($_GET) > 0) $result['get'] = $_GET;
        if (count($_POST) > 0) $result['post'] = $_POST;

        $result['file'] = $_FILES;

        return json_decode(json_encode($result), $is_array);
    }

    /**
     * get specific request type
     * @param $key
     * @return mixed
     */
    public static function get($key)
    {
        $data = static::all();

        return $data->$key;

    }

    /**
     * check request availability
     * @param $key
     * @return bool
     */
    public static function has($key)
    {
        return (array_key_exists($key, static::all(true))) ? true : false;
    }

    /**
     * get request data
     * @param $key
     * @param $value
     * @return string
     */
    public static function old($key, $value)
    {
        $data = static::all();

       return isset($data->$key->$value) ? $data->$key->$value : '';
    }

    /**
     * refresh request
     */
    public static function refresh()
    {
        $_POST = [];
        $_GET = [];
        $_FILES = [];
    }
}
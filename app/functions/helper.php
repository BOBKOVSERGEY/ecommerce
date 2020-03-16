<?php
use Philo\Blade\Blade;
use Illuminate\Database\Capsule\Manager as Capsule;


function view($path, array $data = [])
{
    $view = __DIR__ . '/../../resources/views';
    $cache = __DIR__ . '/../../bootstrap/cache';
    $blade = new Blade($view, $cache);

    echo $blade->view()->make($path, $data)->render();
}

function make($filename, $data)
{
    extract($data);

    ob_start();

    //include template
    include __DIR__ . '/../../resources/views/emails/' . $filename . '.php';

    $content = ob_get_contents();

    ob_end_clean();

    return $content;
}

function debug($array, $die = false)
{
    echo '<pre style="font-size: 17px; color: green; ">';
    print_r($array);
    echo '</pre>';

    if ($die) die;
}

function debugVarDump($array)
{
    echo '<pre>';
    var_dump($array);
    echo '</pre>';
}

function slug($value){
    //remove all characters not in this list: underscore | letters | numbers | whitespace
    $value = preg_replace('![^'.preg_quote('_').'\pL\pN\s]+!u', '', mb_strtolower($value));
    //replace underscore and whitespace with a dash -
    $value = preg_replace('!['.preg_quote('-').'\s]+!u', '-', $value);
    //remove whitespace
    return trim($value, '-');
}

function translit($str) {
    $rus = ['А', 'Б', 'В', 'Г', 'Д', 'Е', 'Ё', 'Ж', 'З', 'И', 'Й', 'К', 'Л', 'М', 'Н', 'О', 'П', 'Р', 'С', 'Т', 'У', 'Ф', 'Х', 'Ц', 'Ч', 'Ш', 'Щ', 'Ъ', 'Ы', 'Ь', 'Э', 'Ю', 'Я', 'а', 'б', 'в', 'г', 'д', 'е', 'ё', 'ж', 'з', 'и', 'й', 'к', 'л', 'м', 'н', 'о', 'п', 'р', 'с', 'т', 'у', 'ф', 'х', 'ц', 'ч', 'ш', 'щ', 'ъ', 'ы', 'ь', 'э', 'ю', 'я'];
    $lat = ['A', 'B', 'V', 'G', 'D', 'E', 'E', 'Gh', 'Z', 'I', 'Y', 'K', 'L', 'M', 'N', 'O', 'P', 'R', 'S', 'T', 'U', 'F', 'H', 'C', 'Ch', 'Sh', 'Sch', 'Y', 'Y', 'Y', 'E', 'Yu', 'Ya', 'a', 'b', 'v', 'g', 'd', 'e', 'e', 'gh', 'z', 'i', 'y', 'k', 'l', 'm', 'n', 'o', 'p', 'r', 's', 't', 'u', 'f', 'h', 'c', 'ch', 'sh', 'sch', 'y', 'y', 'y', 'e', 'yu', 'ya'];
    return str_replace($rus, $lat, $str);
}

function paginate($num_of_records, $total_record, $table_name, $object)
{
    $pages = new \voku\helper\Paginator($num_of_records, 'p');
    $pages->set_total($total_record);

    $data = Capsule::select("SELECT * FROM $table_name ORDER BY created_at DESC " . $pages->get_limit());

    $categories  = $object->transform($data);

    return [$categories, $pages->page_links()];
}
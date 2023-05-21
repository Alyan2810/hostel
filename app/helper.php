<?php
// Important Functions
// echo "Hello Helper";

if(!function_exists('p'))
{
    function p($data)
    {
         echo"<pre>";
        print_r($data);
         echo "</pre>";
    }
}
if(!function_exists('get_formated_date'))
{
    function get_formated_date($date , $formate)
    {
         $formatted_date = date($formate , strtotime($date));
         return  $formatted_date;
    }
}
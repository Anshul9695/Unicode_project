<?php
function array_function()
{
    // //break the array in second array or seperet the value in another array 
    // $cars = array("Volvo", "BMW", "Toyota", "Honda", "Mercedes", "Opel");
    // echo "<pre/>";
    // print_r(array_chunk($cars, 3));
    // echo "<hr/>";

    // //array_column for gettting the perticular column value from hol array set 
    // $a = array(
    //     array(
    //         'id' => 5698,
    //         'first_name' => 'Peter',
    //         'last_name' => 'Griffin master',
    //     ),
    //     array(
    //         'id' => 5698,
    //         'first_name' => 'Peter',
    //         'last_name' => ' master',
    //     )
    // );

    // $last_names = array_column($a, 'last_name');
    // print_r($last_names);

    // echo "<hr/>";
    // // combine the array in one array 
    // $fname = array("Peter", "Ben", "Joe");
    // $age = array("35", "37", "43");
    // $c = array_combine($fname, $age);
    // print_r($c);
    // echo "<hr />";
    // //for count the value of array that how many time of value repeted in the array
    // $a = array("A", "Cat", "Dog", "A", "Dog");
    // print_r(array_count_values($a));

    // echo "<hr/>";
    // // ARRAY DIFF  -->Compare the values of two arrays, and return the differences:
    // $a1 = array("a" => "red", "b" => "green", "c" => "blue", "d" => "yellow");
    // $a2 = array("e" => "red", "f" => "green", "g" => "blue");

    // $result = array_diff($a1, $a2);
    // print_r($result);


    // echo "<hr/>";
    // // array_diff_assoc  -->Compare the keys and values of two arrays, and return the differences:
    // $a1 = array("a" => "red", "b" => "green", "c" => "blue", "d" => "yellow");
    // $a2 = array("a" => "red", "d" => "green", "c" => "blue");

    // $result = array_diff_assoc($a1, $a2);
    // print_r($result);

    $foods = array(
        array(
            'name'  => 'Banana',
            'color' => 'Yellow',
        ),
        array(
            'name'  => 'Apple',
            'color' => 'Red',
        ),
        array(
            'name'  => 'Lettuce',
            'color' => 'Green',
        ),
        array(
            'name'  => 'Apple',
            'color' => 'Red',
        ),
    );
    $food_names = wp_list_pluck( $foods, 'name');
    print_r($food_names);
    echo "<br/>";
    $food_name = wp_list_pluck( $foods, 'name','color');
    print_r($food_name);
    

echo "<br/><br/>";

    $posts = [
        12 => array(),
        23 => array(),
        24 => array(),
        35 => array('hello','ram'), 
        47 => array(),
        58 => array(1,2,3,4),
        69 => array()
      ]; // Entire query
      
      $desired_posts = wp_array_slice_assoc($posts, [35, 58]);
      var_dump($desired_posts);
      echo "<br/><br/>";

      $str1 = 'a,b,c,d,e,f';
var_dump(wp_parse_list($str1));


echo "<br/><br/>";

}

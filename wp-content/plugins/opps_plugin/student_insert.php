<?php

function student_insert()
{
    //echo "insert page";
    ?>
<table>
    <thead>
    <tr>
        <th></th>
        <th></th>
    </tr>
    </thead>
    <tbody>
    <form name="frm" action="#" method="post">
    <tr>
        <td>Name:</td>
        <td><input type="text" name="name"></td>
    </tr>
    <tr>
        <td>Email</td>
        <td><input type="text" name="email"></td>
    </tr>
    <tr>
        <td>phone</td>
        <td><input type="text" name="phone"></td>
    </tr>
    <tr>
        <td>Address</td>
        <td><input type="text" name="address"></td>
    </tr>
    <tr>
        <td></td>
        <td><input type="submit" value="Insert" name="submit"></td>
    </tr>
    </form>
    </tbody>
</table>
<?php
if(isset($_POST['submit']))
{

    // gettting form data 
   $name=$_POST['name'];
   $email=$_POST['email'];
   $phone=$_POST['phone'];
   $address=$_POST['address'];

     global $wpdb;
     global $table_prifix;
     $table=$table_prifix.'student_record';

       $wpdb->insert( $table,array(
              'name'=>$name,
              'email'=>$email,
              'phone'=>$phone,
              'address'=>$address
           )
       );
       $wpdb->query();
       echo "data inserted successfully";    
}
}
?>
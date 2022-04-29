<?php

require_once(ABSPATH . 'wp-admin/includes/class-wp-list-table.php');

class OWTTableList extends WP_List_Table
{
    public function prepare_items()
    {
        /*
 * getting the orderby from here..
 *
 */
        $orderby = isset($_GET['orderby']) ? trim($_GET['orderby']) : "";
        /*
 * gettting the order like asc or desc
 *
 */
        $order = isset($_GET['order']) ? trim($_GET['order']) : "";
        /*
 * //for search the value 
 *
 */
        $search_term = isset($_POST['s']) ? trim($_POST['s']) : "";

        /*
 * this is  for pagination 
 *
 */
        $datas = $this->my_custome_wp_table_list_data($orderby, $order, $search_term);
        $per_page = 5;
        $current_page = $this->get_pagenum();
        $total_items = count($datas);
        $this->set_pagination_args(array(
            "total_items" => $total_items,
            "per_page" => $per_page
        ));
        $this->items = array_slice($datas, (($current_page - 1) * $per_page), $per_page);


        $columns = $this->get_columns();

        /*
 *  //IF YOU WANT TO HIDE ANY COLUMN THEN USE HIDDEN    and pass the value in the _column_herader
 *
 */
        $hidden = $this->get_hidden_columns();

        /*
 *   //FOR SHORTING THE COLUMN 
 *   //for shorting the colunm and pass value inside the _column_header 
 *
 */
        $sortable = $this->get_sortable_columns();
        $this->_column_headers = array($columns, $hidden, $sortable);
    }
    /*
 *  
 *  //for hide the coulumn 
 *
 */

    public function get_hidden_columns()
    {
        // return array('address');   //open for show the effect
    }
    /*
 *  
 *  //FOR SHORTING THE COLUMN 
 *
 */

    public function get_sortable_columns()
    {
        return array(
            "name" => array("name", true),
            //"email" => array("email", false)
        );
    }

    public function my_custome_wp_table_list_data($orderby = '', $order = '', $search_term = '')
    {
        // THIS IS THE STATIC DATA TO SHOW IN TABLE AND SHOETING ALSO 
        // if ($orderby == "name" && $order == "asc") {
        //     $data = array(
        //         array('id' => 1, 'name' => 'ram', 'email' => 'sita@gmail.com', 'address' => 'chitrakoot uttar pradesh'),
        //         array('id' => 2, 'name' => 'geeta', 'email' => 'sita@gmail.com', 'address' => 'chitrakoot uttar pradesh'),
        //         array('id' => 3, 'name' => 'seeta', 'email' => 'sita@gmail.com', 'address' => 'chitrakoot uttar pradesh'),
        //         array('id' => 4, 'name' => 'rahul', 'email' => 'sita@gmail.com', 'address' => 'chitrakoot uttar pradesh')
        //     );


        // } elseif($orderby == "name" && $order == "desc") {
        //     $data = array(
        //         array('id' => 1, 'name' => 'rahul', 'email' => 'sita@gmail.com', 'address' => 'chitrakoot uttar pradesh'),
        //         array('id' => 2, 'name' => 'seeta', 'email' => 'sita@gmail.com', 'address' => 'chitrakoot uttar pradesh'),
        //         array('id' => 3, 'name' => 'geeta', 'email' => 'sita@gmail.com', 'address' => 'chitrakoot uttar pradesh'),
        //         array('id' => 4, 'name' => 'ram', 'email' => 'sita@gmail.com', 'address' => 'chitrakoot uttar pradesh')
        //     );

        // }else{
        //     $data = array(
        //         array('id' => 1, 'name' => 'ram', 'email' => 'sita@gmail.com', 'address' => 'chitrakoot uttar pradesh'),
        //         array('id' => 2, 'name' => 'geeta', 'email' => 'sita@gmail.com', 'address' => 'chitrakoot uttar pradesh'),
        //         array('id' => 3, 'name' => 'seeta', 'email' => 'sita@gmail.com', 'address' => 'chitrakoot uttar pradesh'),
        //         array('id' => 4, 'name' => 'rahul', 'email' => 'sita@gmail.com', 'address' => 'chitrakoot uttar pradesh')
        //     );  

        // }
        // return $data;


        //GETTTING DATA FROM DATA BASE AND DISPLAY WITH THE SHORTING 

        global $wpdb;
        $table = 'student_record';
        if (!empty($search_term)) {
            /*
 *   //FOR SHORTING THE COLUMN 
 *   //for shorting the colunm and pass value inside the _column_header 
 *
 */
            $allformdata = $wpdb->get_results(
                "SELECT * from $table WHERE  (name LIKE '%$search_term%' OR email LIKE '%$search_term%' OR phone LIKE '%$search_term%' OR address LIKE '%$search_term%')"
            );
        } else {
            /*
 *  
 *  //FOR SHORTING THE COLUMN 
 *
 */
            if ($orderby == "name" && $order == "desc") {
                $allformdata = $wpdb->get_results("SELECT * FROM $table ORDER BY name DESC");
            } else {
                /*
 *  
 * 
*geting all data without any conditon 
 *
 */
                $allformdata = $wpdb->get_results("SELECT * FROM $table");
            }
        }

        $formdataArray = array();
        if (count($allformdata) > 0) {
            foreach ($allformdata as $index => $data) {
                $formdataArray[] = array(
                    "id" => $data->id,
                    "name" => $data->name,
                    "email" => $data->email,
                    "phone" => $data->phone,
                    "address" => $data->address
                );
            }
        }
        return $formdataArray;
    }
    public function get_columns()
    {
        /*
 *  
 *   //giving the column name here... to show in the table 
 *
 */
        $columns = array(
            "id" => "ID",
            "name" => "NAME",
            "email" => "EMAIL",
            "phone" => "PHONE",
            "address" => "ADDRESS"
        );
        return $columns;
    }
    public function column_default($item, $column_name)
    {
        switch ($column_name) {
            case 'id':
            case 'name':
            case 'email':
            case 'phone':
            case 'address':
                return $item[$column_name];
            default:
                return "no value";
        }
    }
}
function my_wp_show_data_list_table()
{
    $owt_table = new OWTTableList();
    $owt_table->prepare_items();
    /*
 *  
 *   //for search making  a form
 *
 */
    echo "<form method='post' name='frm_search_post' action='" . $_SERVER['PHP_SELF'] . "?page=owt-list-table'>";
    $owt_table->search_box("Search Post(s)", "search_post_id");
    echo "</form>";
    $owt_table->display();
}

my_wp_show_data_list_table();

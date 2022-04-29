<?php
global $wpdb;
$msg = '';

$action = isset($_GET['action']) ? trim($_GET['action']) : "";
$id = isset($_GET['id']) ? intval($_GET['id']) : "";

$row_details = $wpdb->get_row(
    $wpdb->prepare(
        "SELECT * from wp_next_plugin_tbl WHERE id = %d",
        $id
    ),
    ARRAY_A
);


if (isset($_POST['btnsubmit'])) {
    // if(wp_verify_nonce( $_POST['student_form_nonce_name'], 'student_form_nonce_action')){
    // echo "your request is valid";
    // die;
    // }else{
    //     echo "Invalid Request";
    //     die;
    // }
    if (wp_verify_nonce($_POST['student_form_nonce_name'], 'student_form_nonce_action')) {
        $name = $_POST['txtname'];
        $email = $_POST['txtemail'];
        if (empty($name)) {
            $msg = "name field is required";
        } else if (empty($email)) {
            $msg = "email is required";
        } else if (strlen($email) < 10) {
            $msg = "email should have 10 charactor with @ and . in middle";
        } else {
            $action = isset($_GET['action']) ? trim($_GET['action']) : "";
            $id = isset($_GET['id']) ? intval($_GET['id']) : "";

            if (!empty($action)) {

                $wpdb->update("wp_next_plugin_tbl", array(
                    "name" => $_POST['txtname'],
                    "email" => $_POST['txtemail']
                ), array(
                    "id" => $id
                ));

                $msg = "Form data updated successfully";
            } else {
                $wpdb->insert("wp_next_plugin_tbl", array(
                    "name" => $_POST['txtname'],
                    "email" => $_POST['txtemail']
                ));

                if ($wpdb->insert_id > 0) {
                    $msg = "Form data saved successfully";
                } else {
                    $msg = "Failed to save data";
                }
            }
        }
    } else {
        $msg = "bad request";
    }
}

?>

<p><?php echo $msg; ?></p>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>?page=wp-next-add<?php
                                                                    if (!empty($action)) {
                                                                        echo '&action=edit&id=' . $id;
                                                                    }
                                                                    ?>" method="post" id="formdatasubmit">
    <p>
        <label>
            Name
        </label>
        <input type="text" name="txtname" required value="<?php echo isset($row_details['name']) ? $row_details['name'] : ""; ?>" placeholder="Enter name" />
    </p>
    <p>
        <label>
            Email
        </label>
        <input type="email" name="txtemail" required value="<?php echo isset($row_details['email']) ? $row_details['email'] : ""; ?>" placeholder="Enter email" />
    </p>
    <?php wp_nonce_field('student_form_nonce_action', 'student_form_nonce_name'); ?>
    <p>
        <button type="submit" name="btnsubmit">Submit</button>
    </p>
</form>
<script>
    jQuery(function() {
        jQuery('#formdatasubmit').validate();
    });
</script>
<?php
function employee_insert()
{
    //echo "insert page";
    ?>
<table>
    <thead>
    <tr>
        <th></th>
        <th></th>
    </tr>

    <!-- 
    CRUD
    Create=>  Post()
    Read=>    Get()
    Update=> Update()
    Delete=> Delete()

     -->
    </thead>
    <tbody>
    <form name="frm" action="#" method="post">
    <tr>
        <td>Name:</td>
        <td><input type="text" name="name"></td>
    </tr>
    <tr>
        <td>Address:</td>
        <td><input type="text" name="address"></td>
    </tr>
    <tr>
        <td>Desigination:</td>
        <td><select name="des">
                <option value="developer">Developer</option>
                <option value="designer">Designer</option>
            </select>
        </td>
    </tr>
    <tr>
        <td>Mob no:</td>
        <td><input type="number" name="mob"></td>
    </tr>
    <tr>
        <td></td>
        <td><input type="submit" value="Insert" name="ins"></td>
    </tr>
    </form>
    </tbody>
</table>


<!-- <form action="post"> // This is a simple form with post type
    <input type="text" name="name"> // Input field with a name
    <button type="submit" name="sub">Submit</button> // form submissition button
</form> -->

<?php 
// if(isset($_POST['sub'])){ // if sub is clicked
//     global $wpdb;
//     $name = $_POST['name'];
//     $table_name = $wpdb->prefix . 'employee_list';

//     $wpdb->insert(
//         $table_name,
//         array(
//             'name' => $name,
//         )
//     );
// }

?>



<?php
    if(isset($_POST['ins'])){
        global $wpdb;
        $name=$_POST['name'];
        $address=$_POST['address'];
        $desc=$_POST['des'];
        $mob=$_POST['mob'];
        $table_name = $wpdb->prefix . 'employee_list';

        $wpdb->insert(
            $table_name,
            array(
                'name' => $name,
                'address' => $address,
                'role' => $desc,
                'contact'=>$mob
            )
        );
        echo "inserted";
        exit;
    }
}

?>
<?php
$con = mysqli_connect("localhost", "root", "", "hms");
$output = '';
$user = $_POST["doctor_search"];
$query = "SELECT *, DATE_FORMAT(FROM_DAYS(DATEDIFF(NOW(), d_dob)), '%Y') + 0 AS age from doctor where d_name like '%' '$user' '%' ";
$result = mysqli_query($con, $query);

if(mysqli_num_rows($result)>0)
{
    $output =  
    "
    <div id='patient_table'>
        <table>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Date of Birth</th>
                <th>Age</th>
                <th>Email</th>
                <th>Cell</th>
                <th>Address</th>
                <th>Emergency</th>
                <th>Specialization</th>
                <th>Working Since</th>
                <th>Last Workplace</th>
                <th>&nbsp;</th>
            </tr>
    "
    ;
    while($get = mysqli_fetch_assoc($result))
    {
        $d_id = $get['d_id'];
        $d_name = $get['d_name'];
        $d_dob = $get['d_dob'];
        $d_email = $get['d_email'];
        $age = $get['age'];
        $d_cell = $get['d_cell'];
        $d_addr = $get['d_addr'];
        $d_ecell = $get['d_ecell'];
        $d_special = $get['d_special'];
        $d_workingsince = $get['d_workingsince'];
        $d_lastworkplace = $get['d_lastworkplace'];
    
        $output .=
        "
            <tr>
                <td>$d_id</td>
                <td>$d_name</td>
                <td>$d_dob</td>
                <td>$age</td>
                <td>$d_email</td>
                <td>$d_cell</td>
                <td>$d_addr</td>
                <td>$d_ecell</td>
                <td>$d_special</td>
                <td>$d_workingsince</td>
                <td>$d_lastworkplace</td>
                <td><a href='doctorupdate.php?d_id=$d_id'><button>Edit Record</button></a></td>
            </tr>
        ";
    }
    echo $output;

}
else
{
    echo "Any record with <b>"."'$user'"."</b> as Doctor name does not exist";
}
?>
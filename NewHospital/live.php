<?php
$con = mysqli_connect("localhost", "root", "", "hms");
$output = '';
$user = $_POST["search"];
$query = "SELECT *, DATE_FORMAT(FROM_DAYS(DATEDIFF(NOW(), p_dob)), '%Y') + 0 AS age from patient where p_name like '%' '$user' '%' ";
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
                <th>Diagnosis</th>
                <th>Symptoms</th>
                <th>Medicince</th>
                <th>Alergies</th>
                <th>&nbsp;</th>
            </tr>
    "
    ;
    while($get = mysqli_fetch_assoc($result))
    {
        $p_id = $get['p_id'];
        $p_name = $get['p_name'];
        $p_dob = $get['p_dob'];
        $p_age = $get['age'];
        $p_email = $get['p_email'];
        $p_cell = $get['p_cell'];
        $p_addr = $get['p_addr'];
        $p_ecell = $get['p_ecell'];
        $age = $get['age'];
        $pd_daignosis = $get['p_diagnosis'];
        $pd_symptoms = $get['p_symptom'];
        $pd_medicine = $get['p_medicine'];
        $pd_alergies = $get['p_alergies'];
    
        $output .=
        "
            <tr>
                <td>$p_id</td>
                <td>$p_name</td>
                <td>$p_dob</td>
                <td>$age</td>
                <td>$p_email</td>
                <td>$p_cell</td>
                <td>$p_addr</td>
                <td>$p_ecell</td>
                <td>$pd_daignosis</td>
                <td>$pd_symptoms</td>
                <td>$pd_medicine</td>
                <td>$pd_alergies</td>
                <td><a href='patientupdate.php?p_id=$p_id'><button>Edit Record</button></a></td>
            </tr>
        ";
    }
    echo $output;

}
else
{
    echo "Any record with <b>"."'$user'"."</b> as Patient name does not exist";
}
?>
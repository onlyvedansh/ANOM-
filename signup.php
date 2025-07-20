<?php
$conn = oci_connect("your_user", "your_password", "//localhost/XEPDB1"); // change as needed

if (!$conn) {
    die("DB Connection failed.");
}

$firstname = $_POST['firstname'];
$middlename = $_POST['middlename'];
$lastname = $_POST['lastname'];
$email = $_POST['email'];
$phoneno = $_POST['phoneno'];
$region = $_POST['region'];
$password = $_POST['password']; // hash it in production!

$query = "INSERT INTO users (username, firstname, middlename, lastname, email, phoneno, region, password)
          VALUES (:username, :firstname, :middlename, :lastname, :email, :phoneno, :region, :password)";

$stid = oci_parse($conn, $query);

$username = $firstname . $lastname . rand(10,99); // simple unique username gen

oci_bind_by_name($stid, ":username", $username);
oci_bind_by_name($stid, ":firstname", $firstname);
oci_bind_by_name($stid, ":middlename", $middlename);
oci_bind_by_name($stid, ":lastname", $lastname);
oci_bind_by_name($stid, ":email", $email);
oci_bind_by_name($stid, ":phoneno", $phoneno);
oci_bind_by_name($stid, ":region", $region);
oci_bind_by_name($stid, ":password", $password);

if (oci_execute($stid)) {
    echo "Signup successful!";
} else {
    echo "Signup failed.";
}

oci_close($conn);
?>

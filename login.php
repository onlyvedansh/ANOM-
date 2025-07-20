<?php
// Collect form input
$username = $_POST['username'];
$password = $_POST['password'];

// Connect to Oracle
$conn = oci_connect('your_db_user', 'your_db_password', '//localhost:1521/xe');
if (!$conn) {
  $e = oci_error();
  die("Connection failed: " . $e['message']);
}

// Query: check user
$sql = "SELECT * FROM users WHERE (username = :username OR email = :username) AND password = :password";
$stid = oci_parse($conn, $sql);

// Bind values
oci_bind_by_name($stid, ":username", $username);
oci_bind_by_name($stid, ":password", $password); // 🔒 Use hashing in real apps

oci_execute($stid);
$row = oci_fetch_assoc($stid);

if ($row) {
  echo "✅ Login successful! Welcome, " . htmlspecialchars($row['FIRSTNAME']);
  // You can redirect using: header('Location: dashboard.php');
} else {
  echo "❌ Invalid username or password.";
}

oci_free_statement($stid);
oci_close($conn);
?>

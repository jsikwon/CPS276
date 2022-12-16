<?php

function displayUsernamePassword(){
    $pdo = new PdoMethods();
    $sql = "SELECT username, password FROM admin";
    $records = $pdo->selectNotBinded($sql);
    $result = '';

    /* IF THERE WAS AN ERROR DISPLAY MESSAGE*/
    if($records == 'error'){
        return 'There has been and error processing this request';
    }

    /** IF USERNAMES AND PASSWORDS ARE FOUND DISPLAY THEM OTHERWISE DISPLAY NO RECORDS FOUND MESSAGE */
    else{
        if(count($records) != 0){
            $result = '<ul>';
            foreach($records as $row){
                $result .= "<li>" .$row['username'] . " -- " . $row['password'] . "</li>";
            }
            $result .= "</ul>";

            return $result;
        }
        else {
            return 'No records found';
        }
    }
}

?>


<html lang="en">
	<head>
		<title>Final Project</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
		<style>
			.error {
				color: red;
				margin-left: 5px;
			}
			.space {
				margin-right: 30px;
			}
			input[type=submit]{
				margin: 10px 0;
			}
			</style>
	</head>

	<body class="container">
		
		
		<nav>
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="index.php?page=addContact">Add Contact</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="index.php?page=deleteContacts">Delete Contact(s)</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="index.php?page=addAdmin">Add Admin</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="index.php?page=deleteAdmins">Delete Admin(s)</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="logout.php">Logout</a>
        </li>
    </ul>
 </nav><h1>Delete Admin(s)</h1><form method='post' action='index.php?page=deleteAdmins'><input type='submit' class='btn btn-danger' name='delete' value='Delete'/><br><table class='table table-striped table-bordered'>
    <thead>
        <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Password</th>
        <th>Status</th>
        </tr>
    </thead><tbody><tr><td>Jun Won</td>
        <td>jwon1@admin.com</td>
        <td>$2y$10$PQ2ywUwwm8eb.kkKcxuHuu0rIqY2eP0eew/9h7fYvSuh1z2tSJfOK</td>
        <td>admin</td>
        <td><input type='checkbox' name='chkbx[]' value='13' /></td></tr><tr><td>Jun Won</td>
        <td>jwon1@staff.com</td>
        <td>$2y$10$y//i31alaXhEEpbl/0ynS.KQIsoZvlXQOJ57oCy1uFI.OPxSbL38m</td>
        <td>staff</td>
        <td><input type='checkbox' name='chkbx[]' value='14' /></td></tr></tbody></table></form>	</body>
</html> 
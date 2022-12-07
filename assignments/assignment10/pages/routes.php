<?php

$path = "index.php?page=welcome";

/**Add function for if admin then output admin nav and else output staff nav */

        $nav_admin=<<<HTML
            <nav>
                <ul>
                    <li><a href="index.php?page=addContact">Add Contact</a></li>
                    <li><a href="index.php?page=deleteContacts">Delete contact(s)</a></li>
                    <li><a href="index.php?page=addAdmin">Add Admin</a></li>
                    <li><a href="index.php?page=deleteAdmins">Delete Admnin(s)</a></li>
                    <li><a href="index.php?page=logout">logout</a></li>
                </ul>
            </nav>
        HTML;

        $nav_staff=<<<HTML
            <nav>
                <ul>
                    <li><a href="index.php?page=addContact">Add Contact</a></li>
                    <li><a href="index.php?page=deleteContacts">Delete contact(s)</a></li>
                    <li><a href="index.php?page=logout">logout</a></li>
                </ul>
            </nav>
        HTML;


if(isset($_GET)){
    if($_GET['page'] === "addContact"){
        require_once('pages/addContact.php');
        $result = init();
    }
    
    else if($_GET['page'] === "deleteContacts"){
        require_once('pages/deleteContacts.php');
        $result = init();
    }

    else if($_GET['page'] === "logout"){
        require_once('assignment10/logout.php');
        $result = init();

    }

    else {
        header('location: '.$path);
    }
}

else {
    header('location: '.$path);
}


public function addAdmin($post){
    $pdo = new PdoMethods();
    $sql = "SELECT username FROM admin WHERE username = :username";
    $bindings = array(
        array(':username', $post['username'], 'str')
    );

    $records = $pdo->selectBinded($sql, $bindings);

    /** IF THERE WAS AN RETURN ERROR STRING */
    if($records == 'error'){
        return 'There was an error processing your request';
    }
    
    /** CHECK FOR A DUPLICATE USERNAME IF FOUND THEN RETURN DUPLICATE OTHERWISE ADD USERNAME AND PASSWORD TO DATABASE */
    else{
        if(count($records) != 0){
            return "There is already someone with that username";
        }
        else {
            /** ENCRYPT THE PASSWORD USING PASSWORD_HASH */
            $password = password_hash($post['password'], PASSWORD_DEFAULT);


            $sql = "INSERT INTO admin (username, password, email, status) VALUES (:username, :password, :email, :status)";
            $bindings = array(
                array(':username',$post['username'],'str'),
                array(':password',$password,'str'),
                array(':email',$post['email'],'str'),
                array(':status',$post['status'],'str'),
            );
            $result = $pdo->otherBinded($sql, $bindings);
            if($result = 'noerror'){
                return 'Admin added';
            }
            else {
                return 'There was a problem adding this administrator';
            }
        }
    }
}



/**RETURNS THE PAGE BACK TO LOGIN */
public function security(){
    session_start();
    if($_SESSION['access'] !== "accessGranted"){
      header('location: index.php');

?>
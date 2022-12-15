<?php

$path = "index.php?page=welcome";

/**Add function for if admin then output admin nav and else output staff nav */

        $nav_admin=<<<HTML
            <nav>
                <ul class = "nav">
                    <li class="nav-item"><a class="nav_link" href="index.php?page=addContact">Add Contact</a></li>
                    <li class="nav-item"><a class="nav_link" href="index.php?page=deleteContacts">Delete contact(s)</a></li>
                    <li class="nav-item"><a class="nav_link" href="index.php?page=addAdmin">Add Admin</a></li>
                    <li class="nav-item"><a class="nav_link" href="index.php?page=deleteAdmins">Delete Admnin(s)</a></li>
                    <li class="nav-item"><a class="nav_link" href="logout.php">logout</a></li>
                </ul>
            </nav>
HTML;


        $nav_staff=<<<HTML
            <nav>
                <ul class="nav">
                    <li class="nav-item"><a class="nav_link" href="index.php?page=addContact">Add Contact</a></li>
                    <li class="nav-item"><a class="nav_link" href="index.php?page=deleteContacts">Delete contact(s)</a></li>
                    <li class="nav-item"><a class="nav_link" href="logout.php">logout</a></li>
                </ul>
            </nav>
HTML;




if(isset($_GET)){
    if($_GET['pages'] === "addContact"){
        require_once('addContact.php');
        $result = init();
    }
    
    else if($_GET['pages'] === "deleteContacts"){
        require_once('deleteContacts.php');
        $result = init();
    }

    else if($_GET['pages'] === "logout"){
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
  
/**RETURNS THE PAGE BACK TO LOGIN
class Security {
  
    public function security(){
        session_start();
        if($_SESSION['access'] !== "accessGranted"){
          header('location: index.php');
     
            }
        }
    }*/

?>
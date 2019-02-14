<?php 
session_start();

//DATABASE RELATED FUNCTIONS

include'snippets/database.php';



// BEGINNING OF HTML 

include'snippets/header.php';

	
	// if form was submitted...


    if (!empty($_POST)) {

    	// if logging out

    	if ('log out' === $_POST['action']) {

    		$_SESSION['loggedIn'] = false;
    		//show logged out message
    		include'snippets/log_out_message.php';
    		//show login form
    		include'snippets/login_form.php';
    	
		// if login was valid

		} else if (isLogInValid($_POST['email'], $_POST['password'])) {

			$_SESSION['loggedIn'] = true;

			// show success HTML
			include'snippets/successful_login.php';
			
			// show welcome HTML
			include'snippets/welcome_message.php';

		// else
		} else {
			// show error message
			include'snippets/login_error.php';
			// show form HTML		
			include'snippets/login_form.php';
		}
	}
	// if session exists

	else if ($_SESSION && $_SESSION['loggedIn'] === true) {
		//returning logged in user welcome
		include'snippets/welcome_message.php';

	// else

	} else {
		// show form HTML	
		include'snippets/login_form.php';
		include'snippets/sign_up_form.php';
	}

include'snippets/footer.php';

// END OF HTML
?>
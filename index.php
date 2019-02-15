<?php 
session_start();

//DATABASE RELATED FUNCTIONS

include_once'snippets/database.php';



// BEGINNING OF HTML 

include'snippets/header.php';

	
	// if form was submitted...


    if (!empty($_POST)) {

    	// if registering as user

    	if ($_POST['registration'] && 'submit' === $_POST['registration']) {

    		echo $_POST;

    		if (registerNewUser($_POST['firstname'], $_POST['surname'], $_POST['email'], $_POST['password'])) {
				
				//show successful registration message
	    		include'snippets/registered.php';

	    		//show login form
	    		include'snippets/login_form.php';    

    		} else {

    			//failed registration message with all values except password
    			include'snippets/registration_failed.php';

    			// log in form
    			include'snippets/login_form.php';
    		}


    	
    	// if logging out

    	} else if ('log out' === $_POST['action']) {

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

			//log out button
			include'snippets/log_out_button.php';

		// else
		} else {

			// show error message
			include'snippets/login_error.php';

			// show form HTML		
			include'snippets/login_form.php';

			// show sign up form HTML
			include'snippets/sign_up_form.php';
		}
	}
	// if session exists

	else if ($_SESSION && $_SESSION['loggedIn'] === true) {

		//returning logged in user welcome
		include'snippets/welcome_message.php';

		//log out button
		include'snippets/log_out_button.php';

	// else

	} else {

		// show log in form HTML	
		include'snippets/login_form.php';
		
		// show sign up form HTML
		include'snippets/sign_up_form.php';
	}

include'snippets/footer.php';

// END OF HTML
?>
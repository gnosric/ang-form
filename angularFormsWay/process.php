<?php

$errors         = array();      // array to hold validation errors
$data           = array();      // array to pass back data

// validate the variables ======================================================
    if (empty($_POST['firstName']))
        $errors['firstName'] = 'First Name is required.';

    if (empty($_POST['lastName']))
        $errors['lastName'] = 'Last Name is required.';

    if (empty($_POST['company']))
        $errors['company'] = 'Company is required.';

    if (empty($_POST['email']))
        $errors['email'] = 'Email is required.';

     if (empty($_POST['phone']))
        $errors['phone'] = 'Phone is required.';

// return a response ===========================================================

    // response if there are errors
    if ( ! empty($errors)) {

        // if there are items in our errors array, return those errors
        $data['success'] = false;
        $data['errors']  = $errors;
    } else {

        // if there are no errors, return a message
        $data['success'] = true;
        $data['message'] = 'Form Successfully Submitted!';

        $to = "rjung@boardvantage.com"; // this is your Email address
        $from = $_POST['email']; // this is the sender's Email address
        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $company = $_POST['company'];
        $phone = $_POST['phone'];
        $subject = "Form submission";
        $subject2 = "Copy of your form submission";
        $message = $firstName . " " . $lastName . " from " . $company . " wrote the following:" . "\n\n" . "Phone: " . $phone . "\n\n" . $_POST['company'];
        $message2 = "Here is a copy of your message " . $name . "\n\n" . $_POST['company'];

        $headers = "From:" . $from;
        $headers2 = "From:" . $to;
        mail($to,$subject,$message,$headers);
        mail($from,$subject2,$message2,$headers2); // sends a copy of the message to the sender
        // echo "Mail Sent. Thank you " . $name . ", we will contact you shortly.";
        // You can also use header('Location: thank_you.php'); to redirect to another page.
        // You cannot use header and echo together. It's one or the other.

    }

    // return all our data to an AJAX call
    echo json_encode($data);

?>
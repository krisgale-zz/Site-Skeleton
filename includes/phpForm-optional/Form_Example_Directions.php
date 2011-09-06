<?php
/* 
	Directions for contact form version 2 functionality
	
	Revised Oct 04 2010
	
	A "clean" version to copy & paste and use as a base is in Contact_Form_Base.php
	Don't use this one!
	
	What does this thing do?
	1. creates form html for you
	2. validates the form through php (more secure than js) and displays errors
		a. as an error message at the top of the page, and/or
		b. as an error class attached to the form field
	3. sends the form with phpmailer
	4. saves it to the database if you wish
	5. sends out an autoresponder if you wish
	6. captcha & attachment functionality will be added soon...
	
	This page contains full instructions for all options
*/

/* include the contact form class file
   this should be3 in the same directory as:
   class.inputfilter.php, class.phpmailer.php, and class.smtp.php if using smtp */
include("class.contactform.php");

// create a new form object
$form = new form;

// give the form a name - doesn't matter what it is but each form
// on a page needs a unique name
$form->name = "name";

// form email subject - defaults to "Website Contact Form"
// can also create a dynamic subject based off form content - see optional stuff area
$form->subject = "Contact Form Demo";

// form to address - you can add as many as you like
$form->addToAddress("amanda@inverseparadox.net");

// thank you message, optional, defaults to "Thank you for contacting us. Someone will be in touch with you shortly."
$form->thankYou = "Thank you for submitting this form.";

/* add form fields with wordpress-style arguments
   escape & and = with \
   
   available options:
   type: element type, choose from textinput, textarea, select, checkbox, radio; required
   name: field name; required
   friendlyName: text displayed to user; required
   initialValue: show text inside form element that disappears when user clicks; optional
   cssClass: class to assign to form element; optional
   id: id to assign to form element; will make label clickable; optional
   required: whether or not this form field is required; optional
   validateAs: how to validate field - choose from email, phone, zip, posint; optional
   
   textarea only:
   rows: rows in textarea; optional
   cols: columns in textarea; optional
   
   select only:
   firstOption: text to display at the top before anything is selected; default -- select -- ; optional
*/
	
$form->addField("name=name&friendlyName=Name&id=name&cssClass=textbox&type=textinput&initialValue=Name&required=true");
$form->addField("name=email&friendlyName=Email&id=email&cssClass=textbox&type=textinput&initialValue=Email&required=true&validateAs=email");
$form->addField("name=phone&friendlyName=Phone&id=phone&cssClass=textbox&type=textinput&initialValue=Phone");
$form->addField("name=service&friendlyName=Service Requested&id=service&type=checkbox");
$form->addField("name=comments&friendlyName=Additional Comments&id=comments&cssClass=textbox&type=textarea&initialValue=Additional Comments");

/* add options to fields that should have them (select, radio, checkbox)
   add field first, use getField(name) to refer to it and then addOptions to add options to it
   seperate options with | escape | with \
*/
$form->getField("service")->addOptions("Service 1|Service 2|Service 3");

// text for the submit button; defaults to 'submit'
$form->submitText = "Submit";

// run the form - call this last
$form->run();


// optional stuff you probably won't use that often
// in real life you'd put this ABOVE the run() statement

// the name and email address of the person who filled out the form
// defaults to fields named "name" and "email" but you can change this
// for instance if you have a "firstname" and "lastname" field to combine
// this shows up in "from" field with regular mail and "reply-to" field with smtp mail
$form->userName = $form->getField("firstname")->data . " " . $form->getField("lastname")->data;

// you can use the method above to make dynamic subjects if you want, for instance:
$form->subject = "You have a new email from " . $form->getField("name")->data;

// redirect to a new url instead of reloading the same page
$form->redirectUrl("http://website.com/someotherpage.html");

// stop errors from displaying
$form->showErrors = false;

// name and email address of the site owner/company
// used with autoresponder
$form->siteOwnerName = "Name of Website";
$form->siteOwnerEmail = "info@website.com";

// use an autoresponder
$form->autoResponse = true;
// subject for the auto response email
$form->autoSubject = "Thanks";
// content for the auto response email
$form->autoContent = "Thanks for filling out my form.";

// save to a database
// you'd need to go into the table and create a colunm for every field name you have
$form->saveToDatabase = true;
// database host, usually localhost
public $dbhost = "localhost";
// database name
public $dbname = "database";
// database user name
public $dbuser = "user";
// database password
public $dbpass = "password";
// database table
public $dbtable = "table";

/** use smtp to send emails
    this example uses a gmail address with appropriate settings
	settings vary by email provider
	they are the same settings you'd use to connect via outlook or somesuch
	must have file class.smtp.php in same folder as class.phpmailer.php
**/
// tell the form to use smtp to send mail
$form->useSMTP = true;
// the email address you are using/loggin into
$form->SMTPemail = "somebody@somewhere.com";
// the name (person or website) associated with the email address
$form->SMTPname = "Some Body";
// the smtp server
$form->SMTPhost = "smtp.gmail.com";
// account or user name, usually same as email but not always
$form->SMTPuser = "somebody@somewhere.com";
// email address's password
$form->SMTPpass = "password";
// use an ssl connection - some hosts (like gmail) require this
$form->SMTPSSL = true;
?>
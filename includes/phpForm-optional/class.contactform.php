<?php
/*
Version 2.0
*/

class inputItem {
	public $name = NULL;
	public $friendlyName = NULL;
	public $initialValue = NULL;
	public $cssClass = NULL;
	public $id = NULL;
	public $required = NULL;
	public $validateAs = NULL;
	public $errorMessage = NULL;
	public $data = NULL;
	function __construct($args) {
		if (isset($args['name'])) $this->name = $args['name'];
		if (isset($args['friendlyName'])) $this->friendlyName = $args['friendlyName'];
		if (isset($args['initialValue'])) $this->initialValue = $args['initialValue'];
		if (isset($args['cssClass'])) $this->cssClass = $args['cssClass'];
		if (isset($args['id'])) $this->id = $args['id'];
		if (isset($args['required'])) {
			if (is_string($args['required'])) {
				$this->required = ($args['required'] == "true") ? true : false;
			} elseif (is_bool($args['required'])) {
				$this->required = $args['required'];
			}
		}
		if (isset($args['validateAs'])) $this->validateAs = $args['validateAs'];
		if (isset($args['errorMessage'])) $this->errorMessage = $args['errorMessage'];
		if (isset($args['data'])) $this->data = $args['data'];
	}
	function display() {
	}
	function emailText() {
	}
	function emailHTML() {
	}
}
class inputText extends inputItem {
	function __construct($args) {
		parent::__construct($args);
	}
	function display() {
		if (!$this->initialValue) {
			$html .= "<label";
			if ($this->id) {
				$html .= " for=\"".$this->id."\"";
			}
			$html .= ">".$this->friendlyName."</label> ";
		}
		$html .= "<input type=\"text\"";
		$html .= " name=\"".$this->name."\"";
		if ($this->id) { 
			$html .= " id=\"".$this->id."\"";
		}
		if ($this->errorMessage && $this->cssClass) {
			$html .= " class=\"".$this->cssClass." errorField\"";
		} elseif ($this->cssClass && !$this->errorMessage) {
			$html .= " class=\"".$this->cssClass."\"";
		} elseif (!$this->cssClass && $this->errorMessage) {
			$html .= " class=\"errorField\"";
		}
		if (!$this->data && $this->initialValue) {
			$html .= " onblur=\"if(this.value=='') {this.value='".$this->initialValue."';}\"";
			$html .= " onfocus=\"if(this.value=='".$this->initialValue."') {this.value='';}\"";
			$html .= " value=\"".$this->initialValue."\"";
		} elseif ($this->data && !$this->errorMessage) {
			$html .= " value=\"".$this->data."\"";
		}
		$html .= " /><br />";
		return $html;
	}
	function emailText() {
		$text = $this->friendlyName . ": " . $this->data . "\n";
		return $text;
	}
	function emailHTML() {
		$html .= "<tr><td style=\"padding-right: 10px\">".$this->friendlyName.":</td>";
		$html .= "<td>".$this->data."</td></tr>";
		return $html;
	}
}

class textArea extends inputItem {
	public $cols = NULL;
	public $rows = NULL;
	function __construct($args) {
		parent::__construct($args);
		if (isset($args['cols'])) $this->cols = $args['cols'];
		if (isset($args['rows'])) $this->rows = $args['rows'];
	}
	function display() {
		if (!$this->initialValue) {
			$html .= "<label";
			if ($this->id) {
				$html .= " for=\"".$this->id."\"";
			}
			$html .= ">".$this->friendlyName."</label> ";
		}
		$html .= "<textarea";
		$html .= " name=\"".$this->name."\"";
		if ($this->id) { 
			$html .= " id=\"".$this->id."\"";
		}
		if ($this->errorMessage && $this->cssClass) {
			$html .= " class=\"".$this->cssClass." errorField\"";
		} elseif ($this->cssClass && !$this->errorMessage) {
			$html .= " class=\"".$this->cssClass."\"";
		} elseif (!$this->cssClass && $this->errorMessage) {
			$html .= " class=\"errorField\"";
		}
		if ($this->rows) { 
			$html .= " rows=\"".$this->rows."\"";
		}
		if ($this->cols) { 
			$html .= " cols=\"".$this->cols."\"";
		}
		if ($this->initialValue) {
			$html .= " onblur=\"if(this.value=='') {this.value='".$this->initialValue."';}\"";
			$html .= " onfocus=\"if(this.value=='".$this->initialValue."') {this.value='';}\"";
		}
		$html .= ">";
		if (!$this->data && $this->initialValue) {
			$html .= $this->initialValue;
		} elseif ($this->data && !$this->errorMessage) {
			$html .= $this->data;
		}
		$html .= "</textarea><br />";
		return $html;
	}
	function emailText() {
		$text = $this->friendlyName . ": " . $this->data . "\n";
		return $text;
	}
	function emailHTML() {
		$html .= "<tr><td colspan=\"2\"><br />".$this->friendlyName.":</td></tr>";
		$html .= "<tr><td colspan=\"2\">".nl2br($this->data)."</td></tr>";
		return $html;
	}
}
class select extends inputItem {
	public $options = array();
	public $firstOption = NULL;
	function __construct($args) {
		parent::__construct($args);
		if (isset($args['firstOption'])) {
			$this->firstOption = $args['firstOption'];
		} elseif ($this->initialValue) {
			$this->firstOption = $this->initialValue;
		} else {
			$this->firstOption = "-- select --";
		}
		if (isset($args['options'])) {
			foreach ($args['options'] as $option) {
				array_push($this->options,$option);
			}
		}
	}
	function addOption($option) {
		array_push($this->options,$option);
	}
	function addOptions($options) {
		$options = str_replace("\|","++bar++",$options);
		$optionParts = explode("|",$options);
		foreach ($optionParts as $option) {
			$option = str_replace("++bar++","|",$option);
			$this->addOption($option);
		}
	}
	function display() {
		if (!$this->initialValue) {
			$html .= "<label";
			if ($this->id) {
				$html .= " for=\"".$this->id."\"";
			}
			$html .= ">".$this->friendlyName."</label> ";
		}
		$html .= "<select";
		$html .= " name=\"".$this->name."\"";
		if ($this->id) { 
			$html .= " id=\"".$this->id."\"";
		}
		if ($this->errorMessage && $this->cssClass) {
			$html .= " class=\"".$this->cssClass." errorField\"";
		} elseif ($this->cssClass && !$this->errorMessage) {
			$html .= " class=\"".$this->cssClass."\"";
		} elseif (!$this->cssClass && $this->errorMessage) {
			$html .= " class=\"errorField\"";
		}
		$html .= ">";
		$html .= "<option value=\"\">".$this->firstOption."</option>";
		foreach($this->options as $option) {
			$html .= "<option value=\"".$option."\"";
			if ($this->data == $option) $html .= " selected=\"selected\"";
			$html .= ">".$option."</option>";
		}
		$html .= "</select><br />";
		return $html;
	}
	function emailText() {
		$text = $this->friendlyName . ": " . $this->data . "\n";
		return $text;
	}
	function emailHTML() {
		$html .= "<tr><td style=\"padding-right: 10px\">".$this->friendlyName.":</td>";
		$html .= "<td>".$this->data."</td></tr>";
		return $html;
	}
}
class radioGroup extends inputItem {
	public $options = array();
	function __construct($args) {
		parent::__construct($args);
		if (isset($args['options'])) {
			foreach ($args['options'] as $option) {
				array_push($this->options,$option);
			}
		}
	}
	function addOption($option) {
		array_push($this->options,$option);
	}
	function addOptions($options) {
		$options = str_replace("\|","++bar++",$options);
		$optionParts = explode("|",$options);
		foreach ($optionParts as $option) {
			$option = str_replace("++bar++","|",$option);
			$this->addOption($option);
		}
	}
	function display() {
		$html .= "<label>".$this->friendlyName."</label>";
		$html .= "<div class=\"radio-group";
		if ($this->errorMessage) $html .= " errorField";
		$html .= "\">";
		$i = 0;
		foreach ($this->options as $option) {
			$html .= "<input type=\"radio\"";
			$html .= " name=\"".$this->name."\"";
			$html .= " value=\"".$option."\"";
			$html .= " id=\"".$this->name.$i."\"";
			if ($this->data == $option) $html .= " checked=\"checked\"";
			$html .= "/>";
			$html .= " <label for=\"".$this->name.$i."\">".$option."</label>";
			$i++;
		}
		$html .= "</div><br />";
		return $html;
	}
	function emailText() {
		$text = $this->friendlyName . ": " . $this->data . "\n";
		return $text;
	}
	function emailHTML() {
		$html .= "<tr><td style=\"padding-right: 10px\">".$this->friendlyName.":</td>";
		$html .= "<td>".$this->data."</td></tr>";
		return $html;
	}
}
class checkboxGroup extends inputItem {
	public $options = array();
	function __construct($args) {
		parent::__construct($args);
		if (isset($args['options'])) {
			foreach ($args['options'] as $option) {
				array_push($this->options,$option);
			}
		}
	}
	function addOption($option) {
		array_push($this->options,$option);
	}
	function addOptions($options) {
		$options = str_replace("\|","++bar++",$options);
		$optionParts = explode("|",$options);
		foreach ($optionParts as $option) {
			$option = str_replace("++bar++","|",$option);
			$this->addOption($option);
		}
	}
	function display() {
		$html .= "<label>".$this->friendlyName."</label>";
		$html .= "<div class=\"checkbox-group";
		if ($this->errorMessage) $html .= " errorField";
		$html .= "\">";
		$i = 0;
		foreach ($this->options as $option) {
			$html .= "<input type=\"checkbox\"";
			$html .= " name=\"".$this->name;
			if (count($this->options) > 1) $html .= "[]";
			$html .= "\"";
			$html .= " value=\"".$option."\"";
			$html .= " id=\"".$this->name.$i."\"";
			if (is_array($this->data) && in_array($option,$this->data)) {
				$html .= " checked=\"checked\"";	
			} elseif (!is_array($this->data) && $this->data == $option) { 
				$html .= " checked=\"checked\"";
			}
			$html .= "/>";
			$html .= " <label for=\"".$this->name.$i."\">".$option."</label>";
			$i++;
		}
		$html .= "</div><br />";
		return $html;
	}
	function emailText() {
		$text = $this->friendlyName . ": ";
		if (is_array($this->data)) {
			$text .= implode(", ",$this->data);
		} else {
			$text .= $this->data;
		}
		$text .= "\n";
		return $text;
	}
	function emailHTML() {
		$html .= "<tr><td style=\"padding-right: 10px\">".$this->friendlyName.":</td>";
		$html .= "<td>";
		if (is_array($this->data)) {
			$html .= implode(", ",$this->data);
		} else {
			$html .= $this->data;
		}
		$html .= "</td></tr>";
		return $html;
	}
}

class form {
	public $name = NULL;
	public $submitText = NULL;
	public $showErrors = NULL;
	
	public $to = array();
	public $subject = NULL;
	
	public $siteOwnerName = NULL;
	public $siteOwnerEmail = NULL;
	public $userName = NULL;
	public $userEmail = NULL;
	
	public $useSMTP = NULL;
	public $SMTPemail = NULL;
	public $SMTPname = NULL;
	public $SMTPhost = NULL;
	public $SMTPuser = NULL;
	public $SMTPpass = NULL;
	public $SMTPSSL = NULL;
	
	public $autoResponse = NULL;
	public $autoContent = NULL;
	public $autoSubject = NULL;
	
	public $fields = array();
	
	public $thankYou = NULL;
	public $redirectUrl = NULL;
	
	private $filter = NULL;
	
	public $saveToDatabase = NULL;
	public $dbhost = NULL;
	public $dbname = NULL;
	public $dbuser = NULL;
	public $dbpass = NULL;
	public $dbtable = NULL;
	public $dbh = NULL;
	
	function __construct() {
		$this->subject = "Website Contact Form";
		$this->thankYou = "Thank you for contacting us. Someone will be in touch with you shortly.";
		$this->autoResponse = false;
		$this->fields = array();
		$this->showErrors = true;
		require_once("class.inputfilter.php");
		$this->filter = new InputFilter;
		$this->saveToDatabase = false;
		$this->useSMTP = false;
	}
	
	function addField($args) {
		if (!is_array($args)) {
			$args = str_replace("\&","++amp++",$args);
			$args = str_replace("\=","++equals++",$args);
			$arg_parts = explode("&",$args);
			$args = array();
			foreach ($arg_parts as $arg) {
				$split = explode("=",$arg);
				$split[1] = str_replace("++amp++","&",$split[1]);
				$split[1] = str_replace("++equals++","=",$split[1]);
				$args[$split[0]] = $split[1];
			}
		}
		switch($args['type']) {
			case "textinput":
				$this->fields[$args['name']] = new inputText($args);
				break;
			case "textarea":
				$this->fields[$args['name']] = new textArea($args);
				break;
			case "select":
				$this->fields[$args['name']] = new select($args);
				break;
			case "checkbox":
				$this->fields[$args['name']] = new checkboxGroup($args);
				break;
			case "radio":
				$this->fields[$args['name']] = new radioGroup($args);
				break;
		}
	}
	function getField($field) {
		return $this->fields[$field];
	}
	function addToAddress($email) {
		array_push($this->to,$email);
	}
	function display() {
		if ($this->showErrors) {
			$html .= $this->displayErrors();
		}
		if (!$this->submitText) $this->submitText = "Submit";
		$html .= "<form action=\"".$_SERVER['REQUEST_URI']."\" method=\"post\">";
		foreach ($this->fields as $field) {
			$html .= $field->display();
		}
		$html .= "<input type=\"submit\" name=\"submit".$this->name."\" value=\"".$this->submitText."\" class=\"button\" />";
		$html .= "</form>";
		return $html;
	}
	function displayErrors() {
		$errors = array();
		foreach ($this->fields as $field) {
			if ($field->errorMessage) {
				array_push($errors,$field->errorMessage);
			}
		}
		if (count($errors)) {
			$html .= "<div class=\"error-messages\">";
			$html .= "<p>Please correct the following errors:</p>";
			$html .= "<ul>";
			foreach ($errors as $error) {
				$html .= "<li>".$error."</li>";
			}
			$html .= "</ul>";
			$html .= "</div>";
		}
		return $html;
	}
	function process() {
		$_POST = $this->smartStripSlashes($_POST);
		$_POST = $this->filter->process($_POST);
		foreach ($_POST as $key => $value) {
			if (array_key_exists($key,$this->fields)) {
				$this->fields[$key]->data = $_POST[$key];
			}
		}
		foreach ($this->fields as $field) {
			if (isset($field->initialValue) && $field->initialValue == $field->data) {
				$field->data = "";
			}
		}
		foreach ($this->fields as $name => $field) {
			if ($field->required) {
				$this->checkEmpty($name);
			}
			if (isset($field->validateAs)) {
				$this->checkValid($name);
			}
		}
		if ($this->displayErrors()) {
			return false;
		} else {
			return true;
		}
	}
	function emailText() {
		$text .= $this->subject . ":\n\n";
		foreach ($this->fields as $field) {
			$text .= $field->emailText();
		}
		$text .= "\nForm submitted at: " . date("M j Y, g:ia T");
		return $text;
	}
	function emailHTML() {
		$html .= "<html><body>".$this->subject."<br /><br /><table border=\"0\" cellpadding=\"0\" cellspacing=\"0\">";
		foreach ($this->fields as $field) {
			$html .= $field->emailHTML();
		}
		$html .= "</table><br />Form submitted at: ".date("M j Y, g:ia T")."</body></html>";
		return $html;
	}
	function send() {
		try {
			if (!empty($this->to)) {
				require_once("class.phpmailer.php"); 
				$mail = new PHPMailer();
				if (!$this->userName) {
					$this->userName = $this->fields["name"]->data;
				}
				if (!$this->userEmail) {
					$this->userEmail = $this->fields["email"]->data;
				}
				if ($this->useSMTP) {
					$mail->IsSMTP();
					$mail->SMTPAuth = "true";
					$mail->Host = $this->SMTPhost;
					$mail->Username = $this->SMTPuser;
					$mail->Password = $this->SMTPpass;
					$mail->SetFrom($this->SMTPemail,$this->SMTPname);
					$mail->AddReplyTo($this->userEmail,$this->userName);
					if ($this->SMTPSSL) {
						$mail->SMTPSecure = "ssl";
						$mail->Port = 465;
					}
				} else {
					$mail->IsMail();
					$mail->SetFrom($this->userEmail,$this->userName);
				}
				foreach ($this->to as $to) {
					$mail->AddAddress($to);
				}
				$mail->Subject = $this->subject;
				$mail->MsgHTML($this->emailHTML());
				$mail->AltBody = $this->emailText(); 
				if(!@$mail->Send()) {
					throw new Exception("Mailer error: " . $mail->ErrorInfo);
				} else {
					if ($this->autoResponse === true) {
						$mail->ClearAllRecipients();
						$mail->ClearReplyTos();
						$mail->AddAddress($this->fields['email']->data);
						$mail->Subject = $this->autoSubject;
						$mail->Body = $this->autoContent;
						if (!$this->useSMTP) {
							$mail->SetFrom($this->siteOwnerEmail,$this->siteOwnerName);
						} else {
							$mail->AddReplyTo($this->siteOwnerEmail,$this->siteOwnerName);
						}
						if(!@$mail->Send()) {
							throw new Exception("Mailer error: " . $mail->ErrorInfo);
						}
					}
					if ($this->redirectUrl != "") {
						echo "<script type=\"text/javascript\">window.location=\"".$this->redirectUrl."\"</script>";
					} else {
						echo "<p class=\"thanks\">".$this->thankYou."</p>";
					}
				}
			} else {
				if (empty($this->to)) {
					throw new Exception("No 'to' address set for form; please contact website administrator.");
				}
			}
		} catch (Exception $e) {
			echo "<p class=\"mailererror\">".$e->getMessage()."</p>";
		}
	}
	function save() {
		try {
			$cols = array();
			$data = array();
			foreach ($this->fields as $field) {
				array_push($cols,$field->name);
				if (is_array($field->data)) {
					array_push($data,implode(",",$field->data));
				} else {
					array_push($data,$field->data);
				}
			}
			if (!$this->dbh = mysql_connect($this->dbhost,$this->dbuser,$this->dbpass)) {
				throw new Exception("Error: cannot connect to MySQL: ".mysql_error());
			}
			if (!mysql_select_db($this->dbname)) {
				throw new Exception("Error: cannot connect to database: ".mysql_error());
			}
			$data = $this->filter->safeSQL($data,$this->dbh);
			$query = "INSERT INTO `".$this->dbtable."` (`";
			$query .= implode("`,`",$cols);
			$query .= "`) VALUES (\"";
			$query .= implode("\",\"",$data);
			$query .= "\")";
			if (!$result = mysql_query($query)) {
				throw new Exception("Error saving information to database.");
			}
		} catch (Exception $e) {
			echo "<p class=\"mailererror\">".$e->getMessage()."</p>";
		}
	}
	function run() {
		if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST["submit".$this->name])) {
			if (!$this->process()) {
				echo $this->display();
			} else {
				if ($this->saveToDatabase) {
					$this->save();
				}
				$this->send();
			}
		} else {
			echo $this->display();
		}
	}
	
	function validateEmailAddress($email) {
		if (!ereg("^[^@]{1,64}@[^@]{1,255}$", $email)) {
			return false;
		}
		$email_array = explode("@", $email);
		$local_array = explode(".", $email_array[0]);
		for ($i = 0; $i < sizeof($local_array); $i++) {
			if (!ereg("^(([A-Za-z0-9!#$%&'*+/=?^_`{|}~-][A-Za-z0-9!#$%&'*+/=?^_`{|}~\.-]{0,63})|(\"[^(\\|\")]{0,62}\"))$", $local_array[$i])) {
				return false;
			}
		}
		if (!ereg("^\[?[0-9\.]+\]?$", $email_array[1])) {
			$domain_array = explode(".", $email_array[1]);
			if (sizeof($domain_array) < 2) {
				return false;
			}
			for ($i = 0; $i < sizeof($domain_array); $i++) {
				if (!ereg("^(([A-Za-z0-9][A-Za-z0-9-]{0,61}[A-Za-z0-9])|([A-Za-z0-9]+))$", $domain_array[$i])) {
					return false;
				}
			}
		}
		return true;
	}
	function validatePhone($phone) {
		$pattern = "^.?[0-9]{3}.?.?[0-9]{3}.?[0-9]{4}$";
		$phone = trim($phone);
		if (ereg($pattern,$phone)) {
			return true;
		} else {
			return false;
		}
	}
	function validateZip($zip) {	
		$pattern = "[0-9]{5}";
		$zip = trim($zip);
		if (ereg($pattern,$zip)) {
			return true;
		} else {
			return false;
		}
	}
	function validatePosInt($posint) {
		if (!ereg("[0-9]+",$posint)) {
			return false;
		} elseif ($posint < 1) {
			return false;
		} else {
			return true;
		}
	}
	function checkEmpty($field) {
		if ($this->fields[$field]->errorMessage == "") {
			$errmsg = "<em>".$this->fields[$field]->friendlyName."</em> cannot be blank.";
		} else {
			$errmsg = $this->fields[$field]->errorMessage;
		}
		if (empty($this->fields[$field]->data)) {
			$this->fields[$field]->errorMessage = $errmsg;
			$this->fields[$field]->data = "";
			return false;
		} else {
			return true;
		}
	}
	function checkValid($field) {
		if ($this->checkEmpty($field)) {
			switch ($this->fields[$field]->validateAs) {
				case "email":
					$errmsg = ($this->fields[$field]->errorMessage != "") ? $this->fields[$field]->errorMessage : "<em>".$this->fields[$field]->friendlyName."</em> must be a valid email address.";
					$valid = $this->validateEmailAddress($this->fields[$field]->data);
				break;
				case "phone":
					$errmsg = ($this->fields[$field]->errorMessage != "") ? $this->fields[$field]->errorMessage : "<em>".$this->fields[$field]->friendlyName."</em> must be a valid 10-digit phone number.";
					$valid = $this->validatePhone($this->fields[$field]->data);
				break;
				case "zip":
					$errmsg = ($this->fields[$field]->errorMessage != "") ? $this->fields[$field]->errorMessage : "<em>".$this->fields[$field]->friendlyName."</em> must be a valid 5-digit zip code.";
					$valid = $this->validateZip($this->fields[$field]->data);
				break;
				case "posint":
					$errmsg = ($this->fields[$field]->errorMessage != "") ? $this->fields[$field]->errorMessage : "<em>".$this->fields[$field]->friendlyName."</em> must be a valid number greater than 0.";
					$valid = $this->validatePosInt($this->fields[$field]->data);
				break;
			}
			if (!$valid) {
				$this->fields[$field]->data = "";
				$this->fields[$field]->errorMessage = $errmsg;
				return false;
			} else {
				return true;
			}
		} else {
			return true;
		}
	}
	function smartStripSlashes($data) {
		if (get_magic_quotes_gpc()) {
			if (is_array($data)) {
				foreach ($data as &$value) {
					if (is_array($value)) {
						$value = $this->smartStripSlashes($value);
					} else {
						$value = stripslashes($value);
					}
				}
			} else {
				$data = stripslashes($data);
			}
		}
		return $data;
	}
}

?>
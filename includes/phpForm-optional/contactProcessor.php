<?php
include("class.contactform.php");
$form = new form;
$form->name = "form1";
$form->addToAddress("");
$form->subject = "";
	
$form->addField("name=name&friendlyName=Name&id=name&cssClass=textbox&type=textinput&initialValue=Name&required=true");
$form->addField("name=email&friendlyName=Email&id=email&cssClass=textbox&type=textinput&initialValue=Email&required=true&validateAs=email");
$form->addField("name=phone&friendlyName=Phone&id=phone&cssClass=textbox&type=textinput&initialValue=Phone");
$form->addField("name=comments&friendlyName=Additional Comments&id=comments&cssClass=textbox&type=textarea&initialValue=Additional Comments");

$form->run();
?>
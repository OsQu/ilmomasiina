<?php

require_once("classes/CsvFormater.php");
require_once("classes/Configurations.php");
require_once("classes/Page.php");
require_once("classes/SignupGadgets.php");
require_once("classes/Debugger.php");
require_once("classes/SignupGadget.php");
require_once("classes/CommonTools.php");

/* Implementations of the most critical classes */
$configurations = new Configurations();
$page				= new Page(2);
$debugger = new Debugger();
$database = new Database();

$signupId = $request->getSignupId();
$signupGadget = new SignupGadget($signupId);
$passwordFromUser = CommonTools::GET("password");

$password = $signupGadget->getPassword();

if ($passwordFromUser == null || $passwordFromUser != $password) {

    // Prints title and description
    $page->addContent("<h1>" . $signupGadget->getTitle() . "</h1>");
    $page->addContent("<i>" . $signupGadget->getDescription() . "</i>");

    $page->addContent("<h3>Anna salasana</h3>");
    $page->addContent("<form method=\"get\" action=\"" . $configurations->webRoot . "csvoutput/$signupId\">");
    $page->addContent("<p>Salasana:</p>");
    $page->addContent("<input type=\"password\" title=\"Kirjoita salasana\" name=\"password\" />");
    $page->addContent("<input type=\"submit\" value=\"OK\" /></form>");

    $page->printPage();
    
} else {
    header('Content-type: text/csv');
    header('Content-Disposition: attachment; filename="ilmo' . $signupId . '.csv"');
    print(CsvFormater::getAnswersInCsvFormat($signupGadget));
}
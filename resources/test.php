<?php
/*	SELECTS WHICH SCRIPTS TO RUN ACCORDING TO THE TIME, DAY OR DATE
	---------------------------------------------------------------
	The queries below will only call certain scripts at key times
	to make sure they are run the right number of times and at the
	right time of the day/week/month/year. */

//	Get the current day and time etc.
date_default_timezone_set('Asia/Kolkata');
$tc = date("His");	 // Time Check (tc) hhmmss
$hc = date("H");	 // Hour (24) Check (hc) hh
$mc = date("i");	 // Minute Check (mc) mm
$sc = date("s");	 // Second Check (sc) ss
$dc = date("Ymd");	 // Date Check (dc) yyyymmdd
$datec = date("j");	 // Date Check (datec) 1...
$dayc = date("l");	 // Daily/Weekly Check (dayc) Monday...
$monthc = date("F"); // Monthly Check (dayc) September...
$yearc = date("Y");	 // Yearly (yearc) 2016...

/*	RUN ONCE BETWEEN MIDNIGHT AND HALF PAST
	---------------------------------------
	These are once-a-day scripts that have a single activity to perform. */
   
if($tc >= "000000" && $tc < "005000") { // from 00:00:00 and before 00:03:30
	echo "hello";
	// check logins for duplicates
	//include("datpop.php");
}else{
	echo "failed";
}
// if($tc >= "000500" && $tc < "000830") { // from 00:05:00 and before 00:08:30
// 	// check for completed assessments
// 	include("data_entered.php");
// }
// if($tc >= "001000" && $tc < "001330") { // from 00:10:00 and before 00:13:30
// 	// check ...
// 	//include("");
// }
// if($tc >= "001500" && $tc < "001830") { // from 00:15:00 and before 00:18:30
// 	// check ...
// 	include("import_adminusers.php");
// }
// if($tc >= "002000" && $tc < "002330") { // from 00:20:00 and before 00:23:30
// 	// check date of planning proforma and send email to level 5...
// 	include("check_reminder_profroma.php"); 
// }
// if($tc >= "002500" && $tc < "002830") { // from 00:25:00 and before 00:28:30
// 	// calculate mean scores anbd store
// 	//include("mean_scores_year_updated.php");
// }
// /* TEMPORARY TEST RUN */
// if($tc >= "003000" && $tc < "003330") { // from 00:30:00 and before 00:33:30
// 	// calculate mean scores and store - now fully internationalised
// 	include("mean_scores_year_int.php");
// }
// if($tc >= "003500" && $tc < "004030") { // from 00:35:00 and before 00:40:30
// 	// calculate polar bias scores anbd store
// 	include("polarbias.php");
// 	include("polarbias_new.php");
// }
// if($tc >= "004500" && $tc < "005030") { // from 00:45:00 and before 00:50:30
// 	// calculate composite risk and store
// 	include("composite_risk.php");
// }

// /*	RUN 1ST DAY OF THE MONTH
// 	----------------
// 	This will run once a month on the first day from 02:00:00 and before 02:03:30. */

// if($datec == "1" && ($tc >= "020000" && $tc < "020330")) {
// 	// check ...
// 	include("clear_tmp_storage.php");
// }

// 	RUN DAILY/WEEKLY
// 	----------------
// 	This will run daily/weekly on the specified day(s) from 03:00:00 and before 03:03:30. 

// if($tc >= "030000" && $tc < "030330") {
// 	if($dayc == "Sunday") {
// 		// check ...
// 		//include("");
// 	}
// 	if($dayc == "Monday") {
// 		// check ...
// 		//include("");
// 	}
// 	if($dayc == "Tuesday") {
// 		// check ...
// 		//include("");
// 	}
// 	if($dayc == "Wednesday") {
// 		// check ...
// 		//include("");
// 	}
// 	if($dayc == "Thursday") {
// 		// check ...
// 		//include("");
// 	}
// 	if($dayc == "Friday") {
// 		// check for alert notification and send Email to level 5 users 
// 		include("alert_sendEmail.php");
// 	}
// 	if($dayc == "Saturday") {
// 		// check ...
// 		//include("");
// 	}
// }

// /*	RUN MONTHLY
// 	-----------
// 	This will run monthly on the specified month from 04:00:00 and before 04:03:30. */

// if($tc >= "040000" && $tc < "040330") {
// 	if($monthc == "January") {
// 		// check ...
// 		//include("");
// 	}
// 	if($monthc == "February") {
// 		// check ...
// 		//include("");
// 	}
// 	if($monthc == "March") {
// 		// check ...
// 		//include("");
// 	}
// 	if($monthc == "April") {
// 		// check ...
// 		//include("");
// 	}
// 	if($monthc == "May") {
// 		// check ...
// 		//include("");
// 	}
// 	if($monthc == "June") {
// 		// check ...
// 		//include("");
// 	}
// 	if($monthc == "July") {
// 		// check ...
// 		//include("");
// 	}
// 	if($monthc == "August") {
// 		// check ...
// 		//include("");
// 	}
// 	if($monthc == "September") {
// 		// check ...
// 		//include("");
// 	}
// 	if($monthc == "October") {
// 		// check ...
// 		//include("");
// 	}
// 	if($monthc == "November") {
// 		// check ...
// 		//include("");
// 	}
// 	if($monthc == "December") {
// 		// check ...
// 		//include("");
// 	}
// }
?>

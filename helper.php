<?php
    
function array_combine_($keys, $values)
{
    $result = array();
    foreach ($keys as $i => $k) {
        $result[$k][] = $values[$i];
    }
    array_walk($result, create_function('&$v', '$v = (count($v) == 1)? array_pop($v): $v;'));
    return    $result;
}

function isPayment($variable)
{
    $paymentMethods = array(
        'control_2co',
        'control_authnet',
        'control_bluepay',
        'control_bluesnap',
        'control_braintree',
        'control_cardconnect',
        'control_chargify',
        'control_clickbank',
        'control_dwolla',
        'control_echeck',
        'control_eway',
        'control_firstdata',
        'control_moneris',
        'control_onebip',
        'control_pagseguro',
        'control_payjunction',
        'control_payment',
        'control_paymentwall',
        'control_paysafe',
        'control_paypal',
        'control_paypalexpress',
        'control_paypalpro',
        'control_payu',
        'control_sofort',
        'control_square',
        'control_stripe',
        'control_wepay',
        'control_worldpay',
        'control_worldpayus',
        'control_skrill',
        'control_gocardless',
        'control_stripeACH',
        'control_stripeACHManual',
        'control_paypalSPB',
        'control_paypalinvoicing');

    if (in_array($variable, $paymentMethods)) {
        return $paymentMethods[array_search($variable, $paymentMethods)];
    } else {
        return false;
    }
}


function get_currency_symbol($cc = 'USD')
{
    $cc = strtoupper($cc);
    $currency = array(
    "USD" => "$" , //U.S. Dollar
    "AUD" => "$" , //Australian Dollar
    "BRL" => "R$" , //Brazilian Real
    "CAD" => "C$" , //Canadian Dollar
    "CZK" => "Kč" , //Czech Koruna
    "DKK" => "kr" , //Danish Krone
    "EUR" => "€" , //Euro
    "HKD" => "&#36" , //Hong Kong Dollar
    "HUF" => "Ft" , //Hungarian Forint
    "ILS" => "₪" , //Israeli New Sheqel
    "INR" => "₹", //Indian Rupee
    "JPY" => "¥" , //Japanese Yen
    "MYR" => "RM" , //Malaysian Ringgit
    "MXN" => "&#36" , //Mexican Peso
    "NOK" => "kr" , //Norwegian Krone
    "NZD" => "&#36" , //New Zealand Dollar
    "PHP" => "₱" , //Philippine Peso
    "PLN" => "zł" ,//Polish Zloty
    "GBP" => "£" , //Pound Sterling
    "SEK" => "kr" , //Swedish Krona
    "CHF" => "Fr" , //Swiss Franc
    "TWD" => "$" , //Taiwan New Dollar
    "THB" => "฿" , //Thai Baht
    "TRY" => "₺" //Turkish Lira
    );
        
    if (array_key_exists($cc, $currency)) {
        return $currency[$cc];
    }
}

function logo($logoName)
{
    switch ($logoName) {
        case '2co':
            return "href='https://www.2checkout.com/'";
            break;
        case 'authnet':
            return "href='https://www.authorize.net/'";
            break;
        case 'bluepay':
            return "href='https://www.bluepay.com/'";
            break;
        case 'bluesnap':
            return "href='https://home.bluesnap.com/'";
            break;
        case 'braintree':
            return "href='https://www.braintreepayments.com/'";
            break;
        case 'cardconnect':
            return "href='https://cardconnect.com/'";
            break;
        case 'chargify':
            return "href='https://www.chargify.com/'";
            break;
        case 'clickbank':
            return "href='https://www.clickbank.com/'";
            break;
        case 'dwolla':
            return "href='https://www.dwolla.com/'";
            break;
        /*  case 'echeck':
            return "href=''";
            break;  */
        case 'eway':
            return "href='https://www.eway.com.au/'";
            break;
        case 'firstdata':
            return "href='https://www.firstdata.com/content/icici/home.html'";
            break;
        case 'gocardless':
            return "href='https://gocardless.com/'";
            break;
        case 'moneris':
            return "href='https://www.moneris.com/'";
            break;
        case 'onebip':
            return "href='http://corporate.onebip.com/'";
            break;
        case 'pagseguro':
            return "href='https://pagseguro.uol.com.br/#rmcl'";
            break;
        case 'paymentwall':
            return "href='https://www.paymentwall.com/en'";
            break;
        case 'paysafe':
            return "href='https://www.paysafe.com/na-en/'";
            break;
        case 'paypal':
            return "href='https://www.paypal.com/sg/webapps/mpp/home'";
            break;
        case 'paypalexpress':
            return "href='https://www.paypal.com/ee/webapps/mpp/express-checkout'";
            break;
        case 'paypalpro':
            return "href='https://www.paypal.com/us/webapps/mpp/paypal-payments-pro'";
            break;
        case 'payu':
            return "href='https://www.payu.com.tr/en'";
            break;
        case 'sofort':
            return "href='https://www.sofort.com/integrationCenter-eng-DE/integration/psp/'";
            break;
        case 'square':
            return "href='https://squareup.com/us/en'";
            break;
        case 'stripe':
            return "href='https://stripe.com/'";
            break;
        case 'wepay':
            return "href='https://go.wepay.com/'";
            break;
        case 'worldpay':
            return "href='https://www.worldpay.com/'";
            break;
        case 'worldpayus':
            return "href='https://www.worldpay.com/us'";
            break;
        case 'skrill':
            return "href='https://www.skrill.com/tr/'";
            break;
        case 'stripeACH':
            return "href='https://stripe.com/docs/ach'";
            break;
        case 'stripeACHManual':
            return "href='https://stripe.com/docs/ach'";
            break;
        case 'paypalSPB':
            return "href='https://www.paypal.com/sg/webapps/mpp/home''";
            break;
        case 'paypalinvoicing':
            return "href='https://www.paypal.com/us/webapps/mpp/invoicing-templates'";
            break;
    }
}

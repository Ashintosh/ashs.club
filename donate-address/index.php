<?php
if (!isset($_POST['view-address']) || !isset($_POST['currency'])) { header("Location: https://ashs.club/"); exit; }

$currency_ticker = null;
$currency_name = null;
$currency_address = null;
$currency_qr_code = null;

$currencies = array(
    array("ticker" => "xmr", "name" => "Monero", "address" => "8AmobFbvRV51oRCMr7sgEZEbVFspg4ARDDE8DkQkvZsv167WnsnSN6eUJ5gfdh4qcfN8YGbHG9wYN4jveVpkMZrg7htyS8k"),
    array("ticker" => "wow", "name" => "Wownero", "address" => "WW31T6pJfgKeFEEJB4keN2FtVT7d8pJnuXWv7XkVH5bqahVeebvSumr4P5r5hJP2mqh5jCksFA5UeTkdRCDqnSGT2HbwWevnX"),
    array("ticker" => "zec", "name" => "ZCash", "address" => "zs13mncfs24cf02khy76k6ztraqxaftsrpqh26sdp6ddgqhk2ngdwnqx3slkan4ta7ag8stjesr2am"),
    array("ticker" => "ltc", "name" => "Litecoin", "address" => "LW12k9MYiYQw5iBvVR8uZK6M2BUejYcvsE"),
    array("ticker" => "btc", "name" => "Bitcoin", "address" => "bc1qu0dtzf0aqnqe6zqksx6wnt2f7s8nkv4t9sfr8g"),
    array("ticker" => "eth", "name" => "Ethereum", "address" => "0xbeffdF94F436d6F8b186a7Eadb80297b6692c6De")
);

foreach ($currencies as $currency) {
    if ($_POST["currency"] == $currency["ticker"]) {
        $currency_ticker = strtoupper($currency["ticker"]);
        $currency_name = $currency["name"];
        $currency_address = $currency["address"];
        $currency_qr_code = $currency["ticker"] . "-qr.png";
    }
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Ash's Club - Donate</title>

        <meta charset="UTF-8">
        <meta name="description" content="I host privacy respecting online services and develop open-source software and libraries that are free to use for everyone. Here you can find the different services that are available.">
        <meta name="keywords" content="AshClub, Monero, Anonymous, Security">
        <meta name="author" content="Ash's Club">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="icon" type="image/x-icon" href="../static/img/favicon.ico">
    
        <!-- Styles -->
        <link rel="stylesheet" type="text/css" href="../static/css/styles.css">

        <!-- Fonts -->
        <link rel="stylesheet" type="text/css" href="../static/css/fonts.css">
    </head>
    <body>
        <div class="center-container">
            <div class="header">
                <div class="logo">
                    <img src="../static/img/logo.png" alt="Ash's Club">
                </div>
                <div class="nav">
                    <ul>
                        <li><a href="../">Home</a></li>
                        <li><a href="https://drive.ashs.club/" target="_blank">Drive</a></li>
                        <li><a href="../searxng/">SearXNG</a></li>
                        <li><a href="../xmrnode/">XMR Node</a></li>
                        <li><a href="../projects/">Projects</a></li>
                        <li><a href="../contact/">Contact</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="content">
            <div class="page">
                <div class="home">
                    <div class="page-header">
                        <h2><?php echo($currency_name ." (". $currency_ticker .")"); ?> Donation Address</h2>
                    </div>
                    <div class="page-content">
                        <p>
                            Any funds sent to this wallet will be used to help develop Ash's Club and 
                            provide more services to the community.
                        </p>
                    </div>
                </div>
                <hr>
                <div class="center-container">
                    <div class="crypto-address">
                        <textarea name="" id="" cols="80" rows="8" disabled><?php echo($currency_address); ?></textarea>
                    </div>
                    <div class="qr-code">
                        <img src="../static/img/crypto-qr/<?php echo($currency_qr_code); ?>" alt="QR Code">
                    </div>
                </div>
            </div>
        </div>
        <div class="footer">
            <ul>
                <li><a href="../legal/privacy-policy/" target="_blank">Privacy Policy</a></li>
                <li><a href="https://github.com/Ashintosh/ashs.club" target="_blank">Source</a></li>
                <li><a href="../pgp.txt" target="_blank">PGP</a></li>
            </ul>
        </div>
    </body>
</html>
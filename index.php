<?php
require 'vendor/autoload.php';
include("config.php");

$session = new SpotifyWebAPI\Session(
    Config::CLIENT_ID,
    Config::CLIENT_SECRET
);


$api = new SpotifyWebAPI\SpotifyWebAPI();
    $session->refreshAccessToken(Config::REFRESH_TOKEN);

    $accessToken = $session->getAccessToken();
    $refreshToken = $session->getRefreshToken();

    $api->setAccessToken($accessToken);

    $objects = $api->getMyCurrentPlaybackInfo();

    $title = $objects->item->name;
    $artistName = "";
    $imagearray = $objects->item->album->images;
    $device = $objects->device->name;
	$playbackURL = $objects->item->uri;

    $a = 0;
    foreach($imagearray as $images) {
        if($a === 0) {
            $image = $images->url;
        }
        $a++;
    }

    $numItems = count($objects->item->artists);
    $i = 1;
    foreach($objects->item->artists AS $artist) {
        if($i === $numItems) {
            $artistName .= $artist->name;
        } else {
			$artistName .= $artist->name.", ";
        }
        $i++;
    }
?>


<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="assets/css/main.css">
    <script type='text/javascript' src='assets/js/jquery.particleground.min.js'></script>
    <script type='text/javascript' src='assets/js/main.js'></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" type="text/css">
</head>

<?php if(isset($title) && $title != null) { ?>
<style> body { background-image: linear-gradient(to bottom, rgba(0, 0, 0, 0.8) 0%, rgba(0, 0, 0, 0.8) 100%), url("<?php echo $image ?>"); background-repeat: no-repeat; background-attachment: fixed; background-size: cover; } </style>
<?php } ?>

<body>
    <div id="particles">
        <div class="centered" id="intro">
            <h1>zion.software</h1>
            <h2>developer, security researcher, gay.</h2>
            <?php 
            if(isset($title) && $title != null) {
            ?>
            <h3><a href='<?php echo $playbackURL ?>' style="color:#FFFFFF; text-decoration:none;">Ich höre gerade: <?php echo $title." - ".$artistName.", auf: ".$device?></h3>
            <?php 
            }
            ?>
            <hr style="width: 50%; background-color: #91bae1; border-color: #91bae1;">

            <a href="https://github.com/ProZion24" style="color: white;"><i class="fab fa-github" style="font-size: 2em;" alt="Github Profil öffnen"></i></a>
            &nbsp
            <a href="https://instagram.com/ProZion24/" style="color: white;"><i class="fab fa-instagram" style="font-size: 2em;" alt="Instagram Profil öffnen"></i></a>
            &nbsp
            <a href="https://twitter.com/ProZion24/" style="color: white;"><i class="fab fa-twitter" style="font-size: 2em;" alt="Twitter Profil öffnen"></i></a>
            &nbsp
            <a href="https://cloud.zion.software/" style="color: white;"><i class="fa fa-cloud" style="font-size: 2em;" alt="Twitter Profil öffnen"></i></a>&nbsp
        </div>
    </div>
</body>

</html>
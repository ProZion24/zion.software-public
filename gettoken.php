<?php 
require 'vendor/autoload.php';
include("config.php");

$session = new SpotifyWebAPI\Session(
    Config::CLIENT_ID,
    Config::CLIENT_SECRET,
    Config::REDIRECT_URI
);

$options = [
    'scope' => [
        'ugc-image-upload',
        'user-read-recently-played',
        'user-top-read',
        'user-read-playback-position',
        'user-read-playback-state',
        'user-modify-playback-state',
        'user-read-currently-playing',
        'app-remote-control',
        'streaming',
        'playlist-modify-public',
        'playlist-modify-private',
        'playlist-read-private',
        'playlist-read-collaborative',
        'user-follow-modify',
        'user-follow-read',
        'user-library-modify',
        'user-library-read',
        'user-read-email',
        'user-read-private',
    ],
];

if(isset($_GET['code']) && $_GET['code'] != null) {
    $session->requestAccessToken($_GET['code']);
    $refreshToken = $session->getRefreshToken();
} else {
    header('Location: ' . $session->getAuthorizeUrl($options));
    die();
}
?>

<html>
    <body>
        <h1>Kopiere den folgenden Code in "REFRESH_TOKEN" in die Config.php. Bitte gehe mit diesem Code extrem sorgfältig um, da dieser dem Besitzer annährend vollen Zugang auf deinen Account gewährt!</h1>
        <h2><?php echo htmlspecialchars($refreshToken); ?></h2>
    </body>
</html>
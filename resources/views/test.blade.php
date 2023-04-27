<?php
    require_once('vendor/autoload.php');
    $session = new SpotifyWebAPI\Session(
        '55ec22eb76d34ac6aa01fb62e16f32a3',
        '09f3ead60cb349a68eaa49223ed81582'
    );
    $api = new SpotifyWebAPI\SpotifyWebAPI();
    $session->requestCredentialsToken();
    $accessToken = $session->getAccessToken();
    $api->setAccessToken($accessToken);

    $result = $api->search('Retrovision', 'artist');

?>

<pre>
    <?php print_r($result) ?>
</pre>
<?php
/**
 * @var \App\View\AppView $this
 */
$this->assign('title', __('API Desarrolladores'));
$this->assign('description', '');
$this->assign('content_title', __('API Desarrolladores'));
?>

<div class="box box-primary">
    <div class="box-body">

        <div class="callout callout-success">
            <h4><?= __('Your API token:') ?></h4>
            <p>
            <pre><?= $logged_user->api_token ?></pre>
            </p>
        </div>

        <p><?= __(
                'For developers {0} prepared <b>API</b> which returns responses in <b>JSON</b> or ' .
                '<b>TEXT</b> formats. ',
                get_option('site_name')
            ) ?></p>

        <p><?= __('Currently there is one method which can be used to shorten links on behalf of your account.') ?></p>

        <p><?= __('All you have to do is to send a <b>GET</b> request with your API token and URL Like the ' .
                'following:') ?></p>

        <div class="well">
            <?= $this->Url->build('/', true); ?>api?api=<b><?= $logged_user->api_token ?></b>&url=<b><?= urlencode('yourdestinationlink.com') ?></b>&alias=<b>CustomAlias</b>
        </div>

        <p><?= __('Obtendrá una respuesta JSON como la siguiente') ?></p>

        <div class="well">
            {"status":"success","shortenedUrl":"<?= json_encode($this->Url->build('/', true) . 'xxxxx') ?>"}
        </div>

        <p><?= __('Si desea una respuesta de TEXTO simplemente agregue <b>&format=text</b> al final de su solicitud como ' .
                'el siguiente ejemplo. Esto devolverá solo el enlace corto. Tenga en cuenta que si se produce un error, no ' .
                'salida de cualquier cosa.') ?></p>

        <div class="well">
            <?= $this->Url->build('/', true); ?>api?api=<b><?= $logged_user->api_token ?></b>&url=<b><?= urlencode('yourdestinationlink.com') ?></b>&alias=<b>CustomAlias</b>&format=<b>text</b>
        </div>

        <?php
        $allowed_ads = get_allowed_ads();
        unset($allowed_ads[get_option('member_default_advert', 1)]);
        ?>

        <?php if (array_key_exists(1, $allowed_ads)) : ?>
            <p><?= __("If you want to use developers API with the interstitial advertising add the below code " .
                    "to the end of the URL") ?></p>
            <pre>&type=1</pre>
        <?php endif; ?>

        <?php if (array_key_exists(2, $allowed_ads)) : ?>
            <p><?= __("If you want to use developers API with the banner advertising add the below code to " .
                    "the end of the URL") ?></p>
            <pre>&type=2</pre>
        <?php endif; ?>

        <?php if (array_key_exists(0, $allowed_ads)) : ?>
            <p><?= __("If you want to use developers API without advertising add the below code to the end " .
                    "of the URL") ?></p>
            <pre>&type=0</pre>
        <?php endif; ?>

        <div class="alert alert-info">
            <h4><i class="icon fa fa-info"></i> <?= __("Note") ?></h4>
            <?= __("api y url son campos obligatorios y los otros campos como alias, formato y tipo son opcionales.") ?>
        </div>

        <p><?= __("That's it :)") ?></p>

        <h3><?= __("Usando el API en PHP") ?></h3>

        <p><?= __("Para usar la API en su aplicación PHP, debe enviar una solicitud GET a través de " .
                "file_get_contents o cURL. Por favor, consulte los ejemplos de ejemplo a continuación utilizando file_get_contents") ?></p>

        <p><?= __("Usando respuestas JSON ") ?></p>

        <div class="well">
            $long_url = urlencode('yourdestinationlink.com');<br>
            $api_token = '<?= $logged_user->api_token ?>';<br>
            $api_url = "<?= $this->Url->build('/', true); ?>api?api=<b>{$api_token}</b>&url=<b>{$long_url}</b>&alias=<b>CustomAlias</b>";<br>
            $result = @json_decode(file_get_contents($api_url),TRUE);<br>
            if($result["status"] === 'error') {<br>
            &emsp;echo $result["message"];<br>
            } else {<br>
            &emsp;echo $result["shortenedUrl"];<br>
            }
        </div>

        <p><?= __("Usando una respuesta con un texto plano") ?></p>

        <div class="well">
            $long_url = urlencode('yourdestinationlink.com');<br>
            $api_token = '<?= $logged_user->api_token ?>';<br>
            $api_url = "<?= $this->Url->build('/', true); ?>api?api=<b>{$api_token}</b>&url=<b>{$long_url}</b>&alias=<b>CustomAlias</b>&format=<b>text</b>";<br>
            $result = @file_get_contents($api_url);<br>
            if( $result ){<br>
            &emsp;echo $result;<br>
            }
        </div>

    </div>
</div>

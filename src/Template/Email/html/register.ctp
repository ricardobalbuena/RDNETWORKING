<?php
/**
 * @var \App\View\AppView $this
 */
?>
<p><?= __('Hola') ?> <b><?php echo $username; ?></b>,</p>

<p><?= __('Gracias por registrarse en {0}. Su cuenta está creada y debe activarse antes de poder usarla.',
        h(get_option('site_name'))) ?></p>

<p><?= __('Para activar la cuenta, haga clic en el siguiente enlace o cópielo y péguelo en su navegador:') ?></p>

<p>
    <a href="<?php echo $this->Url->build('/',
        true); ?>auth/users/activate-account/<?php echo $username; ?>/<?php echo $activation_key; ?>"><?php echo $this->Url->build('/',
            true); ?>auth/users/activate_account/<?php echo $username; ?>/<?php echo $activation_key; ?></a>
</p>

<p>
    <?= __('Gracias,') ?><br>
    <?= h(get_option('site_name')) ?>
</p>

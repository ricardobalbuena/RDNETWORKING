<?php
/**
 * @var \App\View\AppView $this
 */
?>
<p><?= __('Hola') ?> <b><?php echo $username; ?></b>,</p>

<p><?= __('Para cambiar su correo electrónico, haga clic en el siguiente enlace o cópielo y péguelo en su navegador:') ?></p>

<p>
    <a href="<?php echo $this->Url->build('/',
        true); ?>member/users/change-email/<?php echo $username; ?>/<?php echo $activation_key; ?>"><?php echo $this->Url->build('/',
            true); ?>member/users/change-email/<?php echo $username; ?>/<?php echo $activation_key; ?></a>
</p>

<p>
    <?= __('Gracias,') ?><br>
    <?= h(get_option('site_name')) ?>
</p>

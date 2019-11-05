<?php
/**
 * @var \App\View\AppView $this
 */
?>
<p><?= __('Hola') ?> <b><?php echo $username; ?></b>,</p>

<p><?= __('Alguien solicitó que se restablezca la contraseña para la siguiente cuenta:') ?></p>

<p><?php echo $this->Url->build('/', true); ?></p>

<p><?= __('Si esto fue un error, simplemente ignore este correo electrónico y no pasará nada.') ?></p>

<p><?= __('Para restablecer su contraseña, haga clic en el siguiente enlace o cópiela y péguela en su navegador:') ?></p>

<p>
    <a href="<?php echo $this->Url->build('/',
        true); ?>auth/users/forgot-password/<?php echo $username; ?>/<?php echo $activation_key; ?>"><?php echo $this->Url->build('/',
            true); ?>auth/users/forgot-password/<?php echo $username; ?>/<?php echo $activation_key; ?></a>
</p>

<p>
    <?= __('Gracias,') ?><br>
    <?= h(get_option('site_name')) ?>
</p>

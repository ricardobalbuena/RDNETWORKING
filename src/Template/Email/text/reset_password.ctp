<?php
/**
 * @var \App\View\AppView $this
 */
?>
<?= __('Hola') ?> <?php echo $username; ?>,


<?= __('Alguien solicitó que se restablezca la contraseña para la siguiente cuenta:') ?>


<?php echo $this->Url->build('/', true); ?>


<?= __('Si esto fue un error, simplemente ignore este correo electrónico y no pasará nada.') ?>


<?= __('Para restablecer su contraseña, haga clic en el siguiente enlace o cópiela y péguela en su navegador:') ?>


<?php echo $this->Url->build('/', true); ?>auth/users/forgot-password/<?php echo $username; ?>/<?php echo $activation_key; ?>


<?= __('Gracias,') ?>

<?= h(get_option('site_name')) ?>

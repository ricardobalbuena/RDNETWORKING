<?php
/**
 * @var \App\View\AppView $this
 */
?>
<?= __('Hola') ?> <?php echo $username; ?>,

<?= __('Para cambiar su correo electrónico, haga clic en el siguiente enlace o cópielo y péguelo en su navegador:') ?>


<?php echo $this->Url->build('/', true); ?>member/users/change-email/<?php echo $username; ?>/<?php echo $activation_key; ?>


<?= __('Gracias,') ?>

<?= h(get_option('site_name')) ?>

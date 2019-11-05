<?php
/**
 * @var \App\View\AppView $this
 */
?>
<?= __('Hola') ?> <?php echo $username; ?>,

<?= __('Gracias por registrarse en {0}. Su cuenta está creada y debe activarse antes de poder usarla.',
        h(get_option('site_name'))) ?>


<p><?= __('Para activar la cuenta, haga clic en el siguiente enlace o cópielo y péguelo en su navegador:') ?></p>


<?php echo $this->Url->build('/', true); ?>auth/users/activate_account/<?php echo $username; ?>/<?php echo $activation_key; ?>


<?= __('Gracias,') ?>

<?= h(get_option('site_name')) ?>

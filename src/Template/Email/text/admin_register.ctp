<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<?= __('Hola') ?>,

<?= __('Tienes un nuevo registro de usuario') ?>

<?= __('Id de usuario') ?>: <?= $user->id ?>

<?= __('Usuario') ?>: <?= $user->username ?>

<?= __('Email') ?>: <?= $user->email ?>


<?= __('Gracias,') ?>

<?= h(get_option('site_name')) ?>

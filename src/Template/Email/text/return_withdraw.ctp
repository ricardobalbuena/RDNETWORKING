<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Withdraw $withdraw
 * @var \App\Model\Entity\User $user
 */
?>

<?= __('Hola') ?> <?= $user->username ?>,


<?= __('Su solicitud de retiro # {0} ha sido devuelta a su cuenta.', $withdraw->id) ?>


<?= __('Gracias,') ?>
<?= h(get_option('site_name')) ?>

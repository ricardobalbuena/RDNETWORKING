<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Withdraw $withdraw
 * @var \App\Model\Entity\User $user
 */
?>
<?= __('Hello') ?>,


<?= __('Se ha solicitado un nuevo retiro con los siguientes detalles:') ?>


<?= __('Id de retiro') ?>: <?= $withdraw->id ?>

<?= __('Usuario') ?>: <?= $user->username ?>

<?= __('Ganancias del editor') ?>: <?= display_price_currency($withdraw->publisher_earnings); ?>

<?= __('Ganancias de referidos') ?>: <?= display_price_currency($withdraw->referral_earnings); ?>

<?= __('Monto Total') ?>: <?= display_price_currency($withdraw->amount); ?>

<?= __('Metodo') ?>: <?= (isset($withdrawal_methods[$withdraw->method])) ?
    $withdrawal_methods[$withdraw->method] : $withdraw->method ?>

<?= __('Cuenta') ?>: <?= nl2br(h($withdraw->account)) ?>


<?= __('Gracias,') ?>

<?= h(get_option('site_name')) ?>

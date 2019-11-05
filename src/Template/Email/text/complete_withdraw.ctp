<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Withdraw $withdraw
 * @var \App\Model\Entity\User $user
 */
$withdrawal_methods = array_column_polyfill(get_withdrawal_methods(), 'name', 'id');

$method = (isset($withdrawal_methods[$withdraw->method])) ?
    $withdrawal_methods[$withdraw->method] : $withdraw->method;

$amount = display_price_currency($withdraw->amount);
?>

<?= __('Hola') ?> <?= $user->username ?>,


<?= __('Acabamos de procesar su solicitud de retiro # {0} para {1} a través de {2}', $withdraw->id, $amount, $method) ?>


<?= __('Disfrute su pago!') ?>


<?= __('Gracias,') ?>
<?= h(get_option('site_name')) ?>

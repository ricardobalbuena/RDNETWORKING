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

<p><?= __('Hola') ?> <?= $user->username ?>,</p>

<p><?= __('Acabamos de procesar su solicitud de retiro # {0} para {1} a través de {2}', $withdraw->id, $amount, $method) ?></p>

<p><?= __('Disfrute su pago!') ?>

<p>
    <?= __('Gracias,') ?><br>
    <?= h(get_option('site_name')) ?>
</p>

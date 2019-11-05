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


<?= __('Su solicitud de retiro # {0} ha sido aprobada por la cantidad {1} y será enviada a través de {2}',
    $withdraw->id, $amount, $method) ?>


<?= __('Su solicitud será procesada como parte de nuestro horario normal. ' .
    'Recibirá un correo electrónico cuando su retiro haya sido procesado.') ?>


<?= __('Gracias,') ?>
<?= h(get_option('site_name')) ?>

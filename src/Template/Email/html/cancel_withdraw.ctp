<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Withdraw $withdraw
 * @var \App\Model\Entity\User $user
 */
?>

<p><?= __('Hola') ?> <?= $user->username ?>,</p>

<p><?= __('Su solicitud de retiro # {0} ha sido cancelada.', $withdraw->id) ?></p>

<p>
    <?= __('Gracias,') ?><br>
    <?= h(get_option('site_name')) ?>
</p>

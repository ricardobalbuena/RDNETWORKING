<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Invoice $invoice
 * @var \App\Model\Entity\User $user
 */
?>
<p><?= __('Hola') ?>,</p>

<p><?= __('La factura {0} se ha pagado con los siguientes detalles:', $invoice->id) ?></p>

<p><?= __('Usuario') ?>: <?= $user->username ?></p>
<p><?= __('Id facturacion') ?>: <?= $invoice->id ?></p>
<p><?= __('Descripcion') ?>: <?= $invoice->description ?></p>
<p><?= __('Monto') ?>: <?= display_price_currency($invoice->amount); ?></p>

<p>
    <a href="<?php echo $this->Url->build('/',
        true); ?>admin/invoices/view/<?= $invoice->id; ?>"><?= $this->Url->build('/', true); ?>admin/invoices/view/<?= $invoice->id; ?></a>
</p>

<p>
    <?= __('Gracias,') ?><br>
    <?= h(get_option('site_name')) ?>
</p>

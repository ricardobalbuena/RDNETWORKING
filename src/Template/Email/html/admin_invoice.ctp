<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 * @var \App\Model\Entity\Invoice $invoice
 */
?>
<p><?= __('Hola') ?>,</p>

<p><?= __('Se ha creado una nueva factura con los siguientes detalles.:') ?></p>

<p><?= __('Nombre de usuario') ?>: <?= $user->username ?></p>
<p><?= __('Id de facturacion') ?>: <?= $invoice->id ?></p>
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

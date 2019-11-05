<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 * @var \App\Model\Entity\Invoice $invoice
 */
?>
<?= __('Hola') ?>,

<?= __('Se ha creado una nueva factura con los siguientes detalles:') ?>

<?= __('Usuario') ?>: <?= $user->username ?>

<?= __('Id de facturacion') ?>: <?= $invoice->id ?>

<?= __('Descripcion') ?>: <?= $invoice->description ?>

<?= __('Monto') ?>: <?= display_price_currency($invoice->amount); ?>


<?= $this->Url->build('/', true); ?>admin/invoices/view/<?= $invoice->id; ?>


<?= __('Gracias,') ?>

<?= h(get_option('site_name')) ?>

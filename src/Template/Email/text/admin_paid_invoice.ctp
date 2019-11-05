<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Invoice $invoice
 * @var \App\Model\Entity\User $user
 */
?>
<?= __('Hola') ?>,

<?= __('La factura {0} se ha pagado con los siguientes detalles:', $invoice->id) ?>

<?= __('Usuario') ?>: <?= $user->username ?>

<?= __('Id de facturacion') ?>: <?= $invoice->id ?>

<?= __('Descripcion') ?>: <?= $invoice->description ?>

<?= __('Monto') ?>: <?= display_price_currency($invoice->amount); ?>


<?= $this->Url->build('/', true); ?>admin/invoices/view/<?= $invoice->id; ?>


<?= __('Gracias,') ?>

<?= h(get_option('site_name')) ?>

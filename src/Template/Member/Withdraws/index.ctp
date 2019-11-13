<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Withdraw[]|\Cake\Collection\CollectionInterface $withdraws
 * @var \App\Model\Entity\User $user
 */
$this->assign('title', __('Withdraw Funds'));
$this->assign('description', '');
$this->assign('content_title', __('Withdraw Funds'));
?>

<?php
$statuses = [
    1 => __('Approved'),
    2 => __('Pending'),
    3 => __('Complete'),
    4 => __('Cancelled'),
    5 => __('Returned'),
];

$withdrawal_methods = array_column_polyfill(get_withdrawal_methods(), 'name', 'id');
?>

<div class="row">
    <div class="col-sm-4">
        <div class="small-box bg-aqua">
            <div class="inner">
                <h3><?= display_price_currency($user->publisher_earnings + $user->referral_earnings); ?></h3>
                <p><?= __('Available Balance') ?></p>
            </div>
            <div class="icon"><i class="fa fa-money"></i></div>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="small-box bg-red">
            <div class="inner">
                <h3><?= display_price_currency($pending_withdrawn); ?></h3>
                <p><?= __('Pending Withdrawn') ?></p>
            </div>
            <div class="icon"><i class="fa fa-share"></i></div>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="small-box bg-green">
            <div class="inner">
                <h3><?= display_price_currency($total_withdrawn); ?></h3>
                <p><?= __('Retiro Total') ?></p>
            </div>
            <div class="icon"><i class="fa fa-usd"></i></div>
        </div>
    </div>
</div>


<div class="box box-primary">
    <div class="box-body">
        <?php if ((bool)get_option('enable_withdraw', 1)) : ?>
            <div class="text-center">
                <?= $this->Form->postLink(
                    __('Retirar'),
                    ['action' => 'request'],
                    ['confirm' => __('Are you sure?'), 'class' => 'btn btn-success btn-lg']
                ); ?>
            </div>

            <hr>

            <p>
                <?= __(
                    "Cuando su cuenta alcanze el monto mínimo o más, puede solicitar sus " .
                    "ganancias haciendo clic en el botón de arriba(Retirar). El pago se envía a su cuenta de retiro durante " .
                    "días hábiles no más de {0} días después de solicitar. Por favor no nos contacte con respecto a " .
                    "pagos antes de las fechas de vencimiento.", get_option('withdraw_days', 4)
                ) ?>
            </p>

            <p>
                <?= __(
                    'Para recibir sus pagos, debe completar su método de pago e identificación de pago ' .
                    '<a href="{0}">aquí</a> si no lo has hecho. También se le solicita que complete todos los campos ' .
                    'requeridos en la sección Detalles de la cuenta con datos precisos.',
                    $this->Url->build(['controller' => 'Users', 'action' => 'profile', 'prefix' => 'member'])
                ) ?>
            </p>

            <hr>
        <?php endif; ?>

        <div class="table-responsive">
            <table class="table table-hover table-striped">
                <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id', __('ID')) ?></th>
                    <th><?= $this->Paginator->sort('created', __('Date')) ?></th>
                    <th><?= __('Status') ?></th>
                    <th><?= $this->Paginator->sort('publisher_earnings', __('Publisher Earnings')) ?></th>
                    <?php if ((bool)get_option('enable_referrals', 1)) : ?>
                        <th><?= $this->Paginator->sort('referral_earnings', __('Referral Earnings')) ?></th>
                    <?php endif; ?>
                    <th><?= __('Total Amount') ?></th>
                    <th><?= __('Withdrawal Method') ?></th>
                    <th><?= __('Cuenta de Retiro') ?></th>
                </tr>
                </thead>
                <?php foreach ($withdraws as $withdraw) : ?>
                    <tr>
                        <td><?= $withdraw->id ?></td>
                        <td><?= display_date_timezone($withdraw->created); ?></td>
                        <td><?= $statuses[$withdraw->status] ?></td>
                        <td><?= display_price_currency($withdraw->publisher_earnings); ?></td>
                        <?php if ((bool)get_option('enable_referrals', 1)) : ?>
                            <td><?= display_price_currency($withdraw->referral_earnings); ?></td>
                        <?php endif; ?>
                        <td><?= display_price_currency($withdraw->amount); ?></td>
                        <td><?= (isset($withdrawal_methods[$withdraw->method])) ?
                                $withdrawal_methods[$withdraw->method] : $withdraw->method ?></td>
                        <td><?= nl2br(h($withdraw->account)); ?></td>
                    </tr>
                <?php endforeach; ?>
                <?php unset($withdraw); ?>
            </table>
        </div>

        <hr>

        <ul>
            <li><?= __("Pending: The payment is being checked by our team.") ?></li>
            <li><?= __("Approved: The payment has been approved and is waiting to be sent.") ?></li>
            <li><?= __("Completo: el pago se ha enviado correctamente a su cuenta de pago.") ?></li>
            <li><?= __("Cancelado: el pago ha sido cancelado.") ?></li>
            <li><?= __("Devuelto: el pago ha sido devuelto a su cuenta.") ?></li>
        </ul>
    </div><!-- /.box-body -->
</div>

<ul class="pagination">
    <?php
    $this->Paginator->setTemplates([
        'ellipsis' => '<li><a href="javascript: void(0)">...</a></li>',
    ]);

    if ($this->Paginator->hasPrev()) {
        echo $this->Paginator->prev('«');
    }

    echo $this->Paginator->numbers([
        'modulus' => 4,
        'first' => 2,
        'last' => 2,
    ]);

    if ($this->Paginator->hasNext()) {
        echo $this->Paginator->next('»');
    }
    ?>
</ul>

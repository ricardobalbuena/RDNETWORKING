<?php
/**
 * @var \App\View\AppView $this
  * @var \App\Form\ContactForm $contact
 */
$this->assign('title', __('Reporta tus referidos'));
$this->assign('description', '');
$this->assign('content_title', __('Reporta tus referidos'));
?>


<div class="box box-primary">
    <div class="box-body">

        <p>
            <?= __('En esta seccion podras reportar a los referidos para que se te acredite el bono de 3 dolares por cada referido. Es necesario llenar el siguiente formulario para que se acredite, este proceso puede tardar entre 1-2 dias laborables.') ?>
        </p>
        <?= $this->Form->create($contact); ?>

        <?=
        $this->Form->control('name', [
            'label' => __('Usuario del Referido'),
            'class' => 'form-control',
            'type' => 'text'
        ]);
        ?>

        <?=
        $this->Form->control('subject', [
            'label' => __('Asunto (Escribir "Acreditacion")'),
            'class' => 'form-control',
            'type' => 'text'
        ]);
        ?>

        <?=
        $this->Form->control('email', [
            'label' => __('Email'),
            'class' => 'form-control',
            'type' => 'email'
        ]);
        ?>

        <?=
        $this->Form->control('message', [
            'label' => __('Mensaje (incluir numero de factura y nombre de referidor formato [no.Factura][nombre del que refirio])'),
            'class' => 'form-control',
            'type' => 'textarea'
        ]);
        ?>

        <div class="form-group">
            <?= $this->Form->control('accept', [
                'type' => 'checkbox',
                'label' => "<b>" . __(
                        "Doy mi consentimiento para recopilar mi nombre y correo electrónico. Para más detalles consulte nuestra {0}.",
                        "<a href='" . $this->Url->build('/') . 'pages/privacy' . "' target='_blank'>" .
                        __('Privacy Policy') . "</a>"
                    ) . "</b>",
                'escape' => false
            ]) ?>
        </div>

        <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-primary']); ?>

        <?= $this->Form->end(); ?>

    </div>
</div>

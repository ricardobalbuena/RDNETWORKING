<?php
/**
 * @var \App\View\AppView $this
 */
$this->assign('title', __('Marketing'));
$this->assign('description', '');
$this->assign('content_title', __('Marketing'));

?>

<div class="box box-primary">
    <div class="box-body">

        <p>
            <?= __('Enlaces cortos más fácilmente. Haga clic y arrastre el siguiente enlace a su barra de herramientas de enlaces.') ?>
        </p>

        <p>
            <a class="btn btn-default"
               href='javascript:(function () {var a = window, b = document, c = encodeURIComponent, d = a.open("<?= $this->Url->build('/', true); ?>bookmarklet/?api=<?= $logged_user->api_token ?>&url=" + c(b.location), "bookmarklet_popup", "left=" + ((a.screenX || a.screenLeft) + 10) + ",top=" + ((a.screenY || a.screenTop) + 10) + ",height=510px,width=550px,resizable=1,alwaysRaised=1");a.setTimeout(function () {d.focus()}, 300)})()'>
                <?= __("Acortar!") ?>
            </a>
        </p>

        <p>
            <?= __("Una vez que esté en su barra de herramientas, podrá hacer un enlace corto con solo hacer clic en un botón.") ?>
        </p>

        <p>
            <?= __("Esto es compatible con la mayoría de los navegadores web y plataformas siempre que sus marcadores o " .
                "los favoritos permiten javascript. La barra de herramientas de enlaces puede no estar visible en todas las configuraciones y en la mayoría " .
                "navegadores, puede habilitarlo en el menú Ver-> Barras de herramientas de su navegador web. También puedes ponerlo en " .
                "sus marcadores en lugar de la barra de herramientas de enlaces.") ?>
        </p>

    </div>
</div>

<?php
/**
 * @var \App\View\AppView $this
 */
$this->assign('title', __('Videos'));
$this->assign('description', '');
$this->assign('content_title', __('Videos'));

?>

<div class="box box-primary">
    <div class="box-body">

        <p>
            <?= __('Aqui estaran contenidos los videos de la plataforma.') ?>
        </p>

        <p>
          <iframe id="video1" width="520" height="360" src="http://www.youtube.com/embed/TJ2X4dFhAC0?enablejsapi" frameborder="0" allowtransparency="true" allowfullscreen></iframe>
          <a href="#" id="playvideo">Play video</a>


        </p>

        <p>
            <?= __("") ?>
        </p>

        <p>
            <?= __("") ?>
        </p>

    </div>
</div>

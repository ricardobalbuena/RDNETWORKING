<?php
/**
 * @var \App\View\AppView $this
 */
$this->assign('title', __('Script de pagina completa'));
$this->assign('description', '');
$this->assign('content_title', __('Script de pagina completa'));
?>

<div class="box box-primary">
    <div class="box-body">

        <p><?= __(
                "If you have a website with 100's or 1000's of links you want to change over to {0} " .
                "then please use the script below.",
                get_option('site_name')
            ) ?></p>

        <h3 class="page-header"><?= __('Generador de Script para pagina completa') ?></h3>

        <?= $this->Form->create(null, [
            'id' => 'full-page-script-generator',
        ]); ?>

        <?php
        $ads_options = get_allowed_ads();
        ?>

        <?php if (count($ads_options) > 1) : ?>
            <div class="row">
                <div class="col-sm-2">
                    <label><?= __('Advertising Type') ?></label>
                </div>
                <div class="col-sm-10">
                    <?= $this->Form->control('ad_type', [
                        'label' => false,
                        'options' => $ads_options,
                        'default' => get_option('member_default_advert', 1),
                        'class' => 'form-control',
                        'required' => true,
                    ]); ?>
                </div>
            </div>
        <?php else : ?>
            <?= $this->Form->hidden('ad_type', ['value' => get_option('member_default_advert', 1)]); ?>
        <?php endif; ?>

        <div class="row">
            <div class="col-sm-2">
                <label><?= __('Domains selection type') ?></label>
            </div>
            <div class="col-sm-10">
                <?=
                $this->Form->control('domains_type', [
                    'label' => false,
                    'options' => [
                        'include' => 'Include',
                        'exclude' => 'Exclude',
                    ],
                    'class' => 'form-control',
                    'required' => true,
                    'templateVars' => [
                        'help' => __(
                            'Incluir: use esta opción si desea acortar solo los enlaces de la siguiente lista de dominios.<br>' .
                            'Excluir: use esta opción si desea acortar todos los enlaces de su sitio web pero excluye solo los enlaces de ' .
                            'la siguiente lista de dominios.'
                        ),
                    ],
                ]);
                ?>
            </div>
        </div>

        <?=
        $this->Form->control('domains', [
            'label' => __('Domains'),
            'type' => 'textarea',
            'class' => 'form-control',
            'required' => true,
            'templateVars' => [
                'help' => __(
                        'Agregue cada dominio a un nuevo dominio. También se permiten dominios comodín. Por favor, consulte el siguiente ejemplo:'
                    ) . "<br>mega.nz<br>*.zippyshare.com<br>depositfiles.com",
            ],
        ]);
        ?>

        <p><?= __("Simplemente haga clic en el botón de abajo, luego copie y pegue el código generado a " .
                "continuación en su página web o blog y los enlaces se actualizarán automáticamente!") ?></p>

        <div class="form-group">
            <?= $this->Form->button(__('Generate'), ['class' => 'btn btn-primary']); ?>
        </div>

        <?= $this->Form->end(); ?>

        <?php
        $script_url = str_replace(['http://', 'https://'], ['//', '//'], $this->Url->build('/', true));
        ?>
        <textarea id="code_template" style="display: none;">
<script type="text/javascript">
    var app_url = '<?= $this->Url->build('/', true); ?>';
    var app_api_token = '<?= $logged_user->api_token ?>';
    var app_advert = {ad_type};
    var {app_domains} = {domains};
</script>
<script src='<?= $script_url; ?>js/full-page-script.js'></script>
</textarea>

        <pre id="generated_code"></pre>

    </div>
</div>

<?php $this->start('scriptBottom'); ?>
<style>
    #generated_code:empty {
        display: none;
    }
</style>
<script>
  $('#full-page-script-generator').on('change', function(e) {
    $('#generated_code').text('');
  });

  $('#full-page-script-generator').on('submit', function(e) {
    e.preventDefault();
    var formData = new FormData(e.target);

    var ad_type = formData.get('ad_type');
    var domains_type = formData.get('domains_type');
    var domains = formData.get('domains').split(/\n/);

    var generated_code = $('#code_template');

    var code = generated_code.val();

    code = code.replace('{ad_type}', ad_type);

    if (domains_type === 'include') {
      code = code.replace('{app_domains}', 'app_domains');
    } else {
      code = code.replace('{app_domains}', 'app_exclude_domains');
    }

    var domainsText = [];
    for (var i = 0; i < domains.length; i++) {
      // only push this line if it contains a non whitespace character.
      if (/\S/.test(domains[i])) {
        domainsText.push('"' + $.trim(domains[i]) + '"');
      }
    }

    code = code.replace('{domains}', '[' + domainsText + ']');

    $('#generated_code').text(code);

    //var form = $(this);
    //alert($('#ad-type').val());
  });
</script>
<?php $this->end(); ?>

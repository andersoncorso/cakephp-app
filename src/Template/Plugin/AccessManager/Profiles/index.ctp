<!-- page header --> 
<section class="content-header">
    <h1><?= __('Lista de Perfis de Usuários') ?>
        <div class="pull-right">
            <?= $this->Html->link('<span class="fa fa-plus"></span>&nbsp;&nbsp;'.__('Cadastrar'), ['action'=>'add', 'plugin'=>'AccessManager'], ['class'=>'btn btn-primary btn-xs', 'escape'=>false]) ?>
        </div>
    </h1>
</section>

<!-- page content -->
<section class="content">
    <div class="row">

        <div class="col-xs-12">
            <div class="box box-primary">
                <div class="box-body">
                    <?= $this->element('Table/profiles-index') ?>
                </div>
            </div>
        </div>

    </div>
</section>

<!-- Inline sctips -->
<?php
    $this->Html->css([
        '/plugins/AdminLTE/bower_components/datatables.net-bs/css/dataTables.bootstrap.min',
        '/plugins/dataTables/buttons.dataTables.min',
        '/plugins/dataTables/select.dataTables.min'
    ],
    ['block' => 'css_inline']);

    $this->Html->script([
        '/plugins/AdminLTE/bower_components/datatables.net/js/jquery.dataTables.min',
        '/plugins/AdminLTE/bower_components/datatables.net-bs/js/dataTables.bootstrap.min',
        '/plugins/dataTables/dataTables.buttons.min',
        '/plugins/dataTables/buttons.print.min',
        '/plugins/dataTables/jszip/jszip.min',
        '/plugins/dataTables/pdfmake/pdfmake.min',
        '/plugins/dataTables/pdfmake/vfs_fonts',
        '/plugins/dataTables/buttons.html5.min',
        '/plugins/dataTables/buttons.colVis.min.js',
        '/plugins/dataTables/dataTables.select.min.js',
        'datatable/datatable-index'
    ],
    ['block' => 'script_inline']);
?>
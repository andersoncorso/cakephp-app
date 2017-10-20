<!-- page header --> 
<section class="content-header">
    <h1><?= __('Cadastrar Grupo') ?></h1>
    <ol class="breadcrumb">
        <li>
            <?php 
                echo $this->Html->link('<i class="fa fa-angle-double-left"></i> '.__('Voltar'),
                    'javascript:window.history.back()',
                    ['escape' => false]
                );
            ?>
        </li>
    </ol>
</section>

<!-- page content -->
<section class="content">
    <div class="row">

        <div class="col-xs-12">
            <div class="box box-primary">
                <div class="box-body">
                    <?= $this->element('Forms/groups-add') ?>
                <div class="box-body">
            </div>
        </div>

    </div>
</section>
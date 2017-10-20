<!-- page header --> 
<section class="content-header">
    <h1><?= __('Lista de Grupos') ?>
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
                    <?= $this->element('Table/groups-index') ?>
                <div class="box-body">
            </div>
        </div>

    </div>
</section>

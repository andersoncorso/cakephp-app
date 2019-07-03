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

<!-- page header --> 
<section class="content-header">
    <h1>
        <?= __('Lista de grupos') ?>&nbsp;
        <div class="pull-right">
            <?php
                // Novo Assinante
                echo $this->Html->link('<span class="fa fa-plus"></span>&nbsp;&nbsp;'.__('Novo grupo'),
                    ['controller'=>'Groups', 'action'=>'add', 'plugin'=>'AccessManager'],
                    ['class'=>'btn btn-default', 'escape'=>false]
                );
            ?>
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
                </div>
            </div>
        </div>

    </div>
</section>

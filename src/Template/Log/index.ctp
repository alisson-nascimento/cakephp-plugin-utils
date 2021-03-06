<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>    
    <ol class="breadcrumb">
        <li><i class="fa fa-dashboard"></i></li>
        <li>Log Registros</li>
    </ol>
  </h1>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title"><?= __('Listagem de') ?> Log Registros</h3>
          <div class="box-tools">
            <form action="<?php echo $this->Url->build(); ?>" method="POST">
              <div class="input-group input-group-sm"  style="width: 180px;">
                <input type="text" name="search" class="form-control" placeholder="<?= __('Pesquisar...') ?>">
                <span class="input-group-btn">
                <button class="btn btn-info btn-flat" type="submit"><?= __('Filtrar') ?></button>
                </span>
              </div>
            </form>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body table-responsive no-padding">
          <table class="table table-bordered"class="table table-hover">
            <thead>
              <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('modelo_table') ?></th>
                <th><?= $this->Paginator->sort('modelo_pk') ?></th>
                <th><?= $this->Paginator->sort('created') ?></th>
                <th><?= $this->Paginator->sort('created_by') ?></th>
                <th><?= $this->Paginator->sort('updated_by') ?></th>
                <th>&nbsp;</th>
              </tr>
            </thead>
            <tbody>
            <?php 
                $displayField = \Cake\Core\Configure::read('Log.userDisplayField');
            ?>
            <?php foreach ($logs as $log): ?>
              <tr>
                <td><?= $this->Number->format($log->id) ?></td>
                <td><?= h($log->modelo_table) ?></td>
                <td><?= $this->Number->format($log->modelo_pk) ?></td>
                <td><?= h($log->created) ?></td>
                <td><?= $log->has('created_by') ? $log->created_by->{$displayField} : '' ?></td>
                <td><?= $log->has('updated_by') ? $log->updated_by->{$displayField} : '' ?></td>
                <td class="actions" style="white-space:nowrap">
                    <?= $this->Html->link(__('Ver'), ['action' => 'view', $log->id], ['class'=>'btn btn-default btn-flat btn-xs']) ?>
                </td>
              </tr>
            <?php endforeach; ?>
            </tbody>
          </table>
        </div>
        <!-- /.box-body -->
        <div class="box-footer clearfix">
          <ul class="pagination pagination-sm no-margin pull-right">
            <?php echo $this->Paginator->numbers(); ?>
          </ul>
        </div>
      </div>
      <!-- /.box -->
    </div>
  </div>
</section>
<!-- /.content -->

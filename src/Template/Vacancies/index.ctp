<!-- <nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Applicant'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Applicant Job Lists'), ['controller' => 'ApplicantJobLists', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Applicant Job List'), ['controller' => 'ApplicantJobLists', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="applicants index large-9 medium-8 columns content">
    <h3><?= __('Admin Applicants') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('id_card') ?></th>
                <th><?= $this->Paginator->sort('full_name') ?></th>
                <th><?= $this->Paginator->sort('email') ?></th>
                <th><?= $this->Paginator->sort('avatar') ?></th>
                <th><?= $this->Paginator->sort('place_of_birth') ?></th>
                <th><?= $this->Paginator->sort('birthdate') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($applicants as $applicant): ?>
            <tr>
                <td><?= $this->Number->format($applicant->id) ?></td>
                <td><?= h($applicant->id_card) ?></td>
                <td><?= h($applicant->full_name) ?></td>
                <td><?= h($applicant->email) ?></td>
                <td><?= $this->Html->image($applicant->avatar_url("portrait")) ?></td>
                <td><?= h($applicant->place_of_birth) ?></td>
                <td><?= h($applicant->birthdate) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $applicant->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $applicant->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $applicant->id], ['confirm' => __('Are you sure you want to delete # {0}?', $applicant->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
 -->

 <div class="container">
    <div class="row">
      <ol class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li><a href="#">Library</a></li>
        <li class="active">Data</li>
      </ol>
      <div class="col-lg-12">
        <h2>Vacancy</h2>
        <hr>
        <div class="row">
        <?php 
        echo $this->Html->link(
            'Create Vacancy',
            '/vacancies/add',
            ['class' => 'btn btn-primary']
        );
        ?>
          <div class="panel panel-primary filterable">
              <div class="panel-heading">
                  <h3 class="panel-title">Vacancies</h3>
                  <div class="pull-right">
                      <button class="btn btn-default btn-xs btn-filter"><span class="glyphicon glyphicon-filter"></span> Filter</button>
                  </div>
              </div>
              <table class="table">
                  <thead>
                      <tr class="filters">
                          <th><input type="text" class="form-control" placeholder="Vacancy Name" disabled></th>
                          <th><input type="text" class="form-control" placeholder="Company" disabled></th>
                          <th><input type="text" class="form-control" placeholder="Branch" disabled></th>
                          <th><input type="text" class="form-control" placeholder="Organization" disabled></th>
                          <th><input type="text" class="form-control" placeholder="Vacancy Status" disabled></th>
                          <th><input type="text" class="form-control" placeholder="Remark" disabled></th>
                          <th>Action</th>
                      </tr>
                  </thead>
                  <tbody>
                      <tr>
                        <td>1</td>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td>@mdo</td>
                        <td>Otto</td>
                        <td>@mdo</td>
                        <td class="act-btn">
                          <div class="btn-group" role="group" aria-label="...">
                            <button type="button" class="btn btn-success"><i class="fa fa-eye"></i></button>
                            <button type="button" class="btn btn-warning"><i class="fa fa-pencil-square-o"></i></button>
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal"><i class="fa fa-trash-o"></i></button>
                          </div>
                        </td>
                        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                          <div class="modal-dialog modal-sm" role="document">
                            <div class="modal-content">
                              <div class="modal-body">
                                Are sure want to delete?
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Yes</button>
                                <button type="button" class="btn btn-primary">No</button>
                              </div>
                            </div>
                          </div>
                        </div>
                      </tr>
                      <tr>
                          <td>2</td>
                          <td>Jacob</td>
                          <td>Thornton</td>
                          <td>@fat</td>
                          <td>Thornton</td>
                          <td>@fat</td>
                          <td class="act-btn">
                            <div class="btn-group" role="group" aria-label="...">
                              <button type="button" class="btn btn-success"><i class="fa fa-eye"></i></button>
                              <button type="button" class="btn btn-warning"><i class="fa fa-pencil-square-o"></i></button>
                              <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal"><i class="fa fa-trash-o"></i></button>
                            </div>
                          </td>
                      </tr>
                      <tr>
                          <td>3</td>
                          <td>Larry</td>
                          <td>the Bird</td>
                          <td>@twitter</td>
                          <td>the Bird</td>
                          <td>@twitter</td>
                          <td class="act-btn">
                            <div class="btn-group" role="group" aria-label="...">
                              <button type="button" class="btn btn-success"><i class="fa fa-eye"></i></button>
                              <button type="button" class="btn btn-warning"><i class="fa fa-pencil-square-o"></i></button>
                              <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal"><i class="fa fa-trash-o"></i></button>
                            </div>
                          </td>
                      </tr>
                  </tbody>
              </table>
          </div>
        </div>
        <div class="clearfix"></div><br>
        <table>
          <tr>
            <td></td>
          </tr>
        </table>

        <br><br>


      </div>
    </div>
  </div>
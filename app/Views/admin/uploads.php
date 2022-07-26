<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Dashboard</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li><a href="#">Dashboard</a></li>
                    <li><a href="#">Forms</a></li>
                    <li class="active">Basic</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Data Table</strong>
                    </div>
                    <div class="card-body">
                        <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Volume</th>
                                    <th>Category</th>
                                    <th>Description</th>
                                    <th>Play</th>
                                    <th>update</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php foreach($uploads as $upload): ?>
                                <tr>
                                    <td><?= $upload->volume ?></td>
                                    <td><?= $upload->category ?></td>
                                    <td><?= $upload->description ?></td>
                                    <td>
                                    <audio controls>
									<source src="<?= base_url('uploads/audio/upload_'.$upload->id.'_.mp3') ?>" type="audio/mpeg">
									Your browser does not support the audio element.
									</audio>
                                    </td>
                                    <td>
                                        <a href="<?php echo base_url('admin/edit_upload/'.$upload->id) ?>"><i class="fa fa-edit"></i></a>
                                    </td>
                                    <td>
                                        <a href="<?= base_url('admin/delete_upload/'.$upload->id.'/') ?>"  onclick="return confirm('Are you sure you want to delete this?')" ><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                                
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>


        </div>

    </div>
</div>
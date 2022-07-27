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
            <div class="col-lg-6 offset-3">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Add New Category</strong>
                    </div>
                    <div class="card-body">
                        <!-- Credit Card -->
                        <div id="pay-invoice">
                            <div class="card-body">
                                <div class="card-title">
                                    <?php if (session()->getFlashdata('errors')) {?>
                                        <div class="alert alert-danger col-md-12">
                                            <?php foreach (session()->getFlashdata('errors') as $error): ?>
                                                <i class="fa fa-times"></i> <?=esc($error)?>
                                                <br>
                                            <?php endforeach;?>
                                        </div>
                                    <?php } elseif (session()->getFlashdata('success')) {?>
                                        <div class="alert alert-success col-md-12">
                                            <i class="fa fa-check"></i>
                                            <?=session()->getFlashdata('success')?>
                                        </div>
                                <?php }?>
                                </div>
                                <hr>
                                <form action="<?= base_url('admin/save_category') ?>" method="post" novalidate="saveCategory">
                                    <div class="form-group">
                                        <label for="category" class="control-label mb-1">Category Name</label>
                                        <input id="category" name="category" type="text" class="form-control" aria-required="true" aria-invalid="false" required >
                                    </div> 
                                    
                                    <div>
                                        <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">         
                                            <span id="payment-button-amount">Submit</span>
                                            <span id="payment-button-sending" style="display:none;">Sending…</span>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>
                </div> <!-- .card -->

            </div>
            <!--/.col-->
        </div>
    </div>
</div>
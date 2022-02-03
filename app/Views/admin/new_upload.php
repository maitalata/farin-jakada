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
                        <strong class="card-title">New Upload</strong>
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
                                <form action="<?= base_url('admin/save_upload') ?>" enctype="multipart/form-data" method="post" novalidate="novalidate">
                                    <div class="form-group">
                                        <label for="cc-payment" class="control-label mb-1">The Media File</label>
                                        <input id="cc-pament" name="uploaded_file" type="file" class="form-control" aria-required="true" aria-invalid="false" >
                                    </div> 
                                    <div class="form-group has-success">
                                        <label for="cc-name"  class="control-label mb-1">Category</label>
                                        <select class="form-control" name="category" required>
                                            <option>Select</option>
                                            <option value="Farin Jakada" >Farin Jakada</option>
                                        </select>    
                                    </div>
                                    <div class="form-group has-success">
                                        <label for="cc-name"  class="control-label mb-1">Volume</label>
                                        <select class="form-control" name="category" required>
                                            <option>Select</option>
                                            <option value="1" >1</option>
                                            <option value="1" >2</option>
                                            <option value="1" >3</option>
                                            <option value="1" >4</option>
                                            <option value="1" >5</option>
                                            <option value="1" >6</option>
                                            <option value="1" >7</option>
                                        </select>    
                                    </div>
                                    <div class="form-group has-success">
                                        <label for="cc-name" class="control-label mb-1">Description</label>
                                        <textarea class="form-control" name="description" style="resize:none;" rows="5" ></textarea>  
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
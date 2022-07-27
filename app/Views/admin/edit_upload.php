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
                        <strong class="card-title">Edit Upload</strong>
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
                                <form action="<?= base_url('admin/save_edit') ?>" enctype="multipart/form-data" method="post" novalidate="novalidate">
                                    <div class="form-group">
                                    <audio controls>
									<source src="<?= base_url('uploads/audio/upload_'.$upload->id.'_.mp3') ?>" type="audio/mpeg">
									Your browser does not support the audio element.
									</audio>
                                    </div> 
                                    <div class="form-group has-success">
                                        <label for="category"  class="control-label mb-1">Category</label>
                                        <select class="form-control" name="category" required>
                                            <option>Select</option>
                                            <?php foreach($categories as $category): ?>
                                                <option value="<?php echo $category->category ?>" <?php echo $upload->category == $category->category? 'selected' : ''; ?> ><?php echo $category->category ?></option>
                                            <?php endforeach; ?>
                                             
                                        </select>    
                                    </div>
                                    <div class="form-group has-success">
                                        <label for="volume"  class="control-label mb-1">Volume</label>
                                        <select class="form-control" name="volume" required>
                                            <option>Select</option>
                                            <option value="1" <?php echo $upload->volume == "1"? 'selected' : ''; ?>  >1</option>
                                            <option value="2" <?php echo $upload->volume == "2"? 'selected' : ''; ?> >2</option>
                                            <option value="3" <?php echo $upload->volume == "3"? 'selected' : ''; ?>   >3</option>
                                            <option value="4" <?php echo $upload->volume == "4"? 'selected' : ''; ?>  >4</option>
                                            <option value="6" <?php echo $upload->volume == "5"? 'selected' : ''; ?> >5</option>
                                            <option value="6" <?php echo $upload->volume == "6"? 'selected' : ''; ?> >6</option>
                                            <option value="7" <?php echo $upload->volume == "7"? 'selected' : ''; ?> >7</option>
                                        </select>    
                                    </div>
                                    <div class="form-group has-success">
                                        <label for="cc-name" class="control-label mb-1">Description</label>
                                        <textarea class="form-control" name="description" style="resize:none;" rows="5" ><?php echo $upload->description; ?></textarea>  
                                    </div>

                                    <input 
                                        type="hidden" 
                                        name="upload_id" 
                                        value="<?php echo $upload->id ?>"
                                    >
                                    
                                   
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
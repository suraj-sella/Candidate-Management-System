<div class="row">
    <div class="col-md-12 text-center">           
        <h2 class='headsection'>
            <a class="btn btn-success float-left" href="<?php echo base_url('candidates') ?>">
                <i class="fas fa-home"></i>
            </a>
            Candidates Management System
            <a class="btn btn-success float-right" href="<?php echo base_url('candidates/create') ?>">
                <i class="fas fa-user-plus"></i>
            </a>
        </h2>
    </div>
</div>
<div class="row">
    <div class="col-md-4">
        <form class='form' action="<?php echo base_url('import/uploadData');?>" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="uploadFile">Upload Excel File</label>
                <input name="uploadFile" type="file" class="form-control-file" id="uploadFile">
            </div>
            <input name='submit' type="submit" value="Upload!" class='btn btn-primary'>
        </form>    
    </div>
</div>

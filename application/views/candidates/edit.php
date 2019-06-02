<div class="row">
    <div class="col-md-12 text-center">           
        <h2 class='headsection'>
            <a class="btn btn-success float-left" href="<?php echo base_url('candidates') ?>">
                <i class="fas fa-home"></i>
            </a>
            Candidates Management System
            <a class="btn btn-success float-right" href="<?php echo base_url('import/uploadExcel') ?>">
                <i class="fas fa-file-export"></i>
            </a>
        </h2>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <form class='form' method="post" action="<?php echo base_url('candidates/update/'.$candidate->id);?>">
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="inputName">Full Name</label>
                    <input name='inputName' type="text" class="form-control" id="inputName" value="<?php echo $candidate->name; ?>" required>
                </div>
                <div class="form-group col-md-4">
                    <label for="inputEmailId">Email ID</label>
                    <input type="email" class="form-control" name="inputEmail" id="inputEmail" value="<?php echo $candidate->email; ?>" required>
                </div>
                <div class="form-group col-md-4">
                    <label for="inputContact">Contact Details</label>
                    <input type="tel" class="form-control" id="inputContact" name="inputContact" value="<?php echo $candidate->contact; ?>" required pattern="[0-9]{10}">
                </div>
            </div> 
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputAddress">Address</label>
                    <input type="text" class="form-control" id="inputAddress" name="inputAddress" value="<?php echo $candidate->address; ?>" required>
                </div>
                <div class="form-group col-md-3">
                    <label for="inputCity">City</label>
                    <input type="text" class="form-control" id="inputCity" name="inputCity" value="<?php echo $candidate->city; ?>" required>
                </div>
                <div class="form-group col-md-3">
                    <label for="inputGender">Gender</label>
                    <select id="inputGender" name="inputGender" class="form-control" required>
                        <option value='Male'>Male</option>
                        <option value='Female'>Female</option>
                    </select>
                </div>
            </div>  
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputHighEdu">Higher Education</label>
                    <input type="text" class="form-control" id="inputHighEdu" name ="inputHighEdu" value="<?php echo $candidate->highedu; ?>" required>
                </div>
            </div>
            <input type="submit" name="Save" class="btn btn-primary">
        </form>
    </div>
</div>


<div class="row">
    <div class="col-md-12 text-center">           
        <h2 class='headsection'>
            <a data-tooltip="Home" class="btn btn-success float-left tooltip-left" href="<?php echo base_url('candidates') ?>">
                <i class="fas fa-home"></i>
            </a>
            Candidates Management System
            <a data-tooltip="Import" class="btn btn-success float-right tooltip-right" href="<?php echo base_url('import/uploadExcel') ?>">
                <i class="fas fa-file-import"></i>
            </a>
        </h2>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <form class='form' method="post" action="<?php echo base_url('candidatesCreate');?>">
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="inputName">Full Name</label>
                    <input name='inputName' type="text" class="form-control" id="inputName" placeholder="Suraj Selladurai" required>
                </div>
                <div class="form-group col-md-4">
                    <label for="inputEmailId">Email ID</label>
                    <input type="email" class="form-control" name="inputEmail" id="inputEmail" placeholder="surajselladurai@gmail.com" required>
                </div>
                <div class="form-group col-md-4">
                    <label for="inputContact">Contact Details</label>
                    <input type="tel" class="form-control" id="inputContact" name="inputContact" placeholder="8446148808" required pattern="[0-9]{10}">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputAddress">Address</label>
                    <input type="text" class="form-control" id="inputAddress" name="inputAddress" placeholder="C-15 Sahyadri, Anushaktinagar" required>
                </div>
                <div class="form-group col-md-3">
                    <label for="inputCity">City</label>
                    <input type="text" class="form-control" id="inputCity" name="inputCity" placeholder="Mumbai" required>
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
                    <input type="text" class="form-control" id="inputHighEdu" name ="inputHighEdu" placeholder='B.Tech' required>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">
                Create!
            </button>
        </form>    
    </div>
</div>

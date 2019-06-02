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
        <div class="table-responsive">
            <table id='candViewTable' class="table table-bordered">
                <thead class="thead thead-dark thead-my text-center">
                    <tr>
                        <th>Name</th>
                        <th>Email Id</th>
                        <th>Contact Details</th>
                        <th>Gender</th>
                        <th>Address</th>
                        <th>City</th>
                        <th>Higher Education</th>
                        <th>Status</th>
                        <th>Date Created</th>
                        <th>Last Modified</th>
                    </tr>
                </thead>
                <tbody class='text-center'>
                    <?php foreach ($data as $d) { ?>      
                        <tr class="
                            <?php
                                if($d->isDel)
                                    echo "hidden";
                            ?>">
                            <td><?php echo $d->name; ?></td>
                            <td><?php echo $d->email; ?></td>          
                            <td><?php echo $d->contact; ?></td>          
                            <td><?php echo $d->gender; ?></td>          
                            <td><?php echo $d->address; ?></td>          
                            <td><?php echo $d->city; ?></td>          
                            <td><?php echo $d->highedu; ?></td>          
                            <td>
                                <?php 
                                    if($d->isDel)
                                        echo "Hidden"; 
                                    else    
                                        echo "Active"; 
                                ?>
                            </td>          
                            <td><?php echo $d->create_timestamp; ?></td>          
                            <td><?php echo $d->update_timestamp; ?></td>          
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
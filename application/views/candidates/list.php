<div class="row">
    <div class="col-md-12 text-center">           
        <h2 class='headsection'>
                <a data-tooltip="Add" class="btn btn-success float-left tooltip-left" href="<?php echo base_url('candidates/create') ?>">
                    <i class="fas fa-user-plus"></i>
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
        <div class="table-responsive">
            <table id='candTable' class="table table-bordered table-condensed">
                <thead class="thead thead-dark thead-my text-center">
                    <tr>
                        <th>Name</th>
                        <th>Email Id</th>
                        <th>Action</th>
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
                            <td>
                                <form method="DELETE" action="<?php echo base_url('candidates/delete/'.$d->id);?>">
                                    <a data-tooltip="View" class="btn btn-success btn-sm" href="<?php echo base_url('candidates/view/'.$d->id) ?>">
                                        <i class="fas fa-user"></i>
                                    </a>
                                    <a data-tooltip="Edit" class="btn btn-info btn-sm" href="<?php echo base_url('candidates/edit/'.$d->id) ?>">
                                        <i class="fas fa-user-edit"></i>
                                    </a>
                                    <a data-tooltip="
                                        <?php
                                            if($d->isDel)
                                                echo 'Undo'; 
                                            else
                                                echo 'Soft Delete'; 
                                        ?>
                                    " class="btn btn-warning btn-sm" href="
                                        <?php
                                            if($d->isDel)
                                                echo base_url('candidates/unhide/'.$d->id); 
                                            else
                                                echo base_url('candidates/hide/'.$d->id) 
                                        ?>">
                                        <i class="
                                            <?php
                                                if($d->isDel)
                                                    echo 'far fa-eye'; 
                                                else
                                                    echo 'far fa-eye-slash';
                                            ?>
                                        "></i>
                                    </a>
                                    <button data-tooltip="Delete" type="submit" class="btn btn-danger btn-sm">
                                        <i class="fa fa-trash-alt"></i>
                                    </button>
                                </form>
                            </td>     
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
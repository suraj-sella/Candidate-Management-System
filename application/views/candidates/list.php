<div class="row">
    <div class="col-md-12 text-center">           
        <h2 class='headsection'>
                <a class="btn btn-success float-left" href="<?php echo base_url('candidates/create') ?>">
                    <i class="fas fa-user-plus"></i>
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
            <table id='candTable' class="table table-bordered table-condensed table-hover">
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
                                    <a class="btn btn-success btn-sm" href="<?php echo base_url('candidates/view/'.$d->id) ?>">
                                        <i class="far fa-eye"></i>
                                    </a>
                                    <a class="btn btn-info btn-sm" href="<?php echo base_url('candidates/edit/'.$d->id) ?>">
                                        <i class="fas fa-user-edit"></i>
                                    </a>
                                    <a class="btn btn-warning btn-sm" href="
                                        <?php
                                            if($d->isDel)
                                                echo base_url('candidates/unhide/'.$d->id); 
                                            else
                                                echo base_url('candidates/hide/'.$d->id) 
                                        ?>">
                                        <i class="fas fa-ban"></i>
                                    </a>
                                    <button type="submit" class="btn btn-danger btn-sm">
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
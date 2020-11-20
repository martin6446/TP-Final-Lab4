<?php require_once(VIEWS_PATH . "nav-bar.php");?>

<div class="container border border-secondary rounded ">
    <form method="GET" action="<?php echo FRONT_ROOT ?>user/modifyUser">
        <div class="form-row">
            <div class="form-group col-md-4">
                <h3>Cinema: </h3>
            </div>
            
        </div>
        
        <button type="submit" class="btn btn-success m-2">Save Changes</button>
        <a class="btn btn-danger" href="<?php echo FRONT_ROOT ?>landing/loadData">Cancel</a>
    </form>
</div>
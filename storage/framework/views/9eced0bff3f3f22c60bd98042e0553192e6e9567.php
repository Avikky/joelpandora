<?php $__env->startSection('content'); ?>
<style>
.d-box {
    padding: 3.3rem;
    margin-top: 2rem;
    margin-bottom: 2rem;
    width: 20rem;
    border-radius: 10px;
    
}

.d-box p{
    color: #fff;
    font-size: 38px;
    font-family: Arial, Helvetica, sans-serif;
    margin-left: -40px;
    margin-top: -2.4rem;
}

.d-box  p.title {
    margin-left: 3rem;
}

.d-box  p.title-ex {
    margin-left: -1rem;
}

.cover {
    display: flex;
    justify-content: space-around;
    align-items: center;
}

</style>
<div class="container">
    <div class="justify-content-center">
        <div class="">
            <p class="welcome-msg alert alert-primary text-center  JustifyCenter">Welcome to your Dashboard</p>
            <div class="card">
                <div class="card-header">Dashboard</div>
                <div class="container pt-50">
                    <div class="cover">
                        <div class="d-box  bg-primary">
                            <p><i class="fas fa-user-circle"></i></p>
                            <br>
                           <p class="title"> Admin  (<?php echo e($adminCount); ?>)</p>
                        </div>
                        <div class="d-box  bg-info">
                            <p><i class="fas fa-file-alt"></i></p>
                            <br>
                            <p class="title">Posts  (<?php echo e($postsCount); ?>)</p>
                        </div>
                        <div class="d-box bg-warning">
                            <p><i class="fas fa-users"></i></p>
                            <br>
                            <p class="title-ex">Clients (<?php echo e($clientsCount); ?>)</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    setTimeout(() => {
        document.querySelector('.welcome-msg').style.display = 'none';
    }, 4000);
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\joelpandora\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>
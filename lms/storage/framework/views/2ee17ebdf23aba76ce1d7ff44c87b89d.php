<?php $__env->startSection('content'); ?>

<h2 class="mb-4">Dashboard</h2>

<div class="row">

    <div class="col-md-3">
        <div class="card text-white bg-primary mb-3">
            <div class="card-body">
                <h5>Students</h5>
                <h3><?php echo e(\App\Models\Student::count()); ?></h3>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card text-white bg-success mb-3">
            <div class="card-body">
                <h5>Lecturers</h5>
                <h3><?php echo e(\App\Models\Lecturer::count()); ?></h3>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card text-white bg-warning mb-3">
            <div class="card-body">
                <h5>Courses</h5>
                <h3><?php echo e(\App\Models\Course::count()); ?></h3>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card text-white bg-danger mb-3">
            <div class="card-body">
                <h5>Exams</h5>
                <h3><?php echo e(\App\Models\Exam::count()); ?></h3>
            </div>
        </div>
    </div>

</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\SAJJAD\Desktop\laravel\lms\resources\views/dashboard.blade.php ENDPATH**/ ?>
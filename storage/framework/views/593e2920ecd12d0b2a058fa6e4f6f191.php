<?php if (isset($component)) { $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54 = $attributes; } ?>
<?php $component = App\View\Components\AppLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\AppLayout::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?> 
     <?php $__env->slot('header', null, []); ?>  
        <h2 class="text-xl font-semibold leading-tight text-gray-800"> 
            <?php echo e(__('Memeriksa')); ?> 
        </h2> 
     <?php $__env->endSlot(); ?> 
 
    <div class="py-12"> 
        <div class="mx-auto space-y-6 max-w-7xl sm:px-6 lg:px-8"> 
            <div class="p-4 bg-white shadow-sm sm:p-8 sm:rounded-lg"> 
                <section> 
                    <header class="flex items-center justify-between"> 
                        <h2 class="text-lg font-medium text-gray-900"> 
                            <?php echo e(__('Daftar Periksa Pasien')); ?> 
                        </h2> 
                    </header> 
    
                    <table class="table mt-6 overflow-hidden rounded table-hover"> 
                        <thead class="thead-light"> 
                            <tr> 
                                <th scope="col">No Urut</th> 
                                <th scope="col">Nama Pasien</th> 
                                <th scope="col">Keluhan</th> 
                                <th scope="col">Aksi</th> 
                            </tr> 
                        </thead> 
                        <tbody> 
                            <?php $__currentLoopData = $janjiPeriksas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $janjiPeriksa): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                                <tr> 
                                    <th scope="row" class="align-middle text-start"><?php echo e($janjiPeriksa->no_antrian); ?></th> 
                                    <td class="align-middle text-start"><?php echo e($janjiPeriksa->pasien->nama); ?></td> 
                                    <td class="align-middle text-start"><?php echo e($janjiPeriksa->keluhan); ?></td> 
                                    <td class="align-middle text-start"> 
                                        <?php if(is_null($janjiPeriksa->periksa)): ?> 
                                            <a href="<?php echo e(route('dokter.memeriksa.periksa', $janjiPeriksa->id)); ?>" class="btn btn-primary btn-sm">Periksa</a> 
                                        <?php else: ?> 
                                            <a href="<?php echo e(route('dokter.memeriksa.edit', $janjiPeriksa->id)); ?>" class="btn btn-secondary btn-sm">Edit</a> 
                                        <?php endif; ?> 
                                    </td> 
                                </tr> 
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                        </tbody> 
                    </table> 
                </section> 
            </div> 
        </div> 
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $attributes = $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $component = $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?> <?php /**PATH C:\xampp\htdocs\laravel\bimkar-hospital\resources\views/dokter/memeriksa/index.blade.php ENDPATH**/ ?>

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
            <?php echo e(__('Riwayat Periksa')); ?> 
        </h2> 
     <?php $__env->endSlot(); ?> 
 
    <div class="py-12"> 
        <div class="mx-auto space-y-6 max-w-7xl sm:px-6 lg:px-8"> 
            <div class="p-4 bg-white shadow-sm sm:p-8 sm:rounded-lg"> 
                <section> 
                    <header class="mb-4"> 
                        <h2 class="text-lg font-medium text-gray-900"> 
                            <?php echo e(__('Riwayat Pemeriksaan')); ?> 
                        </h2> 
                        <p class="mt-1 text-sm text-gray-600"> 
                            <?php echo e(__('Informasi lengkap mengenai jadwal pemeriksaan Anda.')); ?> 
                        </p> 
                    </header> 
 
                    <div class="mb-4 border-2 card"> 
                        <div class="bg-white border-black card-header border-bottom"> 
                            <h5 class="mb-0 font-semibold text-gray-800 card-title">Detail Pemeriksaan</h5> 
                        </div> 
                        <div class="card-body"> 
                            <div class="row"> 
                                <div class="border-black col-md-6 border-end"> 
                                    <div class="mb-3"> 
                                        <label class="font-semibold text-gray-700 form-label">Tanggal Periksa</label> 
                                        <div class="form-control-plaintext"> 
                                            <?php echo e(\Carbon\Carbon::parse($janjiPeriksa->periksa->tgl_periksa)->translatedFormat('d F Y H.i')); ?> 
                                        </div> 
                                    </div> 
                                </div> 
                                <div class="col-md-6"> 
                                    <div class="mb-3"> 
                                        <label class="font-semibold text-gray-700 form-label">Catatan</label> 
                                        <div class="form-control-plaintext"> 
                                            <?php echo e($janjiPeriksa->periksa->catatan ?: 'Tidak ada catatan'); ?> 
                                        </div> 
                                    </div> 
                                </div> 
                            </div> 
                        </div> 
                    </div> 
 
                    <div class="mb-4 border-2 card"> 
                        <div class="bg-white border-black card-header border-bottom"> 
                            <h5 class="mb-0 font-semibold text-gray-800 card-title">Daftar Obat Diresepkan</h5> 
                        </div> 
                        <div class="card-body"> 
                            <?php if(count($janjiPeriksa->periksa->detailPeriksas) > 0): ?> 
                                <ul class="list-group list-group-flush"> 
                                    <?php $__currentLoopData = $janjiPeriksa->periksa->detailPeriksas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $detailPeriksa): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                                        <li 
                                            class="px-0 list-group-item d-flex justify-content-between align-items-center border-bottom"> 
                                            <span><?php echo e($detailPeriksa->obat->nama_obat); ?></span> 
                                            <span 
                                                class="badge bg-light text-dark"><?php echo e($detailPeriksa->obat->kemasan); ?></span> 
                                        </li> 
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                                </ul> 
                            <?php else: ?> 
                                <p class="mb-0 text-muted">Tidak ada obat yang diresepkan.</p> 
                            <?php endif; ?> 
                        </div> 
                    </div> 
 
                    <div class="mb-4 border-2 card bg-light"> 
                        <div class="card-body"> 
                            <div class="d-flex justify-content-between align-items-center"> 
                                <span class="font-semibold text-gray-800 fw-bold">Biaya Periksa</span> 
                                <span class="fw-bold fs-5 text-primary"> 
                                    <?php echo e('Rp' . number_format($janjiPeriksa->periksa->biaya_periksa, 0, ',', '.')); ?> 
                                </span> 
                            </div> 
                        </div> 
                    </div> 
 
                    <div class="mt-4"> 
                        <a href="<?php echo e(route('pasien.riwayat-periksa.index')); ?>" class="btn btn-secondary"> 
                            <i class="bi bi-arrow-left me-1"></i> <?php echo e(__('Kembali')); ?> 
                        </a> 
                    </div> 
                </section> 
            </div> 
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
<?php endif; ?><?php /**PATH C:\xampp\htdocs\laravel\bimkar-hospital\resources\views/pasien/riwayat-periksa/riwayat.blade.php ENDPATH**/ ?>
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
            <div class="p-4 bg-white shadow sm-sm:p-8 sm:rounded-lg"> 
                <section> 
                    <header> 
                        <h2 class="text-lg font-medium text-gray-900"> 
                            <?php echo e(__('Riwayat Janji Periksa')); ?> 
                        </h2> 
                    </header> 
 
                    
                    <table class="table mt-6 overflow-hidden rounded table-hover"> 
                        <thead class="thead-light"> 
                            <tr> 
                                <th scope="col">No</th> 
                                <th scope="col">Poliklinik</th> 
                                <th scope="col">Dokter</th> 
                                <th scope="col">Hari</th> 
                                <th scope="col">Mulai</th> 
                                <th scope="col">Selesai</th> 
                                <th scope="col">Antrian</th> 
                                <th scope="col">Status</th> 
                                <th scope="col">Aksi</th> 
                            </tr> 
                        </thead> 
                        <tbody> 
                            <?php $__currentLoopData = $janjiPeriksas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $janjiPeriksa): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                                <tr> 
                                   <th scope="row" class="align-middle text-start"><?php echo e($loop->iteration); ?></th> 
                                    <td class="align-middle text-start"> 
                                        <?php echo e($janjiPeriksa->jadwalPeriksa->dokter->poli); ?></td> 
                                    <td class="align-middle text-start"> 
                                        <?php echo e($janjiPeriksa->jadwalPeriksa->dokter->nama); ?></td> 
                                    <td class="align-middle text-start"><?php echo e($janjiPeriksa->jadwalPeriksa->hari); ?></td> 
                                    <td class="align-middle text-start"> 
                                        <?php echo e(\Carbon\Carbon::parse($janjiPeriksa->jadwalPeriksa->jam_mulai)->format('H.i')); ?> 
                                    </td> 
                                    <td class="align-middle text-start"> 
                                        <?php echo e(\Carbon\Carbon::parse($janjiPeriksa->jadwalPeriksa->jam_selesai)->format('H.i')); ?> 
                                   </td> 
                                    <td class="align-middle text-start"><?php echo e($janjiPeriksa->no_antrian); ?></td> 
                                    <td class="align-middle text-start"> 
                                        <?php if(is_null($janjiPeriksa->periksa)): ?> 
                                            <span class="badge badge-pill badge-warning">Belum Diperiksa</span> 
                                        <?php else: ?> 
                                            <span class="badge badge-pill badge-success">Sudah Diperiksa</span> 
                                        <?php endif; ?> 
                                    </td> 
                                    <td class="align-middle text-start"> 
                                        <?php if(is_null($janjiPeriksa->periksa)): ?> 
                                            <a href="<?php echo e(route('pasien.riwayat-periksa.detail', $janjiPeriksa->id)); ?>" class="btn btn-info">Detail</a> 
 
                                            <!-- Modal --> 
                                            <div class="modal fade bd-example-modal-lg" id="detailModal<?php echo e($janjiPeriksa->id); ?>" tabindex="-1" 
                                                role="dialog" aria-labelledby="detailModalTitle<?php echo e($janjiPeriksa->id); ?>" aria-hidden="true"> 
                                                <div class="modal-dialog modal-lg modal-dialog-centered" 
                                                    role="document"> 
                                                    <div class="modal-content"> 
 
                                                        <!-- Modal Header --> 
                                                        <div class="modal-header"> 
                                                            <h5 class="modal-title font-weight-bold" 
                                                                id="riwayatModalLabel<?php echo e($janjiPeriksa->id); ?>"> 
                                                                Detail Riwayat Pemeriksaan 
                                                            </h5> 
                                                            <button type="button" class="close" data-dismiss="modal" 
                                                                aria-label="Close"> 
                                                                <span aria-hidden="true">&times;</span> 
                                                            </button> 
                                                        </div> 
 
                                                        <!-- Modal Body --> 
                                                        <div class="modal-body"> 
                                                            <ul class="list-group"> 
                                                                <li class="list-group-item"> 
                                                                    <strong>Poliklinik:</strong> 
                                                                    <?php echo e($janjiPeriksa->jadwalPeriksa->dokter->poli); ?> 
                                                                </li> 
                                                                <li class="list-group-item"> 
                                                                    <strong>Nama Dokter:</strong> 
                                                                    <?php echo e($janjiPeriksa->jadwalPeriksa->dokter->nama); ?> 
                                                                </li> 
                                                                <li class="list-group-item"> 
                                                                    <strong>Hari Pemeriksaan:</strong> 
                                                                    <?php echo e($janjiPeriksa->jadwalPeriksa->hari); ?> 
                                                                </li> 
                                                                <li class="list-group-item"> 
                                                                    <strong>Jam Mulai:</strong> 
                                                                    <?php echo e(\Carbon\Carbon::parse($janjiPeriksa->jadwalPeriksa->jam_mulai)->format('H.i')); ?> 
                                                                </li> 
                                                                <li class="list-group-item">
                                                                    <strong>Jam Selesai:</strong> 
                                                                    <?php echo e(\Carbon\Carbon::parse($janjiPeriksa->jadwalPeriksa->jam_selesai)->format('H.i')); ?> 
                                                                </li> 
                                                            </ul> 
 
                                                            <!-- Highlight Nomor Antrian --> 
                                                            <div class="mt-4 text-center"> 
                                                                <div class="mb-2 h5 font-weight-bold">Nomor Antrian Anda 
                                                                </div> 
                                                                <span class="badge badge-primary" 
                                                                    style="font-size: 1.75rem; padding: 0.6em 1.2em;"> 
                                                                    <?php echo e($janjiPeriksa->no_antrian); ?> 
                                                                </span> 
                                                            </div> 
                                                        </div> 
 
                                                        <!-- Modal Footer --> 
                                                        <div class="modal-footer"> 
                                                            <button type="button" class="btn btn-secondary" 
                                                                data-dismiss="modal"> 
                                                                Tutup 
                                                            </button> 
                                                        </div> 
 
                                                    </div> 
                                                </div> 
                                            </div> 
                                        <?php else: ?> 
                                            <a href="<?php echo e(route('pasien.riwayat-periksa.riwayat', $janjiPeriksa->id)); ?>" class="btn btn-secondary">Riwayat</a> 
                                        <?php endif; ?> 
                                    </td> 
                                </tr> 
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                        </tbody> 
                    </table> 
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
<?php endif; ?> <?php /**PATH C:\xampp\htdocs\laravel\bimkar-hospital\resources\views/pasien/riwayat-periksa/index.blade.php ENDPATH**/ ?>
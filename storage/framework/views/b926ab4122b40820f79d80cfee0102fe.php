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
            <?php echo e(__('Jadwal Periksa')); ?> 
        </h2> 
     <?php $__env->endSlot(); ?> 
 
    <div class="py-12"> 
        <div class="mx-auto space-y-6 max-w-7xl sm:px-6 lg:px-8"> 
            <div class="p-4 bg-white shadow-sm sm:p-8 sm:rounded-lg">
                <section> 
                    <header class="flex items-center justify-between"> 
                        <h2 class="text-lg font-medium text-gray-900"> 
                            <?php echo e(__('Daftar Jadwal Periksa')); ?> 
                        </h2> 
    
                        <div class="flex-col items-center justify-center text-center"> 
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createJadwalModal">Tambah Jadwal Periksa</button> 
    
                            <?php if(session('status') === 'jadwal-periksa-created'): ?> 
                                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)" 
                                    class="text-sm text-gray-600"><?php echo e(__('Created.')); ?></p> 
                            <?php endif; ?> 
                            <?php if(session('status') === 'jadwal-periksa-exists'): ?> 
                                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)" 
                                    class="text-sm text-gray-600"><?php echo e(__('Exists.')); ?></p> 
                            <?php endif; ?> 
                        </div> 
    
                         
                        <div class="modal fade bd-example-modal-lg" id="createJadwalModal" tabindex="-1" role="dialog" aria-labelledby="detailModalTitle" aria-hidden="true"> 
                            <div class="modal-dialog modal-lg modal-dialog-centered" role="document"> 
                                <div class="modal-content"> 
    
                                    <!-- Modal Header --> 
                                    <div class="modal-header"> 
                                        <h5 class="modal-title font-weight-bold" id="riwayatModalLabel"> 
                                            Detail Riwayat Pemeriksaan 
                                        </h5> 
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"> 
                                            <span aria-hidden="true">&times;</span> 
                                        </button> 
                                    </div> 
    
                                    <!-- Modal Body --> 
                                    <div class="modal-body"> 
                                        <form id="formJadwal" action="<?php echo e(route('dokter.jadwal-periksa.store')); ?>" 
                                            method="POST"> 
                                            <?php echo csrf_field(); ?> 
    
                                            <div class="mb-3 form-group"> 
                                                <label for="hariSelect">Hari</label> 
                                                <select class="form-control" name="hari" id="hariSelect" required>
                                                    <option value="">Pilih Hari</option>
                                                    <option>Senin</option> 
                                                    <option>Selasa</option> 
                                                    <option>Rabu</option> 
                                                    <option>Kamis</option> 
                                                    <option>Jumat</option> 
                                                    <option>Sabtu</option> 
                                                    <option>Minggu</option> 
                                                </select> 
                                            </div> 
    
                                            <div class="mb-3 form-group"> 
                                                <label for="jamMulai">Jam Mulai</label> 
                                                <input type="time" class="form-control" id="jamMulai" name="jam_mulai" required> 
                                            </div> 
    
                                            <div class="mb-4 form-group"> 
                                                <label for="jamSelesai">Jam Selesai</label> 
                                                <input type="time" class="form-control" id="jamSelesai" name="jam_selesai" required> 
                                            </div> 
                                        </form> 
                                    </div> 
    
                                    <!-- Modal Footer --> 
                                    <div class="modal-footer"> 
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal"> 
                                            Tutup 
                                        </button> 
                                        <button type="button" class="btn btn-primary" onclick="document.getElementById('formJadwal').submit();" data-dismiss="modal"> 
                                            Simpan 
                                        </button> 
                                    </div> 
                                </div> 
                            </div> 
                        </div> 
                    </header> 
    
                    <table class="table mt-6 overflow-hidden rounded table-hover"> 
                        <thead class="thead-light"> 
                            <tr> 
                                <th scope="col">No</th> 
                                <th scope="col">Hari</th> 
                                <th scope="col">Mulai</th> 
                                <th scope="col">Selesai</th> 
                                <th scope="col">Status</th> 
                                <th scope="col">Aksi</th> 
                            </tr> 
                        </thead> 
                        <tbody> 
                            <?php $__currentLoopData = $jadwalPeriksas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $jadwalPeriksa): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                                <tr> 
                                    <th scope="row" class="align-middle text-start"><?php echo e($loop->iteration); ?></th> 
                                    <td class="align-middle text-start"><?php echo e($jadwalPeriksa->hari); ?></td> 
                                    <td class="align-middle text-start"> 
                                        <?php echo e(\Carbon\Carbon::parse($jadwalPeriksa->jam_mulai)->format('H.i')); ?> 
                                    </td> 
                                    <td class="align-middle text-start"> 
                                        <?php echo e(\Carbon\Carbon::parse($jadwalPeriksa->jam_selesai)->format('H.i')); ?> 
                                    </td> 
                                    <td class="align-middle text-start"> 
                                        <?php if($jadwalPeriksa->status): ?> 
                                            <span class="badge badge-pill badge-success">Aktif</span> 
                                        <?php else: ?> 
                                            <span class="badge badge-pill badge-danger">Tidak Aktif</span> 
                                        <?php endif; ?> 
                                    </td> 
                                    <td class="align-middle text-start"> 
                                        <form action="<?php echo e(route('dokter.jadwal-periksa.update', $jadwalPeriksa->id)); ?>" 
                                            method="POST"> 
                                            <?php echo csrf_field(); ?> 
                                            <?php echo method_field('PATCH'); ?> 
                                            <?php if(!$jadwalPeriksa->status): ?> 
                                                <button type="submit" class="btn btn-success btn-sm">Aktifkan</button> 
                                            <?php else: ?> 
                                                <button type="submit" class="btn btn-danger btn-sm">Nonaktifkan</button> 
                                            <?php endif; ?> 
                                        </form> 
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
<?php endif; ?> <?php /**PATH C:\xampp\htdocs\laravel\bimkar-hospital\resources\views/dokter/jadwal-periksa/index.blade.php ENDPATH**/ ?>
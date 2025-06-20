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
        <h2 class="font-semibold text-xl text-gray-800 leading-tight"> 
            <?php echo e(__('Janji Periksa')); ?> 
        </h2> 
     <?php $__env->endSlot(); ?> 

    <?php if(session('status') === 'janji-periksa-created'): ?>
        <div x-data="{ show: true }" 
            x-show="show"
            x-init="setTimeout(() => show = false, 5000)"
            x-transition
            class="fixed inset-x-0 top-0 flex items-center justify-center p-4 bg-green-500 text-white">
            <div class="flex items-center">
                <span class="mr-2">Janji periksa berhasil dibuat bosku 😎</span>
                <button @click="show = false" class="text-white hover:text-gray-200">
                    &times;
                </button>
            </div>
        </div>
    <?php endif; ?>

 
    <div class="py-12"> 
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6"> 
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg"> 
                <div class="max-w-xl"> 
                    <section> 
                        <header> 
                            <h2 class="text-lg font-medium text-gray-900"> 
                                <?php echo e(__('Buat Janji Periksa')); ?> 
                            </h2> 
 
                            <p class="mt-1 text-sm text-gray-600"> 
                                <?php echo e(__('Atur jadwal pertemuan dengan dokter untuk mendapatkan layanan konsultasi dan pemeriksaan kesehatan sesuai kebutuhan Anda.')); ?> 
                            </p> 
                        </header> 
 
                        <form class="mt-6" action="<?php echo e(route('pasien.janji-periksa.store')); ?>" method="POST"> 
                            <?php echo csrf_field(); ?> 
                            <div class="form-group"> 
                                <label for="formGroupExampleInput">Nomor Rekam Medis</label> 
                                <input type="text" class="form-control rounded" id="formGroupExampleInput" 
                                    placeholder="Example input" value="<?php echo e($no_rm); ?>" readonly> 
                            </div> 
                            <div class="form-group"> 
                                <label for="dokterSelect">Dokter</label> 
                                <select class="form-control" name="id_dokter" id="dokterSelect" required> 
                                    <option>Pilih Dokter</option> 
                                    <?php $__currentLoopData = $dokters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dokter): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                                        <?php $__currentLoopData = $dokter->jadwalPeriksas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $jadwal): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                                            <option value="<?php echo e($dokter->id); ?>"> 
                                                <?php echo e($dokter->nama); ?> - Spesialis <?php echo e($dokter->poli); ?> | 
                                                <?php echo e($jadwal->hari); ?>, 
                                                <?php echo e(\Carbon\Carbon::parse($jadwal->jam_mulai)->format('H.i')); ?> - 
                                                <?php echo e(\Carbon\Carbon::parse($jadwal->jam_selesai)->format('H.i')); ?> 
                                            </option> 
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                                </select> 
                            </div> 
                            <div class="form-group"> 
                                <label for="keluhan">Keluhan</label> 
                                <textarea class="form-control" name="keluhan" id="keluhan" rows="3" required></textarea> 
                            </div> 
                            <div class="flex items-center gap-4"> 
                                <button type="submit" class="btn btn-primary">Submit</button> 
 
                                <?php if(session('status') === 'janji-periksa-created'): ?> 
                                    <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)" 
                                        class="text-sm text-gray-600"><?php echo e(__('Berhasil Dibuat.')); ?></p> 
                                <?php endif; ?> 
                            </div> 
                        </form> 
                    </section> 
                </div> 
            </div> 
 
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg"> 
                <section> 
                    <header> 
                        <h2 class="text-lg font-medium text-gray-900"> 
                            <?php echo e(__('Riwayat Janji Periksa')); ?> 
                        </h2> 
                    </header> 
 
                     
                    <table class="table table-hover rounded overflow-hidden mt-6"> 
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
                                        <?php echo e(\Carbon\Carbon::parse($janjiPeriksa->jadwalPeriksa->jam_mulai)-> format('H.i')); ?> 
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
                                            <button type="submit" class="btn btn-info" data-toggle="modal" data-target="#detailModal">Detail</button> 
 
                                            <!-- Modal --> 
                                            <div class="modal fade bd-example-modal-lg" id="detailModal" tabindex="-1" role="dialog" aria-labelledby="detailModalTitle" aria-hidden="true"> 
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
                                                                <div class="h5 mb-2 font-weight-bold">Nomor Antrian Anda 
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
                                            <button type="submit" class="btn btn-secondary" data-toggle="modal" 
                                                data-target="#modalRiwayatPeriksa">Riwayat</button> 
 
                                            <div class="modal fade" id="modalRiwayatPeriksa" tabindex="-1" 
                                                aria-labelledby="modalRiwayatPeriksaLabel" aria-hidden="true"> 
                                                <div class="modal-dialog modal-lg modal-dialog-centered"> 
                                                    <div class="modal-content"> 
                                                        <div class="modal-header"> 
                                                            <h5 class="modal-title font-weight-bold" 
                                                                id="modalRiwayatPeriksaLabel"> 
                                                                Riwayat Pemeriksaan</h5> 
                                                            <button type="button" class="close" 
                                                                data-dismiss="modal" aria-label="Close"> 
                                                                <span>&times;</span> 
                                                            </button> 
                                                        </div> 
                                                        <div class="modal-body"> 
                                                            <ul class="list-group mb-3"> 
                                                                <li class="list-group-item"><strong>Tanggal 
                                                                        Periksa:</strong> 
                                                                    <?php echo e(\Carbon\Carbon::parse($janjiPeriksa->periksa->tgl_periksa)->translatedFormat('d F Y H.i')); ?> 
                                                                </li> 
                                                                <li class="list-group-item"><strong>Catatan:</strong> 
                                                                    <?php echo e($janjiPeriksa->periksa->catatan); ?></li> 
                                                            </ul> 
                                                             <h6 class="font-weight-bold mb-3">Daftar Obat Diresepkan: </h6> 
                                                            <ul class="list-group mb-3"> 
                                                                <?php $__currentLoopData = $janjiPeriksa->periksa->detailPeriksas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $detailPeriksa): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                                                                    <li class="list-group-item"> 
                                                                        <?php echo e($detailPeriksa->obat->nama_obat); ?> 
                                                                        <?php echo e($detailPeriksa->obat->kemasan); ?></li> 
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                                                            </ul> 
 
                                                            <div class="alert alert-info"> 
                                                                <strong>Biaya Periksa:</strong> 
                                                                <?php echo e('Rp' . number_format($janjiPeriksa->periksa->biaya_periksa, 0, ',', '.')); ?> 
                                                            </div> 
                                                        </div> 
                                                    </div> 
                                                </div> 
                                            </div> 
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
<?php endif; ?><?php /**PATH C:\xampp\htdocs\laravel\bimkar-hospital\resources\views/pasien/janji-periksa/index.blade.php ENDPATH**/ ?>
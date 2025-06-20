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
            <?php echo e(__('Daftar Obat')); ?> 
        </h2> 
     <?php $__env->endSlot(); ?> 
 
    <div class="py-12"> 
        <div class="mx-auto space-y-6 max-w-7xl sm:px-6 lg:px-8"> 
            <div class="p-4 bg-white shadow-sm sm:p-8 sm:rounded-lg">
                <section> 
                    <header class="flex items-center justify-between"> 
                        <h2 class="text-lg font-medium text-gray-900"> 
                            <?php echo e(__('Daftar Obat')); ?> 
                        </h2> 
    
                        <div class="flex-col items-center justify-center text-center"> 
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createObat">Tambah Obat</button> 
                            <?php if(request()->has('trashed')): ?>
                                <a href="<?php echo e(route('obat.index')); ?>" class="btn btn-secondary">Kembali</a>
                            <?php else: ?>
                                <a href="<?php echo e(route('obat.index', ['trashed' => true])); ?>" class="btn btn-warning">Lihat Sampah</a>
                            <?php endif; ?>


                            <?php if(session('status') === 'obat-created'): ?> 
                                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)" 
                                    class="text-sm text-gray-600"><?php echo e(__('Created.')); ?></p> 
                            <?php endif; ?> 
                            <?php if(session('status') === 'obat-exists'): ?> 
                                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)" 
                                    class="text-sm text-gray-600"><?php echo e(__('Exists.')); ?></p> 
                            <?php endif; ?> 
                        </div> 
    
                         
                        <div class="modal fade bd-example-modal-lg" id="createObat" tabindex="-1" role="dialog" aria-labelledby="detailModalTitle" aria-hidden="true"> 
                            <div class="modal-dialog modal-lg modal-dialog-centered" role="document"> 
                                <div class="modal-content"> 
    
                                    <!-- Modal Header --> 
                                    <div class="modal-header"> 
                                        <h5 class="modal-title font-weight-bold" id="riwayatModalLabel"> 
                                            Detail Obat 
                                        </h5> 
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"> 
                                            <span aria-hidden="true">&times;</span> 
                                        </button> 
                                    </div> 
    
                                    <!-- Modal Body --> 
                                    <div class="modal-body"> 
                                        <form id="formObat" action="<?php echo e(route('obat.store')); ?>" method="POST"> 
                                            <?php echo csrf_field(); ?>

                                            <div class="mb-4">
                                                <label for="nama" class="block text-sm font-medium text-gray-700 mb-1">Nama</label>
                                                <input type="text" id="nama" name="namaObat" placeholder="Nama Obat" required class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                            </div>

                                            <div class="mb-4">
                                                <label for="kemasan" class="block text-sm font-medium text-gray-700 mb-1">Kemasan</label>
                                                <input type="text" id="kemasan" name="kemasan" placeholder="Plastik" required class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                            </div>

                                            <div class="mb-4">
                                                <label for="harga" class="block text-sm font-medium text-gray-700 mb-1">Harga</label>
                                                <div class="flex rounded-md shadow-sm">
                                                    <input type="text" name="harga" id="harga" placeholder="120000000"
                                                        class="flex-1 px-3 py-2 border border-gray-300 rounded-l-md">
                                                    <span class="inline-flex items-center px-3 border border-l-0 border-gray-300 bg-gray-100 text-gray-700 rounded-r-md text-sm">
                                                        Rp
                                                    </span>
                                                </div>
                                            </div>

                                        </form> 
                                    </div> 
    
                                    <!-- Modal Footer --> 
                                    <div class="modal-footer"> 
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal"> 
                                            Tutup 
                                        </button> 
                                        <button type="button" class="btn btn-primary" onclick="document.getElementById('formObat').submit();" data-dismiss="modal"> 
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
                                <th scope="col">Nama</th> 
                                <th scope="col">Kemasan</th> 
                                <th scope="col">Harga</th> 
                                <th scope="col">Aksi</th> 
                            </tr> 
                        </thead> 
                        <tbody> 
                            <?php $__currentLoopData = $obats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                                <tr> 
                                    <th scope="row" class="align-middle text-start"><?php echo e($loop->iteration); ?></th> 
                                    <td class="align-middle text-start"><?php echo e($row->nama_obat); ?></td> 
                                    <td class="align-middle text-start"><?php echo e($row->kemasan); ?></td> 
                                    <td class="align-middle text-start"><?php echo \App\Helpers\RupiahHelper::rupiah($row->harga); ?></td> 
                                    <td class="align-middle text-start d-flex gap-1"> 
                                        <?php if($row->trashed()): ?>
                                            
                                            <form action="<?php echo e(route('obat.restore', ['id' => $row->id])); ?>" method="POST">
                                                <?php echo csrf_field(); ?>
                                                <button type="submit" class="btn btn-sm btn-success">Restore</button>
                                            </form>

                                            
                                            <form action="<?php echo e(route('obat.force-delete', ['id' => $row->id])); ?>" method="POST" onsubmit="return confirm('Hapus permanen data ini?')">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('DELETE'); ?>
                                                <button type="submit" class="btn btn-sm btn-danger">Hapus Permanen</button>
                                            </form>
                                        <?php else: ?>
                                            
                                            <a class="btn btn-sm btn-info" href="<?php echo e(route('obat.edit', ['id' => $row->id])); ?>">Edit</a>

                                            
                                            <form action="<?php echo e(route('obat.destroy', ['id' => $row->id])); ?>" method="POST" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('DELETE'); ?>
                                                <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                            </form>
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
<?php endif; ?> <?php /**PATH C:\xampp\htdocs\laravel\bimkar-hospital\resources\views/dokter/obat/index.blade.php ENDPATH**/ ?>
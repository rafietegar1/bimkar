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
                <div class="max-w-xl"> 
                    <section> 
                        <header> 
                            <h2 class="text-lg font-medium text-gray-900"> 
                                <?php echo e(__('Periksa Pasien')); ?> 
                            </h2> 
 
                            <p class="mt-1 text-sm text-gray-600"> 
                                <?php echo e(__('Silakan isi form di bawah ini untuk mencatat hasil pemeriksaan pasien dan memilih obat yang diberikan.')); ?> 
                            </p> 
                        </header> 
 
                        <form class="mt-6" id="formPeriksa" 
                            action="<?php echo e(route('dokter.memeriksa.store', $janjiPeriksa->id)); ?>" method="POST"> 
                            <?php echo csrf_field(); ?> 
 
                            <div class="mb-3 form-group"> 
                                <label for="namaInput">Nama</label> 
                                <input type="text" class="rounded form-control" id="namaInput" 
                                    value="<?php echo e($janjiPeriksa->pasien->nama); ?>" readonly> 
                            </div> 
 
                            <div class="mb-3 form-group"> 
                                <label for="tgl_periksa">Tanggal 
                                    Periksa</label> 
                                <input type="datetime-local" class="rounded form-control" id="tgl_periksa" 
                                    name="tgl_periksa" required> 
                            </div> 
 
                            <div class="mb-3 form-group"> 
                                <label for="catatan">Catatan</label> 
                                <textarea class="rounded form-control" id="catatan" name="catatan" rows="3" placeholder="Catatan pemeriksaan"></textarea> 
                            </div> 
 
                            <div class="mb-3 form-group"> 
                                <label for="obat">Pilih Obat</label> 
                                <select class="rounded form-control" id="obat" name="obat[]" multiple onchange="hitungBiaya()">
                                    <?php $__currentLoopData = $obats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $obat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                                        <option value="<?php echo e($obat->id); ?>" data-harga="<?php echo e($obat->harga); ?>"> 
                                            <?php echo e($obat->nama_obat); ?> - 
                                            <?php echo e($obat->kemasan); ?> (Rp 
                                            <?php echo e(number_format($obat->harga, 0, ',', '.')); ?>) 
                                        </option> 
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                                </select>
                                <small class="form-text text-muted">*Tahan tombol <strong>Ctrl</strong> (atau <strong>Cmd</strong> di Mac) untuk memilih lebih dari satu obat.</small>
                            </div> 
 
                            <div class="mb-3 form-group"> 
                                <label for="biaya_periksa">Biaya 
                                    Pemeriksaan 
                                    (Rp)</label> 
                                <input type="text" class="rounded form-control" id="biaya_periksa" 
                                    name="biaya_periksa" value="150000" readonly> 
                            </div> 
 
                            <a type="button" href="<?php echo e(route('dokter.memeriksa.index')); ?>" class="btn btn-secondary"> 
                                Batal 
                            </a> 
                            <button type="submit" class="btn btn-primary"> 
                                Simpan 
                            </button> 
                        </form> 
 
                        <script> 
                            // function hitungBiaya() { 
                            //     const baseBiaya = 150000; 
                            //     let totalBiaya = baseBiaya; 
                            //     const select = document.getElementById('obat'); 
                            //     const selectedOption = select.options[select.selectedIndex]; 
                            //     const harga = parseInt(selectedOption.getAttribute('data-harga')) || 0; 
                            //     totalBiaya += harga; 
 
                            //     document.getElementById('biaya_periksa').value = totalBiaya; 
                            // }

                            function hitungBiaya() {
                                const baseBiaya = 150000;
                                let totalBiaya = baseBiaya;

                                const select = document.getElementById('obat');
                                const selectedOptions = Array.from(select.selectedOptions);

                                selectedOptions.forEach(option => {
                                    const harga = parseInt(option.getAttribute('data-harga')) || 0;
                                    totalBiaya += harga;
                                });

                                document.getElementById('biaya_periksa').value = totalBiaya;
                            }

                        </script> 
                    </section> 
                </div> 
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
<?php endif; ?><?php /**PATH C:\xampp\htdocs\laravel\bimkar-hospital\resources\views/dokter/memeriksa/periksa.blade.php ENDPATH**/ ?>
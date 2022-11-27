
<?php $__env->startSection('content'); ?>
<div class="container w-25 border p-4 my-4">
    <div class="row mx-auto">
    <form  method="POST" action="<?php echo e(route('categories.update',['category' => $category->id])); ?>">
        <?php echo method_field('PATCH'); ?>
  <?php echo csrf_field(); ?>
  <?php if(session('success')): ?>
    <h6 class="alert alert-success"><?php echo e(session('success')); ?> </h6>
  <?php endif; ?>
  <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
  <h6 class="alert alert-danger"><?php echo e($message); ?> </h6>
  <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
  <div class="mb-3">
    <label for="name" class="form-label">Titulo de la tarea</label>
    <input type="text" class="form-control" name="name" value=" <?php echo e($category->name); ?> ">
  </div>
  <div class="mb-3">
    <label for="color" class="form-label">Color</label>
    <input type="color" class="form-control" name="color"  >
  </div>
  <button type="submit" class="btn btn-primary">Actualizar Categoria</button>
</form>
<div>

   <?php if($category->todos->count()> 0): ?>
   <?php $__currentLoopData = $category->todos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $todo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
   <div class="row py-1">
    <div class="col-md-9 d-flex align-items-center">
        <a href="<?php echo e(route('todos-edit',['id'=>$todo->id])); ?>"><?php echo e($todo->title); ?></a>
    </div>
  </div>
  <div class="col-md-3 d-flex justify-content-end">
    <form action="<?php echo e(route('todos-destroy',['id'=>$todo->id])); ?>" method="POST">
      <?php echo method_field('DELETE'); ?>
      <?php echo csrf_field(); ?>
      <button class="btn btn-danger btn-sm">Eliminar</button>
    </form>
  </div>
   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
   <?php else: ?>
   No hay tareas Por completar
   <?php endif; ?>
</div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Ixsych4ron\Documents\tareas-laravel\resources\views/categories/show.blade.php ENDPATH**/ ?>
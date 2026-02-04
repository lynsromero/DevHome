{{-- AJAX Success Message (Alpine.js) --}}
<template x-teleport="body">
    <div x-show="showSuccess" 
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0 translate-x-10"
         x-transition:enter-end="opacity-100 translate-x-0"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-end="opacity-0 translate-x-10"
         style="position: fixed; top: 20px; right: 20px; z-index: 9999; background: #d1fae5; border: 1px solid #34d399; color: #065f46; padding: 15px 25px; border-radius: 8px; box-shadow: 0 4px 12px rgba(0,0,0,0.1); min-width: 300px;">
        <strong class="font-bold">Success!</strong>
        <span x-text="successMsg"></span>
    </div>
</template>

{{-- Standard Laravel Session Success (Traditional Redirects) --}}
@if(session('success'))
<div style="position: fixed; top: 20px; right: 20px; z-index: 9999; background: #d1fae5; border: 1px solid #34d399; color: #065f46; padding: 15px 25px; border-radius: 8px; box-shadow: 0 4px 12px rgba(0,0,0,0.1);">
    <strong class="font-bold">Success!</strong>
    <span>{{ session('success') }}</span>
</div>
@endif

{{-- Error Messages --}}
@if($errors->any())
<div style="position: fixed; top: 20px; right: 20px; z-index: 9999; background: #fee2e2; border: 1px solid #f87171; color: #991b1b; padding: 15px 25px; border-radius: 8px; box-shadow: 0 4px 12px rgba(0,0,0,0.1);">
    <strong class="font-bold">Error!</strong>
    <ul style="margin: 0; padding-left: 20px;">
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
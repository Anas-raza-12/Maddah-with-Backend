@extends('layouts.dash-main')
@section('content')
<div class="group-data-[sidebar-size=lg]:ltr:md:ml-vertical-menu group-data-[sidebar-size=lg]:rtl:md:mr-vertical-menu group-data-[sidebar-size=md]:ltr:ml-vertical-menu-md group-data-[sidebar-size=md]:rtl:mr-vertical-menu-md group-data-[sidebar-size=sm]:ltr:ml-vertical-menu-sm group-data-[sidebar-size=sm]:rtl:mr-vertical-menu-sm pt-[calc(theme('spacing.header')_*_1)] pb-[calc(theme('spacing.header')_*_0.8)] px-4 group-data-[navbar=bordered]:pt-[calc(theme('spacing.header')_*_1.3)] group-data-[navbar=hidden]:pt-0 group-data-[layout=horizontal]:mx-auto group-data-[layout=horizontal]:max-w-screen-2xl group-data-[layout=horizontal]:px-0 group-data-[layout=horizontal]:group-data-[sidebar-size=lg]:ltr:md:ml-auto group-data-[layout=horizontal]:group-data-[sidebar-size=lg]:rtl:md:mr-auto group-data-[layout=horizontal]:md:pt-[calc(theme('spacing.header')_*_1.6)] group-data-[layout=horizontal]:px-3 group-data-[layout=horizontal]:group-data-[navbar=hidden]:pt-[calc(theme('spacing.header')_*_0.9)]">
    <div class="container-fluid group-data-[content=boxed]:max-w-boxed mx-auto">

        <div class="flex flex-col gap-2 py-4 md:flex-row md:items-center print:hidden">
            <div class="grow">
                <h5 class="text-16">Add New</h5>
            </div>
            <ul class="flex items-center gap-2 text-sm font-normal shrink-0">
                <li class="relative before:content-['\ea54'] before:font-remix ltr:before:-right-1 rtl:before:-left-1  before:absolute before:text-[18px] before:-top-[3px] ltr:pr-4 rtl:pl-4 before:text-slate-400 dark:text-zink-200">
                    <a href="{{ route('dashboard.product.list') }}" class="text-slate-400 dark:text-zink-200">Products</a>
                </li>
                <li class="text-slate-700 dark:text-zink-100">
                    Add New
                </li>
            </ul>
        </div>
        <form action="{{ route('dashboard.product.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="grid grid-cols-1 xl:grid-cols-12 gap-x-5">
            <div class="xl:col-span-9">
                <div class="card">
                    <div class="card-body">
                        <h6 class="mb-4 text-15">Create Product</h6>

                        <div class="grid grid-cols-1 gap-5 lg:grid-cols-2 xl:grid-cols-12">
                            <div class="xl:col-span-6">
                                <label for="productNameInput" class="inline-block mb-2 text-base font-medium">Product Title</label>
                                <input type="text" name="title" value="{{ old('title') }}" id="productNameInput" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" placeholder="Product title" required>
                                @error('title')
                                <p class="mt-1 text-sm text-red-400 dark:text-zink-200">{{ $message }}</p>
                                @enderror
                            </div><!--end col-->
                            <div class="xl:col-span-6">
                                <label for="productCodeInput" class="inline-block mb-2 text-base font-medium">Product Slug</label>
                                <input type="text" name="slug" value="{{ old('slug') }}" id="productCodeInput" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" placeholder="Product Code" value="" required>
                                @error('slug')
                                <p class="mt-1 text-sm text-red-400 dark:text-zink-200">{{ $message }}</p>
                                @enderror
                            </div><!--end col-->
                            <div class="xl:col-span-4">
                                <label for="qualityInput" class="inline-block mb-2 text-base font-medium">Quantity</label>
                                <input type="number" name="quantity" value="{{ old('quantity') }}" id="qualityInput" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" placeholder="Quantity" required>
                                @error('quantity')
                                <p class="mt-1 text-sm text-red-400 dark:text-zink-200">{{ $message }}</p>
                                @enderror
                            </div><!--end col-->
                            <div class="xl:col-span-4">
                                <label for="skuInput" class="inline-block mb-2 text-base font-medium">Product Code</label>
                                <input type="text" id="skuInput" name="product_code" value="{{ old('product_code') }}" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" placeholder="TWT-LP-ALU-08" required>
                                @error('product_code')
                                <p class="mt-1 text-sm text-red-400 dark:text-zink-200">{{ $message }}</p>
                                @enderror
                            </div><!--end col-->
                            <div class="xl:col-span-4">
                                <label for="categorySelect" class="inline-block mb-2 text-base font-medium">Stock</label>
                                <select class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" data-choices data-choices-search-false name="stock_status" id="categorySelect">
                                    <option value="">Select Status</option>
                                    <option value="instock">In stock</option>
                                    <option value="outofstock">Out of Stock</option>
                                </select>
                                @error('stock_status')
                                <p class="mt-1 text-sm text-red-400 dark:text-zink-200">{{ $message }}</p>
                                @enderror
                            </div><!--end col-->
                            <div class="xl:col-span-4">
                                <label for="categorySelect" class="inline-block mb-2 text-base font-medium">Category</label>
                                <select class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" data-choices data-choices-search-false name="category" id="categorySelect">
                                    <option value="">Select Category</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                @error('category')
                                <p class="mt-1 text-sm text-red-400 dark:text-zink-200">{{ $message }}</p>
                                @enderror
                            </div><!--end col-->
                            <div class="xl:col-span-4">
                                <label for="productPrice" class="inline-block mb-2 text-base font-medium">Regular Price</label>
                                <input type="number" name="regular_price" value="{{ old('regular_price') }}" id="productPrice" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" placeholder="$0.00" required>
                                @error('regular_price')
                                <p class="mt-1 text-sm text-red-400 dark:text-zink-200">{{ $message }}</p>
                                @enderror
                            </div><!--end col-->
                            <div class="xl:col-span-4">
                                <label for="productPrice" class="inline-block mb-2 text-base font-medium">Sale Price</label>
                                <input type="number" name="sale_price" value="{{ old('sale_price') }}" id="productPrice" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" placeholder="$0.00">
                                @error('sale_price')
                                <p class="mt-1 text-sm text-red-400 dark:text-zink-200">{{ $message }}</p>
                                @enderror
                            </div><!--end col-->
                            <div class="lg:col-span-2 xl:col-span-12">
                                <label for="productImages" class="inline-block mb-2 text-base font-medium">Product Images</label>
                                <div id="productDropzone" class="px-5 py-8 rounded-md dark:bg-zinc-700 dark:xl:bg-zinc-700 dark:lg:bg-zinc-700 dark:md:bg-zinc-700 dark:disabled:border-zinc-500 border border-dashed border-zinc-500 dark:border-zinc-500 cursor-pointer">
                                    <div class="text-center" onclick="document.getElementById('productFileInput').click();">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" data-lucide="upload-cloud" class="lucide lucide-upload-cloud block mx-auto size-12 text-slate-500 fill-slate-200 dark:text-zinc-200 dark:fill-zinc-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path d="M4 14.899A7 7 0 1 1 15.71 8h1.79a4.5 4.5 0 0 1 2.5 8.242"></path>
                                            <path d="M12 12v9"></path>
                                            <path d="m16 16-4-4-4 4"></path>
                                        </svg>
                                        <p class="mt-2 text-sm text-gray-600 dark:text-zinc-200">
                                            Drag and drop your product images or browse your product images
                                        </p>
                                    </div>
                                    <input name="images[]" type="file" id="productFileInput" class="hidden" accept="image/*" multiple onchange="previewProductImages()">
                                    @error('images')
                                    <p class="mt-1 text-sm text-red-400 dark:text-zink-200">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div id="productImagePreviewContainer" class="mt-4 grid grid-cols-3 gap-4"></div>
                            </div>
                            <div class="lg:col-span-2 xl:col-span-12">
                                <div>
                                    <label for="productDescription" class="inline-block mb-2 text-base font-medium">Description</label>
                                    <textarea name="description" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" id="productDescription" placeholder="Enter Description" rows="5">{{ old('description') }}</textarea>
                                    @error('description')
                                    <p class="mt-1 text-sm text-red-400 dark:text-zink-200">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div><!--end grid-->
                        <div class="flex justify-end gap-2 mt-4">
                            <button type="button" class="text-white bg-yellow-500 border-yellow-500 btn hover:text-white hover:bg-yellow-600 hover:border-yellow-600 focus:text-white focus:bg-yellow-600 focus:border-yellow-600 focus:ring focus:ring-yellow-100 active:text-white active:bg-yellow-600 active:border-yellow-600 active:ring active:ring-yellow-100 dark:ring-yellow-400/10">Reset</button>
                            <button type="submit" class="text-white btn bg-custom-500 border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600 focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600 active:border-custom-600 active:ring active:ring-custom-100 dark:ring-custom-400/20">Create Product</button>
                        </div>
                    </div>
                </div><!--end card-->
            </div><!--end col-->
            <div class="xl:col-span-3">
                <div class="card sticky top-[calc(theme('spacing.header')_*_1.3)]">
                    <div class="card-body">
                        <h6 class="mb-4 text-15">Product Featured Image</h6>
                    
                        <!-- This is the div where the uploaded or placeholder image will be shown -->
                        <div id="imagePreviewContainer" class="px-5 py-8 rounded-md bg-sky-50 dark:bg-zinc-700 dark:md:bg-zinc-700 dark:lg:bg-zinc-700">
                            <!-- Placeholder image and text -->
                            {{-- <img id="defaultImage" src="{{ asset('tailwick/assets/images/img-03.png') }}" alt="Upload Featured Image" class="block mx-auto h-44"> --}}
                            <p class="text-center text-gray-600 dark:lg:text-zinc-200 dark:md:text-zinc-200 dark:text-zinc-200 mt-2">Upload Featured Image</p>
                        </div>
                    
                        <!-- File upload input and dropzone -->
                        <div id="dropzone" class="px-5 py-8 rounded-md dark:bg-zinc-700 dark:xl:bg-zinc-700 dark:lg:bg-zinc-700 dark:md:bg-zinc-700 dark:disabled:border-zinc-500 border border-dashed border-zinc-500 dark:border-zinc-500 cursor-pointer">
                            <div class="text-center" onclick="document.getElementById('fileInput').click();">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" data-lucide="upload-cloud" class="lucide lucide-upload-cloud block mx-auto size-12 text-slate-500 fill-slate-200 dark:text-zinc-200 dark:fill-zinc-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path d="M4 14.899A7 7 0 1 1 15.71 8h1.79a4.5 4.5 0 0 1 2.5 8.242"></path>
                                    <path d="M12 12v9"></path>
                                    <path d="m16 16-4-4-4 4"></path>
                                </svg>
                                <p class="mt-2 text-sm text-gray-600 dark:text-zinc-200">
                                    Drag and drop your product images or browse your product images
                                </p>
                            </div>
                            <input name="featured_image" type="file" id="fileInput" class="hidden" accept="image/*" onchange="previewImage()">
                            @error('featured_image')
                            <p class="mt-1 text-sm text-red-400 dark:text-zink-200">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    
                </div>
        </div><!--end grid-->
        </form>
    </div>
    <!-- container-fluid -->
</div>
@endsection
@section('addproductscript')
<script>
    function previewImage() {
    const imagePreviewContainer = document.getElementById('imagePreviewContainer');
    const fileInput = document.getElementById('fileInput');
    const file = fileInput.files[0];

    // Check if a file has been selected
    if (file) {
        const reader = new FileReader();

        reader.onload = function (e) {
            // Replace the existing content (placeholder image and text) with the uploaded image
            imagePreviewContainer.innerHTML = `
                <img src="${e.target.result}" alt="Uploaded Featured Image" class="block mx-auto h-44 rounded-md object-cover">
            `;
        };

        reader.readAsDataURL(file);
    }
}
let productSelectedImages = [];

    function previewProductImages() {
        const productFileInput = document.getElementById('productFileInput');
        const productImagePreviewContainer = document.getElementById('productImagePreviewContainer');
        const files = productFileInput.files;

        // Clear the preview container and reset selectedImages array
        productImagePreviewContainer.innerHTML = '';
        productSelectedImages = [];

        // Loop through files and create previews
        Array.from(files).forEach((file, index) => {
            const reader = new FileReader();
            reader.onload = function(e) {
                // Create image preview element
                const productImagePreview = document.createElement('div');
                productImagePreview.classList.add('relative', 'w-28', 'h-28');

                const img = document.createElement('img');
                img.src = e.target.result;
                img.classList.add('w-full', 'h-full', 'object-cover', 'rounded-md');

                // Create delete button
                const deleteButton = document.createElement('button');
                deleteButton.innerHTML = 'Delete';
                deleteButton.classList.add('absolute', 'top-0', 'right-0', 'bg-red-500', 'text-white', 'rounded-full', 'p-1', 'text-xs');
                deleteButton.onclick = function() {
                    // Show confirmation dialog before deleting
                    if (confirm("Are you sure you want to delete this image?")) {
                        // Remove the image preview from the DOM
                        productImagePreview.remove();
                        // Mark the image as deleted
                        productSelectedImages = productSelectedImages.filter((img, i) => i !== index);
                    }
                };

                // Add image and delete button to the preview div
                productImagePreview.appendChild(img);
                productImagePreview.appendChild(deleteButton);
                productImagePreviewContainer.appendChild(productImagePreview);

                // Add image to selectedImages array
                productSelectedImages.push(file);
            };
            reader.readAsDataURL(file);
        });
    }

    function submitProductForm() {
        const formData = new FormData();
        // Append only the non-deleted images
        productSelectedImages.forEach(image => {
            formData.append('images[]', image);
        });

        // Make your form submission request here (e.g., via fetch or AJAX)
        // Example:
        // fetch('your-backend-url', { method: 'POST', body: formData })
    }
</script>
@endsection
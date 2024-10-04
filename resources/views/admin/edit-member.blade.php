@extends('layouts.dash-main')
@section('content')
<div class="group-data-[sidebar-size=lg]:ltr:md:ml-vertical-menu group-data-[sidebar-size=lg]:rtl:md:mr-vertical-menu group-data-[sidebar-size=md]:ltr:ml-vertical-menu-md group-data-[sidebar-size=md]:rtl:mr-vertical-menu-md group-data-[sidebar-size=sm]:ltr:ml-vertical-menu-sm group-data-[sidebar-size=sm]:rtl:mr-vertical-menu-sm pt-[calc(theme('spacing.header')_*_1)] pb-[calc(theme('spacing.header')_*_0.8)] px-4 group-data-[navbar=bordered]:pt-[calc(theme('spacing.header')_*_1.3)] group-data-[navbar=hidden]:pt-0 group-data-[layout=horizontal]:mx-auto group-data-[layout=horizontal]:max-w-screen-2xl group-data-[layout=horizontal]:px-0 group-data-[layout=horizontal]:group-data-[sidebar-size=lg]:ltr:md:ml-auto group-data-[layout=horizontal]:group-data-[sidebar-size=lg]:rtl:md:mr-auto group-data-[layout=horizontal]:md:pt-[calc(theme('spacing.header')_*_1.6)] group-data-[layout=horizontal]:px-3 group-data-[layout=horizontal]:group-data-[navbar=hidden]:pt-[calc(theme('spacing.header')_*_0.9)]">
    <div class="container-fluid group-data-[content=boxed]:max-w-boxed mx-auto">

        <div class="flex flex-col gap-2 py-4 md:flex-row md:items-center print:hidden">
            <div class="grow">
                <h5 class="text-16">Edit</h5>
            </div>
            <ul class="flex items-center gap-2 text-sm font-normal shrink-0">
                <li class="relative before:content-['\ea54'] before:font-remix ltr:before:-right-1 rtl:before:-left-1  before:absolute before:text-[18px] before:-top-[3px] ltr:pr-4 rtl:pl-4 before:text-slate-400 dark:text-zink-200">
                    <a href="{{ route('dashboard.categories.list') }}" class="text-slate-400 dark:text-zink-200">Our Team</a>
                </li>
                <li class="text-slate-700 dark:text-zink-100">
                    Edit
                </li>
            </ul>
        </div>
        <form action="{{ route('dashboard.ourteam.updatemember', $member->id ) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="grid grid-cols-1 xl:grid-cols-12 gap-x-5">
            <div class="xl:col-span-9">
                <div class="card">
                    <div class="card-body">
                        <h6 class="mb-4 text-15">Edit Member</h6>

                        <div class="grid grid-cols-1 gap-5 lg:grid-cols-2 xl:grid-cols-12">
                            <div class="xl:col-span-12">
                                <label for="productNameInput" class="inline-block mb-2 text-base font-medium">Member Name</label>
                                <input name="name" type="text" id="productNameInput" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" placeholder="Member Name" value="{{ old('name', $member->name) }}" required>
                                @error('name')
                                <p class="mt-1 text-sm text-red-400 dark:text-zink-200">{{ $message }}</p>
                                @enderror
                            </div><!--end col-->
                            <div class="xl:col-span-6">
                                <label for="productCodeInput" class="inline-block mb-2 text-base font-medium">Profession</label>
                                <input name="profession" type="text" id="productCodeInput" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" placeholder="Member Profession" value="{{ old('profession', $member->profession) }}" required>
                                @error('profession')
                                <p class="mt-1 text-sm text-red-400 dark:text-zink-200">{{ $message }}</p>
                                @enderror
                            </div><!--end col-->
                            <div class="xl:col-span-6">
                                <label for="productCodeInput" class="inline-block mb-2 text-base font-medium">Facebook Link</label>
                                <input name="facebook" type="text" id="productCodeInput" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" placeholder="Member Facebook Profile Link" value="{{ old('facebook', $member->facebook) }}">
                                @error('facebook')
                                <p class="mt-1 text-sm text-red-400 dark:text-zink-200">{{ $message }}</p>
                                @enderror
                            </div><!--end col-->
                            <div class="xl:col-span-6">
                                <label for="productCodeInput" class="inline-block mb-2 text-base font-medium">Instagram Link</label>
                                <input name="instagram" type="text" id="productCodeInput" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" placeholder="Member Instagram Profile Link" value="{{ old('instagram', $member->instagram) }}">
                                @error('instagram')
                                <p class="mt-1 text-sm text-red-400 dark:text-zink-200">{{ $message }}</p>
                                @enderror
                            </div><!--end col-->
                            <div class="xl:col-span-6">
                                <label for="productCodeInput" class="inline-block mb-2 text-base font-medium">Twitter Link</label>
                                <input name="twitter" type="text" id="productCodeInput" class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" placeholder="Member Twitter X Profile Link" value="{{ old('twitter', $member->twitter) }}">
                                @error('twitter')
                                <p class="mt-1 text-sm text-red-400 dark:text-zink-200">{{ $message }}</p>
                                @enderror
                            </div><!--end col-->
                            <div class="lg:col-span-2 xl:col-span-12">
                                <label for="genderSelect" class="inline-block mb-2 text-base font-medium">Member Image</label>
                                <div id="dropzone" class="px-5 py-8 rounded-md dark:bg-zinc-700 dark:xl:bg-zinc-700 dark:lg:bg-zinc-700 dark:md:bg-zinc-700 dark:disabled:border-zinc-500 border border-dashed border-zinc-500 dark:border-zinc-500 cursor-pointer">
                                    <div class="text-center" onclick="document.getElementById('fileInput').click();">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" data-lucide="upload-cloud" class="lucide lucide-upload-cloud block mx-auto size-12 text-slate-500 fill-slate-200 dark:text-zinc-200 dark:fill-zinc-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path d="M4 14.899A7 7 0 1 1 15.71 8h1.79a4.5 4.5 0 0 1 2.5 8.242"></path>
                                            <path d="M12 12v9"></path>
                                            <path d="m16 16-4-4-4 4"></path>
                                        </svg>
                                        <p class="mt-2 text-sm text-gray-600 dark:text-zinc-200">
                                            Drag and drop your member image or browse your member image
                                        </p>
                                    </div>
                                    <input name="image" type="file" id="fileInput" class="hidden" multiple accept="image/*" onchange="previewImages()">
                                </div>
                                <div id="preview" class="w-30 mt-4 grid grid-cols-2 gap-4">
                                    @if ($member->image)
                                        <img src="{{ asset('uploads/members/' . $member->image) }}" 
                                             alt="{{ $member->name ?? 'Member Image' }}" 
                                             class="h-32 w-28 object-cover rounded-md" id="oldImage">
                                    @endif
                                </div>
                            </div>
                            <div class="lg:col-span-2 xl:col-span-12">
                                @error('image')
                                <p class="flex flex-row mt-1 text-sm text-red-400 dark:text-zink-200">{{ $message }}</p>
                                @enderror
                            </div>
                        </div><!--end grid-->
                        <div class="flex justify-end gap-2 mt-4">
                            <button type="button" class="text-white bg-yellow-500 border-yellow-500 btn hover:text-white hover:bg-yellow-600 hover:border-yellow-600 focus:text-white focus:bg-yellow-600 focus:border-yellow-600 focus:ring focus:ring-yellow-100 active:text-white active:bg-yellow-600 active:border-yellow-600 active:ring active:ring-yellow-100 dark:ring-yellow-400/10">Reset</button>
                            <button type="submit" class="text-white btn bg-custom-500 border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600 focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600 active:border-custom-600 active:ring active:ring-custom-100 dark:ring-custom-400/20">Edit Member</button>
                        </div>
                    </div>
                </div><!--end card-->
            </div><!--end col-->
        </form>
    </div>
    <!-- container-fluid -->
</div>
@endsection
@section('addproductscript')
<script>
    function previewImages() {
        const preview = document.getElementById('preview');
        const oldImage = document.getElementById('oldImage');
        const files = document.getElementById('fileInput').files;

        // Clear the preview area and remove the old image when new file is selected
        preview.innerHTML = '';

        if (oldImage) {
            oldImage.remove();
        }

        for (let i = 0; i < files.length; i++) {
            const file = files[i];
            const reader = new FileReader();

            reader.onload = function (e) {
                const img = document.createElement('img');
                img.src = e.target.result;
                img.classList.add('h-32', 'w-28', 'object-cover', 'rounded-md');
                preview.appendChild(img);
            };

            reader.readAsDataURL(file);
        }
    }
</script>
@endsection
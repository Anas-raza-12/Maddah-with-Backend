@extends('layouts.dash-main')
@section('content')
<div class="group-data-[sidebar-size=lg]:ltr:md:ml-vertical-menu group-data-[sidebar-size=lg]:rtl:md:mr-vertical-menu group-data-[sidebar-size=md]:ltr:ml-vertical-menu-md group-data-[sidebar-size=md]:rtl:mr-vertical-menu-md group-data-[sidebar-size=sm]:ltr:ml-vertical-menu-sm group-data-[sidebar-size=sm]:rtl:mr-vertical-menu-sm pt-[calc(theme('spacing.header')_*_1)] pb-[calc(theme('spacing.header')_*_0.8)] px-4 group-data-[navbar=bordered]:pt-[calc(theme('spacing.header')_*_1.3)] group-data-[navbar=hidden]:pt-0 group-data-[layout=horizontal]:mx-auto group-data-[layout=horizontal]:max-w-screen-2xl group-data-[layout=horizontal]:px-0 group-data-[layout=horizontal]:group-data-[sidebar-size=lg]:ltr:md:ml-auto group-data-[layout=horizontal]:group-data-[sidebar-size=lg]:rtl:md:mr-auto group-data-[layout=horizontal]:md:pt-[calc(theme('spacing.header')_*_1.6)] group-data-[layout=horizontal]:px-3 group-data-[layout=horizontal]:group-data-[navbar=hidden]:pt-[calc(theme('spacing.header')_*_0.9)]">
    <div class="container-fluid group-data-[content=boxed]:max-w-boxed mx-auto">

        @if (Session::has('success'))
            <div id="alert" class="max-w-md w-full bg-white shadow-lg rounded-lg pointer-events-auto flex ring-1 ring-black ring-opacity-5 transition-all duration-300 ease-in-out opacity-100 transform translate-y-0 mt-5">
                <div class="flex-1 w-0 p-4">
                    <div class="flex items-start">
                        <div class="flex-shrink-0 pt-0.5">
                            <svg class="h-10 w-10 text-green-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <div class="flex-1">
                            <p class="text-sm font-medium text-gray-900">
                                Successfully saved!
                            </p>
                            <p class="mt-1 text-sm text-gray-500">
                                {{ Session::get('success') }}
                            </p>
                        </div>
                    </div>
                </div>
                <div class="flex border-l border-gray-200">
                    <button id="closeButton" class="w-full border border-transparent rounded-none rounded-r-lg p-4 flex items-center justify-center text-sm font-medium text-indigo-600 hover:text-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                        Close
                    </button>
                </div>
            </div>
        @elseif (Session::has('edit'))
            <div id="alert" class="max-w-md w-full bg-white shadow-lg rounded-lg pointer-events-auto flex ring-1 ring-black ring-opacity-5 transition-all duration-300 ease-in-out opacity-100 transform translate-y-0 mt-5">
                <div class="flex-1 w-0 p-4">
                    <div class="flex items-start">
                        <div class="flex-shrink-0 pt-0.5">
                            <svg class="h-10 w-10 text-green-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <div class="flex-1">
                            <p class="text-sm font-medium text-gray-900">
                                Successfully edited!
                            </p>
                            <p class="mt-1 text-sm text-gray-500">
                                {{ Session::get('edit') }}
                            </p>
                        </div>
                    </div>
                </div>
                <div class="flex border-l border-gray-200">
                    <button id="closeButton" class="w-full border border-transparent rounded-none rounded-r-lg p-4 flex items-center justify-center text-sm font-medium text-indigo-600 hover:text-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                        Close
                    </button>
                </div>
            </div>
        @elseif (Session::has('delete'))
        <div id="alert" class="max-w-md w-full bg-white shadow-lg rounded-lg pointer-events-auto flex ring-1 ring-black ring-opacity-5 transition-all duration-300 ease-in-out opacity-100 transform translate-y-0 mt-5">
            <div class="flex-1 w-0 p-4">
                <div class="flex items-start">
                    <div class="flex-shrink-0 pt-0.5">
                        <svg class="h-10 w-10 text-red-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <div class="flex-1">
                        <p class="text-sm font-medium text-gray-900">
                            Successfully deleted!
                        </p>
                        <p class="mt-1 text-sm text-gray-500">
                            {{ Session::get('delete') }}
                        </p>
                    </div>
                </div>
            </div>
            <div class="flex border-l border-gray-200">
                <button id="closeButton" class="w-full border border-transparent rounded-none rounded-r-lg p-4 flex items-center justify-center text-sm font-medium text-indigo-600 hover:text-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    Close
                </button>
            </div>
        </div>
        @endif

        <div class="flex flex-col gap-2 py-4 md:flex-row md:items-center print:hidden">
            <div class="grow">
                <h5 class="text-16">Our Team</h5>
            </div>
            <ul class="flex items-center gap-2 text-sm font-normal shrink-0">
                <li class="relative before:content-['\ea54'] before:font-remix ltr:before:-right-1 rtl:before:-left-1  before:absolute before:text-[18px] before:-top-[3px] ltr:pr-4 rtl:pl-4 before:text-slate-400 dark:text-zink-200">
                    <a href="{{ route('dashboard.ourteam.list') }}" class="text-slate-400 dark:text-zink-200">Our Team</a>
                </li>
                <li class="text-slate-700 dark:text-zink-100">
                    List View
                </li>
            </ul>
        </div>
        <div class="card" id="customerList">
            <div class="card-body">
                <div class="grid grid-cols-1 gap-5 mb-5 xl:grid-cols-2">
                    <div>
                        <div class="relative xl:w-3/6">
                            <input type="text" class="ltr:pl-8 rtl:pr-8 search form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" placeholder="Search for ..." autocomplete="off">
                            <i data-lucide="search" class="inline-block size-4 absolute ltr:left-2.5 rtl:right-2.5 top-2.5 text-slate-500 dark:text-zink-200 fill-slate-100 dark:fill-zink-600"></i>
                        </div>
                    </div>
                    <div class="ltr:md:text-end rtl:md:text-start"> 
                        <a href="{{ route('dashboard.ourteam.addmember') }}" data-modal-target="showModal" class="text-white btn bg-custom-500 border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600 focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600 active:border-custom-600 active:ring active:ring-custom-100 dark:ring-custom-400/20 add-btn" data-bs-toggle="modal" id="create-btn" data-bs-target="#showModal"><i class="align-bottom ri-add-line me-1"></i> Add New Member</a>
                    </div>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full whitespace-nowrap" id="customerTable">
                        <thead class="bg-slate-100 dark:bg-zink-600">
                            <tr>
                                <th class="sort px-3.5 py-2.5 font-semibold border-b border-slate-200 dark:border-zink-500 ltr:text-left rtl:text-right" data-sort="customer_name">S.No</th>
                                <th class="sort px-3.5 py-2.5 font-semibold border-b border-slate-200 dark:border-zink-500 ltr:text-left rtl:text-right" data-sort="email">Name</th>
                                <th class="sort px-3.5 py-2.5 font-semibold border-b border-slate-200 dark:border-zink-500 ltr:text-left rtl:text-right" data-sort="phone">Profession</th>
                                <th class="sort px-3.5 py-2.5 font-semibold border-b border-slate-200 dark:border-zink-500 ltr:text-left rtl:text-right" data-sort="date">Facebook Link</th>
                                <th class="sort px-3.5 py-2.5 font-semibold border-b border-slate-200 dark:border-zink-500 ltr:text-left rtl:text-right" data-sort="date">Instagram Link</th>
                                <th class="sort px-3.5 py-2.5 font-semibold border-b border-slate-200 dark:border-zink-500 ltr:text-left rtl:text-right" data-sort="date">Twitter X Link</th>
                                <th class="sort px-3.5 py-2.5 font-semibold border-b border-slate-200 dark:border-zink-500 ltr:text-left rtl:text-right" data-sort="action">Action</th>
                            </tr>
                        </thead>
                        <tbody class="list form-check-all">
                            @foreach ($teams as $team)
                                <tr>
                                    <td class="px-3.5 py-2.5 border-y border-slate-200 dark:border-zink-500 customer_name">{{ $team->id }}</td>
                                    <td class="px-3.5 py-2.5 border-y border-slate-200 dark:border-zink-500 product_name">
                                        <div class="flex items-center gap-2">
                                            <img src="{{ asset('uploads/members/' . $team->image) }}" alt="{{ $team->image }}" class="rounded-full h-12">
                                            <h6 class="product_name">{{ $team->name }}</h6>
                                        </div>
                                    </td>
                                    <td class="px-3.5 py-2.5 border-y border-slate-200 dark:border-zink-500 phone">{{ $team->profession }}</td>
                                    <td class="px-3.5 py-2.5 border-y border-slate-200 dark:border-zink-500 date">{{ $team->facebook == '' ? 'Not Linked' :  $team->facebook }}</td>
                                    <td class="px-3.5 py-2.5 border-y border-slate-200 dark:border-zink-500 date">{{ $team->instagram == '' ? 'Not Linked' :  $team->instagram }}</td>
                                    <td class="px-3.5 py-2.5 border-y border-slate-200 dark:border-zink-500 date">{{ $team->twitter == '' ? 'Not Linked' :  $team->twitter }}</td>
                                    <td class="px-3.5 py-2.5 border-y border-slate-200 dark:border-zink-500">
                                        <div class="flex gap-2">
                                            <div class="edit">
                                                <a href="{{ route('dashboard.ourteam.editmember', $team->id ) }}" data-modal-target="showModal" class="py-1 text-xs text-white btn bg-custom-500 border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600 focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600 active:border-custom-600 active:ring active:ring-custom-100 dark:ring-custom-400/20 edit-item-btn">Edit</a>
                                            </div>
                                            <div class="remove">
                                                <form action="{{ route('dashboard.ourteam.deletemember', $team->id ) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button data-modal-target="deleteRecordModal" id="delete-record" class="py-1 text-xs text-white bg-red-500 border-red-500 btn hover:text-white hover:bg-red-600 hover:border-red-600 focus:text-white focus:bg-red-600 focus:border-red-600 focus:ring focus:ring-red-100 active:text-white active:bg-red-600 active:border-red-600 active:ring active:ring-red-100 dark:ring-custom-400/20 remove-item-btn">Remove</button>
                                                </form>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="noresult" style="display: none">
                        <div class="text-center p-7">
                            <h5 class="mb-2">Sorry! No Result Found</h5>
                            <p class="mb-0 text-slate-500 dark:text-zink-200">We've searched more than 150+ Orders We did not find any orders for you search.</p>
                        </div>
                    </div>
                </div>

                <div class="flex justify-end mt-4">
                    <div class="flex gap-2 pagination-wrap">
                        <a class="inline-flex items-center justify-center bg-white dark:bg-zink-700 h-8 px-3 transition-all duration-150 ease-linear border rounded border-slate-200 dark:border-zink-500 text-slate-500 dark:text-zink-200 hover:text-custom-500 dark:hover:text-custom-500 hover:bg-custom-50 dark:hover:bg-custom-500/10 focus:bg-custom-50 dark:focus:bg-custom-500/10 focus:text-custom-500 dark:focus:text-custom-500 [&.active]:text-custom-500 dark:[&.active]:text-custom-500 [&.active]:bg-custom-50 dark:[&.active]:bg-custom-500/10 [&.active]:border-custom-50 dark:[&.active]:border-custom-500/10 [&.active]:hover:text-custom-700 dark:[&.active]:hover:text-custom-700 [&.disabled]:text-slate-400 dark:[&.disabled]:text-zink-300 [&.disabled]:cursor-auto page-item pagination-prev disabled pagination-prev disabled" href="#">
                            Previous
                        </a>
                        <ul class="flex gap-2 mb-0 pagination listjs-pagination"></ul>
                        <a class="inline-flex items-center justify-center bg-white dark:bg-zink-700 h-8 px-3 transition-all duration-150 ease-linear border rounded border-slate-200 dark:border-zink-500 text-slate-500 dark:text-zink-200 hover:text-custom-500 dark:hover:text-custom-500 hover:bg-custom-50 dark:hover:bg-custom-500/10 focus:bg-custom-50 dark:focus:bg-custom-500/10 focus:text-custom-500 dark:focus:text-custom-500 [&.active]:text-custom-500 dark:[&.active]:text-custom-500 [&.active]:bg-custom-50 dark:[&.active]:bg-custom-500/10 [&.active]:border-custom-50 dark:[&.active]:border-custom-500/10 [&.active]:hover:text-custom-700 dark:[&.active]:hover:text-custom-700 [&.disabled]:text-slate-400 dark:[&.disabled]:text-zink-300 [&.disabled]:cursor-auto page-item pagination-prev disabled pagination-next" href="#">
                            Next
                        </a>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- container-fluid -->
</div>
<script>
    const alert = document.getElementById('alert');
    const closeButton = document.getElementById('closeButton');

    function hideAlert() {
        alert.classList.remove('opacity-100', 'translate-y-0');
        alert.classList.add('opacity-0', 'translate-y-1');
        setTimeout(() => {
            alert.style.display = 'none';
        }, 300);
    }

    closeButton.addEventListener('click', hideAlert);

    setTimeout(hideAlert, 5000);
</script>
@endsection

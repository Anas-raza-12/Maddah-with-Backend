@extends('layouts.main') @section('title', 'My Account') @section('bodyClass', 'my-Account') @section('content')

<div class="links container d-flex">
    <a class="disable" href="#">Home</a> /
    <a class="Active" href="#">My Account</a>
</div>

<div class="first-container container">
    <h1>Manage My Account</h1>
    <div class="row">
        <div class="col-lg-2">
            <h3 id="My-Profile" class="section-link">My Profile</h3>
            <h3 id="address" class="section-link">Addresses Book</h3>
            <h3 id="Orders" class="section-link">My Orders</h3>
            <a href="">Log Out</a>
        </div>

        <div class="col-lg-10">
            <div data-aos="zoom-in" data-aos-duration="1000" id="My-Profile-section" class="section-content row my-4">
                <h2>Edit Your Profile</h2>
                <div class="col-lg-12">
                    <label for="first-name">First Name</label> <br />
                    <input type="text" name="first-name" id="first-name" placeholder="Enter Your First Name" />
                </div>
                <div class="col-lg-12">
                    <label for="last-name">Last Name</label> <br />
                    <input type="text" name="last-name" id="last-name" placeholder="Enter Your Last Name" />
                </div>
                <div class="col-lg-12">
                    <label for="last-name">Email</label> <br />
                    <input type="email" name="last-name" id="last-name" placeholder="Enter Your Email" />
                </div>
                <div class="col-lg-12">
                    <label for="last-name">Address</label> <br />
                    <input type="text" name="last-name" id="last-name" placeholder="Enter Your Adress" />
                </div>

                <div class="col-lg-12">
                    <label for="last-name">Password Changes</label> <br />
                    <input type="text" name="last-name" id="last-name" placeholder="Current Passwod" />
                    <input type="text" name="last-name" id="last-name" placeholder="New Passwod" />
                    <input type="text" name="last-name" id="last-name" placeholder="Confirm New Passwod" />
                </div>
            </div>

            <div data-aos="zoom-in" data-aos-duration="1000" id="address-section" class="section-content">
                <h2>Addresses</h2>

                <div class="d-flex justify-content-between align-items-center">
                    <p>
                        The Following addresses will be usedon <br />
                        the checked page by default
                    </p>
                    <button class="for-pc">Add new</button>
                    <button class="for-tab-mobile"><i class="fa-solid fa-plus"></i></button>
                </div>
                <h4>Shipping Address :</h4>
                <h6>Anas Raza<i class="fa-solid fa-circle-check"></i></h6>
                <textarea name="" id="" placeholder="Enter Your full Address" rows="5"></textarea>
                <button>Submite</button>
                <div class="d-flex gap-3 align-items-center my-5">
                    <h6 class="m-0">Mobile :</h6>
                    <p class="m-0">1234567890</p>
                </div>
            </div>

            <div data-aos="zoom-in" data-aos-duration="1000" id="Orders-section" class="section-content">
                <h2>My Orders</h2>

                <div data-aos="zoom-in" data-aos-duration="1000" class="table-responsive my-5">
                    <table class="orders-table table">
                        <thead>
                            <tr>
                                <th>OrderNo</th>
                                <th>Name</th>
                                <th>Subtotal</th>
                                <th>Total</th>
                                <th>Items</th>
                                <th>Delivered On</th>
                                <th>View More</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>10001</td>
                                <td>Sudhir Kumar</td>
                                <td>$172.00</td>
                                <td>$208.12</td>
                                <td>2</td>
                                <td>2024-07-07</td>
                                <td><a href="" class="view-btn">👁</a></td>
                            </tr>
                            <tr>
                                <td>10003</td>
                                <td>Sudhir Kumar</td>
                                <td>$154.80</td>
                                <td>$187.31</td>
                                <td>2</td>
                                <td></td>
                                <td><a href="" class="view-btn">👁</a></td>
                            </tr>
                            <tr>
                                <td>10002</td>
                                <td>Sudhir Kumar</td>
                                <td>$71.00</td>
                                <td>$85.91</td>
                                <td>1</td>
                                <td></td>
                                <td><a href="" class="view-btn">👁</a></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            
        </div>
    </div>
</div>

<style>
    .active-link {
        color: #8b4513;
    }
</style>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const links = document.querySelectorAll(".section-link");
        const profileSection = document.getElementById("My-Profile-section");
        const addressSection = document.getElementById("address-section");
        const ordersSection = document.getElementById("Orders-section");
        const view_btns = document.querySelectorAll(".view-btn");
        const viewBtnSection = document.querySelector(".view-btn-section");

        function hideAllSections() {
            profileSection.style.display = "none";
            addressSection.style.display = "none";
            ordersSection.style.display = "none";
        }

        function removeActiveClass() {
            links.forEach((link) => link.classList.remove("active-link"));
        }

        hideAllSections();
        profileSection.style.display = "block";
        links[0].classList.add("active-link");

        links.forEach((link) => {
            link.addEventListener("click", function () {
                hideAllSections();
                removeActiveClass();

                if (this.id === "My-Profile") {
                    profileSection.style.display = "block";
                    addressSection.style.display = "none";
                    ordersSection.style.display = "none";
                    viewBtnSection.style.display = "none";
                } else if (this.id === "address") {
                    profileSection.style.display = "none";
                    addressSection.style.display = "block";
                    ordersSection.style.display = "none";
                    viewBtnSection.style.display = "none";
                } else if (this.id === "Orders") {
                    profileSection.style.display = "none";
                    addressSection.style.display = "none";
                    ordersSection.style.display = "block";
                    viewBtnSection.style.display = "none";
                }

                this.classList.add("active-link");
            });
        });

        view_btns.forEach((btn) => {
            btn.addEventListener("click", function () {
                ordersSection.style.display = "none";
                viewBtnSection.style.display = "block";
            });
        });
    });
</script>

@endsection

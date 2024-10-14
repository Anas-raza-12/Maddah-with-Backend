@extends('layouts.main') @section('title', 'Wishlist') @section('bodyClass', 'wishlist') @section('content')
<div class="first-container container my-4">
    <div class="d-flex wishlist">
        <h2>Wishlist <span>(5)</span></h2>
        <a href="">Move All To Bag</a>
    </div>
    <div class="wishlist-row row">
        <div class="col-lg-2 col-md-3">
            <div style="border-radius: 5px; overflow: hidden;" class="position-relative rounded p-0">
                <a href="">
                    <img
                        width="100%"
                        src="https://s3-alpha-sig.figma.com/img/dfd4/5c5b/3c137a48f8335aae24dfb4eafe537e01?Expires=1729468800&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4&Signature=no7OoqhHhJdto0F0R2-WkUP2GNG1-MmRm-cyK7TnBNtyaxE-oRwqzUYZpLOxg8uxY3uukEPZc3G2O5JigmWzF4tizCuClcpnZNV0Y~IF2peN0tiUl8klNADfP~Okg~8Rs~lPrEKfw0LMYBJKnn3p0FCmh7ri~5EuppyutL5dryB4fdDP5qzqM8yN3r7A1T9r8DvxE4v6BcS5UzhXTJ7aKvoDEjZkGiFRjBNeLuMfVmGcM3sXwNDyUb4x9hDIHb9N8pSFInuAg8ht1FYuoRS9bfJfoMIuHOp~rBu4qSxdKG3PtyTakzqOzawfz2~-BhFnsau2n4MdBqS0TJGNKrACWg__"
                        alt=""
                    />
                </a>

                <button  class="addCart-btn">
                    <i class="fa-solid fa-cart-shopping"> </i>
                    Add To Cart
                </button>
                <div style="position: absolute;">
                    <p class="rounded" style="background: #db4444; color: #fff;">-35%</p>
                    <a href="" class="wishlist-btn"><i class="fa-regular fa-heart"></i> </a>
                </div>
            </div>
            <div class="tittel">Musical Instruments</div>
            <div class="prices">$960 <span> $1106 </span></div>
            <div class="rating"><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i> <span>(65)</span></div>
        </div>
    </div>
    <div class="second-container container my-4">
        <div class="d-flex wishlist">
            <h2>Just For You</h2>
            <a href="">See All</a>
        </div>
        <div class="wishlist-row row">
            <div class="col-lg-2 col-md-3">
                <div style="border-radius: 5px; overflow: hidden;" class="position-relative rounded p-0">
                    <a href="">
                        <img
                            width="100%"
                            src="https://s3-alpha-sig.figma.com/img/dfd4/5c5b/3c137a48f8335aae24dfb4eafe537e01?Expires=1729468800&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4&Signature=no7OoqhHhJdto0F0R2-WkUP2GNG1-MmRm-cyK7TnBNtyaxE-oRwqzUYZpLOxg8uxY3uukEPZc3G2O5JigmWzF4tizCuClcpnZNV0Y~IF2peN0tiUl8klNADfP~Okg~8Rs~lPrEKfw0LMYBJKnn3p0FCmh7ri~5EuppyutL5dryB4fdDP5qzqM8yN3r7A1T9r8DvxE4v6BcS5UzhXTJ7aKvoDEjZkGiFRjBNeLuMfVmGcM3sXwNDyUb4x9hDIHb9N8pSFInuAg8ht1FYuoRS9bfJfoMIuHOp~rBu4qSxdKG3PtyTakzqOzawfz2~-BhFnsau2n4MdBqS0TJGNKrACWg__"
                            alt=""
                        />
                    </a>

                    <button  class="addCart-btn">
                    <i class="fa-solid fa-cart-shopping"> </i>
                    Add To Cart
                </button>
                    <div style="position: absolute;">
                        <p class="rounded" style="background: #db4444; color: #fff;">-35%</p>
                        <a href="" class="wishlist-btn"><i class="fa-regular fa-heart"></i> </a>
                    </div>
                </div>
                <div class="tittel">Musical Instruments</div>
                <div class="prices">$960 <span> $1106 </span></div>
                <div class="rating"><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i> <span>(65)</span></div>
            </div>
        </div>
    </div>
    @endsection
</div>

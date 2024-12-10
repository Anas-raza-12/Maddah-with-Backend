<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Order;
use App\Models\OurTeam;
use App\Models\Product;
use App\Models\Category;
use App\Models\PromoEmail;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class AdminController extends Controller
{
    public function product() {
        $products = Product::orderBy('created_at', 'DESC')->paginate(10);
        return view('admin.product-list', compact('products'));
    }

    public function addProduct() {
        $categories = Category::select('id', 'name')->orderBy('name')->get();
        return view('admin.add-product', compact('categories'));
    }

    public function storeProduct(Request $request) {
        $request->validate([
            'title' => 'required',
            'slug' => 'required|unique:products,slug',
            'description' => 'required',
            'regular_price' => 'required|numeric',
            'sale_price' => 'nullable|numeric',
            'product_code' => 'required | unique:products,product_code',
            'stock_status' => 'required',
            'quantity' => 'required|numeric',
            'featured_image' => 'required|mimes:png,jpg,jpeg|max:5048',
            'images.*' => 'required|mimes:png,jpg,jpeg|max:20048',
            'category' => 'required'
        ]);
        
        $product = new Product();
        $product->title = $request->title;
        $product->slug = Str::slug($request->slug);
        $product->description = $request->description;
        $product->regular_price = $request->regular_price;
        $product->sale_price = $request->sale_price;
        $product->product_code = $request->product_code;
        $product->stock_status = $request->stock_status;
        $product->quantity = $request->quantity;
        $product->category_id = $request->category;
        
        $current_timestamp = Carbon::now()->format('Ymd_His');
        
        if ($request->hasFile('featured_image')) {
            $fImage = $request->file('featured_image');
            $featuredImageName = $current_timestamp . '.' . $fImage->extension();
            $fImage->move(public_path('uploads/products'), $featuredImageName);
            $product->featured_image = $featuredImageName;
        }
        
        $gallery_arr = [];
        $gallery_images = "";
        $counter = 1;
        
        if ($request->hasFile('images')) {
            $files = $request->file('images');
        
            foreach ($files as $file) {
                if ($file->isValid()) {
                    $gfileName = $current_timestamp . '_' . $counter . '.' . $file->extension();
                    $file->move(public_path('uploads/products'), $gfileName);
                    array_push($gallery_arr, $gfileName);
                    $counter++;
                }
            }
            
            $gallery_images = implode(',', $gallery_arr);
        }
        
        $product->images = $gallery_images;
        $product->save();
        return redirect()->route('dashboard.product.list')->with('success', 'Product has been added successfully');
        
    }

    public function editProduct(Request $request, String $id) {
        $product = Product::findOrFail($id);
        $categories = Category::select('id', 'name')->orderBy('name')->get();
        $productImages = explode(',', $product->images);
        return view('admin.edit-product', compact('product', 'categories', 'productImages'));
    }

    public function updateProduct(Request $request, String $id) {
        $product = Product::findOrFail($id);

        $request->validate([
            'title' => 'required',
            'slug' => 'required|unique:products,slug,' . $product->id,
            'description' => 'required',
            'regular_price' => 'required|numeric',
            'sale_price' => 'nullable|numeric',
            'product_code' => 'required | | unique:products,product_code,' . $product->id,
            'stock_status' => 'required',
            'quantity' => 'required|numeric',
            'featured_image' => 'mimes:png,jpg,jpeg|max:5048',
            'images.*' => 'mimes:png,jpg,jpeg|max:20048',
            'category' => 'required'
        ]);

        $product->title = $request->title;
        $product->slug = Str::slug($request->slug);
        $product->description = $request->description;
        $product->regular_price = $request->regular_price;
        $product->sale_price = $request->sale_price;
        $product->product_code = $request->product_code;
        $product->stock_status = $request->stock_status;
        $product->quantity = $request->quantity;
        $product->category_id = $request->category;

        $current_timestamp = Carbon::now()->format('Ymd_His');

        if ($request->hasFile('featured_image')) {
            if (File::exists(public_path('uploads/products/' . $product->featured_image))) {
                File::delete(public_path('uploads/products/' . $product->featured_image));
            }

            $fImage = $request->file('featured_image');
            $featuredImageName = $current_timestamp . '.' . $fImage->extension();
            $fImage->move(public_path('uploads/products'), $featuredImageName);
            $product->featured_image = $featuredImageName;
        }

        $gallery_arr = [];
        $gallery_images = "";
        $counter = 1;

        if ($request->hasFile('images')) {
            if ($product->images) {
                $existingGalleryImages = explode(',', $product->images);
                foreach ($existingGalleryImages as $oldImage) {
                    if (File::exists(public_path('uploads/products/' . $oldImage))) {
                        File::delete(public_path('uploads/products/' . $oldImage));
                    }
                }
            }

            $files = $request->file('images');
            foreach ($files as $file) {
                if ($file->isValid()) {
                    $gfileName = $current_timestamp . '_' . $counter . '.' . $file->extension();
                    $file->move(public_path('uploads/products'), $gfileName);
                    array_push($gallery_arr, $gfileName);
                    $counter++;
                }
            }

            $gallery_images = implode(',', $gallery_arr);
            $product->images = $gallery_images;
        }

        $product->save();

        return redirect()->route('dashboard.product.list')->with('edit', 'Product has been updated successfully');
    }

    public function deleteProduct(String $id) {
        $product = Product::findOrFail($id);
        if (File::exists(public_path('uploads/products/') . $product->featured_image)) {
            File::delete(public_path('uploads/products/') . $product->featured_image);
        }
        if ($product->images) {
            $existingGalleryImages = explode(',', $product->images);
            foreach ($existingGalleryImages as $oldImage) {
                if (File::exists(public_path('uploads/products/' . $oldImage))) {
                    File::delete(public_path('uploads/products/' . $oldImage));
                }
            }
        }
        $product->delete();
        return redirect()->route('dashboard.product.list')->with('delete', 'Your product has been deleted');
    }

    public function categories() {
        $categories = Category::withCount('products')->orderBy('created_at')->paginate(10);
        return view('admin.categories', compact('categories'));
    }

    public function addCategory() {
        return view('admin.add-category');
    }

    public function storeCategory(Request $request) {
        $request->validate([
            'name' => 'required',
            'slug' => 'required | unique:categories,slug',
            'image' => 'required | image | mimes:png,jpg,jpeg | max:9048'
        ]);

        $category = new Category();
        $category->name = $request->name;
        $category->slug = Str::slug($request->slug);
        $image = $request->file('image');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('uploads/categories'), $imageName);
        $category->image = $imageName;
        $category->save();
        return redirect()->route('dashboard.categories.list')->with('success', 'Your category has been saved successfully.');
    }

    public function editCategory(String $id) {
        $category = Category::findOrFail($id);
        return view('admin.edit-category', compact('category'));
    }

    public function updateCategory(Request $request, String $id) {
        $category = Category::findOrFail($id);
        $request->validate([
            'name' => 'required',
            'slug' => 'required | unique:categories,slug,' . $category->id,
            'image' => 'image | mimes:png,jpg,jpeg | max:2048'
        ]);
        
        $category->name = $request->name;
        $category->slug = Str::slug($request->slug);
        if ($request->hasFile('image')) {
            // Check if old image exists and delete it
            if (!empty($category->image) && File::exists(public_path('uploads/categories/' . $category->image))) {
                File::delete(public_path('uploads/categories/' . $category->image));
            }
        
            // Handle new image upload
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            
            // Store the new image
            $image->move(public_path('uploads/categories'), $imageName);
            
            // Update the category's image field
            $category->image = $imageName;
        }        
        $category->save();
        return redirect()->route('dashboard.categories.list')->with('edit', 'Your category has been edit successfully.');
    }

    public function deleteCategory(String $id) {
        $category = Category::findOrFail($id);
        if (!empty($category->image) && File::exists(public_path('uploads/categories/' . $category->image))) {
            File::delete(public_path('uploads/categories/' . $category->image));
        }
        $category->delete();
        return redirect()->route('dashboard.categories.list')->with('delete', 'Your category has been deleted');
    }

    // public function ourTeam() {
    //     $teams = OurTeam::orderBy('created_at', 'DESC')->paginate(10);
    //     return view('admin.our-team', compact('teams'));
    // }

    // public function addMember() {
    //     return view('admin.add-member');
    // }

    // public function storeMember(Request $request) {
    //     $request->validate([
    //         'name' => 'required',
    //         'profession' => 'required',
    //         'image' => 'required | image | mimes:png,jpg,jpeg | max:4048',
    //         'facebook' => 'nullable|url',
    //         'instagram' => 'nullable|url',
    //         'twitter' => 'nullable|url',
    //     ]);
    //     $member = new OurTeam();
    //     $member->name = $request->name;
    //     $member->profession = $request->profession;
    //     $member->facebook = $request->facebook;
    //     $member->instagram = $request->instagram;
    //     $member->twitter = $request->twitter;
    //     $image = $request->file('image');
    //     $imageName = time() . '.' . $image->getClientOriginalExtension();
    //     $image->move(public_path('uploads/members'), $imageName);
    //     $member->image = $imageName;
    //     $member->save();
    //     return redirect()->route('dashboard.ourteam.list')->with('success', 'Member has been added successfully');
    // }

    // public function editMember(String $id) {
    //     $member = OurTeam::findOrFail($id);
    //     return view('admin.edit-member', compact('member'));
    // }

    // public function updateMember(Request $request, String $id) {
    //     $request->validate([
    //         'name' => 'required',
    //         'profession' => 'required',
    //         'image' => 'image | mimes:png,jpg,jpeg | max:4048',
    //         'facebook' => 'nullable|url',
    //         'instagram' => 'nullable|url',
    //         'twitter' => 'nullable|url',
    //     ]);
    //     $member = OurTeam::findOrFail($id);
    //     $member->name = $request->name;
    //     $member->profession = $request->profession;
    //     $member->facebook = $request->facebook;
    //     $member->instagram = $request->instagram;
    //     $member->twitter = $request->twitter;
    //     if ($request->hasFile('image')) {
    //         // Check if old image exists and delete it
    //         if (!empty($member->image) && File::exists(public_path('uploads/members/' . $member->image))) {
    //             File::delete(public_path('uploads/members/' . $member->image));
    //         }
        
    //         // Handle new image upload
    //         $image = $request->file('image');
    //         $imageName = time() . '.' . $image->getClientOriginalExtension();
            
    //         // Store the new image
    //         $image->move(public_path('uploads/members'), $imageName);
            
    //         // Update the category's image field
    //         $member->image = $imageName;
    //     } 
    //     $member->save();
    //     return redirect()->route('dashboard.ourteam.list')->with('edit', 'Member has been edit successfully');
    // }

    // public function deleteMember(String $id) {
    //     $member = OurTeam::findOrFail($id);
    //     if (!empty($member->image) && File::exists(public_path('uploads/members/' . $member->image))) {
    //         File::delete(public_path('uploads/members/' . $member->image));
    //     }
    //     $member->delete();
    //     return redirect()->route('dashboard.ourteam.list')->with('delete', 'Member has been deleted successfully');
    // }

    public function orders()
    {

        $orders = Order::with('transaction')->orderBy('created_at', 'DESC')->paginate(10);

        return view('admin.orders', compact('orders'));
    }

    public function orderDetails($orderId)
    {
        $order = Order::with(['transaction', 'user', 'items.product'])->findOrFail($orderId);
        return view('admin.order-details', compact('order'));
    }

    public function promoEmails() {
        $promo_emails = PromoEmail::orderBy('created_at', 'DESC')->paginate(10);
        return view('admin.promo-email', compact('promo_emails'));
    }

    public function deletePromoEmail(String $id) {
        $email = PromoEmail::findOrFail($id);
        $email->delete();
        return redirect()->route('dashboard.promoemails.list')->with('delete', 'Email has been deleted successfully');
    }
    
}

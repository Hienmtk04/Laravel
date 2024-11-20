<?php

// frontend
use App\Http\Controllers\frontend\AuthController;
use App\Http\Controllers\backend\DashboardController;
use App\Http\Controllers\frontend\ContactController;
use App\Http\Controllers\frontend\HomeController;
use App\Http\Controllers\frontend\NewsController;
use App\Http\Controllers\frontend\ProductController;
use Illuminate\Support\Facades\Route;

// backend
use App\Http\Controllers\backend\ProductController as BackendProductController;
use App\Http\Controllers\backend\CategoryController as BackendCategoryController;
use App\Http\Controllers\backend\BannerController as BackendBannerController;
use App\Http\Controllers\backend\BrandController as BackendBrandController;
use App\Http\Controllers\backend\ContactController as BackendContactController;
use App\Http\Controllers\backend\MenuController as BackendMenuController;
use App\Http\Controllers\backend\OrderController;
use App\Http\Controllers\backend\PostController;
use App\Http\Controllers\backend\TopicController;
use App\Http\Controllers\backend\UserController;
use App\Http\Controllers\frontend\CartController;
use App\Http\Controllers\frontend\ChinhSach;

Route::get('/', [HomeController::class, 'index'])->name('site.home');
Route::get('san-pham', [ProductController::class, 'product'])->name('site.product');

//product category
Route::get('danh-muc/{slug}', [ProductController::class, 'category'])->name('site.product.category');

//product brand
Route::get('thuong-hieu/{slug}', [ProductController::class, 'brand'])->name('site.product.brand');

//Lọc product
Route::get('san-pham/moi', [ProductController::class, 'newProduct'])->name('site.product.new');
Route::get('san-pham/cu', [ProductController::class, 'oldProduct'])->name('site.product.old');
Route::get('san-pham/tang-theo-gia', [ProductController::class, 'decrePrice'])->name('site.product.decreprice');
Route::get('san-pham/giam-theo-gia', [ProductController::class, 'increPrice'])->name('site.product.increprice');
Route::get('tim-kiem', [ProductController::class, 'search_product'])->name('site.product.search');


//Post topic
Route::get('chu-de/{slug}', [NewsController::class, 'topic'])->name('site.post.topic');
Route::get('chi-tiet-bai-viet/{slug}', [NewsController::class, 'post_detail'])->name('site.post.detail');
Route::get('/tin-tuc', [NewsController::class, 'news'])->name('site.news');

//các chính sách
Route::get('chinh-sach-bao-hanh', [ChinhSach::class, 'post_bao_hanh'])->name('site.post.baohanh');
Route::get('chinh-sach-van-chuyen', [ChinhSach::class, 'post_van_chuyen'])->name('site.post.vanchuyen');
Route::get('chinh-sach-mua-hang', [ChinhSach::class, 'post_mua_hang'])->name('site.post.muahang');
Route::get('chinh-sach-doi-tra', [ChinhSach::class, 'post_doi_tra'])->name('site.post.doitra');




//product detail
Route::get('chi-tiet-san-pham/{slug}', [ProductController::class, 'product_detail'])->name('site.product.detail');

//contact
Route::post('tao-lien-he', [ContactController::class, 'create_contact'])->name('site.contact.add');
Route::get('lien-he', [ContactController::class, 'contact'])->name('site.contact');

//giới thiệu
Route::get('gioi-thieu', [HomeController::class, 'intro'])->name('site.intro');




//product cart
Route::get('gio-hang', [CartController::class, 'index'])->name('site.cart.index');
Route::get('cart/addcart', [CartController::class, 'addcart'])->name('site.cart.addcart');
Route::post('cart/update', [CartController::class, 'update'])->name('site.cart.update');
Route::get('cart/delete/{id}', [CartController::class, 'delete'])->name('site.cart.delete');
Route::get('thanh-toan', [CartController::class, 'checkout'])->name('site.cart.checkout');
Route::post('thong-bao', [CartController::class, 'docheckout'])->name('site.cart.docheckout');


Route::get('/login',[AuthController::class, 'getLogin'])->name('website.getlogin');
Route::post('/login',[AuthController::class, 'doLogin'])->name('website.dologin'); 
Route::get('/logout',[AuthController::class, 'logout'])->name('website.logout');

// ->middleware("middleauth")-
route::prefix('admin')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('admin.dashboard');

    // 1.Banner
    route::prefix('banner')->group(function(){
        Route::get('/', [BackendBannerController::class, "index"])->name('admin.banner.index' );
        Route::get('trash', [BackendBannerController::class, "trash"])->name('admin.banner.trash' );
        Route::get('show/{id}', [BackendBannerController::class, "show"])->name('admin.banner.show' );
        Route::get('create', [BackendBannerController::class, "create"])->name('admin.banner.create' );
        Route::post('store', [BackendBannerController::class, "store"])->name('admin.banner.store' );
        Route::get('edit/{id}', [BackendBannerController::class, "edit"])->name('admin.banner.edit' );
        Route::put('update/{id}', [BackendBannerController::class, "update"])->name('admin.banner.update' );
        Route::get('status/{id}', [BackendBannerController::class, "status"])->name('admin.banner.status' );
        Route::get('delete/{id}', [BackendBannerController::class, "delete"])->name('admin.banner.delete' );
        Route::get('restore/{id}', [BackendBannerController::class, "restore"])->name('admin.banner.restore' );
        Route::delete('destroy/{id}', [BackendBannerController::class, "destroy"])->name('admin.banner.destroy' );
    });

    // 2.Contact
    route::prefix('contact')->group(function(){
        Route::get('/', [BackendContactController::class, "index"])->name('admin.contact.index' );
        Route::get('trash', [BackendContactController::class, "trash"])->name('admin.contact.trash' );
        Route::get('show/{id}', [BackendContactController::class, "show"])->name('admin.contact.show' );
        Route::get('create', [BackendContactController::class, "create"])->name('admin.contact.create' );
        Route::post('store', [BackendContactController::class, "store"])->name('admin.contact.store' );
        Route::get('edit/{id}', [BackendContactController::class, "edit"])->name('admin.contact.edit' );
        Route::put('update/{id}', [BackendContactController::class, "update"])->name('admin.contact.update' );
        Route::get('status/{id}', [BackendContactController::class, "status"])->name('admin.contact.status' );
        Route::get('delete/{id}', [BackendContactController::class, "delete"])->name('admin.contact.delete' );
        Route::get('restore/{id}', [BackendContactController::class, "restore"])->name('admin.contact.restore' );
        Route::delete('destroy/{id}', [BackendContactController::class, "destroy"])->name('admin.contact.destroy' );
    });

    // 3.Menu
    route::prefix('menu')->group(function(){
        Route::get('/', [BackendMenuController::class, "index"])->name('admin.menu.index' );
        Route::get('trash', [BackendMenuController::class, "trash"])->name('admin.menu.trash' );
        Route::get('show/{id}', [BackendMenuController::class, "show"])->name('admin.menu.show' );
        Route::get('create', [BackendMenuController::class, "create"])->name('admin.menu.create' );
        Route::post('store', [BackendMenuController::class, "store"])->name('admin.menu.store' );
        Route::get('edit/{id}', [BackendMenuController::class, "edit"])->name('admin.menu.edit' );
        Route::put('update/{id}', [BackendMenuController::class, "update"])->name('admin.menu.update' );
        Route::get('status/{id}', [BackendMenuController::class, "status"])->name('admin.menu.status' );
        Route::get('delete/{id}', [BackendMenuController::class, "delete"])->name('admin.menu.delete' );
        Route::get('restore/{id}', [BackendMenuController::class, "restore"])->name('admin.menu.restore' );
        Route::delete('destroy/{id}', [BackendMenuController::class, "destroy"])->name('admin.menu.destroy' );
    });

    // 4. Order
    route::prefix('order')->group(function(){
        Route::get('/', [OrderController::class, "index"])->name('admin.order.index' );
        Route::get('trash', [OrderController::class, "trash"])->name('admin.order.trash' );
        Route::get('show/{id}', [OrderController::class, "show"])->name('admin.order.show' );
        Route::get('create', [OrderController::class, "create"])->name('admin.order.create' );
        Route::post('store', [OrderController::class, "store"])->name('admin.order.store' );
        Route::get('edit/{id}', [OrderController::class, "edit"])->name('admin.order.edit' );
        Route::put('update/{id}', [OrderController::class, "update"])->name('admin.order.update' );
        Route::get('status/{id}', [OrderController::class, "status"])->name('admin.order.status' );
        Route::get('delete/{id}', [OrderController::class, "delete"])->name('admin.order.delete' );
        Route::get('restore/{id}', [OrderController::class, "restore"])->name('admin.order.restore' );
        Route::delete('destroy/{id}', [OrderController::class, "destroy"])->name('admin.order.destroy' );
    });

    // 5.Post
    route::prefix('post')->group(function(){
        Route::get('/', [PostController::class, "index"])->name('admin.post.index' );
        Route::get('trash', [PostController::class, "trash"])->name('admin.post.trash' );
        Route::get('show/{id}', [PostController::class, "show"])->name('admin.post.show' );
        Route::get('create', [PostController::class, "create"])->name('admin.post.create' );
        Route::post('store', [PostController::class, "store"])->name('admin.post.store' );
        Route::get('edit/{id}', [PostController::class, "edit"])->name('admin.post.edit' );
        Route::put('update/{id}', [PostController::class, "update"])->name('admin.post.update' );
        Route::get('status/{id}', [PostController::class, "status"])->name('admin.post.status' );
        Route::get('delete/{id}', [PostController::class, "delete"])->name('admin.post.delete' );
        Route::get('restore/{id}', [PostController::class, "restore"])->name('admin.post.restore' );
        Route::delete('destroy/{id}', [PostController::class, "destroy"])->name('admin.post.destroy' );
    });

    // 6. Topic
    route::prefix('topic')->group(function(){
        Route::get('/', [TopicController::class, "index"])->name('admin.topic.index' );
        Route::get('trash', [TopicController::class, "trash"])->name('admin.topic.trash' );
        Route::get('show/{id}', [TopicController::class, "show"])->name('admin.topic.show' );
        Route::get('create', [TopicController::class, "create"])->name('admin.topic.create' );
        Route::post('store', [TopicController::class, "store"])->name('admin.topic.store' );
        Route::get('edit/{id}', [TopicController::class, "edit"])->name('admin.topic.edit' );
        Route::put('update/{id}', [TopicController::class, "update"])->name('admin.topic.update' );
        Route::get('status/{id}', [TopicController::class, "status"])->name('admin.topic.status' );
        Route::get('delete/{id}', [TopicController::class, "delete"])->name('admin.topic.delete' );
        Route::get('restore/{id}', [TopicController::class, "restore"])->name('admin.topic.restore' );
        Route::delete('destroy/{id}', [TopicController::class, "destroy"])->name('admin.topic.destroy' );
    });

    // 7.User
    route::prefix('user')->group(function(){
        Route::get('/', [UserController::class, "index"])->name('admin.user.index' );
        Route::get('trash', [UserController::class, "trash"])->name('admin.user.trash' );
        Route::get('show/{id}', [UserController::class, "show"])->name('admin.user.show' );
        Route::get('create', [UserController::class, "create"])->name('admin.user.create' );
        Route::post('store', [UserController::class, "store"])->name('admin.user.store' );
        Route::get('edit/{id}', [UserController::class, "edit"])->name('admin.user.edit' );
        Route::put('update/{id}', [UserController::class, "update"])->name('admin.user.update' );
        Route::get('status/{id}', [UserController::class, "status"])->name('admin.user.status' );
        Route::get('delete/{id}', [UserController::class, "delete"])->name('admin.user.delete' );
        Route::get('restore/{id}', [UserController::class, "restore"])->name('admin.user.restore' );
        Route::delete('destroy/{id}', [UserController::class, "destroy"])->name('admin.user.destroy' );
    });

    // 8.Product
    route::prefix('product')->group(function(){
        Route::get('/', [BackendProductController::class, "index"])->name('admin.product.index' );
        Route::get('trash', [BackendProductController::class, "trash"])->name('admin.product.trash' );
        Route::get('show/{id}', [BackendProductController::class, "show"])->name('admin.product.show' );
        Route::get('create', [BackendProductController::class, "create"])->name('admin.product.create' );
        Route::post('store', [BackendProductController::class, "store"])->name('admin.product.store' );
        Route::get('edit/{id}', [BackendProductController::class, "edit"])->name('admin.product.edit' );
        Route::put('update/{id}', [BackendProductController::class, "update"])->name('admin.product.update' );
        Route::get('status/{id}', [BackendProductController::class, "status"])->name('admin.product.status' );
        Route::get('delete/{id}', [BackendProductController::class, "delete"])->name('admin.product.delete' );
        Route::get('restore/{id}', [BackendProductController::class, "restore"])->name('admin.product.restore' );
        Route::delete('destroy/{id}', [BackendProductController::class, "destroy"])->name('admin.product.destroy' );
    });

    // 9.category
    route::prefix('category')->group(function(){
        Route::get('/', [BackendCategoryController::class, "index"])->name('admin.category.index' );
        Route::get('trash', [BackendCategoryController::class, "trash"])->name('admin.category.trash' );
        Route::get('show/{id}', [BackendCategoryController::class, "show"])->name('admin.category.show' );
        Route::post('create', [BackendCategoryController::class, "create"])->name('admin.category.create' );
        Route::post('store', [BackendCategoryController::class, "store"])->name('admin.category.store' );
        Route::get('edit/{id}', [BackendCategoryController::class, "edit"])->name('admin.category.edit' );
        Route::put('update/{id}', [BackendCategoryController::class, "update"])->name('admin.category.update' );
        Route::get('status/{id}', [BackendCategoryController::class, "status"])->name('admin.category.status' );
        Route::get('delete/{id}', [BackendCategoryController::class, "delete"])->name('admin.category.delete' );
        Route::get('restore/{id}', [BackendCategoryController::class, "restore"])->name('admin.category.restore' );
        Route::delete('destroy/{id}', [BackendCategoryController::class, "destroy"])->name('admin.category.destroy' );
    }); 


    // 10.brand
    route::prefix('brand')->group(function(){
        Route::get('/', [BackendBrandController::class, "index"])->name('admin.brand.index' );
        Route::get('trash', [BackendBrandController::class, "trash"])->name('admin.brand.trash' );
        Route::get('show/{id}', [BackendBrandController::class, "show"])->name('admin.brand.show' );
        // Route::post('create', [BackendBrandController::class, "create"])->name('admin.brand.create' );
        Route::post('store', [BackendBrandController::class, "store"])->name('admin.brand.store' );
        Route::get('edit/{id}', [BackendBrandController::class, "edit"])->name('admin.brand.edit' );
        Route::put('update/{id}', [BackendBrandController::class, "update"])->name('admin.brand.update' );
        Route::get('status/{id}', [BackendBrandController::class, "status"])->name('admin.brand.status' );
        Route::get('delete/{id}', [BackendBrandController::class, "delete"])->name('admin.brand.delete' );
        Route::get('restore/{id}', [BackendBrandController::class, "restore"])->name('admin.brand.restore' );
        Route::delete('destroy/{id}', [BackendBrandController::class, "destroy"])->name('admin.brand.destroy' );
    });
     
});

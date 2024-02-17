<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\AdminProfileController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\SubCategoryController;
use App\Http\Controllers\Backend\BlogController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\SiteSettingController;
use App\Http\Controllers\User\UserRoleController;
use App\Http\Controllers\Frontend\IndexController;
use App\Http\Controllers\Frontend\DonHangController;
use App\Http\Controllers\Frontend\BlogHomeController;
use App\Http\Controllers\Frontend\PagesController;
use App\Models\User;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::group(['prefix'=> 'admin', 'middleware'=>['admin:admin']], function(){
	Route::get('/login', [AdminController::class, 'loginForm']);
	Route::post('/login',[AdminController::class, 'store'])->name('admin.login');
});

Route::middleware(['auth:sanctum,admin', 'verified'])->get('/admin/dashboard', function () {
    return view('admin.index');
})->name('dashboard');

// admin all route

Route::get('/admin/logout', [AdminController::class, 'destroy'])->name('admin.logout');
Route::get('/admin/profile', [AdminProfileController::class, 'AdminProfile'])->name('admin.profile');
Route::get('/admin/profile/edit/{id}', [AdminProfileController::class, 'AdminProfileEdit'])->name('admin.profile.edit');
Route::post('/admin/profile/store', [AdminProfileController::class, 'AdminProfileStore'])->name('admin.profile.store');

Route::get('/admin/change/password', [AdminProfileController::class, 'AdminChangePassword'])->name('admin.change.password');

Route::post('/admin/update/password', [AdminProfileController::class, 'AdminUpdatePassword'])->name('update.change.password');

// role

    Route::get('/admin/all/user', [UserRoleController::class, 'UserRole'])->name('admin.all.user');
    Route::get('/admin/create/user', [UserRoleController::class, 'UserCreate'])->name('create.admin');
    Route::post('/admin/store/user', [UserRoleController::class, 'StoreCreateUser'])->name('admin.store');

    Route::get('/delete/admin/{id}', [UserRoleController::class, 'UserDelete'])->name('admin.delete');
    Route::get('/admin/user/edit/{id}', [UserRoleController::class, 'AdminUserEdit'])->name('admin.edit');
     Route::post('admin/user/update', [UserRoleController::class, 'AdminUserUpdate'])->name('admin.update');
// user all route

Route::middleware(['auth:sanctum,web', 'verified'])->get('/dashboard', function () {
    $id = Auth::user()->id;
    $user = User::find($id);
    return view('dashboard',compact('user'));
})->name('dashboard');


Route::get('/user/logout', [IndexController::class, 'UserLogout'])->name('user.logout');
Route::get('/user/profile', [IndexController::class, 'UserProfile'])->name('user.profile');
Route::post('/user/profile/store', [IndexController::class, 'UserProfileStore'])->name('user.profile.store');
Route::get('/user/change/password', [IndexController::class, 'UserChangePassword'])->name('change.password');
Route::post('/user/update/password', [IndexController::class, 'UserUpdatePassword'])->name('user.update.password');

Route::get('/', [IndexController::class, 'index']);
// all route category
Route::prefix('category')->group(function(){
    Route::get('/view',[CategoryController::class,'CategoryView'])->name('all.category');
    Route::get('/add',[CategoryController::class,'CategoryAdd'])->name('add.category');
    Route::post('/store',[CategoryController::class,'CategoryStore'])->name('store.category');
    Route::get('/edit/{id}', [CategoryController::class, 'CategoryEdit'])->name('category.edit');
    Route::post('/update/{id}', [CategoryController::class, 'CategoryUpdate'])->name('category.update');
    Route::get('/delete/{id}', [CategoryController::class, 'CategoryDelete'])->name('category.delete');

    // Sub Category All Routes
    Route::get('/subcategory/ajax/{category_id}', [SubCategoryController::class, 'GetSubCategory']);
    Route::get('/sub/view', [SubCategoryController::class, 'SubCategoryView'])->name('all.subcategory');
     Route::get('/add/sub',[SubCategoryController::class,'SubCategoryAdd'])->name('add.subcategory');
     Route::post('/sub/store', [SubCategoryController::class, 'SubCategoryStore'])->name('subcategory.store');
    Route::get('/sub/edit/{id}', [SubCategoryController::class, 'SubCategoryEdit'])->name('subcategory.edit');
    Route::post('/update', [SubCategoryController::class, 'SubCategoryUpdate'])->name('subcategory.update');
    Route::get('/sub/delete/{id}', [SubCategoryController::class, 'SubCategoryDelete'])->name('subcategory.delete');
});

Route::prefix('setting')->group(function(){

Route::get('/site', [SiteSettingController::class, 'SiteSetting'])->name('site.setting');
Route::post('/site/update', [SiteSettingController::class, 'SiteSettingUpdate'])->name('update.sitesetting');

Route::get('/seo', [SiteSettingController::class, 'SeoSetting'])->name('seo.setting'); 

Route::post('/seo/update', [SiteSettingController::class, 'SeoSettingUpdate'])->name('update.seosetting');
});


// Admin Products All Routes 
Route::prefix('product')->group(function(){

    Route::get('/add', [ProductController::class, 'AddProduct'])->name('add-product');
    Route::post('/store', [ProductController::class, 'StoreProduct'])->name('product-store');
    Route::get('/manage', [ProductController::class, 'ManageProduct'])->name('manage-product');
    Route::get('/edit/{id}', [ProductController::class, 'EditProduct'])->name('product.edit');
    Route::post('/data/update', [ProductController::class, 'ProductDataUpdate'])->name('product-update');
    Route::post('/image/update', [ProductController::class, 'MultiImageUpdate'])->name('update-product-image');
     Route::post('/multiimg/add', [ProductController::class, 'MultiImageAdd'])->name('add-multil-image');
    Route::post('/thambnail/update', [ProductController::class, 'ThambnailImageUpdate'])->name('update-product-thambnail');
    Route::get('/multiimg/delete/{id}', [ProductController::class, 'MultiImageDelete'])->name('product.multiimg.delete');

    Route::get('/inactive/{id}', [ProductController::class, 'ProductInactive'])->name('product.inactive');
    Route::get('/active/{id}', [ProductController::class, 'ProductActive'])->name('product.active');
    Route::get('/delete/{id}', [ProductController::class, 'ProductDelete'])->name('product.delete');
});
// Admin Blog  Routes 
Route::prefix('blog')->group(function(){
    Route::get('/category', [BlogController::class, 'BlogCategory'])->name('blog.category');
    Route::post('/store', [BlogController::class, 'BlogCategoryStore'])->name('blogcategory.store');
    Route::get('/category/edit/{id}', [BlogController::class, 'BlogCategoryEdit'])->name('blog.category.edit');
    Route::post('/category/update', [BlogController::class, 'BlogCategoryUpdate'])->name('blogcategory.update');
    Route::get('/category/delete/{id}', [BlogController::class, 'BlogCategoryDelete'])->name('blog.category.delete');

    Route::get('/list/post', [BlogController::class, 'ListBlogPost'])->name('list.post');
    Route::get('/add/post', [BlogController::class, 'AddBlogPost'])->name('add.post');
    Route::post('/post/store', [BlogController::class, 'BlogPostStore'])->name('post-store');
    Route::get('/edit/{id}', [BlogController::class, 'EditBlogPost'])->name('blog.post.edit');

    Route::get('/post/delete/{id}', [BlogController::class, 'BlogPostDelete'])->name('blog.post.delete');
    Route::post('/data/update', [BlogController::class, 'DataBlogPostUpdate'])->name('post-update');
    Route::post('/thambnail/update', [BlogController::class, 'ThambnailImageUpdate'])->name('update-post-thambnail');
    Route::post('/multiimg/add', [BlogController::class, 'MultiImageAddBlog'])->name('add-multil-image-blog');

    Route::post('/image/update', [BlogController::class, 'MultiImageUpdateBlog'])->name('update-product-image-blog');
     Route::get('/multiimg/delete/{id}', [BlogController::class, 'MultiImageDeleteBlog'])->name('post.multiimg.delete');
});

Route::get('{slug}/c', [IndexController::class, 'CatWiseProduct']);
Route::get('{slugcat}/{slug}/sp/{id}', [IndexController::class, 'ProductDetails']);
Route::get('{slug}/{subslug}', [IndexController::class, 'SubCatWiseProduct']);
Route::post('don-hang', [DonHangController::class, 'ThemDonHang'])->name('donhang');
Route::get('{slugblog}/cm/{id}', [BlogHomeController::class, 'CatWiseBlog']);
Route::get('{slugpost}.html', [BlogHomeController::class, 'PostDetails']);
// Route::get('dao-tao-seo', [PagesController::class, 'DaoTaoSeo'])->name('daotao');
Route::get('dich-vu-seo', [PagesController::class, 'DichVuSeo'])->name('dichvu');
Route::get('thiet-ke-web', [PagesController::class, 'ThietKeWeb'])->name('thietke');
Route::get('chay-quang-cao-google', [PagesController::class, 'Qcgoole'])->name('qcgoole');
Route::get('quang-cao-facebook', [PagesController::class, 'Qcfb'])->name('qcfb');
Route::get('dich-vu-cham-soc-fanpage', [PagesController::class, 'Fanpage'])->name('fanpage');
Route::get('dich-vu-cham-soc-website', [PagesController::class, 'Csweb'])->name('csweb');
    


   







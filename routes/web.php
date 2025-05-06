<?php
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\PrivacyController;
use App\Http\Controllers\termsController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\Admin\AdminBlogController;
use App\Http\Controllers\Admin\AdminCategoryController;
use App\Http\Controllers\Admin\AdminContactController;
use App\Http\Controllers\Admin\AdminPagesController;
use App\Http\Controllers\Admin\AdminRoleController;
use App\Http\Controllers\Admin\AdminSystemUser;
use App\Http\Controllers\Admin\AdminSettingController;
use App\Http\Controllers\SubscriberController; 
use App\Http\Controllers\Admin\AdminAdvertismentController;
use App\Http\Controllers\Admin\AdminAuthotificationController;
use App\Models\AdminAuthortificationModel;

Route::get('/',[WelcomeController::class,"index"]);

// for blog route code here 
Route::get("/blog",[BlogController::class,"index"])->name('blog.index');
Route::get("/blog-search",[BlogController::class,"search"])->name('blog.search');
Route::get("/blogShow/{slug}",[BlogController::class,"blogShow"])->name('blog.show');
Route::get("/sidebar",[BlogController::class,"sidebarShow"])->name('sidebar.show');
Route::get("/search",[BlogController::class,"search"])->name('search');

Route::get("/category/{slug}",[BlogController::class,"categoryShow"])->name('category.show');

// for sucscriber 


Route::post('/subscribe', [SubscriberController::class, 'store'])->name('subscribe.store');



Route::get("/contact",[ContactController::class,"index"])->name('contact.index');
Route::post("/store",[ContactController::class,"store"])->name('contact.store');

Route::get("/privacy",[PrivacyController::class,"index"])->name('privacy.index');
Route::get("/terms",[termsController::class,"index"])->name('terms.index');


// for admin route here 
Auth::routes();

Route::get('/home',[HomeController::class, 'index'])->name('home');
Route::get('/admin/blogs',[AdminBlogController::class, 'blogs'])->name('admin.blogs');
Route::get('/admin/blog/search',[AdminBlogController::class, 'blog_create'])->name('admin.blog.create');
Route::post('/admin/blog/store',[AdminBlogController::class, 'store'])->name('admin.blog.store');
Route::get('/admin/blog/show/{id}',[AdminBlogController::class, 'view'])->name('admin.blog.view');
Route::get('/admin/blog/delete/{id}',[AdminBlogController::class, 'delete'])->name('admin.blog.delete');
Route::get('/admin/blog/edit/{id}',[AdminBlogController::class, 'edit'])->name('admin.blog.edit');
Route::post('/admin/blog/update/{id}',[AdminBlogController::class, 'update'])->name('admin.blog.update');
Route::post('/admin/blogs/filters',[AdminBlogController::class, 'filter'])->name('admin.blogs.filter');

// for Category 
Route::get('/admin/categorys',[AdminCategoryController::class, 'categorys'])->name('admin.categorys');
Route::get('/admin/category/create',[AdminCategoryController::class, 'create'])->name('admin.category.crate');
Route::post('/admin/category/store',[AdminCategoryController::class, 'store'])->name('admin.category.store');
Route::get('/admin/category/view/{id}',[AdminCategoryController::class, 'view'])->name('admin.category.view');
Route::get('/admin/category/delete/{id}',[AdminCategoryController::class, 'delete'])->name('admin.category.delete');
Route::get('/admin/category/edit/{id}',[AdminCategoryController::class, 'edit'])->name('admin.category.edit');
Route::post('/admin/category/update/{id}',[AdminCategoryController::class, 'update'])->name('admin.category.update');

// for pages 
Route::get('/admin-privacy',[AdminPagesController::class, 'privacy'])->name('admin.privacy');
Route::post('/admin/privacy/update',[AdminPagesController::class, 'update'])->name('admin.page.pravacy');

Route::get('/admin-terms',[AdminPagesController::class, 'terms'])->name('admin.terms');
Route::post('/admin/terms/update',[AdminPagesController::class, 'termsUpdate'])->name('admin.term.update');

// for admin AdminAuthotificationController     
Route::get("/admin/users/index",[AdminAuthotificationController::class,"index"])->name("admin.users.index");
Route::get("/admin/subuser/create",[AdminAuthotificationController::class,"create"])->name('admin.sub.create'); 
Route::post("/admin/subuser/store",[AdminAuthotificationController::class,"store"])->name('admin.subuser.store');
Route::get("/admin/user/delete/{id}",[AdminAuthotificationController::class,"delete"])->name('admin.user.delete');
Route::get('/admin/user/edit/{id}',[AdminAuthotificationController::class, 'edit'])->name('admin.user.edit');
Route::post('/admin/user/update/{id}',[AdminAuthotificationController::class, 'update'])->name('admin.user.update');

// for admin user role 
Route::get('/admin/user/role',[AdminRoleController::class, 'role'])->name('admin.user_role');
Route::get('/admin/role/create',[AdminRoleController::class, 'create'])->name('admin.role.create');
Route::post('/admin/role/store',[AdminRoleController::class, 'store'])->name('admin.role.store');
Route::get('/admin/role/delete/{id}',[AdminRoleController::class, 'delete'])->name('admin.role.delete');
Route::get('/admin/role/edit/{id}',[AdminRoleController::class, 'edit'])->name('admin.role.edit');
Route::post('/admin/role/update/{id}',[AdminRoleController::class, 'update'])->name('admin.role.update');


// // // for system user 
// Route::get('/admin-system-user',[AdminSystemUser::class, 'systemUser'])->name('admin.system_user');
// Route::get('/admin-system-user-create',[AdminSystemUser::class, 'systemUserCreate'])->name('admin.user.create');

// for admin setting 
// for admin setting 
Route::get('/admin/setting',[AdminSettingController::class, 'setting'])->name('admin.setting');
Route::post('/admin/setting/update',[AdminSettingController::class, 'setting_update'])->name('admin.setting.update');

// for admin ContactController 
Route::get("/admin/contact/index",[ContactController::class,"Contactindex"])->name("admin.contacs.index");

// for addvertismen 
Route::get("/admin/advertisment/{id}",[AdminAdvertismentController::class,"clicks"])->name("admin.clicks");
Route::get("/admin/addmanage/index",[AdminAdvertismentController::class,"indexpage"])->name('admin.add.index');
Route::get("/admin/addmanage/view/{id}",[AdminAdvertismentController::class,"view"])->name('admin.addver.view');
Route::get("/admin/addmanage/delete/{id}",[AdminAdvertismentController::class,"delete"])->name('admin.addver.delete');
Route::get("/admin/addmanage/create",[AdminAdvertismentController::class,"create"])->name('admin.adds.create');
Route::post("/admin/addmanage/store",[AdminAdvertismentController::class,"insert"])->name('admin.adds.store');
 



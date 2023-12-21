<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Livewire\Auth\LoginViewIndex;
use App\Http\Livewire\Auth\RegisterViewIndex;
use App\Http\Livewire\Pages\Admin\Books\AdminBooksIndex;
use App\Http\Livewire\Pages\Admin\Books\AdminBooksManage;
use App\Http\Livewire\Pages\Admin\Dashboard\AdminDashboardCategory;
use App\Http\Livewire\Pages\Admin\Dashboard\AdminDashboardIndex;
use App\Http\Livewire\Pages\Admin\Members\AdminMembersIndex;
use App\Http\Livewire\Pages\Admin\Members\AdminMembersManage;
use App\Http\Livewire\Pages\Admin\Statistics\AdminStatisticIndex;
use App\Http\Livewire\Pages\Member\Dashboard\MemberDashboardCategory;
use App\Http\Livewire\Pages\Member\Dashboard\MemberDashboardDetail;
use App\Http\Livewire\Pages\Member\Dashboard\MemberDashboardIndex;
use App\Http\Livewire\Pages\Member\Library\MemberLibraryDetail;
use App\Http\Livewire\Pages\Member\Library\MemberLibraryIndex;
use App\Http\Livewire\Pages\Superadmin\Dashboard\SuperDashboardCreate;
use App\Http\Livewire\Pages\Superadmin\Dashboard\SuperDashboardDetail;
use App\Http\Livewire\Pages\Superadmin\Dashboard\SuperDashboardIndex;
use App\Http\Livewire\Pages\Superadmin\Dashboard\SuperDashboardManage;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/login', function () {
    return redirect(route('landing-page'));
});

Auth::routes([
    'register' => false,
    'login' => false,
]);

Route::group(['middleware' => 'guest'], function () {
    Route::get('/', LoginViewIndex::class)->name('landing-page');
    Route::get('/register', RegisterViewIndex::class)->name('register-page');
});
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::post('/register', [RegisterController::class, 'register'])->name('register');

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => 'auth'], function () {
    Route::group(['middleware' => 'admin'], function () {
        Route::get('/staff/dashboard', AdminDashboardIndex::class)->name('admin.dashboard.index');
        Route::get('/staff/books/category/{category}', AdminDashboardCategory::class)->name('admin.dashboard.category');
        Route::get('/staff/books/create', AdminBooksManage::class)->name('admin.books.create');
        Route::get('/staff/books', AdminBooksIndex::class)->name('admin.books.index');
        Route::get('/staff/books/{id}/edit',AdminBooksManage::class)->name('admin.books.edit');
        Route::get('/staff/members', AdminMembersIndex::class)->name('admin.members.index');
        Route::get('/staff/members/create', AdminMembersManage::class)->name('admin.members.create');
        Route::get('/staff/members/{id}/edit', AdminMembersManage::class)->name('admin.members.edit');
        Route::get('/staff/statistic', AdminStatisticIndex::class)->name('admin.statistic.index');
    });

    Route::group(['middleware' => 'member'], function () {
        Route::get('/member/dashboard', MemberDashboardIndex::class)->name('member.dashboard.index');
        Route::get('/member/dashboard/{id}', MemberDashboardDetail::class)->name('member.dashboard.detail');
        Route::get('/member/library', MemberLibraryIndex::class)->name('member.library.index');
        Route::get('/member/books/{category}', MemberDashboardCategory::class)->name('member.dashboard.category');
        Route::get('/member/library/{id}', MemberLibraryDetail::class)->name('member.library.detail');
    });

    Route::group(['middleware' => 'superadmin'], function() {
        Route::get('/admin/dashboard', SuperDashboardIndex::class)->name('super.dashboard.index');
        Route::get('/admin/dashboard/create', SuperDashboardManage::class)->name('super.dashboard.create');
        Route::get('/admin/dashboard/{id}', SuperDashboardManage::class)->name('super.dashboard.edit');
    });
});

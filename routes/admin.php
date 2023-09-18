<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\AdminBankController;
use App\Http\Controllers\Admin\AdminRoleController;
use App\Http\Controllers\Admin\AdminPackageController;
use App\Http\Controllers\Admin\AdminProductController;
use App\Http\Controllers\Admin\AdminProfileController;
use App\Http\Controllers\Admin\AdminSectionController;
use App\Http\Controllers\Admin\AdminSettingController;
use App\Http\Controllers\Admin\AdminLanguageController;
use App\Http\Controllers\Admin\AdminAdminUserController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminResidenceController;
use App\Http\Controllers\Admin\AdminTranslateController;
use App\Http\Controllers\Admin\AdminDepartmentController;
use App\Http\Controllers\Admin\AdminMemberUserController;
use App\Http\Controllers\Admin\AdminPermissionController;

Route::group(['middleware' => ['set_language']], function () {
    Route::get('/', [AdminAuthController::class, 'login'])->name('login');

    /** Auth Routes */
    // Route::get('register', [AdminAuthController::class, 'register'])->name('register');
    // Route::post('register', [AdminAuthController::class, 'handleRegister'])->name('register.post');
    // Route::get('register-verify/{token}', [AdminAuthController::class, 'registerVerify'])->name('register.verify');
    Route::get('login', [AdminAuthController::class, 'login'])->name('login');
    Route::post('login', [AdminAuthController::class, 'handleLogin'])->name('login.post');
    Route::get('forgot-password', [AdminAuthController::class, 'forgotPassword'])->name('forgot_password');
    Route::post('forgot-password', [AdminAuthController::class, 'sendResetLink'])->name('forgot_password.send');
    Route::get('reset-password/{token}', [AdminAuthController::class, 'resetPassword'])->name('reset_password');
    Route::post('reset-password', [AdminAuthController::class, 'handleResetPassword'])->name('reset_password.send');
});

Route::group([
    'middleware' => ['admin', 'prevent_back_history']
], function () {
    /** Auth Admin Routes */
    Route::post('logout', [AdminAuthController::class, 'logout'])->name('logout');

    /** Dashboard Routes */
    Route::get('dashboard', [AdminDashboardController::class, 'index'])->name('dashboard.index');

    /** Package Routes */
    // Route::resource('package', AdminPackageController::class);
    // Route::get('package/restore/{id}', [AdminPackageController::class, 'restore'])->name('package.restore');

    /** Residence Routes */
    // Route::get('residence/data', [AdminResidenceController::class, 'data'])->name('residence.data');
    // Route::get('residence/restore/{id}', [AdminResidenceController::class, 'restore'])->name('residence.restore');
    // Route::post('get-cities', [AdminResidenceController::class, 'getCities'])->name('residence.get_cities');
    // Route::post('get-districts', [AdminResidenceController::class, 'getDistricts'])->name('residence.get_districts');
    // Route::post('get-villages', [AdminResidenceController::class, 'getVillages'])->name('residence.get_villages');
    // Route::resource('residence', AdminResidenceController::class);

    /** Profile Routes */
    Route::put('profile-password-update/{id}', [AdminProfileController::class, 'updatePassword'])->name('profile_password.update');
    Route::resource('profile', AdminProfileController::class);

    /** Department Routes */
    Route::get('department/data', [AdminDepartmentController::class, 'data'])->name('department.data');
    Route::get('department/restore/{department}', [AdminDepartmentController::class, 'restore'])->name('department.restore');
    Route::resource('department', AdminDepartmentController::class);

    /** Section Routes */
    Route::get('section/data', [AdminSectionController::class, 'data'])->name('section.data');
    Route::get('section/restore/{section}', [AdminSectionController::class, 'restore'])->name('section.restore');
    Route::resource('section', AdminSectionController::class);

    /** Product Routes */
    Route::get('product/restore/{product}', [AdminProductController::class, 'restore'])->name('product.restore');
    Route::resource('product', AdminProductController::class);

    /** Pengurus Routes */
    Route::get('admin/data', [AdminAdminUserController::class, 'data'])->name('admin.data');
    Route::get('admin/restore/{admin}', [AdminAdminUserController::class, 'restore'])->name('admin.restore');
    Route::resource('admin', AdminAdminUserController::class);

    /** Anggota Routes */
    Route::get('member/approve', [AdminMemberUserController::class, 'indexApprove'])->name('approve.member.index');
    Route::post('member/approve/{member}', [AdminMemberUserController::class, 'postApprove'])->name('approve.member.post');
    Route::post('member/reject/{member}', [AdminMemberUserController::class, 'postReject'])->name('reject.member.post');
    Route::get('member/restore/{member}', [AdminMemberUserController::class, 'restore'])->name('member.restore');
    Route::resource('member', AdminMemberUserController::class);

    /** Role Routes */
    Route::get('role/data', [AdminRoleController::class, 'data'])->name('role.data');
    Route::resource('role', AdminRoleController::class);

    /** Permission Routes */
    Route::get('permission/data', [AdminPermissionController::class, 'data'])->name('permission.data');
    Route::resource('permission', AdminPermissionController::class);

    /** Setting Routes */
    Route::get('setting', [AdminSettingController::class, 'index'])->name('setting.index');
    Route::put('general-setting', [AdminSettingController::class, 'generalSettingUpdate'])->name('general_setting.update');
    Route::put('jasa-setting', [AdminSettingController::class, 'jasaSettingUpdate'])->name('jasa_setting.update');
    Route::put('other-setting', [AdminSettingController::class, 'otherSettingUpdate'])->name('other_setting.update');

    /** Bank Routes */
    // Route::get('bank/data', [AdminBankController::class, 'data'])->name('bank.data');
    // Route::get('bank/bank/{id}', [AdminBankController::class, 'restore'])->name('bank.restore');
    // Route::resource('bank', AdminBankController::class);

    /** Language Routes */
    // Route::get('language/data', [AdminLanguageController::class, 'data'])->name('language.data');
    // Route::get('language/restore/{id}', [AdminLanguageController::class, 'restore'])->name('language.restore');
    // Route::resource('language', AdminLanguageController::class);

    /** Translate Routes */
    // Route::get('translate-admin', [AdminTranslateController::class, 'indexAdmin'])->name('translate.admin');
    // Route::get('translate-mobile', [AdminTranslateController::class, 'indexMobile'])->name('translate.mobile');
    // Route::get('translate-website', [AdminTranslateController::class, 'indexWebsite'])->name('translate.website');
    // Route::post('extract-localize-string', [AdminTranslateController::class, 'extractLocalizationStrings'])->name('translate.extract_localize_string');
    // Route::post('languange-string-update', [AdminTranslateController::class, 'updateLanguangeString'])->name('translate.update_languange_string');
    // Route::post('translate-string', [AdminTranslateController::class, 'translateString'])->name('translate.translate_string');
});

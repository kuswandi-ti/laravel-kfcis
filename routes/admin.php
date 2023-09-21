<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\AdminBankController;
use App\Http\Controllers\Admin\AdminRoleController;
use App\Http\Controllers\Admin\AdminSaleController;
use App\Http\Controllers\Admin\AdminPeriodController;
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
use App\Http\Controllers\Admin\AdminLoanSocialController;
use App\Http\Controllers\Admin\AdminMemberUserController;
use App\Http\Controllers\Admin\AdminPermissionController;
use App\Http\Controllers\Admin\AdminLoanFundingController;
use App\Http\Controllers\Admin\AdminLoanRegularController;
use App\Http\Controllers\Admin\AdminSavingDepositController;
use App\Http\Controllers\Admin\AdminChartOfAccountController;
use App\Http\Controllers\Admin\AdminSavingWithdrawController;

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

    /** Profile Routes */
    Route::put('profile-password-update/{id}', [AdminProfileController::class, 'updatePassword'])->name('profile_password.update');
    Route::resource('profile', AdminProfileController::class);

    Route::group([
        'middleware' => ['active_period']
    ], function() {
        /** Sale Routes */
        Route::resource('sale', AdminSaleController::class);

        /** Saving - Deposit Routes */
        Route::get('saving-deposit/approve', [AdminSavingDepositController::class, 'indexApproveSavingDeposit'])->name('approve.saving_deposit.index');
        Route::post('saving-deposit/approve/{member}', [AdminSavingDepositController::class, 'postApproveSavingDeposit'])->name('approve.saving_deposit.post');
        Route::resource('saving-deposit', AdminSavingDepositController::class);

        /** Saving - Withdraw Routes */
        Route::resource('saving-withdraw', AdminSavingWithdrawController::class);

        /** Loan - Regular Routes */
        Route::get('loan-regular/approve', [AdminLoanRegularController::class, 'indexApproveLoanRegular'])->name('approve.loan_regular.index');
        Route::post('loan-regular/approve/{member}', [AdminLoanRegularController::class, 'postApproveLoanRegular'])->name('approve.loan_regular.post');
        Route::resource('loan-regular', AdminLoanRegularController::class);

        /** Loan - Funding Routes */
        Route::get('loan-funding/approve', [AdminLoanFundingController::class, 'indexApproveLoanFunding'])->name('approve.loan_funding.index');
        Route::post('loan-funding/approve/{member}', [AdminLoanFundingController::class, 'postApproveLoanFunding'])->name('approve.loan_funding.post');
        Route::resource('loan-funding', AdminLoanFundingController::class);

        /** Loan - Social Routes */
        Route::get('loan-social/approve', [AdminLoanSocialController::class, 'indexApproveLoanSocial'])->name('approve.loan_social.index');
        Route::post('loan-social/approve/{member}', [AdminLoanSocialController::class, 'postApproveLoanSocial'])->name('approve.loan_social.post');
        Route::resource('loan-social', AdminLoanSocialController::class);
    });

    /** Chart of Account Routes */
    Route::resource('coa', AdminChartOfAccountController::class);

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

    /** Period Routes */
    Route::get('period/data', [AdminPeriodController::class, 'data'])->name('period.data');
    Route::get('period/restore/{period}', [AdminPeriodController::class, 'restore'])->name('period.restore');
    Route::resource('period', AdminPeriodController::class);

    /** Setting Routes */
    Route::get('setting', [AdminSettingController::class, 'index'])->name('setting.index');
    Route::put('general-setting', [AdminSettingController::class, 'generalSettingUpdate'])->name('general_setting.update');
    Route::put('jasa-setting', [AdminSettingController::class, 'jasaSettingUpdate'])->name('jasa_setting.update');
    Route::put('other-setting', [AdminSettingController::class, 'otherSettingUpdate'])->name('other_setting.update');
});

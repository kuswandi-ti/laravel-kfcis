<?php

namespace App\Http\Controllers\Admin;

use App\Models\SettingSystem;
use App\Traits\FileUploadTrait;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AdminJasaSettingUpdateRequest;
use App\Http\Requests\Admin\AdminGeneralSettingUpdateRequest;
use App\Http\Requests\Admin\AdminPaymentSettingUpdateRequest;

class AdminSettingController extends Controller
{
    use FileUploadTrait;

    function __construct()
    {
        $this->middleware('permission:system setting', ['only' => ['index', 'generalSettingIndex', 'generalSettingUpdate', 'notificationSettingIndex', 'paymentSettingUpdate']]);
    }

    public function index()
    {
        return view('admin.setting.index');
    }

    public function generalSettingUpdate(AdminGeneralSettingUpdateRequest $request)
    {
        foreach ($request->only('company_name', 'site_title', 'company_phone', 'company_email', 'company_address') as $key => $value) {
            SettingSystem::updateOrCreate(
                ['key' => $key],
                ['value' => $value, 'updated_by' => auth()->user()->name],
            );
        }

        if ($request->hasFile('image_company_logo')) {
            $imagePath = $this->handleImageUpload($request, 'image_company_logo', $request->old_image_company_logo, 'company_logo');
            SettingSystem::updateOrCreate(
                ['key' => 'company_logo'],
                ['value' => $imagePath],
            );
        }

        if ($request->hasFile('image_company_logo_desktop')) {
            $imagePath = $this->handleImageUpload($request, 'image_company_logo_desktop', $request->old_image_company_logo_desktop, 'company_logo');
            SettingSystem::updateOrCreate(
                ['key' => 'company_logo_desktop'],
                ['value' => $imagePath],
            );
        }

        if ($request->hasFile('image_company_logo_toggle')) {
            $imagePath = $this->handleImageUpload($request, 'image_company_logo_toggle', $request->old_image_company_logo_toggle, 'company_logo');
            SettingSystem::updateOrCreate(
                ['key' => 'company_logo_toggle'],
                ['value' => $imagePath],
            );
        }

        return redirect()->back()->with('success', __('Pengaturan informasi koperasi berhasil diupdate'));
    }

    public function jasaSettingUpdate(AdminJasaSettingUpdateRequest $request)
    {
        foreach ($request->only('jasa_pinjaman_reguler', 'jasa_pinjaman_pendanaan', 'jasa_pinjaman_sosial') as $key => $value) {
            SettingSystem::updateOrCreate(
                ['key' => $key],
                ['value' => $value, 'updated_by' => auth()->user()->name],
            );
        }

        return redirect()->back()->with('success', __('Pengaturan persentase jasa berhasil diupdate'));
    }
}

<?php

use Carbon\Carbon;
use App\Models\Setting;
use Illuminate\Support\Str;
use App\Models\SettingMember;
use App\Models\SettingSystem;
use Illuminate\Support\Facades\Auth;

function setSidebarActive(array $routes): ?string
{
    foreach ($routes as $route) {
        if (request()->routeIs($route)) {
            return 'active';
        }
    }

    return '';
}

function setSidebarOpen(array $routes): ?string
{
    foreach ($routes as $route) {
        if (request()->routeIs($route)) {
            return 'open';
        }
    }

    return '';
}

function truncateString(string $text, int $limit = 45): ?string
{
    return Str::limit($text, $limit, '...');
}

function capitalAllWord(string $text = null): ?string
{
    return $text != null ? Str::of($text)->upper() : '';
}

function capitalFirstLetter(string $text = null): ?string
{
    return $text != null ? Str::of($text)->ucfirst() : '';
}

function getArrayAllPermission()
{
    return [
        ['guard_name' => 'web', 'name' => 'department create', 'group_name' => 'Departemen Permission'],
        ['guard_name' => 'web', 'name' => 'department delete', 'group_name' => 'Departemen Permission'],
        ['guard_name' => 'web', 'name' => 'department index', 'group_name' => 'Departemen Permission'],
        ['guard_name' => 'web', 'name' => 'department restore', 'group_name' => 'Departemen Permission'],
        ['guard_name' => 'web', 'name' => 'department update', 'group_name' => 'Departemen Permission'],
        ['guard_name' => 'web', 'name' => 'section create', 'group_name' => 'Bagian Permission'],
        ['guard_name' => 'web', 'name' => 'section delete', 'group_name' => 'Bagian Permission'],
        ['guard_name' => 'web', 'name' => 'section index', 'group_name' => 'Bagian Permission'],
        ['guard_name' => 'web', 'name' => 'section restore', 'group_name' => 'Bagian Permission'],
        ['guard_name' => 'web', 'name' => 'section update', 'group_name' => 'Bagian Permission'],
        ['guard_name' => 'web', 'name' => 'product create', 'group_name' => 'Barang Penjualan Permission'],
        ['guard_name' => 'web', 'name' => 'product delete', 'group_name' => 'Barang Penjualan Permission'],
        ['guard_name' => 'web', 'name' => 'product index', 'group_name' => 'Barang Penjualan Permission'],
        ['guard_name' => 'web', 'name' => 'product restore', 'group_name' => 'Barang Penjualan Permission'],
        ['guard_name' => 'web', 'name' => 'product update', 'group_name' => 'Barang Penjualan Permission'],
        ['guard_name' => 'web', 'name' => 'pengurus create', 'group_name' => 'Pengurus Permission'],
        ['guard_name' => 'web', 'name' => 'pengurus delete', 'group_name' => 'Pengurus Permission'],
        ['guard_name' => 'web', 'name' => 'pengurus index', 'group_name' => 'Pengurus Permission'],
        ['guard_name' => 'web', 'name' => 'pengurus restore', 'group_name' => 'Pengurus Permission'],
        ['guard_name' => 'web', 'name' => 'pengurus update', 'group_name' => 'Pengurus Permission'],
        ['guard_name' => 'web', 'name' => 'anggota approve', 'group_name' => 'Anggota Permission'],
        ['guard_name' => 'web', 'name' => 'anggota create', 'group_name' => 'Anggota Permission'],
        ['guard_name' => 'web', 'name' => 'anggota delete', 'group_name' => 'Anggota Permission'],
        ['guard_name' => 'web', 'name' => 'anggota index', 'group_name' => 'Anggota Permission'],
        ['guard_name' => 'web', 'name' => 'anggota restore', 'group_name' => 'Anggota Permission'],
        ['guard_name' => 'web', 'name' => 'anggota update', 'group_name' => 'Anggota Permission'],
        ['guard_name' => 'web', 'name' => 'role create', 'group_name' => 'Role Permission'],
        ['guard_name' => 'web', 'name' => 'role delete', 'group_name' => 'Role Permission'],
        ['guard_name' => 'web', 'name' => 'role index', 'group_name' => 'Role Permission'],
        ['guard_name' => 'web', 'name' => 'role update', 'group_name' => 'Role Permission'],
        ['guard_name' => 'web', 'name' => 'permission create', 'group_name' => 'Permission Permission'],
        ['guard_name' => 'web', 'name' => 'permission delete', 'group_name' => 'Permission Permission'],
        ['guard_name' => 'web', 'name' => 'permission index', 'group_name' => 'Permission Permission'],
        ['guard_name' => 'web', 'name' => 'permission update', 'group_name' => 'Permission Permission'],
        ['guard_name' => 'web', 'name' => 'setting system', 'group_name' => 'Setting System Permission'],
    ];
}

function setArrayRoleKetuaPermission()
{
    return [
        'department create',
        'department delete',
        'department index',
        'department restore',
        'department update',
        'setting system',
    ];
}

function setArrayRoleBendaharaPermission()
{
    return [
        'section create',
        'section delete',
        'section index',
        'section restore',
        'section update',
    ];
}

function setArrayRoleSekretarisPermission()
{
    return [
        'anggota create',
        'anggota delete',
        'anggota index',
        'anggota restore',
        'anggota update',
    ];
}

function setStatusBadge($status)
{
    return $status == 1 ? 'success' : 'danger';
}

function setStatusText($status)
{
    return $status == 1 ? __('Aktif') : __('Tidak Aktif');
}

function saveDateTimeNow()
{
    return Carbon::now()->addHour(7)->format('Y-m-d H:i:s');
}

function saveDateNow()
{
    return Carbon::now()->addHour(7)->format('Y-m-d');
}

function saveTimeNow()
{
    return Carbon::now()->addHour(7)->format('H:i:s');
}

function noImage(): ?string
{
    return config('common.path_storage') . config('common.no_image');
}

function canAccess(array $permissions)
{
    $permission = auth()->user()->hasAnyPermission($permissions);
    $super_admin = auth()->user()->hasRole('Super Admin');

    if ($permission || $super_admin) {
        return true;
    } else {
        return false;
    }
}

function getLoggedUserRole()
{
    $role = auth()->user()->getRoleNames();
    return $role->first();
}

function checkPermission(string $permission)
{
    return auth()->user()->hasPermissionTo($permission);
}

function formatDate($date = '')
{
    if (!is_null($date) && isset($date)) {
        $date_create = date_create($date);
        $formatDate = SettingSystem::where('key', 'default_date_format')->first();
        return date_format($date_create, $formatDate->value);
    }
}

function formatMonth($month_number)
{
    $month_name = array(
        1 =>
        'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
    );

    return $month_name[(int) $month_number];
}

function formatAmount($amount, $decimal = 0)
{
    return number_format((float)$amount, $decimal, ',', '.');
}

function unformatAmount($str)
{
    $str = str_replace(".", "", $str);
    $str = str_replace(",", ".", $str);
    return (float) $str;
}

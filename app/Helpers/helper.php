<?php

use Carbon\Carbon;
use App\Models\Setting;
use Illuminate\Support\Str;
use App\Models\SettingMember;
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
        ['guard_name' => 'web', 'name' => 'anggota create', 'group_name' => 'Anggota Permission'],
        ['guard_name' => 'web', 'name' => 'anggota delete', 'group_name' => 'Anggota Permission'],
        ['guard_name' => 'web', 'name' => 'anggota index', 'group_name' => 'Anggota Permission'],
        ['guard_name' => 'web', 'name' => 'anggota restore', 'group_name' => 'Anggota Permission'],
        ['guard_name' => 'web', 'name' => 'anggota update', 'group_name' => 'Anggota Permission'],
        ['guard_name' => 'web', 'name' => 'permission create', 'group_name' => 'Permission Permission'],
        ['guard_name' => 'web', 'name' => 'permission delete', 'group_name' => 'Permission Permission'],
        ['guard_name' => 'web', 'name' => 'permission index', 'group_name' => 'Permission Permission'],
        ['guard_name' => 'web', 'name' => 'permission update', 'group_name' => 'Permission Permission'],
        ['guard_name' => 'web', 'name' => 'role create', 'group_name' => 'Role Permission'],
        ['guard_name' => 'web', 'name' => 'role delete', 'group_name' => 'Role Permission'],
        ['guard_name' => 'web', 'name' => 'role index', 'group_name' => 'Role Permission'],
        ['guard_name' => 'web', 'name' => 'role update', 'group_name' => 'Role Permission'],
        ['guard_name' => 'web', 'name' => 'user create', 'group_name' => 'User Permission'],
        ['guard_name' => 'web', 'name' => 'user delete', 'group_name' => 'User Permission'],
        ['guard_name' => 'web', 'name' => 'user index', 'group_name' => 'User Permission'],
        ['guard_name' => 'web', 'name' => 'user restore', 'group_name' => 'User Permission'],
        ['guard_name' => 'web', 'name' => 'user update', 'group_name' => 'User Permission'],
        ['guard_name' => 'web', 'name' => 'bahasa create', 'group_name' => 'Bahasa Permission'],
        ['guard_name' => 'web', 'name' => 'bahasa delete', 'group_name' => 'Bahasa Permission'],
        ['guard_name' => 'web', 'name' => 'bahasa index', 'group_name' => 'Bahasa Permission'],
        ['guard_name' => 'web', 'name' => 'bahasa restore', 'group_name' => 'Bahasa Permission'],
        ['guard_name' => 'web', 'name' => 'bahasa update', 'group_name' => 'Bahasa Permission'],
        ['guard_name' => 'web', 'name' => 'translate generate', 'group_name' => 'Translate Permission'],
        ['guard_name' => 'web', 'name' => 'translate index', 'group_name' => 'Translate Permission'],
        ['guard_name' => 'web', 'name' => 'translate trans', 'group_name' => 'Translate Permission'],
        ['guard_name' => 'web', 'name' => 'translate update', 'group_name' => 'Translate Permission'],
        ['guard_name' => 'web', 'name' => 'setting system', 'group_name' => 'Setting System Permission'],
        ['guard_name' => 'web', 'name' => 'section create', 'group_name' => 'Section Permission'],
        ['guard_name' => 'web', 'name' => 'section delete', 'group_name' => 'Section Permission'],
        ['guard_name' => 'web', 'name' => 'section index', 'group_name' => 'Section Permission'],
        ['guard_name' => 'web', 'name' => 'section restore', 'group_name' => 'Section Permission'],
        ['guard_name' => 'web', 'name' => 'section update', 'group_name' => 'Section Permission'],
        ['guard_name' => 'web', 'name' => 'department create', 'group_name' => 'Department Permission'],
        ['guard_name' => 'web', 'name' => 'department delete', 'group_name' => 'Department Permission'],
        ['guard_name' => 'web', 'name' => 'department index', 'group_name' => 'Department Permission'],
        ['guard_name' => 'web', 'name' => 'department restore', 'group_name' => 'Department Permission'],
        ['guard_name' => 'web', 'name' => 'department update', 'group_name' => 'Department Permission'],
    ];
}

function setArrayRoleKetuaPermission()
{
    return [
        'user create',
        'user delete',
        'user index',
        'user restore',
        'user update',
        'setting system',
    ];
}

function setArrayRoleBendaharaPermission()
{
    return [
        'bahasa create',
        'bahasa delete',
        'bahasa index',
        'bahasa restore',
        'bahasa update',
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
    return $status == 1 ? 'Active' : 'Inactive';
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

function formatMonth($month_number)
{
    $month_name = array(
        1 =>
        'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
    );

    return $month_name[(int) $month_number];
}

function formatAmount($amount)
{
    return number_format((float)$amount, 0, ',', '.');
}

function unformatAmount($str)
{
    $str = str_replace(".", "", $str);
    $str = str_replace(",", ".", $str);
    return (float) $str;
}

<?php

use Carbon\Carbon;
use App\Models\Period;
use Illuminate\Support\Str;
use App\Models\SettingSystem;

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
        ['guard_name' => 'web', 'name' => 'keperluan create', 'group_name' => 'Keperluan Permission'],
        ['guard_name' => 'web', 'name' => 'keperluan delete', 'group_name' => 'Keperluan Permission'],
        ['guard_name' => 'web', 'name' => 'keperluan index', 'group_name' => 'Keperluan Permission'],
        ['guard_name' => 'web', 'name' => 'keperluan update', 'group_name' => 'Keperluan Permission'],
        ['guard_name' => 'web', 'name' => 'plafon create', 'group_name' => 'Plafon Permission'],
        ['guard_name' => 'web', 'name' => 'plafon delete', 'group_name' => 'Plafon Permission'],
        ['guard_name' => 'web', 'name' => 'plafon index', 'group_name' => 'Plafon Permission'],
        ['guard_name' => 'web', 'name' => 'plafon update', 'group_name' => 'Plafon Permission'],
        ['guard_name' => 'web', 'name' => 'periode create', 'group_name' => 'Periode Permission'],
        ['guard_name' => 'web', 'name' => 'periode delete', 'group_name' => 'Periode Permission'],
        ['guard_name' => 'web', 'name' => 'periode index', 'group_name' => 'Periode Permission'],
        ['guard_name' => 'web', 'name' => 'periode restore', 'group_name' => 'Periode Permission'],
        ['guard_name' => 'web', 'name' => 'periode update', 'group_name' => 'Periode Permission'],
        ['guard_name' => 'web', 'name' => 'coa create', 'group_name' => 'Chart of Account Permission'],
        ['guard_name' => 'web', 'name' => 'coa delete', 'group_name' => 'Chart of Account Permission'],
        ['guard_name' => 'web', 'name' => 'coa index', 'group_name' => 'Chart of Account Permission'],
        ['guard_name' => 'web', 'name' => 'coa restore', 'group_name' => 'Chart of Account Permission'],
        ['guard_name' => 'web', 'name' => 'coa update', 'group_name' => 'Chart of Account Permission'],
        ['guard_name' => 'web', 'name' => 'departemen create', 'group_name' => 'Departemen Permission'],
        ['guard_name' => 'web', 'name' => 'departemen delete', 'group_name' => 'Departemen Permission'],
        ['guard_name' => 'web', 'name' => 'departemen index', 'group_name' => 'Departemen Permission'],
        ['guard_name' => 'web', 'name' => 'departemen restore', 'group_name' => 'Departemen Permission'],
        ['guard_name' => 'web', 'name' => 'departemen update', 'group_name' => 'Departemen Permission'],
        ['guard_name' => 'web', 'name' => 'bagian create', 'group_name' => 'Bagian Permission'],
        ['guard_name' => 'web', 'name' => 'bagian delete', 'group_name' => 'Bagian Permission'],
        ['guard_name' => 'web', 'name' => 'bagian index', 'group_name' => 'Bagian Permission'],
        ['guard_name' => 'web', 'name' => 'bagian restore', 'group_name' => 'Bagian Permission'],
        ['guard_name' => 'web', 'name' => 'bagian update', 'group_name' => 'Bagian Permission'],
        ['guard_name' => 'web', 'name' => 'barang penjualan create', 'group_name' => 'Barang Penjualan Permission'],
        ['guard_name' => 'web', 'name' => 'barang penjualan delete', 'group_name' => 'Barang Penjualan Permission'],
        ['guard_name' => 'web', 'name' => 'barang penjualan index', 'group_name' => 'Barang Penjualan Permission'],
        ['guard_name' => 'web', 'name' => 'barang penjualan restore', 'group_name' => 'Barang Penjualan Permission'],
        ['guard_name' => 'web', 'name' => 'barang penjualan update', 'group_name' => 'Barang Penjualan Permission'],
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
        ['guard_name' => 'web', 'name' => 'tabungan create', 'group_name' => 'Tabungan Permission'],
        ['guard_name' => 'web', 'name' => 'tabungan delete', 'group_name' => 'Tabungan Permission'],
        ['guard_name' => 'web', 'name' => 'tabungan index', 'group_name' => 'Tabungan Permission'],
        ['guard_name' => 'web', 'name' => 'tabungan update', 'group_name' => 'Tabungan Permission'],
        ['guard_name' => 'web', 'name' => 'setor tabungan approve', 'group_name' => 'Setor Tabungan Permission'],
        ['guard_name' => 'web', 'name' => 'setor tabungan create', 'group_name' => 'Setor Tabungan Permission'],
        ['guard_name' => 'web', 'name' => 'setor tabungan delete', 'group_name' => 'Setor Tabungan Permission'],
        ['guard_name' => 'web', 'name' => 'setor tabungan index', 'group_name' => 'Setor Tabungan Permission'],
        ['guard_name' => 'web', 'name' => 'setor tabungan update', 'group_name' => 'Setor Tabungan Permission'],
        ['guard_name' => 'web', 'name' => 'tarik tabungan create', 'group_name' => 'Tarik Tabungan Permission'],
        ['guard_name' => 'web', 'name' => 'tarik tabungan delete', 'group_name' => 'Tarik Tabungan Permission'],
        ['guard_name' => 'web', 'name' => 'tarik tabungan index', 'group_name' => 'Tarik Tabungan Permission'],
        ['guard_name' => 'web', 'name' => 'tarik tabungan update', 'group_name' => 'Tarik Tabungan Permission'],
        ['guard_name' => 'web', 'name' => 'pinjaman reguler approve', 'group_name' => 'Pinjaman Reguler Permission'],
        ['guard_name' => 'web', 'name' => 'pinjaman reguler create', 'group_name' => 'Pinjaman Reguler Permission'],
        ['guard_name' => 'web', 'name' => 'pinjaman reguler delete', 'group_name' => 'Pinjaman Reguler Permission'],
        ['guard_name' => 'web', 'name' => 'pinjaman reguler index', 'group_name' => 'Pinjaman Reguler Permission'],
        ['guard_name' => 'web', 'name' => 'pinjaman reguler update', 'group_name' => 'Pinjaman Reguler Permission'],
        ['guard_name' => 'web', 'name' => 'pinjaman pendanaan approve', 'group_name' => 'Pinjaman Pendanaan Permission'],
        ['guard_name' => 'web', 'name' => 'pinjaman pendanaan create', 'group_name' => 'Pinjaman Pendanaan Permission'],
        ['guard_name' => 'web', 'name' => 'pinjaman pendanaan delete', 'group_name' => 'Pinjaman Pendanaan Permission'],
        ['guard_name' => 'web', 'name' => 'pinjaman pendanaan index', 'group_name' => 'Pinjaman Pendanaan Permission'],
        ['guard_name' => 'web', 'name' => 'pinjaman pendanaan update', 'group_name' => 'Pinjaman Pendanaan Permission'],
        ['guard_name' => 'web', 'name' => 'pinjaman sosial approve', 'group_name' => 'Pinjaman Sosial Permission'],
        ['guard_name' => 'web', 'name' => 'pinjaman sosial create', 'group_name' => 'Pinjaman Sosial Permission'],
        ['guard_name' => 'web', 'name' => 'pinjaman sosial delete', 'group_name' => 'Pinjaman Sosial Permission'],
        ['guard_name' => 'web', 'name' => 'pinjaman sosial index', 'group_name' => 'Pinjaman Sosial Permission'],
        ['guard_name' => 'web', 'name' => 'pinjaman sosial update', 'group_name' => 'Pinjaman Sosial Permission'],
        ['guard_name' => 'web', 'name' => 'penjualan create', 'group_name' => 'Penjualan Permission'],
        ['guard_name' => 'web', 'name' => 'penjualan delete', 'group_name' => 'Penjualan Permission'],
        ['guard_name' => 'web', 'name' => 'penjualan index', 'group_name' => 'Penjualan Permission'],
        ['guard_name' => 'web', 'name' => 'penjualan update', 'group_name' => 'Penjualan Permission'],
        ['guard_name' => 'web', 'name' => 'setting system', 'group_name' => 'Setting System Permission'],
    ];
}

function setArrayRoleKetuaPermission()
{
    return [
        'departemen create',
        'departemen delete',
        'departemen index',
        'departemen restore',
        'departemen update',
        'setting system',
    ];
}

function setArrayRoleBendaharaPermission()
{
    return [
        'bagian create',
        'bagian delete',
        'bagian index',
        'bagian restore',
        'bagian update',
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

function setApproveBadge($status)
{
    $status_badge = '';

    switch ($status) {
        case '0':
            $status_badge = 'danger';
            break;

        case '1':
            $status_badge = 'success';
            break;

        case '2':
            $status_badge = 'dark';
            break;

        default:
            $status_badge = '';
            break;
    }
    return $status_badge;
}

function setApproveText($status)
{
    $status_text = '';

    switch ($status) {
        case '0':
            $status_text = 'Belum Approve';
            break;

        case '1':
            $status_text = 'Sudah Approve';
            break;

        case '2':
            $status_text = 'Ditolak';
            break;

        default:
            $status_text = '';
            break;
    }
    return $status_text;
}

function setVerifyBadge($status)
{
    return $status == 1 ? 'success' : 'danger';
}

function setVerifyText($status)
{
    return $status == 1 ? __('Sudah Verify Email') : __('Belum Verify Email');
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

function activePeriod(): ?String
{
    return Period::where('status', 1)->first()->name ?? '';
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
    $decimal_digit_amount = SettingSystem::where('key', 'decimal_digit_amount')->first();
    $decimal = $decimal == 0 ? (int)$decimal_digit_amount->value : $decimal;
    return number_format((float)$amount, $decimal, ',', '.');
}

function formatPercent($percent, $decimal = 0)
{
    $decimal_digit_percent = SettingSystem::where('key', 'decimal_digit_percent')->first();
    $decimal = $decimal == 0 ? (int)$decimal_digit_percent->value : $decimal;
    return number_format((float)$percent, $decimal, ',', '.');
}

function unformatAmount($str)
{
    $str = str_replace(".", "", $str);
    return (float) $str;
}

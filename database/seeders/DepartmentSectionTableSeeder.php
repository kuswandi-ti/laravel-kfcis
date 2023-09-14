<?php

namespace Database\Seeders;

use App\Models\Section;
use App\Models\Department;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DepartmentSectionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = 'Super Admin';

        $accounting = Department::create([
            'name' => 'ACCOUNTING',
            'slug' => Str::slug('ACCOUNTING'),
            'created_by' => $user,
        ]);
        $input = [
            ['name' => 'ACCOUNTING', 'slug' => Str::slug('ACCOUNTING'), 'department_id' => $accounting->id, 'created_by' => $user],
            ['name' => 'MIS', 'slug' => Str::slug('MIS'), 'department_id' => $accounting->id, 'created_by' => $user],
        ];
        foreach ($input as $item) {
            Section::create($item);
        }

        $dir = Department::create([
            'name' => 'DIREKTUR',
            'slug' => Str::slug('DIREKTUR'),
            'created_by' => $user,
        ]);
        $input = [
            ['name' => 'DIREKTUR', 'slug' => Str::slug('DIREKTUR'), 'department_id' => $dir->id, 'created_by' => $user],
        ];
        foreach ($input as $item) {
            Section::create($item);
        }

        $exp = Department::create([
            'name' => 'EXPORT',
            'slug' => Str::slug('EXPORT'),
            'created_by' => $user,
        ]);
        $input = [
            ['name' => 'EXPORT', 'slug' => Str::slug('EXPORT'), 'department_id' => $exp->id, 'created_by' => $user],
        ];
        foreach ($input as $item) {
            Section::create($item);
        }

        $fac = Department::create([
            'name' => 'FACTORY',
            'slug' => Str::slug('FACTORY'),
            'created_by' => $user,
        ]);
        $input = [
            ['name' => 'FACTORY', 'slug' => Str::slug('FACTORY'), 'department_id' => $fac->id, 'created_by' => $user],
        ];
        foreach ($input as $item) {
            Section::create($item);
        }

        $hrg = Department::create([
            'name' => 'HRGA',
            'slug' => Str::slug('HRGA'),
            'created_by' => $user,
        ]);
        $input = [
            ['name' => 'HK', 'slug' => Str::slug('HK'), 'department_id' => $hrg->id, 'created_by' => $user],
            ['name' => 'OB', 'slug' => Str::slug('OB'), 'department_id' => $hrg->id, 'created_by' => $user],
            ['name' => 'KUWT-HK', 'slug' => Str::slug('KUWT-HK'), 'department_id' => $hrg->id, 'created_by' => $user],
            ['name' => 'HK2', 'slug' => Str::slug('HK2'), 'department_id' => $hrg->id, 'created_by' => $user],
            ['name' => 'KUWT-HK2', 'slug' => Str::slug('KUWT-HK2'), 'department_id' => $hrg->id, 'created_by' => $user],
            ['name' => 'DRIVER', 'slug' => Str::slug('DRIVER'), 'department_id' => $hrg->id, 'created_by' => $user],
            ['name' => 'HRGA', 'slug' => Str::slug('HRGA'), 'department_id' => $hrg->id, 'created_by' => $user],
        ];
        foreach ($input as $item) {
            Section::create($item);
        }

        $imp = Department::create([
            'name' => 'IMPROVEMENT',
            'slug' => Str::slug('IMPROVEMENT'),
            'created_by' => $user,
        ]);
        $input = [
            ['name' => 'IMPROVEMENT', 'slug' => Str::slug('IMPROVEMENT'), 'department_id' => $imp->id, 'created_by' => $user],
        ];
        foreach ($input as $item) {
            Section::create($item);
        }

        $log = Department::create([
            'name' => 'LOGISTIC',
            'slug' => Str::slug('LOGISTIC'),
            'created_by' => $user,
        ]);
        $input = [
            ['name' => 'LOGISTIC', 'slug' => Str::slug('LOGISTIC'), 'department_id' => $log->id, 'created_by' => $user],
        ];
        foreach ($input as $item) {
            Section::create($item);
        }

        $mtc = Department::create([
            'name' => 'MAINTENANCE',
            'slug' => Str::slug('MAINTENANCE'),
            'created_by' => $user,
        ]);
        $input = [
            ['name' => 'GT-SP', 'slug' => Str::slug('GT-SP'), 'department_id' => $mtc->id, 'created_by' => $user],
            ['name' => 'KUWT-WS', 'slug' => Str::slug('KUWT-WS'), 'department_id' => $mtc->id, 'created_by' => $user],
            ['name' => 'MNT', 'slug' => Str::slug('MNT'), 'department_id' => $mtc->id, 'created_by' => $user],
            ['name' => 'WS', 'slug' => Str::slug('WS'), 'department_id' => $mtc->id, 'created_by' => $user],
            ['name' => 'WS TRAINEE', 'slug' => Str::slug('WS TRAINEE'), 'department_id' => $mtc->id, 'created_by' => $user],
            ['name' => 'KUWT-MNT', 'slug' => Str::slug('KUWT-MNT'), 'department_id' => $mtc->id, 'created_by' => $user],
            ['name' => 'UTILITY', 'slug' => Str::slug('UTILITY'), 'department_id' => $mtc->id, 'created_by' => $user],
            ['name' => 'DGTK', 'slug' => Str::slug('DGTK'), 'department_id' => $mtc->id, 'created_by' => $user],
        ];
        foreach ($input as $item) {
            Section::create($item);
        }

        $prl = Department::create([
            'name' => 'PRODUCTION LEAD',
            'slug' => Str::slug('PRODUCTION LEAD'),
            'created_by' => $user,
        ]);
        $input = [
            ['name' => 'PRODUCTION LEAD', 'slug' => Str::slug('PRODUCTION LEAD'), 'department_id' => $prl->id, 'created_by' => $user],
        ];
        foreach ($input as $item) {
            Section::create($item);
        }

        $prd = Department::create([
            'name' => 'PRODUKSI',
            'slug' => Str::slug('PRODUKSI'),
            'created_by' => $user,
        ]);
        $input = [
            ['name' => 'A-P', 'slug' => Str::slug('A-P'), 'department_id' => $prd->id, 'created_by' => $user],
            ['name' => 'DIP', 'slug' => Str::slug('DIP'), 'department_id' => $prd->id, 'created_by' => $user],
            ['name' => 'FIN', 'slug' => Str::slug('FIN'), 'department_id' => $prd->id, 'created_by' => $user],
            ['name' => 'KUWT-A-P', 'slug' => Str::slug('KUWT-A-P'), 'department_id' => $prd->id, 'created_by' => $user],
            ['name' => 'KUWT-DIP', 'slug' => Str::slug('KUWT-DIP'), 'department_id' => $prd->id, 'created_by' => $user],
            ['name' => 'KUWT-FIN', 'slug' => Str::slug('KUWT-FIN'), 'department_id' => $prd->id, 'created_by' => $user],
            ['name' => 'KUWT-NCP', 'slug' => Str::slug('KUWT-NCP'), 'department_id' => $prd->id, 'created_by' => $user],
            ['name' => 'KUWT-PCK', 'slug' => Str::slug('KUWT-PCK'), 'department_id' => $prd->id, 'created_by' => $user],
            ['name' => 'KUWT-PNT', 'slug' => Str::slug('KUWT-PNT'), 'department_id' => $prd->id, 'created_by' => $user],
            ['name' => 'KUWT-RP', 'slug' => Str::slug('KUWT-RP'), 'department_id' => $prd->id, 'created_by' => $user],
            ['name' => 'KUWT-TRN', 'slug' => Str::slug('KUWT-TRN'), 'department_id' => $prd->id, 'created_by' => $user],
            ['name' => 'NCP', 'slug' => Str::slug('NCP'), 'department_id' => $prd->id, 'created_by' => $user],
            ['name' => 'PCK', 'slug' => Str::slug('PCK'), 'department_id' => $prd->id, 'created_by' => $user],
            ['name' => 'PNT', 'slug' => Str::slug('PNT'), 'department_id' => $prd->id, 'created_by' => $user],
            ['name' => 'RP', 'slug' => Str::slug('RP'), 'department_id' => $prd->id, 'created_by' => $user],
            ['name' => 'TRN', 'slug' => Str::slug('TRN'), 'department_id' => $prd->id, 'created_by' => $user],
            ['name' => 'DOT', 'slug' => Str::slug('DOT'), 'department_id' => $prd->id, 'created_by' => $user],
            ['name' => 'PRODUKSI', 'slug' => Str::slug('PRODUKSI'), 'department_id' => $prd->id, 'created_by' => $user],
        ];
        foreach ($input as $item) {
            Section::create($item);
        }

        $qas = Department::create([
            'name' => 'QUALITY ASSURANCE',
            'slug' => Str::slug('QUALITY ASSURANCE'),
            'created_by' => $user,
        ]);
        $input = [
            ['name' => 'MR', 'slug' => Str::slug('MR'), 'department_id' => $qas->id, 'created_by' => $user],
            ['name' => 'QUALITY ASSURANCE', 'slug' => Str::slug('QUALITY ASSURANCE'), 'department_id' => $qas->id, 'created_by' => $user],
        ];
        foreach ($input as $item) {
            Section::create($item);
        }

        $rd = Department::create([
            'name' => 'R&D',
            'slug' => Str::slug('R&D'),
            'created_by' => $user,
        ]);
        $input = [
            ['name' => 'R&D', 'slug' => Str::slug('R&D'), 'department_id' => $rd->id, 'created_by' => $user],
        ];
        foreach ($input as $item) {
            Section::create($item);
        }
    }
}

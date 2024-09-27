<?php

namespace Database\Seeders;

use App\Models\Konfigurasi\Menu;
use App\Traits\HasMenuPermission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Cache;

class MenuSeeder extends Seeder
{
    use HasMenuPermission;

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Cache::forget('menus');

        // main menu
        $mm = Menu::firstOrCreate(['url' => 'main-menu'], ['name' => 'Main Menu',  'category' => 'MAIN MENU', 'icon' => 'dashboard-2-line']);
        $this->attachMenupermission($mm, ['read'], ['admin']);

        // submenu
        $sm = $mm->subMenus()->create(['name' => 'Sesi Ujian', 'url' => $mm->url . '/sesi-ujian', 'category' => $mm->category]);
        $this->attachMenupermission($sm, ['create', 'read', 'update', 'delete'], ['admin']);

        // submenu
        $sm = $mm->subMenus()->create(['name' => 'Kategori Ujian', 'url' => $mm->url . '/kategori-ujian', 'category' => $mm->category]);
        $this->attachMenupermission($sm, ['create', 'read', 'update', 'delete'], ['admin']);

         // submenu
         $sm = $mm->subMenus()->create(['name' => 'Kategori Soal', 'url' => $mm->url . '/kategori-soal', 'category' => $mm->category]);
         $this->attachMenupermission($sm, ['create', 'read', 'update', 'delete'], ['admin']);

        // submenu
        $sm = $mm->subMenus()->create(['name' => 'Data Soal', 'url' => $mm->url . '/data-soal', 'category' => $mm->category]);
        $this->attachMenupermission($sm, ['create', 'read', 'update', 'delete'], ['admin']);

        // submenu
        $sm = $mm->subMenus()->create(['name' => 'Manajemen Ujian', 'url' => $mm->url . '/manajemen-ujian', 'category' => $mm->category]);
        $this->attachMenupermission($sm, ['create', 'read', 'update', 'delete'], ['admin']);

        // submenu
        $sm = $mm->subMenus()->create(['name' => 'Peserta Per Sesi', 'url' => $mm->url . '/peserta-per-sesi', 'category' => $mm->category]);
        $this->attachMenupermission($sm, ['create', 'read', 'update', 'delete'], ['admin']);

        // main menu
        $mm = Menu::firstOrCreate(['url' => 'hasil-ujian'], ['name' => 'Hasil Ujian',  'category' => 'HASIL UJIAN', 'icon' => 'dashboard-2-line']);
        $this->attachMenupermission($mm, ['read'], ['admin']);

        // main menu
        $mm = Menu::firstOrCreate(['url' => 'report-hasil-ujian'], ['name' => 'Report Hasil Ujian',  'category' =>  $mm->url, 'icon' => 'dashboard-2-line']);
        $this->attachMenupermission($mm, ['read'], ['admin']);

        // main menu
        $mm = Menu::firstOrCreate(['url' => 'konfigurasi'], ['name' => 'Konfigurasi',  'category' => 'KONFIGURASI', 'icon' => 'dashboard-2-line']);
        $this->attachMenupermission($mm, ['read'], ['admin']);

        // submenu
        $sm = $mm->subMenus()->create(['name' => 'Menu', 'url' => $mm->url . '/menu', 'category' => $mm->category]);
        $this->attachMenupermission($sm, ['create', 'read', 'update', 'delete', 'sort'], ['admin']);

        // submenu roles
        $sm = $mm->subMenus()->create(['name' => 'Role', 'url' => $mm->url . '/roles', 'category' => $mm->category]);
        $this->attachMenupermission($sm, null, ['admin']);

        // submenu permission
        $sm = $mm->subMenus()->create(['name' => 'Permission', 'url' => $mm->url . '/permissions', 'category' => $mm->category]);
        $this->attachMenupermission($sm, null, ['admin']);

        // submenu akses role
        $sm = $mm->subMenus()->create(['name' => 'Akses Role', 'url' => $mm->url . '/akses-role', 'category' => $mm->category]);
        $this->attachMenupermission($sm, ['read', 'update'], ['admin']);

        // submenu akses user
        $sm = $mm->subMenus()->create(['name' => 'Akses User', 'url' => $mm->url . '/akses-user', 'category' => $mm->category]);
        $this->attachMenupermission($sm, ['read', 'update'], ['admin']);

        // submenu
        $sm = $mm->subMenus()->create(['name' => 'User', 'url' => $mm->url . '/users', 'category' => $mm->category]);
        $this->attachMenupermission($sm, null, ['admin']);
    }
}

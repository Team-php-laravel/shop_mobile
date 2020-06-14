<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => Str::random(10),
            'avatar' => 'https://p7.hiclipart.com/preview/312/283/679/avatar-computer-icons-user-profile-business-user-avatar.jpg',
            'phone' => '09432432',
            'email' => 'admin@gmail.com',
            'dia_chi' => 'Vietnamese',
            'ngay_sinh' => Carbon::now(),
            'cham_ngon' => '@#@',
            'ki_nang' => 'Best Daxua',
            'ghi_chu' => 'Nha giau hoc gioi dep trai',
            'vi_tri_id' => 1,
            'password' => Hash::make('123456789'),
        ]);
        DB::table('users')->insert([
            'name' => Str::random(10),
            'avatar' => 'https://p7.hiclipart.com/preview/312/283/679/avatar-computer-icons-user-profile-business-user-avatar.jpg',
            'email' => 'employee@gmail.com',
            'phone' => '09432432',
            'cham_ngon' => '@#@',
            'ngay_sinh' => Carbon::now(),
            'dia_chi' => 'Vietnamese',
            'ki_nang' => 'Best Daxua',
            'ghi_chu' => 'Nha giau hoc gioi dep trai',
            'vi_tri_id' => 2,
            'password' => Hash::make('123456789'),
        ]);
    }
}

<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;
use App\Models\CandidatsMaster\MsProspectiveStudents;


$factory->define(\App\Models\CandidatsMaster\MsProspectiveStudents::class, function (Faker $faker) {
    return [
        'code_pendaftaran' => $faker->randomElement(['CS-7163535604', 'CS-6265098961', '0064301665']),
        'enter_code' => $faker->randomElement(['4c3c31c0-67f1-11ea-a443-bf57c948f41c', '9e5aac80-67f1-11ea-a8d3-814d254ba06a', 'ddc835f0-67f1-11ea-bdac-89ae7727132e']),
        'nik' => $faker->randomElement(['01679765443368363', '01679765443312345']),
        'nisn' => $faker->randomElement(['0012663589', '0064301665', '0064301665']),
        'nama_calon_siswa' => $faker->name,
        'jenis_kelamin' => $faker->randomElement(['laki-laki', 'perempuan']),
        'kewarganegaraan' => $faker->randomElement(['WNI', 'WNA']),
        'tempat_lahir' => $faker->randomElement(['Bekasi', 'Jakarta', 'Jombang']),
        'tanggal_lahir' => $faker->date,
        'status' => $faker->randomElement(['seleksi', 'approve', 'cancel']),
        'id_table_ms_prospective_grades' => $faker->randomElement([1])


    ];
});

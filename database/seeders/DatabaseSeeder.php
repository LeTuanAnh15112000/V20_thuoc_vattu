<?php

namespace Database\Seeders;

use App\Models\DonViCongTacCanBo;
use App\Models\Ethnic;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(CountrySeeder::class);
        $this->call(DepartmentOfHealthSeeder::class);
        $this->call(MedicalCenterSeeder::class);
        $this->call(MedicalStationSeeder::class);
        $this->call(HealthFacilitySeeder::class);
        $this->call(WorkUnitSeeder::class);
        $this->call(PositionSeeder::class);
        $this->call(TitleSeeder::class);
        $this->call(SpecializedSeeder::class);
        $this->call(CadresSeeder::class);
        $this->call(ProfessionalCetificateSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(RoleAndPermissionSeeder::class);
        
        $this->call(DeploymentLocationSeeder::class);


        $this->call(ThuocSeeder::class);
        $this->call(DuongDungSeeder::class);
        $this->call(NhacungcapSeeder::class);
        $this->call(NuocsanxuatSeeder::class);
        $this->call(VattuSeeder::class);
        $this->call(HangsanxuatSeeder::class);
        $this->call(NguonnhapSeeder::class);
        $this->call(VitriSeeder::class);
        // $this->call(ICD10Seeder::class);


        /* Vitamin A */
        $this->call(EthnicSeeder::class);
        $this->call(PatientSeeder::class);
        $this->call(VitaminSeeder::class);
        $this->call(CarerSeeder::class);
    }
}

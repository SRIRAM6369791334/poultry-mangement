<?php

namespace Database\Seeders;

use App\Models\Breed;
use App\Models\BreedType;
use App\Models\Currency;
use App\Models\DiseaseType;
use App\Models\FeedType;
use App\Models\MedicineType;
use App\Models\Organization;
use App\Models\Uom;
use App\Models\VaccineType;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MasterDataSeeder extends Seeder
{
    public function run(Organization $organization): void
    {
        $orgId = $organization->id;

        $this->seedBreedTypes($orgId);
        $this->seedBreeds($orgId);
        $this->seedFeedTypes($orgId);
        $this->seedMedicines($orgId);
        $this->seedVaccines($orgId);
        $this->seedDiseases($orgId);
        $this->seedUoms($orgId);
        $this->seedCurrencies();
    }

    private function seedBreedTypes(string $orgId): void
    {
        $types = [
            ['name' => 'Broiler', 'code' => 'BROILER', 'description' => 'Meat-type chickens'],
            ['name' => 'Layer', 'code' => 'LAYER', 'description' => 'Egg-type chickens'],
            ['name' => 'Breeder', 'code' => 'BREEDER', 'description' => 'Parent stock for hatching eggs'],
            ['name' => 'Turkey', 'code' => 'TURKEY', 'description' => 'Turkey birds'],
        ];

        foreach ($types as $type) {
            BreedType::updateOrCreate(
                ['organization_id' => $orgId, 'code' => $type['code']],
                $type
            );
        }
    }

    private function seedBreeds(string $orgId): void
    {
        $broilerType = BreedType::where('organization_id', $orgId)->where('code', 'BROILER')->first();
        $layerType = BreedType::where('organization_id', $orgId)->where('code', 'LAYER')->first();
        $breederType = BreedType::where('organization_id', $orgId)->where('code', 'BREEDER')->first();

        $breeds = [
            ['breed_type_id' => $broilerType?->id, 'name' => 'Cobb 500', 'code' => 'COBB500', 'standard_weight_kg' => 2.200, 'standard_fcr' => 1.45, 'target_days' => 35, 'description' => 'Fast feathering broiler, low FCR'],
            ['breed_type_id' => $broilerType?->id, 'name' => 'Ross 308', 'code' => 'ROSS308', 'standard_weight_kg' => 2.200, 'standard_fcr' => 1.47, 'target_days' => 35, 'description' => 'Balanced broiler performance'],
            ['breed_type_id' => $broilerType?->id, 'name' => 'Ross 708', 'code' => 'ROSS708', 'standard_weight_kg' => 2.100, 'standard_fcr' => 1.50, 'target_days' => 35, 'description' => 'High meat yield broiler'],
            ['breed_type_id' => $layerType?->id, 'name' => 'Hy-Line Brown', 'code' => 'HYLINEBROWN', 'standard_weight_kg' => 2.000, 'standard_fcr' => null, 'target_days' => 490, 'description' => 'Brown egg layer, 490 day cycle'],
            ['breed_type_id' => $layerType?->id, 'name' => 'Lohmann Brown', 'code' => 'LOHMANNB', 'standard_weight_kg' => 2.000, 'standard_fcr' => null, 'target_days' => 490, 'description' => 'Brown egg layer'],
            ['breed_type_id' => $breederType?->id, 'name' => 'Ross 308 Parent Stock', 'code' => 'ROSS308PS', 'standard_weight_kg' => 3.500, 'standard_fcr' => null, 'target_days' => 455, 'description' => 'Broiler breeder parent stock'],
        ];

        foreach ($breeds as $breed) {
            Breed::updateOrCreate(
                ['organization_id' => $orgId, 'code' => $breed['code']],
                $breed
            );
        }
    }

    private function seedFeedTypes(string $orgId): void
    {
        $feeds = [
            ['name' => 'Pre-Starter', 'code' => 'PRESTARTER', 'nutritional_info' => 'Crumble form, days 0-10', 'protein_percent' => 22.0, 'energy_kcal' => 3000, 'recommended_start_day' => 0, 'recommended_end_day' => 10],
            ['name' => 'Starter', 'code' => 'STARTER', 'nutritional_info' => 'Crumble/pellet, days 11-24', 'protein_percent' => 21.0, 'energy_kcal' => 3050, 'recommended_start_day' => 11, 'recommended_end_day' => 24],
            ['name' => 'Grower', 'code' => 'GROWER', 'nutritional_info' => 'Pellet, days 25-35', 'protein_percent' => 19.5, 'energy_kcal' => 3100, 'recommended_start_day' => 25, 'recommended_end_day' => 35],
            ['name' => 'Finisher', 'code' => 'FINISHER', 'nutritional_info' => 'Pellet, days 36-slaughter', 'protein_percent' => 18.0, 'energy_kcal' => 3200, 'recommended_start_day' => 36, 'recommended_end_day' => 49],
        ];

        foreach ($feeds as $feed) {
            FeedType::updateOrCreate(
                ['organization_id' => $orgId, 'code' => $feed['code']],
                $feed
            );
        }
    }

    private function seedMedicines(string $orgId): void
    {
        $medicines = [
            ['name' => 'Amoxicillin', 'active_ingredient' => 'Amoxicillin trihydrate', 'withdrawal_period_days' => 7, 'description' => 'Broad-spectrum antibiotic'],
            ['name' => 'Enrofloxacin', 'active_ingredient' => 'Enrofloxacin', 'withdrawal_period_days' => 10, 'description' => 'Fluoroquinolone antibiotic'],
            ['name' => 'Tylosin', 'active_ingredient' => 'Tylosin tartrate', 'withdrawal_period_days' => 3, 'description' => 'Macrolide antibiotic'],
            ['name' => 'Coccidiostat (Amprolium)', 'active_ingredient' => 'Amprolium', 'withdrawal_period_days' => 5, 'description' => 'Anticoccidial'],
            ['name' => 'Electrolyte + Vitamin', 'active_ingredient' => 'Electrolytes & vitamins', 'withdrawal_period_days' => 0, 'description' => 'Stress recovery supplement'],
        ];

        foreach ($medicines as $medicine) {
            MedicineType::updateOrCreate(
                ['organization_id' => $orgId, 'name' => $medicine['name']],
                $medicine
            );
        }
    }

    private function seedVaccines(string $orgId): void
    {
        $vaccines = [
            ['name' => 'ND+IB (Spray)', 'administration_method' => 'spray', 'schedule_day' => 1, 'description' => 'Newcastle + Infectious Bronchitis, coarse spray day 1'],
            ['name' => 'Marek (MD)', 'administration_method' => 'injection', 'schedule_day' => 1, 'description' => 'Marek disease, subcutaneous day old'],
            ['name' => 'IBD (Gumboro)', 'administration_method' => 'drinking_water', 'schedule_day' => 14, 'description' => 'Infectious Bursal Disease via drinking water'],
            ['name' => 'Lasota', 'administration_method' => 'drinking_water', 'schedule_day' => 21, 'description' => 'Newcastle booster via drinking water'],
        ];

        foreach ($vaccines as $vaccine) {
            VaccineType::updateOrCreate(
                ['organization_id' => $orgId, 'name' => $vaccine['name']],
                $vaccine
            );
        }
    }

    private function seedDiseases(string $orgId): void
    {
        $diseases = [
            ['name' => 'Ascites', 'code' => 'ASCITES', 'symptoms' => 'Abdominal fluid, panting, blue comb', 'severity' => 'high', 'description' => 'Metabolic disorder in fast-growing broilers'],
            ['name' => 'Newcastle Disease', 'code' => 'ND', 'symptoms' => 'Respiratory distress, nervous signs, green diarrhea', 'severity' => 'critical', 'description' => 'Highly contagious viral disease'],
            ['name' => 'IBD (Gumboro)', 'code' => 'IBD', 'symptoms' => 'Depression, diarrhea, dehydration', 'severity' => 'high', 'description' => 'Infectious Bursal Disease'],
            ['name' => 'Coccidiosis', 'code' => 'COCCI', 'symptoms' => 'Bloody diarrhea, pale comb, poor growth', 'severity' => 'medium', 'description' => 'Protozoan intestinal infection'],
            ['name' => 'SDS (Flip-over)', 'code' => 'SDS', 'symptoms' => 'Sudden death, convulsions', 'severity' => 'medium', 'description' => 'Sudden Death Syndrome'],
            ['name' => 'Heat Stress', 'code' => 'HEAT', 'symptoms' => 'Panting, wings spread, high mortality in hot hours', 'severity' => 'high', 'description' => 'Environmental management issue'],
            ['name' => 'Suffocation', 'code' => 'SUFFOC', 'symptoms' => 'Birds piled in corners', 'severity' => 'high', 'description' => 'Management-related mortality'],
            ['name' => 'Culling (Runt/Leg)', 'code' => 'CULL', 'symptoms' => 'Runts, leg deformities', 'severity' => 'low', 'description' => 'Routine culling of weak birds'],
        ];

        foreach ($diseases as $disease) {
            DiseaseType::updateOrCreate(
                ['organization_id' => $orgId, 'code' => $disease['code']],
                $disease
            );
        }
    }

    private function seedUoms(string $orgId): void
    {
        $uoms = [
            ['code' => 'KG', 'name' => 'Kilogram', 'category' => 'weight', 'conversion_factor' => 1],
            ['code' => 'GM', 'name' => 'Gram', 'category' => 'weight', 'conversion_factor' => 0.001],
            ['code' => 'L', 'name' => 'Litre', 'category' => 'volume', 'conversion_factor' => 1],
            ['code' => 'ML', 'name' => 'Millilitre', 'category' => 'volume', 'conversion_factor' => 0.001],
            ['code' => 'BAG', 'name' => 'Bag', 'category' => 'quantity', 'conversion_factor' => 50],
            ['code' => 'BIRD', 'name' => 'Bird', 'category' => 'quantity', 'conversion_factor' => 1],
            ['code' => 'BOX', 'name' => 'Box', 'category' => 'quantity', 'conversion_factor' => 1],
            ['code' => 'EGG', 'name' => 'Egg', 'category' => 'quantity', 'conversion_factor' => 1],
        ];

        foreach ($uoms as $uom) {
            Uom::updateOrCreate(
                ['organization_id' => $orgId, 'code' => $uom['code']],
                $uom
            );
        }
    }

    private function seedCurrencies(): void
    {
        $currencies = [
            ['code' => 'INR', 'name' => 'Indian Rupee', 'symbol' => '₹'],
            ['code' => 'USD', 'name' => 'US Dollar', 'symbol' => '$'],
            ['code' => 'EUR', 'name' => 'Euro', 'symbol' => '€'],
            ['code' => 'GBP', 'name' => 'British Pound', 'symbol' => '£'],
            ['code' => 'BDT', 'name' => 'Bangladeshi Taka', 'symbol' => '৳'],
            ['code' => 'PKR', 'name' => 'Pakistani Rupee', 'symbol' => '₨'],
        ];

        DB::table('currencies')->insertOrIgnore($currencies);
    }
}
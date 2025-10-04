<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Enums\Status;
use App\Models\User;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Mortezaa97\Reviews\Models\Review;

class ReviewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('fa_IR');
        $items = [];

        $admin = User::role('admin')->first();

        $postIds = DB::table('posts')->pluck('id')->toArray();
        $productIds = DB::table('products')->pluck('id')->toArray();

        $negativePointsOptions = [
            'ویژگی‌های ناکافی',
            'خدمات مشتری ضعیف',
            'قیمت بالا',
            'کیفیت پایین',
            'تاخیر در تحویل',
        ];

        $positivePointsOptions = [
            'کیفیت عالی',
            'تحویل سریع',
            'پشتیبانی عالی',
            'قیمت مناسب',
            'طراحی زیبا',
        ];

        for ($i = 0; $i < 5; $i++) {
            $modelType = $faker->randomElement(['App\\Models\\Post', 'Mortezaa97\\Shop\\Models\\Product']);
            if ($modelType === 'App\\Models\\Post') {
                $modelId = ! empty($postIds) ? $faker->randomElement($postIds) : 1;
            } else {
                $modelId = ! empty($productIds) ? $faker->randomElement($productIds) : 1;
            }

            $negativePoints = $faker->randomElements($negativePointsOptions, $faker->numberBetween(1, 3));
            $positivePoints = $faker->randomElements($positivePointsOptions, $faker->numberBetween(1, 3));

            $items[] = [
                'model_type' => $modelType,
                'model_id' => $modelId,
                'desc' => $faker->realText(),
                'rate' => $faker->numberBetween(0, 5),
                'is_featured' => $faker->numberBetween(0, 1),
                'negative_points' => json_encode($negativePoints),
                'positive_points' => json_encode($positivePoints),
                'created_by' => $admin->id,
                'updated_by' => $admin->id,
                'deleted_at' => null,
                'created_at' => now(),
                'updated_at' => now(),
                'status' => $faker->randomElement([Status::APPROVED, Status::PENDING, Status::REJECTED]),
            ];
        }

        Review::insert($items);
    }
}

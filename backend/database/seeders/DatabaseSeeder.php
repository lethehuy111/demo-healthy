<?php

namespace Database\Seeders;

use App\Models\Diet;
use App\Models\DietDishDay;
use App\Models\Dish;
use App\Models\HistoryHealth;
use App\Models\News;
use App\Models\Tag;
use App\Models\TagNew;
use App\Models\User;
use App\Models\UserDiet;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        //Truncate all table
        $users = [
            [
                'name' => 'Lê Huy', 'email' => 'huylt@gmail.com', 'password' => Hash::make('123456'), 'email_verified_at' => now(),
            ],
            [
                'name' => 'Nguyến văn Hoàng', 'email' => 'hoangnv@gmail.com', 'password' => Hash::make('123456'), 'email_verified_at' => now()
            ]
        ];
        User::insert($users);

        $diets = [
            [
                'name' => 'Morning' , 'icon' => 'morning.png' , 'status' => Diet::STATUS_ACTIVE
            ],
            [
                'name' => 'Lunch' , 'icon' => 'lunch.png' , 'status' => Diet::STATUS_ACTIVE
            ],
            [
                'name' => 'Dinner' , 'icon' => 'dinner.png' , 'status' => Diet::STATUS_ACTIVE
            ],
            [
                'name' => 'Snack' , 'icon' => 'snack.png' , 'status' => Diet::STATUS_ACTIVE
            ]
        ];
        Diet::insert($diets);

        $userDiets = [
            [
                "user_id" => 1 , "diet_id" => 1, "status" => UserDiet::STATUS_ACTIVE
            ],
            [
                "user_id" => 1 , "diet_id" => 2, "status" => UserDiet::STATUS_ACTIVE
            ],
            [
                "user_id" => 1 , "diet_id" => 3, "status" => UserDiet::STATUS_ACTIVE
            ],
            [
                "user_id" => 1 , "diet_id" => 4, "status" => UserDiet::STATUS_ACTIVE
            ]
        ];
        UserDiet::insert($userDiets);

        $dishs = [
            ["name" => "Sandwich", "image" => 'sandwich.png', "role" => Dish::ROLE_PARENT, "status" => Dish::STATUS_ACTIVE],
            ["name" => "Bread", "image" => 'bread.png', "role" => Dish::ROLE_PARENT, "status" => Dish::STATUS_ACTIVE],
            ["name" => "Rice with fish", "image" => 'rice_fish.png', "role" => Dish::ROLE_PARENT, "status" => Dish::STATUS_ACTIVE],
            ["name" => "Rice with pork", "image" => 'rice_pork.png', "role" => Dish::ROLE_PARENT, "status" => Dish::STATUS_ACTIVE],
            ["name" => "Noodle", "image" => 'noodle.png', "role" => Dish::ROLE_PARENT, "status" => Dish::STATUS_ACTIVE],
            ["name" => "Snack", "image" => 'snack.png', "role" => Dish::ROLE_PARENT, "status" => Dish::STATUS_ACTIVE]
        ];
        Dish::insert($dishs);

        $dietDishDays = [
            ["date" => now(), "user_diet_id" => 1, "dish_id" => 1, "status" => DietDishDay::STATUS_DONE],
            ["date" => now(), "user_diet_id" => 2, "dish_id" => 2, "status" => DietDishDay::STATUS_DONE],
            ["date" => now(), "user_diet_id" => 3, "dish_id" => 1, "status" => DietDishDay::STATUS_OPEN],
            ["date" => now(), "user_diet_id" => 4, "dish_id" => 3, "status" => DietDishDay::STATUS_OPEN],
            ["date" => '2023-09-19 12:14:10', "user_diet_id" => 1, "dish_id" => 4, "status" => DietDishDay::STATUS_OPEN],
            ["date" => '2023-09-19 12:14:10', "user_diet_id" => 2, "dish_id" => 5, "status" => DietDishDay::STATUS_OPEN],
            ["date" => '2023-09-19 12:14:10', "user_diet_id" => 3, "dish_id" => 6, "status" => DietDishDay::STATUS_OPEN],
            ["date" => '2023-09-19 12:14:10', "user_diet_id" => 4, "dish_id" => 2, "status" => DietDishDay::STATUS_OPEN],
            ["date" => '2023-09-18 12:14:10', "user_diet_id" => 1, "dish_id" => 1, "status" => DietDishDay::STATUS_OPEN],
            ["date" => '2023-09-18 12:14:10', "user_diet_id" => 2, "dish_id" => 2, "status" => DietDishDay::STATUS_OPEN],
            ["date" => '2023-09-18 12:14:10', "user_diet_id" => 3, "dish_id" => 3, "status" => DietDishDay::STATUS_OPEN],
            ["date" => '2023-09-18 12:14:10', "user_diet_id" => 4, "dish_id" => 4, "status" => DietDishDay::STATUS_OPEN],
        ];
        DietDishDay::insert($dietDishDays);

        $historyHealths = [
            ["user_id" => 1 , "number" => 100 , "type" => HistoryHealth::TYPE_WEIGHT, "date" =>  '2023-09-15 12:14:10'],
            ["user_id" => 1 , "number" => 90 , "type" => HistoryHealth::TYPE_WEIGHT, "date" =>  '2023-08-15 12:14:10'],
            ["user_id" => 1 , "number" => 85 , "type" => HistoryHealth::TYPE_WEIGHT, "date" =>  '2023-07-15 12:14:10'],
            ["user_id" => 1 , "number" => 87 , "type" => HistoryHealth::TYPE_WEIGHT, "date" =>  '2023-06-15 12:14:10'],
            ["user_id" => 1 , "number" => 84 , "type" => HistoryHealth::TYPE_WEIGHT, "date" =>  '2023-05-15 12:14:10'],
            ["user_id" => 1 , "number" => 78 , "type" => HistoryHealth::TYPE_WEIGHT, "date" =>  '2023-04-15 12:14:10'],
            ["user_id" => 1 , "number" => 75 , "type" => HistoryHealth::TYPE_WEIGHT, "date" =>  '2023-03-15 12:14:10'],
            ["user_id" => 1 , "number" => 70 , "type" => HistoryHealth::TYPE_WEIGHT, "date" =>  '2023-02-15 12:14:10'],
            ["user_id" => 1 , "number" => 77 , "type" => HistoryHealth::TYPE_WEIGHT, "date" =>  '2023-01-15 12:14:10'],

            ["user_id" => 1 , "number" => 60 , "type" => HistoryHealth::TYPE_BODY_FAT_PERCENT, "date" =>  '2023-09-15 12:14:10'],
            ["user_id" => 1 , "number" => 55 , "type" => HistoryHealth::TYPE_BODY_FAT_PERCENT, "date" =>  '2023-08-15 12:14:10'],
            ["user_id" => 1 , "number" => 53 , "type" => HistoryHealth::TYPE_BODY_FAT_PERCENT, "date" =>  '2023-07-15 12:14:10'],
            ["user_id" => 1 , "number" => 48 , "type" => HistoryHealth::TYPE_BODY_FAT_PERCENT, "date" =>  '2023-06-15 12:14:10'],
            ["user_id" => 1 , "number" => 45 , "type" => HistoryHealth::TYPE_BODY_FAT_PERCENT, "date" =>  '2023-05-15 12:14:10'],
            ["user_id" => 1 , "number" => 38 , "type" => HistoryHealth::TYPE_BODY_FAT_PERCENT, "date" =>  '2023-04-15 12:14:10'],
            ["user_id" => 1 , "number" => 30 , "type" => HistoryHealth::TYPE_BODY_FAT_PERCENT, "date" =>  '2023-03-15 12:14:10'],
            ["user_id" => 1 , "number" => 20 , "type" => HistoryHealth::TYPE_BODY_FAT_PERCENT, "date" =>  '2023-02-15 12:14:10'],
            ["user_id" => 1 , "number" => 15 , "type" => HistoryHealth::TYPE_BODY_FAT_PERCENT, "date" =>  '2023-01-15 12:14:10'],

        ];
        HistoryHealth::insert($historyHealths);

        $tags = [
          ['name' => '#魚料理'] ,['name' => '#DHA']
        ];
        Tag::insert($tags);

        $news  = [
            ["title" => '魚を食べて頭もカラダも元気に！知っておきたい魚を食べるメリ 食べるメリ', "image" => 'fish.png', "slug" => 'slug-01', "contents" => 'contents', "status" => News::STATUS_ACTIVE, 'updated_at' => now()],
            ["title" => '魚を食べて頭もカラダも元気に！知っておきたい魚を食べるメリ 食べるメリ', "image" => 'sleep.png', "slug" => 'slug-02', "contents" => 'contents', "status" => News::STATUS_ACTIVE, 'updated_at' => now()],
            ["title" => '魚を食べて頭もカラダも元気に！知っておきたい魚を食べるメリ 食べるメリ', "image" => 'drink.png', "slug" => 'slug-04', "contents" => 'contents', "status" => News::STATUS_ACTIVE, 'updated_at' => now()],
            ["title" => '魚を食べて頭もカラダも元気に！知っておきたい魚を食べるメリ 食べるメリ', "image" => 'fish.png', "slug" => 'slug-05', "contents" => 'contents', "status" => News::STATUS_ACTIVE, 'updated_at' => now()],
            ["title" => '魚を食べて頭もカラダも元気に！知っておきたい魚を食べるメリ 食べるメリ', "image" => 'fruit.png', "slug" => 'slug-06', "contents" => 'contents', "status" => News::STATUS_ACTIVE, 'updated_at' => now()],
            ["title" => '魚を食べて頭もカラダも元気に！知っておきたい魚を食べるメリ 食べるメリ', "image" => 'drink.png', "slug" => 'slug-07', "contents" => 'contents', "status" => News::STATUS_ACTIVE, 'updated_at' => now()],
            ["title" => '魚を食べて頭もカラダも元気に！知っておきたい魚を食べるメリ 食べるメリ', "image" => 'fruit.png', "slug" => 'slug-08', "contents" => 'contents', "status" => News::STATUS_ACTIVE, 'updated_at' => now()],
            ["title" => '魚を食べて頭もカラダも元気に！知っておきたい魚を食べるメリ 食べるメリ', "image" => 'sleep.png', "slug" => 'slug-09', "contents" => 'contents', "status" => News::STATUS_ACTIVE, 'updated_at' => now()],
            ["title" => '魚を食べて頭もカラダも元気に！知っておきたい魚を食べるメリ 食べるメリ', "image" => 'fruit.png', "slug" => 'slug-10', "contents" => 'contents', "status" => News::STATUS_ACTIVE, 'updated_at' => now()],
            ["title" => '魚を食べて頭もカラダも元気に！知っておきたい魚を食べるメリ 食べるメリ', "image" => 'sleep.png', "slug" => 'slug-11', "contents" => 'contents', "status" => News::STATUS_ACTIVE, 'updated_at' => now()],
            ["title" => '魚を食べて頭もカラダも元気に！知っておきたい魚を食べるメリ 食べるメリ', "image" => 'fish.png', "slug" => 'slug-12', "contents" => 'contents', "status" => News::STATUS_ACTIVE, 'updated_at' => now()],
            ["title" => '魚を食べて頭もカラダも元気に！知っておきたい魚を食べるメリ 食べるメリ', "image" => 'drink.png', "slug" => 'slug-13', "contents" => 'contents', "status" => News::STATUS_ACTIVE, 'updated_at' => now()],
            ["title" => '魚を食べて頭もカラダも元気に！知っておきたい魚を食べるメリ 食べるメリ', "image" => 'fish.png', "slug" => 'slug-14', "contents" => 'contents', "status" => News::STATUS_ACTIVE, 'updated_at' => now()],
            ["title" => '魚を食べて頭もカラダも元気に！知っておきたい魚を食べるメリ 食べるメリ', "image" => 'sleep.png', "slug" => 'slug-15', "contents" => 'contents', "status" => News::STATUS_ACTIVE, 'updated_at' => now()]
        ];
        News::insert($news);
        $tagNews = [
            ["tag_id" => 1 , "new_id" => 1],
            ["tag_id" => 1 , "new_id" => 2],
            ["tag_id" => 1 , "new_id" => 3],
            ["tag_id" => 1 , "new_id" => 4],
            ["tag_id" => 1 , "new_id" => 5],
            ["tag_id" => 1 , "new_id" => 6],
            ["tag_id" => 1 , "new_id" => 7],
            ["tag_id" => 1 , "new_id" => 8],
            ["tag_id" => 1 , "new_id" => 9],
            ["tag_id" => 1 , "new_id" => 10],
            ["tag_id" => 1 , "new_id" => 11],
            ["tag_id" => 1 , "new_id" => 12],
            ["tag_id" => 1 , "new_id" => 13],
            ["tag_id" => 1 , "new_id" => 14],

            ["tag_id" => 2 , "new_id" => 1],
            ["tag_id" => 2 , "new_id" => 2],
            ["tag_id" => 2 , "new_id" => 3],
            ["tag_id" => 2 , "new_id" => 4],
            ["tag_id" => 2 , "new_id" => 5],
            ["tag_id" => 2 , "new_id" => 6],
            ["tag_id" => 2 , "new_id" => 7],
            ["tag_id" => 2 , "new_id" => 8],
            ["tag_id" => 2 , "new_id" => 9],
            ["tag_id" => 2 , "new_id" => 10],
            ["tag_id" => 2 , "new_id" => 11],
            ["tag_id" => 2, "new_id" => 12],
            ["tag_id" => 2 , "new_id" => 13],
            ["tag_id" => 2 , "new_id" => 14],
        ];
        TagNew::insert($tagNews);
        Schema::enableForeignKeyConstraints();
    }
}

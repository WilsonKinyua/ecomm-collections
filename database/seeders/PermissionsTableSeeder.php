<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 2,
                'title' => 'permission_create',
            ],
            [
                'id'    => 3,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 4,
                'title' => 'permission_show',
            ],
            [
                'id'    => 5,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 6,
                'title' => 'permission_access',
            ],
            [
                'id'    => 7,
                'title' => 'role_create',
            ],
            [
                'id'    => 8,
                'title' => 'role_edit',
            ],
            [
                'id'    => 9,
                'title' => 'role_show',
            ],
            [
                'id'    => 10,
                'title' => 'role_delete',
            ],
            [
                'id'    => 11,
                'title' => 'role_access',
            ],
            [
                'id'    => 12,
                'title' => 'user_create',
            ],
            [
                'id'    => 13,
                'title' => 'user_edit',
            ],
            [
                'id'    => 14,
                'title' => 'user_show',
            ],
            [
                'id'    => 15,
                'title' => 'user_delete',
            ],
            [
                'id'    => 16,
                'title' => 'user_access',
            ],
            [
                'id'    => 17,
                'title' => 'product_management_access',
            ],
            [
                'id'    => 18,
                'title' => 'product_main_category_create',
            ],
            [
                'id'    => 19,
                'title' => 'product_main_category_edit',
            ],
            [
                'id'    => 20,
                'title' => 'product_main_category_show',
            ],
            [
                'id'    => 21,
                'title' => 'product_main_category_delete',
            ],
            [
                'id'    => 22,
                'title' => 'product_main_category_access',
            ],
            [
                'id'    => 23,
                'title' => 'product_sub_category_create',
            ],
            [
                'id'    => 24,
                'title' => 'product_sub_category_edit',
            ],
            [
                'id'    => 25,
                'title' => 'product_sub_category_show',
            ],
            [
                'id'    => 26,
                'title' => 'product_sub_category_delete',
            ],
            [
                'id'    => 27,
                'title' => 'product_sub_category_access',
            ],
            [
                'id'    => 28,
                'title' => 'product_create',
            ],
            [
                'id'    => 29,
                'title' => 'product_edit',
            ],
            [
                'id'    => 30,
                'title' => 'product_show',
            ],
            [
                'id'    => 31,
                'title' => 'product_delete',
            ],
            [
                'id'    => 32,
                'title' => 'product_access',
            ],
            [
                'id'    => 33,
                'title' => 'review_show',
            ],
            [
                'id'    => 34,
                'title' => 'review_delete',
            ],
            [
                'id'    => 35,
                'title' => 'review_access',
            ],
            [
                'id'    => 36,
                'title' => 'order_show',
            ],
            [
                'id'    => 37,
                'title' => 'order_delete',
            ],
            [
                'id'    => 38,
                'title' => 'order_access',
            ],
            [
                'id'    => 39,
                'title' => 'slide_create',
            ],
            [
                'id'    => 40,
                'title' => 'slide_edit',
            ],
            [
                'id'    => 41,
                'title' => 'slide_show',
            ],
            [
                'id'    => 42,
                'title' => 'slide_delete',
            ],
            [
                'id'    => 43,
                'title' => 'slide_access',
            ],
            [
                'id'    => 44,
                'title' => 'sub_slide_ad_one_create',
            ],
            [
                'id'    => 45,
                'title' => 'sub_slide_ad_one_edit',
            ],
            [
                'id'    => 46,
                'title' => 'sub_slide_ad_one_show',
            ],
            [
                'id'    => 47,
                'title' => 'sub_slide_ad_one_delete',
            ],
            [
                'id'    => 48,
                'title' => 'sub_slide_ad_one_access',
            ],
            [
                'id'    => 49,
                'title' => 'sub_slide_ad_two_create',
            ],
            [
                'id'    => 50,
                'title' => 'sub_slide_ad_two_edit',
            ],
            [
                'id'    => 51,
                'title' => 'sub_slide_ad_two_show',
            ],
            [
                'id'    => 52,
                'title' => 'sub_slide_ad_two_delete',
            ],
            [
                'id'    => 53,
                'title' => 'sub_slide_ad_two_access',
            ],
            [
                'id'    => 54,
                'title' => 'site_setting_create',
            ],
            [
                'id'    => 55,
                'title' => 'site_setting_edit',
            ],
            [
                'id'    => 56,
                'title' => 'site_setting_show',
            ],
            [
                'id'    => 57,
                'title' => 'site_setting_delete',
            ],
            [
                'id'    => 58,
                'title' => 'site_setting_access',
            ],
            [
                'id'    => 59,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}

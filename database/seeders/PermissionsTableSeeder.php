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
                'title' => 'product_category_create',
            ],
            [
                'id'    => 19,
                'title' => 'product_category_edit',
            ],
            [
                'id'    => 20,
                'title' => 'product_category_show',
            ],
            [
                'id'    => 21,
                'title' => 'product_category_delete',
            ],
            [
                'id'    => 22,
                'title' => 'product_category_access',
            ],
            [
                'id'    => 23,
                'title' => 'product_tag_create',
            ],
            [
                'id'    => 24,
                'title' => 'product_tag_edit',
            ],
            [
                'id'    => 25,
                'title' => 'product_tag_show',
            ],
            [
                'id'    => 26,
                'title' => 'product_tag_delete',
            ],
            [
                'id'    => 27,
                'title' => 'product_tag_access',
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
                'title' => 'order_access',
            ],
            [
                'id'    => 34,
                'title' => 'task_management_access',
            ],
            [
                'id'    => 35,
                'title' => 'task_status_create',
            ],
            [
                'id'    => 36,
                'title' => 'task_status_edit',
            ],
            [
                'id'    => 37,
                'title' => 'task_status_show',
            ],
            [
                'id'    => 38,
                'title' => 'task_status_delete',
            ],
            [
                'id'    => 39,
                'title' => 'task_status_access',
            ],
            [
                'id'    => 40,
                'title' => 'task_tag_create',
            ],
            [
                'id'    => 41,
                'title' => 'task_tag_edit',
            ],
            [
                'id'    => 42,
                'title' => 'task_tag_show',
            ],
            [
                'id'    => 43,
                'title' => 'task_tag_delete',
            ],
            [
                'id'    => 44,
                'title' => 'task_tag_access',
            ],
            [
                'id'    => 45,
                'title' => 'task_create',
            ],
            [
                'id'    => 46,
                'title' => 'task_edit',
            ],
            [
                'id'    => 47,
                'title' => 'task_show',
            ],
            [
                'id'    => 48,
                'title' => 'task_delete',
            ],
            [
                'id'    => 49,
                'title' => 'task_access',
            ],
            [
                'id'    => 50,
                'title' => 'tasks_calendar_access',
            ],
            [
                'id'    => 51,
                'title' => 'expense_management_access',
            ],
            [
                'id'    => 52,
                'title' => 'expense_category_create',
            ],
            [
                'id'    => 53,
                'title' => 'expense_category_edit',
            ],
            [
                'id'    => 54,
                'title' => 'expense_category_show',
            ],
            [
                'id'    => 55,
                'title' => 'expense_category_delete',
            ],
            [
                'id'    => 56,
                'title' => 'expense_category_access',
            ],
            [
                'id'    => 57,
                'title' => 'income_category_create',
            ],
            [
                'id'    => 58,
                'title' => 'income_category_edit',
            ],
            [
                'id'    => 59,
                'title' => 'income_category_show',
            ],
            [
                'id'    => 60,
                'title' => 'income_category_delete',
            ],
            [
                'id'    => 61,
                'title' => 'income_category_access',
            ],
            [
                'id'    => 62,
                'title' => 'expense_create',
            ],
            [
                'id'    => 63,
                'title' => 'expense_edit',
            ],
            [
                'id'    => 64,
                'title' => 'expense_show',
            ],
            [
                'id'    => 65,
                'title' => 'expense_delete',
            ],
            [
                'id'    => 66,
                'title' => 'expense_access',
            ],
            [
                'id'    => 67,
                'title' => 'income_create',
            ],
            [
                'id'    => 68,
                'title' => 'income_edit',
            ],
            [
                'id'    => 69,
                'title' => 'income_show',
            ],
            [
                'id'    => 70,
                'title' => 'income_delete',
            ],
            [
                'id'    => 71,
                'title' => 'income_access',
            ],
            [
                'id'    => 72,
                'title' => 'expense_report_create',
            ],
            [
                'id'    => 73,
                'title' => 'expense_report_edit',
            ],
            [
                'id'    => 74,
                'title' => 'expense_report_show',
            ],
            [
                'id'    => 75,
                'title' => 'expense_report_delete',
            ],
            [
                'id'    => 76,
                'title' => 'expense_report_access',
            ],
            [
                'id'    => 77,
                'title' => 'slider_create',
            ],
            [
                'id'    => 78,
                'title' => 'slider_edit',
            ],
            [
                'id'    => 79,
                'title' => 'slider_show',
            ],
            [
                'id'    => 80,
                'title' => 'slider_delete',
            ],
            [
                'id'    => 81,
                'title' => 'slider_access',
            ],
            [
                'id'    => 82,
                'title' => 'contact_access',
            ],
            [
                'id'    => 83,
                'title' => 'blog_access',
            ],
            [
                'id'    => 84,
                'title' => 'blog_page_create',
            ],
            [
                'id'    => 85,
                'title' => 'blog_page_edit',
            ],
            [
                'id'    => 86,
                'title' => 'blog_page_show',
            ],
            [
                'id'    => 87,
                'title' => 'blog_page_delete',
            ],
            [
                'id'    => 88,
                'title' => 'blog_page_access',
            ],
            [
                'id'    => 89,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}

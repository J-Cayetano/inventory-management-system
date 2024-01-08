<?php

return [
    'userManagement' => [
        'title'          => 'User management',
        'title_singular' => 'User management',
    ],
    'permission' => [
        'title'          => 'Permissions',
        'title_singular' => 'Permission',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'title'             => 'Title',
            'title_helper'      => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'role' => [
        'title'          => 'User Roles',
        'title_singular' => 'User Role',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => ' ',
            'title'              => 'Title',
            'title_helper'       => ' ',
            'permissions'        => 'Permissions',
            'permissions_helper' => ' ',
            'created_at'         => 'Created at',
            'created_at_helper'  => ' ',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => ' ',
        ],
    ],
    'userAccessManagement' => [
        'title'          => 'User & Access Management',
        'title_singular' => 'User & Access Management',
    ],
    'user' => [
        'title'          => 'User Accounts',
        'title_singular' => 'User Account',
        'fields'         => [
            'id'                           => 'ID',
            'id_helper'                    => ' ',
            'name'                         => 'Name',
            'name_helper'                  => ' ',
            'email'                        => 'Email',
            'email_helper'                 => ' ',
            'email_verified_at'            => 'Email verified at',
            'email_verified_at_helper'     => ' ',
            'password'                     => 'Password',
            'password_helper'              => ' ',
            'roles'                        => 'Roles',
            'roles_helper'                 => ' ',
            'last_seen'                    => 'Last seen',
            'last_seen_helper'             => ' ',
            'remember_token'               => 'Remember Token',
            'remember_token_helper'        => ' ',
            'created_at'                   => 'Created at',
            'created_at_helper'            => ' ',
            'updated_at'                   => 'Updated at',
            'updated_at_helper'            => ' ',
            'deleted_at'                   => 'Deleted at',
            'deleted_at_helper'            => ' ',
            'two_factor'                   => 'Two-Factor Auth',
            'two_factor_helper'            => ' ',
            'two_factor_code'              => 'Two-factor code',
            'two_factor_code_helper'       => ' ',
            'two_factor_expires_at'        => 'Two-factor expires at',
            'two_factor_expires_at_helper' => ' ',
        ],
    ],
    'auditLog' => [
        'title'          => 'Audit Logs',
        'title_singular' => 'Audit Log',
        'fields'         => [
            'id'                  => 'ID',
            'id_helper'           => ' ',
            'description'         => 'Description',
            'description_helper'  => ' ',
            'subject_id'          => 'Subject ID',
            'subject_id_helper'   => ' ',
            'subject_type'        => 'Subject Type',
            'subject_type_helper' => ' ',
            'user_id'             => 'User ID',
            'user_id_helper'      => ' ',
            'properties'          => 'Properties',
            'properties_helper'   => ' ',
            'host'                => 'Host',
            'host_helper'         => ' ',
            'created_at'          => 'Created at',
            'created_at_helper'   => ' ',
            'updated_at'          => 'Updated at',
            'updated_at_helper'   => ' ',
        ],
    ],
    'categories' => [
        'title'          => 'Categories',
        'title_singular' => 'Category',
        'fields'         => [
            'id'                           => 'ID',
            'id_helper'                    => ' ',
            'code'                         => 'Code',
            'code_helper'                  => 'Codes are all uppercase letters, and it should be an abbreviated form or key word of the title.',
            'title'                         => 'Title',
            'title_helper'                  => 'Titles starts with a capitalized word and is unique. Ensure that no other entries have the same title.',
            'created_at'                   => 'Created at',
            'created_at_helper'            => ' ',
            'updated_at'                   => 'Updated at',
            'updated_at_helper'            => ' ',
            'deleted_at'                   => 'Deleted at',
            'deleted_at_helper'            => ' ',
        ],
    ],
    'units' => [
        'title'          => 'Units',
        'title_singular' => 'Unit',
        'fields'         => [
            'id'                           => 'ID',
            'id_helper'                    => ' ',
            'code'                         => 'Code',
            'code_helper'                  => 'Codes are all uppercase letters, and it should be an abbreviated form or key word of the title.',
            'title'                         => 'Title',
            'title_helper'                  => 'Titles starts with a capitalized word and is unique. Ensure that no other entries have the same title.',
            'created_at'                   => 'Created at',
            'created_at_helper'            => ' ',
            'updated_at'                   => 'Updated at',
            'updated_at_helper'            => ' ',
            'deleted_at'                   => 'Deleted at',
            'deleted_at_helper'            => ' ',
        ],
    ],
    'items' => [
        'title'          => 'Suppliers',
        'title_singular' => 'Supplier',
        'fields'         => [
            'id'                           => 'ID',
            'id_helper'                    => ' ',
            'name'                         => 'Name',
            'name_helper'                  => 'Item name should be its official name.',
            'code'                         => 'Code',
            'code_helper'                  => 'Codes are all uppercase letters, and it should be an abbreviated form or key word of the name.',
            'photo'                         => 'Photo',
            'photo_helper'                  => 'Photo should only be in JPEG, JPG, or PNG format.',
            'category_id'                      => 'Category',
            'category_id_helper'               => 'Select a Category.',
            'supplier_id'                        => 'Supplier',
            'supplier_id_helper'                 => 'Select a Supplier.',
            'unit_id'                      => 'Unit',
            'unit_id_helper'               => 'Select a Unit.',
            'cost_price'                      => 'Cost Price',
            'cost_price_helper'               => 'Enter the amount of the Cost Price.',
            'selling_price'                      => 'Selling Price',
            'selling_price_helper'               => 'Enter the amount of the Selling Price.',
            'created_at'                   => 'Created at',
            'created_at_helper'            => ' ',
            'updated_at'                   => 'Updated at',
            'updated_at_helper'            => ' ',
            'deleted_at'                   => 'Deleted at',
            'deleted_at_helper'            => ' ',
        ],
    ],
    'suppliers' => [
        'title'          => 'Items',
        'title_singular' => 'Item',
        'fields'         => [
            'id'                           => 'ID',
            'id_helper'                    => ' ',
            'name'                         => 'Name',
            'name_helper'                  => 'Supplier name should be its registered business name.',
            'city'                         => 'City',
            'city_helper'                  => 'City should be where the business is located.',
            'address'                      => 'Address',
            'address_helper'               => 'Enter the complete address of the business.',
            'email'                        => 'Email',
            'email_helper'                 => 'Email must be valid and active.',
            'contact'                      => 'Contact No.',
            'contact_helper'               => 'Contact No. must be valid and active.',
            'created_at'                   => 'Created at',
            'created_at_helper'            => ' ',
            'updated_at'                   => 'Updated at',
            'updated_at_helper'            => ' ',
            'deleted_at'                   => 'Deleted at',
            'deleted_at_helper'            => ' ',
        ],
    ],
    '' => [
        'title'          => '',
        'title_singular' => '',
        'fields'         => [
            ''            => '',
            '_helper'     => '',
        ],
    ],
];

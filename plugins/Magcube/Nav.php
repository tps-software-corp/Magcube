<?php

namespace Plugin\Magcube;

use Eccube\Common\EccubeNav;

class Nav implements EccubeNav
{
    /**
     * @return array
     */
    public static function getNav()
    {
        return [
            'magcube' => [
                'name' => 'magcube.menu_title',
                'icon' => 'fa-cog',
                'children' => [
                    'product_list' => [
                        'name' => 'magcube.menu_product_list',
                        'url' => 'magcube_admin_index',
                    ],
                    'config' => [
                        'name' => 'magcube.menu.config',
                        'url' => 'magcube_admin_config',
                    ]
                ]
            ]
        ];
    }
}

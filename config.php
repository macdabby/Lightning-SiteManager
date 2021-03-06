<?php

// Initialize site configs
$config = \lightningsdk\sitemanager\Model\Site::getInstance()->getConfig()->data();

return array_merge_recursive($config, [
    'jobs' => [
        'auto-mailer' => [
            // Override the auto mailer
            'class' => \lightningsdk\sitemanager\Jobs\AutoMailer::class,
        ],
    ],
    'routes' => [
        'static' => [
            'contact' => lightningsdk\sitemanager\Pages\Contact::class,
            'contact-tech' => lightningsdk\sitemanager\Pages\ContactTech::class,

            'admin/css' => lightningsdk\sitemanager\Pages\Admin\CSS::class,
            'admin/sites/emails' => lightningsdk\sitemanager\Pages\Emails::class,
            'admin/sites/subdomains' => lightningsdk\sitemanager\Pages\Subdomains::class,
            'admin/sites/redirects' => lightningsdk\sitemanager\Pages\Redirects::class,
            'admin/sites/groups' => lightningsdk\sitemanager\Pages\Admin\Permissions\Groups::class,
            'admin/sites/groups/users' => lightningsdk\sitemanager\Pages\Admin\Permissions\GroupUsers::class,
            'affiliate/mysales' => lightningsdk\sitemanager\Pages\Checkout\AffiliateSales::class,
            'admin/affiliates' => lightningsdk\sitemanager\Pages\Checkout\Admin\Affiliates::class,

            'admin/contact' => lightningsdk\sitemanager\Pages\Admin\Contact::class,
            'admin/mailing/lists' => lightningsdk\sitemanager\Pages\Admin\Mailing\Lists::class,
            'admin/mailing/messages' => lightningsdk\sitemanager\Pages\Admin\Mailing\Messages::class,
            'admin/mailing/stats' => lightningsdk\sitemanager\Pages\Admin\Mailing\Stats::class,
            'admin/mailing/templates' => lightningsdk\sitemanager\Pages\Admin\Mailing\Templates::class,
            'admin/pages' => lightningsdk\sitemanager\Pages\Admin\Pages::class,
            'admin/widgets' => lightningsdk\sitemanager\Pages\Admin\Widgets::class,
            'admin/users' => lightningsdk\sitemanager\Pages\Admin\Users::class,

            'admin/config' => lightningsdk\sitemanager\Pages\Admin\Config\Main::class,
            'admin/getconfig' => lightningsdk\sitemanager\Pages\Admin\Config\GetConfig::class,
            'admin/setup' => lightningsdk\sitemanager\Pages\Setup::class,
            'admin/sites' => lightningsdk\sitemanager\Pages\Admin\Sites::class,

            // admin only
            'api/sitemanager/config' => lightningsdk\sitemanager\API\Configurations::class,
        ],
        'cli_only' => [
            'site-domains' => lightningsdk\sitemanager\Commands\Domains::class,
            'site-nginx' => lightningsdk\sitemanager\Commands\Nginx::class,
            'site-certificates' => lightningsdk\sitemanager\Commands\Certificates::class,
        ]
    ],
    'classes' => [
        lightningsdk\core\Model\Mailing\Lists::class => lightningsdk\sitemanager\Model\Mailing\Lists::class,
        lightningsdk\core\Model\Mailing\Message::class => lightningsdk\sitemanager\Model\Mailing\Message::class,
        lightningsdk\core\Model\CMS::class => lightningsdk\sitemanager\Model\CMS::class,
        lightningsdk\core\Model\Widget::class => lightningsdk\sitemanager\Model\Widget::class,
        lightningsdk\core\Model\Page::class => lightningsdk\sitemanager\Model\Page::class,
        lightningsdk\core\Model\User::class => lightningsdk\sitemanager\Model\User::class,
        lightningsdk\core\Model\Permissions::class => lightningsdk\sitemanager\Model\Permissions::class,
        lightningsdk\core\View\Page::class => lightningsdk\sitemanager\View\Page::class,
    ],
    'modules' => [
        'sitemanager' => [
            'cert-path' => '/etc/letsencrypt/live/',
            'nginx-config-file' => '/etc/nginx/sites-available/lightning-sitemanager',
            'dns' => [
                'ipv4' => '127.0.0.1',
                'ipv6' => '0000:0000',
                'dmarc' => [
                    'postmaster' => 'postmaster@localhost',
                ],
                'bind9' => [
                    'compiled-directory' => '/etc/bind/compiled',
                    'generic-domain-config' => '/etc/bind/compiled.default.zone.wildcard',
                    'compiled-zones-master-file' => '/etc/bind/named.conf.compiled-zones.test',
                ],
            ]
        ],
    ],
    'menus' => [
        'admin' => [
            'Sites' => [
                'children' => [
                    'Domains' => '/admin/sites'
                ],
            ],
        ],
    ],
    'compiler' => [
        'js' => [
            'lightningsdk/sitemanager' => [
                'js/config.js' => 'admin.min.js',
            ],
        ],
    ],
]);

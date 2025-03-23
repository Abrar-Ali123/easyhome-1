<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingsSeeder extends Seeder
{
    public function run()
    {
        $settings = [
            [
                'setting_key' => 'site_name',
                'value' => 'ايزي هوم للتسويق العقاري',
                'group' => 'general'
            ],
            [
                'setting_key' => 'site_description',
                'value' => 'نقدم لك خدمات التسويق العقاري بكل احترافية ومصداقية',
                'group' => 'general'
            ],
            [
                'setting_key' => 'contact_email',
                'value' => 'info@easyhome.sa',
                'group' => 'contact'
            ],
            [
                'setting_key' => 'contact_phone',
                'value' => '920033002',
                'group' => 'contact'
            ],
            [
                'setting_key' => 'contact_address',
                'value' => 'الرياض - طريق الملك فهد - برج الفيصلية',
                'group' => 'contact'
            ],
            [
                'setting_key' => 'facebook_url',
                'value' => 'https://www.facebook.com/easyhome.sa',
                'group' => 'social'
            ],
            [
                'setting_key' => 'twitter_url',
                'value' => 'https://twitter.com/easyhome_sa',
                'group' => 'social'
            ],
            [
                'setting_key' => 'instagram_url',
                'value' => 'https://www.instagram.com/easyhome.sa',
                'group' => 'social'
            ],
            [
                'setting_key' => 'snapchat_url',
                'value' => 'https://www.snapchat.com/add/easyhome.sa',
                'group' => 'social'
            ],
            [
                'setting_key' => 'working_hours',
                'value' => 'الأحد - الخميس: 9:00 صباحاً - 6:00 مساءً',
                'group' => 'contact'
            ],
            [
                'setting_key' => 'footer_text',
                'value' => 'جميع الحقوق محفوظة © 2025 ايزي هوم للتسويق العقاري',
                'group' => 'general'
            ],
            [
                'setting_key' => 'whatsapp_number',
                'value' => '920033002',
                'group' => 'contact'
            ]
        ];

        foreach ($settings as $setting) {
            Setting::create($setting);
        }
    }
}

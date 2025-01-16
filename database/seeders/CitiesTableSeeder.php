<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cities = [
            'تمام استان ها','تهران', 'مشهد', 'شیراز', 'اصفهان', 'تبریز', 'کرج', 'قم', 'اهواز', 'رشت', 'کاشان', 
            'یزد', 'کرمان', 'ارومیه', 'سنندج', 'زاهدان', 'بندرعباس', 'بوشهر', 'خرم‌آباد', 'ساری', 
            'اردبیل', 'مشگین‌شهر', 'محمودآباد', 'بابل', 'ایلام', 'چابهار', 'بیرجند', 'شیروان', 
            'سمنان', 'کیش', 'نیشابور', 'خوی', 'بندر انزلی', 'قزوین', 'مراغه', 'لار', 'مریوان', 
            'گنبد کاووس', 'آمل', 'یاسوج', 'شاهرود', 'هریس', 'زاگرس', 'لرستان', 'کاشان', 'آران و بیدگل',
            'خوزستان', 'تهران', 'اردبیل', 'سیدآباد', 'خواف'
        ];

        $cities = [
            ['name' => 'تمام استان ها', 'image' => 'all_province.svg'],
            ['name' => 'اذربایجان شرقی', 'image' => 'province_1.svg'],
            ['name' => ' آذربایجان غربی', 'image' => 'province_2.svg'],
            ['name' => ' اردبیل', 'image' => 'province_3.svg'],
            ['name' => ' اصفهان', 'image' => 'province_4.svg'],
            ['name' => 'البرز ', 'image' => 'province_5.svg'],
            ['name' => 'ایلام ', 'image' => 'all_province.svg'],
            ['name' => 'بوشهر ', 'image' => 'province_7.svg'],
            ['name' => 'تهران ', 'image' => 'province_8.svg'],
            ['name' => 'چهارمحال بختياری ', 'image' => 'province_9.svg'],
            ['name' => ' خراسان جنوبی ', 'image' => 'province_10.svg'],
            ['name' => 'خراسان رضوی ', 'image' => 'province_11.svg'],
            ['name' => 'خراسان شمالی ', 'image' => 'province_12.svg'],
            ['name' => ' خوزستان ', 'image' => 'province_13.svg'],
            ['name' => ' زنجان ', 'image' => 'province_14.svg'],
            ['name' => 'سمنان  ', 'image' => 'all_province.svg'],
            ['name' => ' سیستان و بلوچستان ', 'image' => 'province_16.svg'],
            ['name' => ' فارس ', 'image' => 'province_17.svg'],
            ['name' => ' قزوین ', 'image' => 'province_18.svg'],
            ['name' => ' قم ', 'image' => 'province_19.svg'],
            ['name' => ' کردستان ', 'image' => 'province_20.svg'],
            ['name' => ' کرمان ', 'image' => 'province_21.svg'],
            ['name' => ' کرمانشاه ', 'image' => 'province_22.svg'],
            ['name' => ' كهكيلويه و بويراحمد ', 'image' => 'province_23.svg'],
            ['name' => ' گلستان ', 'image' => 'province_24.svg'],
            ['name' => ' گیلان ', 'image' => 'province_25.svg'],
            ['name' => ' لرستان ', 'image' => 'province_26.svg'],
            ['name' => ' مازندران ', 'image' => 'province_27.svg'],
            ['name' => ' مرکزی ', 'image' => 'province_28.svg'],
            ['name' => ' هرمرگان ', 'image' => 'province_29.svg'],
            ['name' => ' همدان ', 'image' => 'province_30.svg'],
            ['name' => ' یزذ ', 'image' => 'province_31.svg'],


        ];
        foreach ($cities as $city) {
            City::create([
                'name' => $city['name'],
                'image' => 'img/cities/' . $city['image'], 
            ]);
    }
}
}

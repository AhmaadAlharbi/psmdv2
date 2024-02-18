<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UpdateArabicNamesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->update([
            'arabic_name' => DB::raw("
                CASE 
                    WHEN id = '1' THEN 'أحمد الحربي'
                    WHEN id = '5' THEN 'قسم الوقاية'
                    WHEN id = '6' THEN 'محمد عبدالله الشهاب'
                    WHEN id = '7' THEN 'يوسف مرزوق العتيبي'
                    WHEN id = '12' THEN 'عيسى عبدالوهاب المطر'
                    WHEN id = '13' THEN 'محمد مبارك محمد المطيري'
                    WHEN id = '14' THEN 'فهد أحمد راشد شتيل'
                    WHEN id = '19' THEN 'عبدالله جمال العجمي'
                    WHEN id = '20' THEN 'علي حيدر البلوشي'
                    WHEN id = '21' THEN 'مشاري محمد عبدالرحيم'
                    WHEN id = '22' THEN 'أحمد محمود باقر'
                    WHEN id = '23' THEN 'أحمد عبدالرحيم يوسف'
                    WHEN id = '24' THEN 'عيد مثيب العتيبي'
                    WHEN id = '25' THEN 'حسين خالد دهراب'
                    WHEN id = '26' THEN 'محمد أحمد غلوم'
                    WHEN id = '27' THEN 'عبدالله عصام الشطي'
                    WHEN id = '28' THEN 'عبدالله محمد سالم الجويسري'
                    WHEN id = '29' THEN 'فواز سهيل أسود'
                    WHEN id = '30' THEN 'محمد  هاشم الموسوي'
                    WHEN id = '31' THEN 'محمد يوسف دشتي'
                    WHEN id = '32' THEN 'ناصر شافي العجمي'
                    WHEN id = '33' THEN 'أحمد بدر المعيوف'
                    WHEN id = '34' THEN 'سالم راضي العنزي'
                    WHEN id = '35' THEN 'ناصر عبدالله العوضي'
                    WHEN id = '36' THEN 'يوسف حبيب الحمد'
                    WHEN id = '37' THEN 'خالد علي غزاي المطيري'
                    WHEN id = '38' THEN 'حسين خليل عباس باقر'
                    WHEN id = '39' THEN 'يوسف عبدالكريم عبدالسيد'
                    WHEN id = '40' THEN 'أحمد عواد صالح العازمي'
                    WHEN id = '41' THEN 'عبدالله محمد المزدي'
                    WHEN id = '42' THEN 'يوسف عبدالله راشد'
                    WHEN id = '43' THEN 'إبراهيم علي احمد الخباز'
                    WHEN id = '44' THEN 'علي صالح القطان'
                    WHEN id = '45' THEN 'خالد علي عبدالله الحمادي'
                    WHEN id = '46' THEN 'علي محمد عبدالله الصحاف'
                    WHEN id = '47' THEN 'رسام تقي محمد الحربي'
                    WHEN id = '48' THEN 'عثمان سعد اللوغاني'
                    WHEN id = '49' THEN 'إبراهيم وليد المفرج'
                    WHEN id = '50' THEN 'بدر فيصل حمدان العتيبي'
                    WHEN id = '51' THEN 'صالح عبدالمحسن البدر'
                    WHEN id = '52' THEN 'يوسف مجيد يوسف غلوم'
                    WHEN id = '53' THEN 'عبدالله سليمان الحداد'
                    WHEN id = '54' THEN 'عبدالرحمن عبدالله الكندري'
                    WHEN id = '55' THEN 'عبدالعزيز هشام بن يوسف'
                    WHEN id = '56' THEN 'عبدالله عصام محمد الفيلكاوي'
                    WHEN id = '57' THEN 'أحمد إبراهيم خالد القبندي'
                    WHEN id = '58' THEN 'علي حمود المطيري'
                    WHEN id = '59' THEN 'علي جمال إبراهيم المحمد علي'
                    WHEN id = '60' THEN 'علي جاسم البغلي'
                    WHEN id = '61' THEN 'علي خليل اشكناني'
                    WHEN id = '62' THEN 'علي مهدي بوعليان'
                    WHEN id = '63' THEN 'علي ماجد سعد الفضلي'
                    WHEN id = '64' THEN 'بدر عبدالله صالح الجويسري'
                    WHEN id = '65' THEN 'عامر حسن محمد الأنصاري'
                    WHEN id = '66' THEN 'ضاري يوسف محمد الضاحي'
                    WHEN id = '67' THEN 'إبراهيم أحمد إسماعيل'
                    WHEN id = '68' THEN 'فهد أنور الكوت'
                    WHEN id = '69' THEN 'فهد مثيب محمد العتيبي'
                    WHEN id = '70' THEN 'فهد صقر الرشيدي'
                    WHEN id = '71' THEN 'فيصل متلع العتيبي'
                    WHEN id = '72' THEN 'إبراهيم منصور حسين القلاف'
                    WHEN id = '73' THEN 'جاسم سالم جاسم الكندري'
                    WHEN id = '74' THEN 'خالد مجبل العازمي'
                    WHEN id = '75' THEN 'خليل مهدي القلاف'
                    WHEN id = '76' THEN ''
                    WHEN id = '77' THEN 'مهدي فهد عبدالله بوشهري'
                    WHEN id = '78' THEN 'محمد عوض العنزي'
                    WHEN id = '79' THEN 'ناصر سالم ساكت العنزي'
                    WHEN id = '81' THEN 'عبدالله حسن الحميدي'
                    WHEN id = '82' THEN 'خليل سيد إبراهيم القلاف'
                    WHEN id = '83' THEN 'ابرار عماش منيع'
                    WHEN id = '84' THEN 'ايلاف راجي المطيري'
                    WHEN id = '85' THEN 'سارة فيصل جمعة'
                    WHEN id = '86' THEN 'مشاعل إبراهيم الكتيتي'
                    WHEN id = '87' THEN 'ريم طلال العنزي'
                    WHEN id = '88' THEN 'شدن وليد السنعوسي'
                    ELSE 'arabic_name'
                END
            ")
        ]);
    }
}

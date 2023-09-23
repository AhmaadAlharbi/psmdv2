<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $names = array(
            0 =>
            array(
                0 => 'Abdllah Suleiman Haddad',
                1 => '285031800643',
                2 => 'analhaddad@mew.gov.kw',
                3 => '2',
                4 => '0',
            ),
            1 =>
            array(
                0 => 'Abdul Rahman A A Al Kandari',
                1 => '293061000911',
                2 => 'aadalkanderi@mew.gov.kw',
                3 => '2',
                4 => '0',
            ),
            2 =>
            array(
                0 => 'Abdullah Esam Yaqoub Al Shatti',
                1 => '295110700244',
                2 => 'aeyalshatti@mew.gov.kw',
                3 => '2',
                4 => '0',
            ),
            3 =>
            array(
                0 => 'Abdullah Hassan Al-Huamidi',
                1 => '286011300224',
                2 => 'aaalhumaidi@mew.gov.kw',
                3 => '2',
                4 => '0',
            ),
            4 =>
            array(
                0 => 'ABDULLAH M S AL JAWISSRI',
                1 => '294031200351',
                2 => 'amaljuwaisri@mew.gov.kw',
                3 => '2',
                4 => '0',
            ),
            5 =>
            array(
                0 => 'Abdullah Mahammad Almazdi',
                1 => '290081100086',
                2 => 'amalmzdi@mew.gov.kw',
                3 => '2',
                4 => '0',
            ),
            6 =>
            array(
                0 => 'Ahmad AbdulRahim Yousef',
                1 => '287032500676',
                2 => 'auyousef@mew.gov.kw',
                3 => '2',
                4 => '0',
            ),
            7 =>
            array(
                0 => 'Ahmad Ibrahim Khaled Alqabandi',
                1 => '295110800149',
                2 => 'ahmadalaqabandi@mew.gov.kw',
                3 => '2',
                4 => '0',
            ),
            8 =>
            array(
                0 => 'Ahmad Mahmoud Baqer',
                1 => '291072300494',
                2 => 'ambaqer@mew.gov.kw',
                3 => '2',
                4 => '0',
            ),
            9 =>
            array(
                0 => 'Ahmad Mutheeb mohammad AlOtaibi',
                1 => '281072101445',
                2 => 'atalotaibi@mew.gov.kw',
                3 => '2',
                4 => '0',
            ),
            10 =>
            array(
                0 => 'Ahmed Awad Al Azmi',
                1 => '284100101009',
                2 => 'aawsalazmi@mew.gov.kw',
                3 => '2',
                4 => '0',
            ),
            11 =>
            array(
                0 => 'Ahmed Bader Ali Al Maayouf',
                1 => '297080100609',
                2 => 'ahmadMaayouf@mew.gov.kw',
                3 => '2',
                4 => '0',
            ),
            12 =>
            array(
                0 => 'Ali Hamoud Al-Mutairi',
                1 => '276061301111',
                2 => 'ahoalmutairi@mew.gov.kw',
                3 => '2',
                4 => '0',
            ),
            13 =>
            array(
                0 => 'Ali Hussain Mohammad Ali Haidar',
                1 => '293042000342',
                2 => 'ahsali@mew.gov.kw',
                3 => '2',
                4 => '0',
            ),
            14 =>
            array(
                0 => 'Ali Ismail AL-Feli',
                1 => '285042700218',
                2 => 'aialfaili@mew.gov.kw',
                3 => '2',
                4 => '0',
            ),
            15 =>
            array(
                0 => 'Ali Jassim Al-Baghli',
                1 => '287082200559',
                2 => 'ajalbaghli@mew.gov.kw',
                3 => '2',
                4 => '0',
            ),
            16 =>
            array(
                0 => 'Ali Mahdi Boualiyan',
                1 => '292031900156',
                2 => 'amboolyan@mew.gov.kw',
                3 => '2',
                4 => '0',
            ),
            17 =>
            array(
                0 => 'Ali Mohammad Abdullah Al Sahhaf',
                1 => '295061201034',
                2 => 'alialsahhaf@mew.gov.kw',
                3 => '2',
                4 => '0',
            ),
            18 =>
            array(
                0 => 'Ali Saleh Alqattan',
                1 => '291010100358',
                2 => 'asaalqatan@mew.gov.kw',
                3 => '2',
                4 => '0',
            ),
            19 =>
            array(
                0 => 'Amer H M Alansari',
                1 => '298102300121',
                2 => 'amhmalansari@mew.gov.kw',
                3 => '2',
                4 => '0',
            ),
            20 =>
            array(
                0 => 'Ammar Khalid Al-Ammary',
                1 => '285100500012',
                2 => 'akalamari@mew.gov.kw',
                3 => '2',
                4 => '0',
            ),
            21 =>
            array(
                0 => 'BADER ABDEL SALAM KHEDER MILAD',
                1 => '285010600167',
                2 => 'bameelad@mew.gov.kw',
                3 => '2',
                4 => '0',
            ),
            22 =>
            array(
                0 => 'Eid  MUTHEEB MOHAMMAD AL OTAIBI',
                1 => '295072800323',
                2 => 'eid@mew.gov.kw',
                3 => '2',
                4 => '0',
            ),
            23 =>
            array(
                0 => 'Essa Abdul Wahab Mater',
                1 => '279031600931',
                2 => 'eaalmatar@mew.gov.kw',
                3 => '2',
                4 => '0',
            ),
            24 =>
            array(
                0 => 'FAHAd A J ALKOUT',
                1 => '292051600222',
                2 => 'fmalkhout@mew.gov.kw',
                3 => '2',
                4 => '0',
            ),
            25 =>
            array(
                0 => 'FAHAD MUTHEEB MOHAMMAD AL OTAIBI',
                1 => '292060300432',
                2 => 'fmalotaybi@mew.gov.kw',
                3 => '2',
                4 => '0',
            ),
            26 =>
            array(
                0 => 'Fahad S A Al Rashidi',
                1 => '290111700315',
                2 => 'fgalrheshedi@mew.gov.kw',
                3 => '2',
                4 => '0',
            ),
            27 =>
            array(
                0 => 'Fahd A R Shateel',
                1 => '294100600528',
                2 => 'fashatil@mew.gov.kw',
                3 => '2',
                4 => '0',
            ),
            28 =>
            array(
                0 => 'FAISAL METLEA AZZAB AL OTAIBI',
                1 => '292112500525',
                2 => 'fmazalotaibi@mew.gov.kw',
                3 => '2',
                4 => '0',
            ),
            29 =>
            array(
                0 => 'FAWAZ SUHAIL ASWAD',
                1 => '295012400213',
                2 => 'fuaswad@mew.gov.kw',
                3 => '2',
                4 => '0',
            ),
            30 =>
            array(
                0 => 'Hamad Salah Abdullah Abdulmalek',
                1 => '296092700228',
                2 => 'hamadabdulmaleck@mew.gov.kw',
                3 => '2',
                4 => '0',
            ),
            31 =>
            array(
                0 => 'Hussain Khaled Ahmad Dehrab',
                1 => '292071900513',
                2 => 'hamaddehrab@mew.gov.kw',
                3 => '2',
                4 => '0',
            ),
            32 =>
            array(
                0 => 'Ibrahem M H Alqallaf',
                1 => '295083000196',
                2 => 'imhalqalaf@mew.gov.kw',
                3 => '2',
                4 => '0',
            ),
            33 =>
            array(
                0 => 'Ibrahim Khalil Alrabiah',
                1 => '283081900184',
                2 => 'ikalrabiah@mew.gov.kw',
                3 => '2',
                4 => '0',
            ),
            34 =>
            array(
                0 => 'Ibrahim Waleed Ibrahim Almufarrej',
                1 => '291122600568',
                2 => 'iwalmufarrej@mew.gov.kw',
                3 => '2',
                4 => '0',
            ),
            35 =>
            array(
                0 => 'JASSIM SALEM JASSIM HADDAD AL KANDARI',
                1 => '280080800268',
                2 => 'jsalkandari@mew.gov.kw',
                3 => '2',
                4 => '0',
            ),
            36 =>
            array(
                0 => 'KHALED MEJBEL AL AZMI',
                1 => '294112100379',
                2 => 'kmjalazmi@mew.gov.kw',
                3 => '2',
                4 => '0',
            ),
            37 =>
            array(
                0 => 'Khaled Mohammad Abbas Alkandari',
                1 => '296080200832',
                2 => 'khaled@mew.gov.kw',
                3 => '2',
                4 => '0',
            ),
            38 =>
            array(
                0 => 'Khaleel M KH Al Qallaf',
                1 => '297010700908',
                2 => 'kmkalqallaf@mew.gov.kw',
                3 => '2',
                4 => '0',
            ),
            39 =>
            array(
                0 => 'KHALIL SAYED E KH ALQALLAF',
                1 => '293102500446',
                2 => 'ksealqallafufhhj@mew.gov.kw',
                3 => '2',
                4 => '0',
            ),
            40 =>
            array(
                0 => 'Mahdi F A Bushehri',
                1 => '297071900567',
                2 => 'mahdi1@mew.gov.kw',
                3 => '2',
                4 => '0',
            ),
            41 =>
            array(
                0 => 'Meshari Mohammad Ali ASAD Abdulraheem',
                1 => '297090201294',
                2 => 'mmaabdulraheem@mew.gov.kw',
                3 => '2',
                4 => '0',
            ),
            42 =>
            array(
                0 => 'Mishal Al-Saeed',
                1 => '280030600292',
                2 => 'mishal@mew.gov.kw',
                3 => '2',
                4 => '0',
            ),
            43 =>
            array(
                0 => 'Mishari Khaled Al-Tawari',
                1 => '279080400063',
                2 => 'mkaltuwari@mew.gov.kw',
                3 => '2',
                4 => '0',
            ),
            44 =>
            array(
                0 => 'Moh.Behbehani',
                1 => '291012900201',
                2 => 'mubehbehani@mew.gov.kw',
                3 => '2',
                4 => '0',
            ),
            45 =>
            array(
                0 => 'Mohamed Awad Anzi',
                1 => '286031700997',
                2 => 'mwalenizi@mew.gov.kw',
                3 => '2',
                4 => '0',
            ),
            46 =>
            array(
                0 => 'Mohammad Ahmad Ghuloum Mohammad',
                1 => '291011300087',
                2 => 'mahamohammad@mew.gov.kw',
                3 => '2',
                4 => '0',
            ),
            47 =>
            array(
                0 => 'MOHAMMAD HASHEM MOUSA AL MOUSAWI',
                1 => '291011900656',
                2 => 'MHMALMOUSAWII@mew.gov.kw',
                3 => '2',
                4 => '0',
            ),
            48 =>
            array(
                0 => 'Mohammad Mubarak Mohammad Al Mutairi',
                1 => '293121601103',
                2 => 'mommalmutairi@mew.gov.kw',
                3 => '2',
                4 => '0',
            ),
            49 =>
            array(
                0 => 'Mohammad Yousef Ali Abdullah Ali Dashti',
                1 => '292082701093',
                2 => 'mydashti@mew.gov.kw',
                3 => '2',
                4 => '0',
            ),
            50 =>
            array(
                0 => 'Mohammed Abdullah Shihab',
                1 => '273101300348',
                2 => 'mbshehab@mew.gov.kw',
                3 => '2',
                4 => '0',
            ),
            51 =>
            array(
                0 => 'Naser Salem Saket Alenezi',
                1 => '278010201144',
                2 => 'naser@mew.gov.kw',
                3 => '2',
                4 => '0',
            ),
            52 =>
            array(
                0 => 'Nasser Shafi Mohammed Al-Ajmi',
                1 => '287122600929',
                2 => 'nsoalajmi@mew.gov.kw',
                3 => '2',
                4 => '0',
            ),
            53 =>
            array(
                0 => 'OTHMAN SAAD AL LOGHANI',
                1 => '291112200253',
                2 => 'osalloughani@mew.gov.kw',
                3 => '2',
                4 => '0',
            ),
            54 =>
            array(
                0 => 'Rassam Taqi Mohammad Al Harbi',
                1 => '294041700544',
                2 => 'Rassam@mew.gov.kw',
                3 => '2',
                4 => '0',
            ),
            55 =>
            array(
                0 => 'Saleh Abdullmuhsin Al-Bader',
                1 => '284101500212',
                2 => 'sbalbader@mew.gov.kw',
                3 => '2',
                4 => '0',
            ),
            56 =>
            array(
                0 => 'Salem R Al Enzi',
                1 => '287091401328',
                2 => 'sraalenizi@mew.gov.kw',
                3 => '2',
                4 => '0',
            ),
            57 =>
            array(
                0 => 'SAUD FAYEZ HASAN ALKANDARI',
                1 => '295042000675',
                2 => 'sfalkanderi@mew.gov.kw',
                3 => '2',
                4 => '0',
            ),
            58 =>
            array(
                0 => 'Yousef A S Rashed',
                1 => '294013000268',
                2 => 'yarashed@mew.gov.kw',
                3 => '2',
                4 => '0',
            ),
            59 =>
            array(
                0 => 'Yousef Abdulkareem abd al sayed',
                1 => '289041700193',
                2 => 'yaabdalsayed@mew.gov.kw',
                3 => '2',
                4 => '0',
            ),
            60 =>
            array(
                0 => 'Yousef Habeb alhamad',
                1 => '291111000153',
                2 => 'yaalhamad@mew.gov.kw',
                3 => '2',
                4 => '0',
            ),
            61 =>
            array(
                0 => 'Yousef Marzouk Al Otaibi',
                1 => '281092401322',
                2 => 'yralotaibi@mew.gov.kw',
                3 => '2',
                4 => '0',
            ),
            62 =>
            array(
                0 => 'Elaf Raji Al-Mutairi',
                1 => '296012400154',
                2 => 'elaf@mew.gov.kw',
                3 => '2',
                4 => '0',
            ),
            63 =>
            array(
                0 => 'Lulwah Waleed Alibrahim',
                1 => '295011700599',
                2 => 'lwaalibrahim@mew.gov.kw',
                3 => '2',
                4 => '0',
            ),
            64 =>
            array(
                0 => 'REEM TALAL JEAIDAN AL ENEZI',
                1 => '294041701133',
                2 => 'rtjalenizi@mew.gov.kw',
                3 => '2',
                4 => '0',
            ),
            65 =>
            array(
                0 => 'SHADAN WALEED ABDULLAH AL SANOUSI',
                1 => '294070300187',
                2 => 'swaalsanoosi@mew.gov.kw',
                3 => '2',
                4 => '0',
            ),
            66 =>
            array(
                0 => 'Zahraa N F Rustom',
                1 => '293082200349',
                2 => 'znrestom@mew.gov.kw',
                3 => '2',
                4 => '0',
            ),
            67 =>
            array(
                0 => 'Ahmad Alharbi',
                1 => '12345678',
                2 => 'azaalharbi@mew.gov.kw',
                3 => '2',
                4 => '2',
            ),
        );

        for ($i = 0; $i < count($names); $i++) {
            DB::table('users')->insert([
                'name' => $names[$i][0],
                'email' => $names[$i][2],
                'department_id' => $names[$i][3],
                'password' => Hash::make($names[$i][1]),
                'role_id' => 4
            ]);
        }
    }
}

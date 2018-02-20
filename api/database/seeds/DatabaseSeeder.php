<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('currencies')->insert([
            [
              'label' => "USD",
              'sale_rate' => "33.51",
              'purchase_rate' => "32.12",
              'img_path' => 'https://lipis.github.io/flag-icon-css/flags/4x3/us.svg'
            ],
            [
              'label' => "EUR",
              'sale_rate' => "39.82",
              'purchase_rate' => "38.74",
              'img_path' => 'https://lipis.github.io/flag-icon-css/flags/4x3/eu.svg'
            ],
            [
              'label' => "GBP",
              'sale_rate' => "45.31",
              'purchase_rate' => "43.14",
              'img_path' => 'https://lipis.github.io/flag-icon-css/flags/4x3/gb.svg'
            ],
            [
              'label' => "JPY",
              'sale_rate' => "0.2970",
              'purchase_rate' => "0.2960",
              'img_path' => 'https://lipis.github.io/flag-icon-css/flags/4x3/jp.svg'
            ],
            [
              'label' => "HKD",
              'sale_rate' => "4.34",
              'purchase_rate' => "4.16",
              'img_path' => 'https://lipis.github.io/flag-icon-css/flags/4x3/hk.svg'
            ],
            [
              'label' => "CAD",
              'sale_rate' => "26.75",
              'purchase_rate' => "26.55",
              'img_path' => 'https://lipis.github.io/flag-icon-css/flags/4x3/ca.svg'
            ],
            [
              'label' => "AUD",
              'sale_rate' => "26.47",
              'purchase_rate' => "25.25",
              'img_path' => 'https://lipis.github.io/flag-icon-css/flags/4x3/au.svg'
            ],
            [
              'label' => "CNY",
              'sale_rate' => "5.21",
              'purchase_rate' => "4.70",
              'img_path' => 'https://lipis.github.io/flag-icon-css/flags/4x3/cn.svg'
            ],
            [
              'label' => "KRW",
              'sale_rate' => "0.0295",
              'purchase_rate' => "0.0293",
              'img_path' => 'https://lipis.github.io/flag-icon-css/flags/4x3/kr.svg'
            ],
            [
              'label' => "SCOT",
              'sale_rate' => "43.70",
              'purchase_rate' => "43.00",
              'img_path' => 'https://lipis.github.io/flag-icon-css/flags/4x3/gb-sct.svg'
            ]
        ]);

        DB::table('purposes')->insert([
          [ 
            'id' => 318012,
            'th' => 'ค่าใช้จ่ายเดินทางของนักท่องเที่ยว',
            'en' => 'Traveling Expense for Tourist'
          ],
          [
            'id' => 318013,
            'th' => 'ค่าใช้จ่ายเดินทาง/ค่าเล่าเรียนของนักเรียน',
            'en' => 'Traveling/Education Expense for Student'
          ],
          [
            'id' => 318016,
            'th' => 'เงินเหลือที่ผู้ดเดินทางคนไทยมาขายคืน/ชาวต่างประเทศมาซื้อคืน',
            'en' => 'Excess currency resold by Thai national/repurchased by foreigners'
          ],
          [
            'id' => 318133,
            'th' => 'ค่าขนส่งสินค้า',
            'en' => 'Freight for Goods'
          ],
          [
            'id' => 318036,
            'th' => 'ค่าบริการอื่นๆ(โปรดระบุ)',
            'en' => 'Other Services(Please specify)'
          ],
          [
            'id' => 318040,
            'th' => 'รายได้ส่งกลับของแรงงาน เงินเดือน ค่าจ้าง',
            'en' => 'Income/Salary/Wage from Workers'
          ],
          [
            'id' => 3180521,
            'th' => 'เงินบริจาค',
            'en' => 'Donation'
          ],
          [
            'id' => 3180522,
            'th' => 'เงินให้เปล่าจากหรือให้แก่รัฐบาลต่างประเทศ/เงินเลี้ยงดูครอบครัว',
            'en' => 'Grant from or to Foreign Government/Family Support Fund'
          ]
        ]);

        DB::table('branches')->insert([
          [
            'id' => '0001',
            'name' => 'สาขาสำนักเพลินจิต (อาคารต้นสน)',
            'address' => 'เลขที่ 900 ถนนเพลินจิต แขวงลุมพินี เขตปทุมวัน จังหวัดกรุงเทพมหานคร 10330',
            'tel' => '02-2082170, 02-2082111',
            'workingTime' => 'จันทร์ - ศุกร์ 8.30-16.30'
          ],
          [
            'id' => '0106',
            'name' => 'สาขายูเนี่ยนมอลล์ ลาดพร้าว ',
            'address' => 'ชั้น 2 เลขที่ 54 ถนนลาดพร้าว แขวงจอมพล เขตจตุจักร จังหวัดกรุงเทพมหานคร 10900',
            'tel' => '02-5113149, 02-5111698',
            'workingTime' => 'จันทร์ - อาทิตย์ 11.00-19.00 *ไม่เว้นวันหยุดธนาคาร'
          ],
          [
            'id' => '0204',
            'name' => 'สาขาสุขุมวิท 23',
            'address' => 'เลขที่ 2 ซอยสุขุมวิท 23 (ประสานมิตร) ถนนสุขุมวิท แขวงคลองเตยเหนือ เขตวัฒนา จังหวัดกรุงเทพมหานคร 10110',
            'tel' => '02-2611914-7',
            'workingTime' => 'จันทร์ - ศุกร์ 8.30-16.30'
          ],
          [
            'id' => '0004',
            'name' => 'สาขาประตูน้ำ',
            'address' => 'เลขที่ 640/2 ถนนเพชรบุรี แขวงถนนเพชรบุรี เขตราชเทวี จังหวัดกรุงเทพมหานคร 10400',
            'tel' => '02-2513277, 02-2538963, 02-2515388',
            'workingTime' => 'จันทร์ - ศุกร์ 8.30-17.00'
          ],
          [
            'id' => '1111',
            'name' => 'สยามพารากอน (ชั้น 1)',
            'address' => 'เลขที่ 640/2 ถนนเพชรบุรี แขวงถนนเพชรบุรี เขตราชเทวี จังหวัดกรุงเทพมหานคร 10400',
            'tel' => '02-2513277, 02-2538963, 02-2515388',
            'workingTime' => 'จันทร์ - ศุกร์ 8.30-17.00'
          ],
          [
            'id' => '4501',
            'name' => 'สาขาย่อยท่าอากาศยานสุวรรณภูมิ (เขตปลอดอากร)',
            'address' => 'หมู่ 1 เขตปลอดอากร บางนา-ตราด 999 กม 15 ตำบลราชาเทวะ อำเภอบางพลี จังหวัดสมุทรปราการ 10540',
            'tel' => ' 02-1342467',
            'workingTime' => 'ทุกวัน 8.30-17.00'
          ]
        ]);

        DB::table('order_status')->insert([
          [
            'en' => 'Awaiting Payment',
            'th' => 'รอโอนเงิน'],
          [
            'en' => 'Paid',
            'th' => 'โอนเงินเรียบร้อย'],
          [
            'en' => 'Processing',
            'th' => 'จัดเตรียมธนบัตร'],
          [
            'en' => 'Ready to ship',
            'th' => 'รอส่งมอบ'],
          [
            'en' => 'Completed',
            'th' => 'ส่งมอบเรียบร้อย'],
          [
            'en' => 'Canceled',
            'th' => 'ยกเลิก'],
          [
            'en' => 'Refunded',
            'th' => 'คืนเงิน'],
          [
            'en' => 'No recipient',
            'th' => 'ไม่มารับตามกำหนด'],
        ]);
    }
}

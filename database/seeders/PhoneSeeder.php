<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PhoneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $phones = [
            [
                'model' => 'A2643',
                'name' => 'Apple iPhone 13 Pro Max',
                'stock' => 50,
                'brand_id' => 1,
                'image' => 'image',
                'description' => '<pre>Display : 6.7 inches,Super Retina XDR OLED, 120Hz, HDR10, Dolby Vision, 1000 nits (HBM), 1200 nits (peak).<br>Cpu : Apple A15 Bionic (5 nm).<br>Ram : 6GB.<br>Storage : 256GB.<br>Main Camera : 12 MP (wide), 12 MP (telephoto), 12 MP (ultrawide).<br>Selfie Camera : 12 MP (wide).<br>Bluetooth : 5.0, A2DP, LE.<br>Wlan : 802.11 a/b/g/n/ac/6, dual-band, hotspot.<br>Battery : Li-Ion 4352 mAh, Fast charging 27W.<br></pre>',
                'unit_price' => 1099,
                'user_id' => 1,
            ],
            [
                'model' => 'A2638',
                'name' => 'Apple iPhone 13 Pro',
                'stock' => 50,
                'brand_id' => 1,
                'image' => 'image',
                'description' => '<pre>Display : 6.1 inches, Super Retina XDR OLED, 120Hz, HDR10, Dolby Vision, 1000 nits (HBM), 1200 nits (peak).<br>Cpu : Apple A15 Bionic (5 nm).<br>Ram : 6GB.<br>Storage : 256GB.<br>Main Camera : 12 MP (wide), 12 MP (telephoto), 12 MP (ultrawide).<br>Selfie Camera : 12 MP (wide).<br>Bluetooth : 5.0, A2DP, LE.<br>Wlan : 802.11 a/b/g/n/ac/6, dual-band, hotspot.<br>Battery : Li-Ion 3095 mAh, Fast charging 23W.<br></pre>',
                'unit_price' => 999,
                'user_id' => 1,
            ],
            [
                'model' => 'SM-S908B',
                'name' => 'Samsung Galaxy S22 Ultra 5G',
                'stock' => 50,
                'brand_id' => 2,
                'image' => 'image',
                'description' => '<pre>Display : 6.8 inches, Dynamic AMOLED 2X, 120Hz, HDR10+, 1750 nits (peak).<br>Cpu : Qualcomm SM8450 Snapdragon 8 Gen 1 (4 nm).<br>Ram : 8GB.<br>Storage : 256GB.<br>Main Camera : 108 MP (wide), 10 MP (telephoto), 10 MP (periscope telephoto), 12 MP (ultrawide).<br>Selfie Camera : 40 MP (wide).<br>Bluetooth : 5.2, A2DP, LE.<br>Wlan : 802.11 a/b/g/n/ac/6e, dual-band, Wi-Fi Direct, hotspot.<br>Battery : Li-Ion 5000 mAh, Fast charging 45W.<br></pre>',
                'unit_price' => 799,
                'user_id' => 1,
            ],
            [
                'model' => 'SM-F926B',
                'name' => 'Samsung Galaxy Z Fold3 5G',
                'stock' => 50,
                'brand_id' => 2,
                'image' => 'image',
                'description' => '<pre>Display : 7.6 inches, Foldable Dynamic AMOLED 2X, 120Hz, HDR10+, 1200 nits (peak).<br>Cpu : Qualcomm SM8350 Snapdragon 888 5G (5 nm).<br>Ram : 12GB.<br>Storage : 256GB.<br>Main Camera : 12 MP (wide), 12 MP (telephoto), 12 MP (ultrawide).<br>Selfie Camera : 10 MP (wide).<br>Bluetooth : 5.2, A2DP, LE, aptX HD.<br>Wlan : 802.11 a/b/g/n/ac/6e, dual-band, Wi-Fi Direct, hotspot.<br>Battery : Li-Po 4400 mAh, Fast charging 25W.<br></pre>',
                'unit_price' => 1399,
                'user_id' => 1,
            ],
            [
                'model' => 'KSR-A0',
                'name' => 'Xiaomi Black Shark 5 Pro',
                'stock' => 50,
                'brand_id' => 3,
                'image' => 'image',
                'description' => '<pre>Display : 6.67 inches, OLED, 1B colors, 144Hz, HDR10+.<br>Cpu : Qualcomm SM8450 Snapdragon 8 Gen 1 (4 nm).<br>Ram : 8GB.<br>Storage : 256GB.<br>Main Camera : 108 MP (wide), 5 MP (telephoto macro), 13 MP (ultrawide).<br>Selfie Camera : 16 MP (wide).<br>Bluetooth : 5.2, A2DP, LE, aptX HD, aptX Adaptive.<br>Wlan : 802.11 a/b/g/n/ac/6, dual-band, Wi-Fi Direct, hotspot.<br>Battery : Li-Po 4650 mAh, Fast charging 120W.<br></pre>',
                'unit_price' => 599,
                'user_id' => 1,
            ],
            [
                'model' => '21091116C',
                'name' => 'Xiaomi 12 Pro',
                'stock' => 50,
                'brand_id' => 3,
                'image' => 'image',
                'description' => '<pre>Display : 6.73 inches, LTPO AMOLED, 1B colors, 120Hz, Dolby Vision, HDR10+, 1000 nits (HBM), 1500 nits (peak).<br>Cpu : Qualcomm SM8450 Snapdragon 8 Gen 1 (4 nm).<br>Ram : 8GB.<br>Storage : 256GB.<br>Main Camera : 50 MP (wide), 50 MP (telephoto), 50 MP (ultrawide).<br>Selfie Camera : 32 MP (wide).<br>Bluetooth : 5.2, A2DP, LE.<br>Wlan : 802.11 a/b/g/n/ac/6, dual-band, Wi-Fi Direct, hotspot.<br>Battery : Li-Po 4600 mAh, Fast charging 120W.<br></pre>',
                'unit_price' => 899,
                'user_id' => 1,
            ],
            [
                'model' => 'Asus ROG Phone 5s Pro',
                'name' => 'Asus ROG Phone 5s Pro',
                'stock' => 50,
                'brand_id' => 4,
                'image' => 'image',
                'description' => '<pre>Display : 6.78 inches, AMOLED, 1B colors, 144Hz, HDR10+, 800 nits (typ), 1200 nits (peak).<br>Cpu : Qualcomm SM8350 Snapdragon 888+ 5G (5 nm).<br>Ram : 18GB.<br>Storage : 512GB.<br>Main Camera : 64 MP (wide), 5 MP (macro), 13 MP (ultrawide).<br>Selfie Camera : 24 MP (wide).<br>Bluetooth : 5.2, A2DP, LE, aptX HD, aptX Adaptive.<br>Wlan : 802.11 a/b/g/n/ac/6e, dual-band, Wi-Fi Direct, hotspot.<br>Battery : Li-Po 6000 mAh, Fast charging 65W.<br></pre>',
                'unit_price' => 1999,
                'user_id' => 1,
            ],
            [
                'model' => 'Asus Zenfone 8',
                'name' => 'Asus Zenfone 8',
                'stock' => 50,
                'brand_id' => 4,
                'image' => 'image',
                'description' => '<pre>Display : 5.9 inches, Super AMOLED, 120Hz, HDR10+, 700 nits (HBM), 1100 nits (peak).<br>Cpu : Qualcomm SM8350 Snapdragon 888 5G (5 nm).<br>Ram : 8GB.<br>Storage : 256GB.<br>Main Camera : 64 MP (wide), 14 MP (ultrawide).<br>Selfie Camera : 12 MP (wide).<br>Bluetooth : 5.2, A2DP, LE, aptX HD, aptX Adaptive.<br>Wlan : 802.11 a/b/g/n/ac/6e, dual-band, Wi-Fi Direct, hotspot.<br>Battery : Li-Po 4000 mAh, Fast charging 30W.<br></pre>',
                'unit_price' => 599,
                'user_id' => 1,
            ],
            [
                'model' => 'OnePlus 10 Pro',
                'name' => 'OnePlus 10 Pro',
                'stock' => 50,
                'brand_id' => 5,
                'image' => 'image',
                'description' => '<pre>Display : 6.7 inches, LTPO2 Fluid AMOLED, 1B colors, 120Hz, HDR10+, 500 nits (typ), 800 nits (HBM), 1300 nits (peak).<br>Cpu : Qualcomm SM8450 Snapdragon 8 Gen 1 (4 nm).<br>Ram : 8GB.<br>Storage : 256GB.<br>Main Camera : 48 MP (wide), 8 MP (telephoto), 50 MP (ultrawide).<br>Selfie Camera : 32 MP (wide).<br>Bluetooth : 5.2, A2DP, LE, aptX HD.<br>Wlan : 802.11 a/b/g/n/ac/6, dual-band, Wi-Fi Direct, hotspot.<br>Battery : Li-Po 5000 mAh, Fast charging 80W.<br></pre>',
                'unit_price' => 699,
                'user_id' => 1,
            ],
            [
                'model' => 'Sony Xperia 1 IV',
                'name' => 'Sony Xperia 1 IV',
                'stock' => 50,
                'brand_id' => 6,
                'image' => 'image',
                'description' => '<pre>Display : 6.5 inches, OLED, 1B colors, 120Hz, HDR BT.2020.<br>Cpu : Qualcomm SM8450 Snapdragon 8 Gen 1 (4 nm).<br>Ram : 12GB.<br>Storage : 256GB.<br>Main Camera : 12 MP (wide), 12 MP (telephoto), 12 MP (ultrawide).<br>Selfie Camera : 12 MP (wide).<br>Bluetooth : 5.2, A2DP, LE, aptX HD, aptX Adaptive.<br>Wlan : 802.11 a/b/g/n/ac/6e, dual-band, Wi-Fi Direct, hotspot.<br>Battery : Li-Po 5000 mAh, Fast charging 30W.<br></pre>',
                'unit_price' => 699,
                'user_id' => 1,
            ],
        ];
        DB::table('phones')->insert($phones);
    }
}

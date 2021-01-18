<?php

namespace App\Services;

use App\Models\Image;
use Illuminate\Support\Facades\Storage;

class FakerImageService
{

    const copyImageurl = 'https://www.fitnessnetwork.co.za/public/images/modules/product/images/large/';
    const productGroups = [
        [
            'freeform-f20-home-treadmill-ac868e.jpg',
            'freeform-f20-home-treadmill-2f3722.jpg',
            'freeform-f20-home-treadmill-830547.jpg',
            'freeform-f20-home-treadmill-67bba1.jpg'
        ],
        [
            '61PdpcudNPL._SL1200_.jpg',
            '81LO97nf9dL._SL1500_.jpg',
            '71VshVMV3DL._SL1500_.jpg',
        ],
        [
            'freeform-freedom-f40-runner-treadmill-55146b.jpg',
            'freeform-freedom-f40-runner-treadmill-e98ba4.jpg',
            'freeform-freedom-f40-runner-treadmill-55146b.jpg',
        ],
        [
            'g6586_imagenescarrusel_1600_1600.jpg',
            'g6586_imagenescarrusel2_1600.jpg',
            'Screenshot%202021-01-06%20at%2007.02.57.png',
            'Screenshot%202021-01-06%20at%2006.44.20.png',
        ],
        [
            'Curve%201.0.jpg',
            'Picture3.png',
        ],
        [
            '05.jpg',
            'freeform-f2000-6hp-ac-commercial-endurance-treadmill-c1b8fa.jpg',
            '03.jpg',
            '04.jpg',
            '01.jpg',
        ],
        [
            'FF-AIR.png',
            'FF-Air%20console.png',
        ],
        [
            'U2000%201.png',
            'U2000%203.png',
            '0001_DSC00297_1024x1024.jpg',
            '0003_DSC00290_1024x1024.jpg',
            '0013_Layer5_1024x1024.jpg',
            'UB2000_1024x1024.gif',
        ],
        [
            '1_17b1ca52-ee70-43fa-9242-3ee14e221123_1024x1024.png',
            'DSC01413_1024x1024.jpeg',
            'DSC09609_1024x1024.jpeg',
            '2_028013ed-0591-4784-add4-e506be9cf6ae_1024x1024.png',
        ],
        [
            'bh-fitness-lk700s-core-stepper-led_1.jpg',
            'led_thumb_9.png',
        ],
        [
            'image_1_20322.jpg',
        ],
        [
            'waterrower-cleaning-kit-3252f6.jpg',
        ]
    ];

    private $imageGroupSelected;

    public function __construct()
    {
    }

    /**
     * Select image group from constant array productGroups
     * @return void
     */
    private function selectImageGroup(): void
    {
        $this->imageGroupSelected = mt_rand(0, (count(self::productGroups) - 1));
    }

    /**
     * Remote copy an array of image URL's
     * @return array
     */
    private function remoteCopy(): array
    {
        $data = self::productGroups[$this->imageGroupSelected];
        foreach ($data as $key => $imageUrl) {
            $imageContents = self::copyImageurl . $imageUrl;
            if ($imageContents !== false) {
                Storage::disk('public')->put($this->imageGroupSelected . '/' . basename($imageUrl), $imageContents);
            } else {
                // remove from array
                unset($data[$key]);
            }
        }
        // return array of images
        return $data;
    }

    /**
     * @return array
     */
    public function handle(): array
    {
        // select image froup
        $this->selectImageGroup();
        // copy images
        $data = $this->remoteCopy();
        // return
        return [
            'imageGroupSelected' => $this->imageGroupSelected,
            'data' => $data
        ];
    }

}

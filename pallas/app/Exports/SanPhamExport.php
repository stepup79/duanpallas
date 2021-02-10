<?php

namespace App\Exports;

use App\SanPham;
use App\Loai;
use App\NhaCungCap;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\RegistersEventListeners;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithDrawings;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Events\AfterImport;
use Maatwebsite\Excel\Events\BeforeSheet;
use Maatwebsite\Excel\Events\BeforeExport;
use Maatwebsite\Excel\Events\BeforeImport;
use Maatwebsite\Excel\Events\BeforeWriting;

class SanPhamExport implements FromView, WithDrawings, WithEvents, ShouldAutoSize
{
    use Exportable, RegistersEventListeners;

    public function view(): View
    {
        return view('backend.sanpham.excel', [
            'danhsachsanpham' => SanPham::all(),
            'danhsachloai' => Loai::all(),
            'danhsachnhacungcap' => NhaCungCap::all(),
        ]);
    }

    /**
     * @return BaseDrawing|BaseDrawing[]
     */
    public function drawings()
    {
        $arrDrawings = [];

        // Hình logo
        $drawingLogo = new \PhpOffice\PhpSpreadsheet\Worksheet\Drawing();
        $drawingLogo->setName('Logo');
        $drawingLogo->setDescription('Logo');
        $drawingLogo->setPath(public_path('storage/img/logo.jpg'));
        $drawingLogo->setHeight(120);
        $drawingLogo->setCoordinates('D4');
        $offsetX = 90; //pixels
        $drawingLogo->setOffsetX($offsetX); //pixels
        $arrDrawings[] = $drawingLogo;

        // Dòng bắt đầu xuất Excel
        $startRow = 7;

        // Lấy danh sách
        $dsSanpham = SanPham::all();
        foreach($dsSanpham as $index=>$sp)
        {
            $drawing = new \PhpOffice\PhpSpreadsheet\Worksheet\Drawing();
            $drawing->setName($sp->sp_ten);
            $drawing->setDescription($sp->sp_thongTin);
            $drawing->setPath(public_path('storage/photos/' . $sp->sp_hinh));
            $drawing->setHeight(100);
            $drawing->setWidth(100);
            $drawing->setCoordinates('C' . ($startRow + $index));
            $arrDrawings[] = $drawing;
        }

        return $arrDrawings;
    }

    /* Event beforeExport
    */
    public static function beforeExport(BeforeExport $event)
    {
        //
    }

    /* Event beforeWriting
    */
    public static function beforeWriting(BeforeWriting $event)
    {
        //
    }

    /* Event beforeSheet
    */
    public static function beforeSheet(BeforeSheet $event)
    {
        //
    }

    /* Event afterSheet
    */
    public static function afterSheet(AfterSheet $event)
    {
        // Set khổ giấy in ngang
        $event->sheet->getDelegate()->getPageSetup()
            ->setOrientation(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_LANDSCAPE);

        // Set dòng 4 (dùng chứa ảnh logo) có chiều cao 100
        $event->sheet->getDelegate()->getRowDimension('4')->setRowHeight(100);

        // Format dòng tiêu đề giới thiệu "Công ty"
        $event->sheet->getDelegate()->getStyle('A1:G5')->applyFromArray(
            [
                'font' => [
                    'bold' => true,
                ],
                'alignment' => [
                    'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                ]
            ]
        );

        // Format dòng tiêu đề
        $event->sheet->getDelegate()->getStyle('A5:G5')->applyFromArray(
            [
                'font' => [
                    'bold' => true,
                ],
                'alignment' => [
                    'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                ]
            ]
        );

        // Format dòng tiêu đề "Tiêu đề cột"
        $event->sheet->getDelegate()->getStyle('A6:G6')->applyFromArray(
            [
                'font' => [
                    'bold' => true,
                ],
                'alignment' => [
                    'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                ],
                'borders' => [
                    'outline' => [
                        'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                        'color' => ['argb' => '00000000'],
                    ],
                ]
            ]
        );

        // Dòng bắt đầu xuất Excel
        $startRow = 7;

        // Lấy danh sách, set độ cao của dòng là 50
        $dsSanpham = SanPham::all();
        foreach($dsSanpham as $index=>$sp)
        {
            $currentRow = $startRow + $index;
            $event->sheet->getDelegate()->getRowDimension($currentRow)->setRowHeight(50);

            $coordinate = "A${currentRow}:G${currentRow}";
            $event->sheet->getDelegate()->getStyle($coordinate)->getAlignment()->setWrapText(true)->applyFromArray(
                [
                    'alignment' => [
                        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT,
                    ],
                    'borders' => [
                        'outline' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                            'color' => ['argb' => '00000000'],
                        ],
                    ]
                ]
            );
        }
    }
}
<?php
namespace VIH\Tests;

use VIH\Event\Tests\EventMock;
use VIH\Event\Tests\EventExtendedMock;
use VIH\Event\PortraitPdf;

class PortraitPdfTest extends \PHPUnit_Framework_TestCase
{
    public function testExceptionIsThrownIfTemporaryDirectoryHasNotBeenSet()
    {
        $this->markTestIncomplete();
        try {
            $pdf = new CardPdf();
            //$pdf->setLogo(new ExerciseImageMock(), 'http://motionsplan.dk');
            //$pdf->setContribLogo(new ExerciseImageMock(), 'http://vih.dk');
            $pdf->addNewPage(new ExerciseMock);
        } catch (\Exception $e) {
            $this->assertTrue(true);
        }
    }

    public function testAddEventPage()
    {
        $filename =  __DIR__ . '/test.pdf';
        $pdf = new PortraitPdf();
        //$pdf->setTemporaryDirectory(__DIR__);
        //$pdf->setLogo(new ExerciseImageMock(), 'http://legestue.net');
        //$pdf->setContribLogo(new ExerciseImageMock(), 'http://legestue.net');
        $pdf->addEventPage(new EventMock);
        //$pdf->addNewPage(new CardMock);

        // This is not really testing the library - just to see whether functions works.
        $pdf->Output($filename, 'F');

        // Test and cleanup.
        $this->assertTrue(file_exists($filename));
        //unlink($filename);
        array_map('unlink', glob(__DIR__ . '/*.png'));
    }

    public function testAddEventExtendedDescriptionPage()
    {
        $filename =  __DIR__ . '/test.pdf';
        $pdf = new PortraitPdf();
        //$pdf->setTemporaryDirectory(__DIR__);
        //$pdf->setLogo(new ExerciseImageMock(), 'http://legestue.net');
        //$pdf->setContribLogo(new ExerciseImageMock(), 'http://legestue.net');
        $pdf->addEventPage(new EventExtendedMock);
        //$pdf->addNewPage(new CardMock);

        // This is not really testing the library - just to see whether functions works.
        $pdf->Output($filename, 'F');

        // Test and cleanup.
        $this->assertTrue(file_exists($filename));
        //unlink($filename);
        array_map('unlink', glob(__DIR__ . '/*.png'));
    }
}

<?php

// @codingStandardsIgnoreStart
namespace CarstenWindler\Cwhtmlcompressor;

use CarstenWindler\Cwhtmlcompressor\Tests\Unit\HtmlCompressorTest;

function header($string)
{
    HtmlCompressorTest::$headerBeenSet = $string;
}

namespace CarstenWindler\Cwhtmlcompressor\Tests\Unit;

use CarstenWindler\Cwhtmlcompressor\HtmlCompressor;
use Mockery as m;
// @codingStandardsIgnoreEnd

/**
 * @covers \CarstenWindler\Cwhtmlcompressor\HtmlCompressor
 */
class HtmlCompressorTest extends \TYPO3\TestingFramework\Core\Unit\UnitTestCase
{
    public static $headerBeenSet = null;

    public function tearDown()
    {
        parent::tearDown();

        self::$headerBeenSet = null;

        m::close();
    }

    private function isGzipped(string $string): bool
    {
        return 0 === mb_strpos($string , "\x1f" . "\x8b" . "\x08");
    }

    /**
     * @test
     */
    public function test_gzips_body_if_accept_encoding_gzip_is_set()
    {
        $_SERVER['HTTP_ACCEPT_ENCODING'] = 'gzip,default';

        $compressor = new HtmlCompressor();

        $pObjMock = m::mock(\TYPO3\CMS\Frontend\Controller\TypoScriptFrontendController::class);
        $pObjMock->content = 'test';

        $params = [
            'pObj' => $pObjMock
        ];

        $compressor->contentCompressHook($params);

        \PHPUnit\Framework\TestCase::assertTrue($this->isGzipped($pObjMock->content));
        \PHPUnit\Framework\TestCase::assertEquals('Content-Encoding: gzip', self::$headerBeenSet);
    }

    public function test_does_not_gzips_body_if_accept_encoding_gzip_is_not_set()
    {
        $compressor = new HtmlCompressor();

        $pObjMock = m::mock(\TYPO3\CMS\Frontend\Controller\TypoScriptFrontendController::class);
        $pObjMock->content = 'test';

        $params = [
            'pObj' => $pObjMock
        ];

        $compressor->contentCompressHook($params);

        \PHPUnit\Framework\TestCase::assertFalse($this->isGzipped($pObjMock->content));
        \PHPUnit\Framework\TestCase::assertNull(self::$headerBeenSet);
    }
}

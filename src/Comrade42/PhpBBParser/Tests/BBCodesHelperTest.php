<?php

namespace Comrade42\PhpBBParser\Tests;

use Comrade42\PhpBBParser\Helper\BBCodesHelper;

/**
 * Class BBCodesHelperTest
 * @package Comrade42\PhpBBParser\Tests
 */
class BBCodesHelperTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @param string $html
     * @param string $expected
     * @dataProvider providerParseTypeface
     */
    public function testParseTypeface($html, $expected)
    {
        $this->assertEquals($expected, BBCodesHelper::parseTypeface($html));
    }

    /**
     * @param string $html
     * @param string $expected
     * @dataProvider providerParseAlign
     */
    public function testParseAlign($html, $expected)
    {
        $this->assertEquals($expected, BBCodesHelper::parseAlign($html));
    }

    /**
     * @param string $html
     * @param string $expected
     * @dataProvider provideParseColor
     */
    public function testParseColor($html, $expected)
    {
        $this->assertEquals($expected, BBCodesHelper::parseColor($html));
    }

    /**
     * @param string $html
     * @param string $expected
     * @dataProvider provideParseSize
     */
    public function testParseSize($html, $expected)
    {
        $this->assertEquals($expected, BBCodesHelper::parseSize($html));
    }

    /**
     * @param string $html
     * @param string $expected
     * @dataProvider provideParseFont
     */
    public function testParseFont($html, $expected)
    {
        $this->assertEquals($expected, BBCodesHelper::parseFont($html));
    }

    /**
     * @param string $html
     * @param string $expected
     * @dataProvider provideParseQuote
     */
    public function testParseQuote($html, $expected)
    {
        $this->assertEquals($expected, BBCodesHelper::parseQuote($html));
    }

    /**
     * @param string $html
     * @param string $expected
     * @dataProvider provideParseCode
     */
    public function testParseCode($html, $expected)
    {
        $this->assertEquals($expected, BBCodesHelper::parseCode($html));
    }

    /**
     * @param string $html
     * @param string $expected
     * @dataProvider provideParseHide
     */
    public function testParseHide($html, $expected)
    {
        $this->assertEquals($expected, BBCodesHelper::parseHide($html));
    }

    /**
     * @param string $html
     * @param string $expected
     * @dataProvider provideParseList
     */
    public function testParseList($html, $expected)
    {
        $this->assertEquals($expected, BBCodesHelper::parseList($html));
    }

    /**
     * @param string $html
     * @param string $expected
     * @dataProvider provideParseLink
     */
    public function testParseLink($html, $expected)
    {
        $this->assertEquals($expected, BBCodesHelper::parseLink($html));
    }

    /**
     * @param string $html
     * @param string $expected
     * @dataProvider provideParseImage
     */
    public function testParseImage($html, $expected)
    {
        $this->assertEquals($expected, BBCodesHelper::parseImage($html));
    }

    /**
     * @param string $html
     * @param string $expected
     * @dataProvider provideParseVideo
     */
    public function testParseVideo($html, $expected)
    {
        $this->assertEquals($expected, BBCodesHelper::parseVideo($html));
    }

    /**
     * @param string $html
     * @param string $expected
     * @dataProvider provideParseFlash
     */
    public function testParseFlash($html, $expected)
    {
        $this->assertEquals($expected, BBCodesHelper::parseFlash($html));
    }

    /**
     * @param string $html
     * @param string $expected
     * @dataProvider provideParseTable
     */
    public function testParseTable($html, $expected)
    {
        $this->assertEquals($expected, BBCodesHelper::parseTable($html));
    }

    /**
     * @param string $html
     * @param string $expected
     * @dataProvider provideParseScrolling
     */
    public function testParseScrolling($html, $expected)
    {
        $this->assertEquals($expected, BBCodesHelper::parseScrolling($html));
    }

    /**
     * @param string $html
     * @param string $expected
     * @dataProvider provideParseLine
     */
    public function testParseLine($html, $expected)
    {
        $this->assertEquals($expected, BBCodesHelper::parseLine($html));
    }

    /**
     * @param string $html
     * @param string $expected
     * @dataProvider provideParseIndex
     */
    public function testParseIndex($html, $expected)
    {
        $this->assertEquals($expected, BBCodesHelper::parseIndex($html));
    }

    /**
     * @param string $html
     * @param string $expected
     * @dataProvider provideParseEffect
     */
    public function testParseEffect($html, $expected)
    {
        $this->assertEquals($expected, BBCodesHelper::parseEffect($html));
    }

    /**
     * @param string $html
     * @param string $expected
     * @dataProvider provideParseRandom
     */
    public function testParseRandom($html, $expected)
    {
        $this->assertEquals($expected, BBCodesHelper::parseRandom($html));
    }

    /**
     * @return array
     * @see testParseTypeface
     */
    public function providerParseTypeface()
    {
        return array(
            array('', ''),
            array('Привет', 'Привет'),
            array('<strong>Привет</strong>', '[b]Привет[/b]'),
            array('<u>Добрый день</u>', '[u]Добрый день[/u]'),
            array('<i>Это круто!</i>', '[i]Это круто![/i]'),
            array('<strike>черновик</strike>', '[strike]черновик[/strike]'),
            array('<strong>Привет</strong> <strong>Привет</strong>', '[b]Привет[/b] [b]Привет[/b]'),
            array('<strong>Привет</strong> <u>Добрый день</u>', '[b]Привет[/b] [u]Добрый день[/u]'),
            array('<u>Добрый <strike>черновик</strike> день</u>', '[u]Добрый [strike]черновик[/strike] день[/u]'),
            array('Добрый <strike>черновик</strike> день', 'Добрый [strike]черновик[/strike] день')
        );
    }

    /**
     * @return array
     * @see testParseAlign
     */
    public function providerParseAlign()
    {
        return array(
            array('', ''),
            array('Привет', 'Привет'),
            array('<div align="left">Текст слева</div>', '[left]Текст слева[/left]'),
            array('<div align="center">Текст по центру</div>', '[center]Текст по центру[/center]'),
            array('<div align="right">Текст справа</div>', '[right]Текст справа[/right]'),
            array('<div align="justify">Lorem ipsum</div>', '[justify]Lorem ipsum[/justify]'),
            array('Добрый <div align="left">Текст слева</div> день', 'Добрый [left]Текст слева[/left] день')
        );
    }

    /**
     * @return array
     * @see testParseColor
     */
    public function provideParseColor()
    {
        return array(
            array('', ''),
            array('Привет', 'Привет'),
            array('<span style="color:red">Привет! (red)</span>', '[color=red]Привет! (red)[/color]'),
            array('<span style="color:#FF0000">Привет! (#FF0000)</span>', '[color=#FF0000]Привет! (#FF0000)[/color]'),
            array('Добрый <span style="color:red">Привет! (red)</span> день', 'Добрый [color=red]Привет! (red)[/color] день')
        );
    }

    /**
     * @return array
     * @see testParseSize
     */
    public function provideParseSize()
    {
        return array(
            array('', ''),
            array('Привет', 'Привет'),
            array('<span style="font-size:9px">МАЛЕНЬКИЙ</span>', '[size=9]МАЛЕНЬКИЙ[/size]'),
            array('<span style="font-size:24px">ОГРОМНЫЙ</span>', '[size=24]ОГРОМНЫЙ[/size]'),
            array('Добрый <span style="font-size:9px">МАЛЕНЬКИЙ</span> день', 'Добрый [size=9]МАЛЕНЬКИЙ[/size] день')
        );
    }

    /**
     * @return array
     * @see testParseFont
     */
    public function provideParseFont()
    {
        return array(
            array('', ''),
            array('Привет', 'Привет'),
            array('<span style="font-family: Arial"> Arial</span>', '[font=Arial] Arial[/font]'),
            array('<span style="font-family: Comic Sans Ms">Comic Sans Ms</span>', '[font=Comic Sans Ms]Comic Sans Ms[/font]'),
            array('Добрый <span style="font-family: Arial">Arial</span> день', 'Добрый [font=Arial]Arial[/font] день')
        );
    }

    /**
     * @return array
     * @see testParseQuote
     */
    public function provideParseQuote()
    {
        return array(
            array('', ''),
            array('Привет', 'Привет'),
            array('<blockquote><div>Цитата без ссылки</div></blockquote>', '[quote]Цитата без ссылки[/quote]'),
            array('Добрый <blockquote><div>Цитата без ссылки</div></blockquote> день', 'Добрый [quote]Цитата без ссылки[/quote] день'),
            array('<blockquote><div><cite>Иванов пишет:</cite>Добрый день</div></blockquote>', '[quote="Иванов"]Добрый день[/quote]'),
            array('Добрый <blockquote><div><cite>Иванов пишет:</cite>Добрый день</div></blockquote> день', 'Добрый [quote="Иванов"]Добрый день[/quote] день')
        );
    }

    /**
     * @return array
     * @see testParseCode
     */
    public function provideParseCode()
    {
        return array(
            array('', ''),
            array('Привет', 'Привет'),
            array('<dl class="codebox"><dt>Код:</dt><dd><code>"Это код"</code></dd></dl>', '[code]"Это код"[/code]'),
            array('Добрый <dl class="codebox"><dt>Код:</dt><dd><code>"Это код"</code></dd></dl> день', 'Добрый [code]"Это код"[/code] день')
        );
    }

    /**
     * @return array
     * @see testParseHide
     */
    public function provideParseHide()
    {
        return array(
            array('', ''),
            array('Привет', 'Привет'),
            array('<dl class="codebox hidecode"><dt style="border: none;"></dt><dd>123</dd></dl>', '[hide]123[/hide]'),
            array('Добрый <dl class="codebox hidecode"><dt style="border: none;"></dt><dd>123</dd></dl> день', 'Добрый [hide]123[/hide] день')
        );
    }

    /**
     * @return array
     * @see testParseList
     */
    public function provideParseList()
    {
        return array(
            array('', ''),
            array('Привет', 'Привет'),
            array('<ul><li>Красный</li></ul>', '[list][*]Красный[/list]'),
            array('<ul><li>Красный</li><li>Синий</li><li>Желтый</li></ul>', '[list][*]Красный[*]Синий[*]Желтый[/list]'),
            array('Добрый <ul><li>Красный</li><li>Синий</li><li>Желтый</li></ul> день', 'Добрый [list][*]Красный[*]Синий[*]Желтый[/list] день'),
            array('<ol type="1"><li>A</li><li>B</li><li>C</li></ol>', '[list=1][*]A[*]B[*]C[/list]'),
            array('<ol type="a"><li>A</li><li>B</li><li>C</li></ol>', '[list=a][*]A[*]B[*]C[/list]')
        );
    }

    /**
     * @return array
     * @see testParseLink
     */
    public function provideParseLink()
    {
        return array(
            array('', ''),
            array('Привет', 'Привет'),
            array(
                '<a href="http://www.forum2x2.ru">http://www.forum2x2.ru</a>',
                '[url]http://www.forum2x2.ru[/url]'
            ),
            array(
                '<a href="http://www.forum2x2.ru" target="_blank" rel="nofollow">http://www.forum2x2.ru</a>',
                '[url]http://www.forum2x2.ru[/url]'
            ),
            array(
                'Добрый <a href="http://www.forum2x2.ru">http://www.forum2x2.ru</a> день',
                'Добрый [url]http://www.forum2x2.ru[/url] день'
            ),
            array(
                '<a href="http://www.forum2x2.ru">Посетите forum2x2.ru!</a>',
                '[url=http://www.forum2x2.ru]Посетите forum2x2.ru![/url]'
            ),
            array(
                '<a href="http://www.forum2x2.ru" target="_blank" rel="nofollow">Посетите forum2x2.ru!</a>',
                '[url=http://www.forum2x2.ru]Посетите forum2x2.ru![/url]'
            ),
            array(
                'Добрый <a href="http://www.forum2x2.ru">Посетите forum2x2.ru!</a> день',
                'Добрый [url=http://www.forum2x2.ru]Посетите forum2x2.ru![/url] день'
            )
        );
    }

    /**
     * @return array
     * @see testParseImage
     */
    public function provideParseImage()
    {
        return array(
            array('', ''),
            array('Привет', 'Привет'),
            array(
                '<img src="http://www.illiweb.com/fa/banner/ru/banner1.gif" alt="">',
                '[img]http://www.illiweb.com/fa/banner/ru/banner1.gif[/img]'
            ),
            array(
                '<img src="http://www.illiweb.com/fa/banner/ru/banner1.gif" style="width: 320px;height: 280px" alt="">',
                '[img(320px,280px)]http://www.illiweb.com/fa/banner/ru/banner1.gif[/img]'
            ),
            array(
                'Добрый <img src="http://www.illiweb.com/fa/banner/ru/banner1.gif" alt=""> день',
                'Добрый [img]http://www.illiweb.com/fa/banner/ru/banner1.gif[/img] день'
            )
        );
    }

    /**
     * @return array
     * @see testParseVideo
     */
    public function provideParseVideo()
    {
        return array(
            array('', ''),
            array('Привет', 'Привет'),
            array(
                '<embed pluginspage="http://www.macromedia.com/go/getflashplayer" src="http://www.youtube.com/v/J10MxpWAQF4" width="425" height="350" type="application/x-shockwave-flash" wmode="transparent" quality="high" scale="exactfit">',
                '[youtube]J10MxpWAQF4[/youtube]'
            ),
            array(
                'Добрый <embed pluginspage="http://www.macromedia.com/go/getflashplayer" src="http://www.youtube.com/v/J10MxpWAQF4" width="425" height="350" type="application/x-shockwave-flash" wmode="transparent" quality="high" scale="exactfit"> день',
                'Добрый [youtube]J10MxpWAQF4[/youtube] день'
            ),
            array(
                '<embed pluginspage="http://www.macromedia.com/go/getflashplayer" src="http://www.dailymotion.com/swf/xllcfg" width="425" height="350" type="application/x-shockwave-flash" wmode="transparent" quality="high" scale="exactfit" allowscriptaccess="always" allowfullscreen="true">',
                '[dailymotion]xllcfg[/dailymotion]'
            ),
            array(
                'Добрый <embed pluginspage="http://www.macromedia.com/go/getflashplayer" src="http://www.dailymotion.com/swf/xllcfg" width="425" height="350" type="application/x-shockwave-flash" wmode="transparent" quality="high" scale="exactfit" allowscriptaccess="always" allowfullscreen="true"> день',
                'Добрый [dailymotion]xllcfg[/dailymotion] день'
            )
        );
    }

    /**
     * @return array
     * @see testParseFlash
     */
    public function provideParseFlash()
    {
        return array(
            array('', ''),
            array('Привет', 'Привет'),
            array(
                '<embed pluginspage="http://www.macromedia.com/go/getflashplayer" src="http://illiweb.com/fa/i/test_bbcode.swf" width="200" height="40" type="application/x-shockwave-flash" wmode="transparent" quality="high" scale="exactfit">',
                '[flash(200,40)]http://illiweb.com/fa/i/test_bbcode.swf[/flash]'
            ),
            array(
                'Добрый <embed pluginspage="http://www.macromedia.com/go/getflashplayer" src="http://illiweb.com/fa/i/test_bbcode.swf" width="200" height="40" type="application/x-shockwave-flash" wmode="transparent" quality="high" scale="exactfit"> день',
                'Добрый [flash(200,40)]http://illiweb.com/fa/i/test_bbcode.swf[/flash] день'
            )
        );
    }

    /**
     * @return array
     * @see testParseTable
     */
    public function provideParseTable()
    {
        return array(
            array('', ''),
            array('Привет', 'Привет'),
            array(
                '<table border="1"><tbody><tr><td>Строка 1 - Ячейка 1</td><td>Строка 1 - Ячейка 2</td><td>Строка 1 - Ячейка 3</td></tr><tr><td>Строка 2 - Ячейка 1</td><td>Строка 2 - Ячейка 2</td><td>Строка 2 - Ячейка 3</td></tr></tbody></table>',
                '[table][tr][td]Строка 1 - Ячейка 1[/td][td]Строка 1 - Ячейка 2[/td][td]Строка 1 - Ячейка 3[/td][/tr][tr][td]Строка 2 - Ячейка 1[/td][td]Строка 2 - Ячейка 2[/td][td]Строка 2 - Ячейка 3[/td][/tr][/table]'
            ),
            array(
                'Добрый <table border="1"><tbody><tr><td>Строка 1 - Ячейка 1</td><td>Строка 1 - Ячейка 2</td><td>Строка 1 - Ячейка 3</td></tr><tr><td>Строка 2 - Ячейка 1</td><td>Строка 2 - Ячейка 2</td><td>Строка 2 - Ячейка 3</td></tr></tbody></table> день',
                'Добрый [table][tr][td]Строка 1 - Ячейка 1[/td][td]Строка 1 - Ячейка 2[/td][td]Строка 1 - Ячейка 3[/td][/tr][tr][td]Строка 2 - Ячейка 1[/td][td]Строка 2 - Ячейка 2[/td][td]Строка 2 - Ячейка 3[/td][/tr][/table] день'
            )
        );
    }

    /**
     * @return array
     * @see testParseScrolling
     */
    public function provideParseScrolling()
    {
        return array(
            array('', ''),
            array('Привет', 'Привет'),
            array(
                '<span><marquee>Мое сообщение</marquee></span>',
                '[scroll]Мое сообщение[/scroll]'
            ),
            array(
                'Добрый <span><marquee>Мое сообщение</marquee></span> день',
                'Добрый [scroll]Мое сообщение[/scroll] день'
            ),
            array(
                '<marquee direction="up" scrollamount="1" style="height: 60px;">Мое сообщение</marquee>',
                '[updown]Мое сообщение[/updown]'
            ),
            array(
                'Добрый <marquee direction="up" scrollamount="1" style="height: 60px;">Мое сообщение</marquee> день',
                'Добрый [updown]Мое сообщение[/updown] день'
            )
        );
    }

    /**
     * @return array
     * @see testParseLine
     */
    public function provideParseLine()
    {
        return array(
            array('', ''),
            array('Привет', 'Привет'),
            array('<hr>', '[hr]'),
            array('Первая часть сообщения<hr>Вторая часть сообщения', 'Первая часть сообщения[hr]Вторая часть сообщения')
        );
    }

    /**
     * @return array
     * @see testParseIndex
     */
    public function provideParseIndex()
    {
        return array(
            array('', ''),
            array('Привет', 'Привет'),
            array('<sub>a+b</sub>', '[sub]a+b[/sub]'),
            array('X<sub>a+b</sub>Y', 'X[sub]a+b[/sub]Y'),
            array('<sup>е</sup>', '[sup]е[/sup]'),
            array('1<sup>е</sup> место', '1[sup]е[/sup] место')
        );
    }

    /**
     * @return array
     * @see testParseEffect
     */
    public function provideParseEffect()
    {
        return array(
            array('', ''),
            array('Привет', 'Привет'),
            array(
                '<span class="flipV">Вертикальный зеркальный эффект</span>',
                '[flipv]Вертикальный зеркальный эффект[/flipv]'
            ),
            array(
                'Добрый <span class="flipV">Вертикальный зеркальный эффект</span> день',
                'Добрый [flipv]Вертикальный зеркальный эффект[/flipv] день'
            ),
            array(
                '<span class="flipH">Горизонтальный зеркальный эффект</span>',
                '[fliph]Горизонтальный зеркальный эффект[/fliph]'
            ),
            array(
                'Добрый <span class="flipH">Горизонтальный зеркальный эффект</span> день',
                'Добрый [fliph]Горизонтальный зеркальный эффект[/fliph] день'
            ),
            array(
                '<span class="blur">Размытый текст</span>',
                '[blur]Размытый текст[/blur]'
            ),
            array(
                'Добрый <span class="blur">Размытый текст</span> день',
                'Добрый [blur]Размытый текст[/blur] день'
            ),
            array(
                '<span class="fade">Затухающий текст</span>',
                '[fade]Затухающий текст[/fade]'
            ),
            array(
                'Добрый <span class="fade">Затухающий текст</span> день',
                'Добрый [fade]Затухающий текст[/fade] день'
            )
        );
    }

    /**
     * @return array
     * @see testParseRandom
     */
    public function provideParseRandom()
    {
        return array(
            array('', ''),
            array('Привет', 'Привет'),
            array(
                '<dl class="codebox"><dd><strong>Случайное число (1,50) : </strong>50</dd></dl>',
                '[rand]50[/rand]'
            ),
            array(
                '<dl class="codebox"><dd><strong>Случайное число (50,100) : </strong>93</dd></dl>',
                '[rand]50,100[/rand]'
            ),
            array(
                'Добрый <dl class="codebox"><dd><strong>Случайное число (50,100) : </strong>93</dd></dl> день',
                'Добрый [rand]50,100[/rand] день'
            )
        );
    }
}

<?php

namespace Comrade42\PhpBBParser\Helper;

/**
 * Class BBCodesHelper
 * @package Comrade42\PhpBBParser\Helper
 */
class BBCodesHelper implements BBCodesInterface
{
    /**
     * @var array
     */
    protected static $patterns = array(
        'typeface' => array(
            '/<strong>(.*)<\/strong>/sU'    => '[b]$1[/b]',
            '/<u>(.*)<\/u>/sU'              => '[u]$1[/u]',
            '/<i>(.*)<\/i>/sU'              => '[i]$1[/i]',
            '/<strike>(.*)<\/strike>/sU'    => '[strike]$1[/strike]'
        ),
        'align' => array(
            '/<div align="(.+)">(.*)<\/div>/sU'  => '[$1]$2[/$1]'
        ),
        'color' => array(
            '/<span style="color:(.+)">(.*)<\/span>/sU' => '[color=$1]$2[/color]'
        ),
        'size' => array(
            '/<span style="font-size:(.+)px">(.*)<\/span>/sU'   => '[size=$1]$2[/size]'
        ),
        'font' => array(
            '/<span style="font-family: (.+)">(.*)<\/span>/sU'  => '[font=$1]$2[/font]'
        ),
        'quote' => array(
            '/<blockquote><div><cite>(.+) пишет:<\/cite>(.*)<\/div><\/blockquote>/sU'   => '[quote="$1"]$2[/quote]',
            '/<blockquote><div>(.*)<\/div><\/blockquote>/sU'                            => '[quote]$1[/quote]'
        ),
        'code' => array(
            '/<dl class="codebox"><dt>Код:<\/dt><dd><code>(.*)<\/code><\/dd><\/dl>/sU'  => '[code]$1[/code]'
        ),
        'hide' => array(
            '/<dl class="codebox hidecode"><dt(?:.*)><\/dt><dd>(.*)<\/dd><\/dl>/sU' => '[hide]$1[/hide]'
        ),
        'list' => array(
            '/<ol type="(.+)">(.*)<\/ol>/sU'    => '[list=$1]$2[/list]',
            '/<ul>(.*)<\/ul>/sU'                => '[list]$1[/list]',
            '/<li>(.*)<\/li>/sU'                => '[*]$1'
        ),
        'link' => array(
            '/<a href="(.+)"(?:.*)>(.+)<\/a>/sU'                    => '[url=$1]$2[/url]',
            '/\[url=(?:(https?:\/\/[^\]\s]+)\]?){2}\[\/url\]/sU'    => '[url]$1[/url]'
        ),
        'image' => array(
            '/<img src="(.+)" style="width: (.+)px;height: (.+)px"(?:.*)>/sU'   => '[img($2px,$3px)]$1[/img]',
            '/<img src="(.+)"(?:.*)>/sU'                                        => '[img]$1[/img]'
        ),
        'video' => array(
            '/<embed (?:.*) src="http:\/\/www\.youtube\.com\/v\/(\w+)"(?:.*)>/sU'       => '[youtube]$1[/youtube]',
            '/<embed (?:.*) src="http:\/\/www\.dailymotion\.com\/swf\/(\w+)"(?:.*)>/sU' => '[dailymotion]$1[/dailymotion]'
        ),
        'flash' => array(
            '/<embed (?:.*) src="(.+)\.swf" width="(.+)" height="(.+)"(?:.*)>/sU'   => '[flash($2,$3)]$1.swf[/flash]'
        ),
        'table' => array(
            '/<table(?:.*)>(?:.*)<tbody>(.*)<\/tbody>(?:.*)<\/table>/sU'    => '[table]$1[/table]',
            '/<tr>(.*)<\/tr>/sU'                                            => '[tr]$1[/tr]',
            '/<td>(.*)<\/td>/sU'                                            => '[td]$1[/td]'
        ),
        'scrolling' => array(
            '/<span><marquee>(.*)<\/marquee><\/span>/sU'            => '[scroll]$1[/scroll]',
            '/<marquee direction="up"(?:.*)">(.*)<\/marquee>/sU'    => '[updown]$1[/updown]'
        ),
        'line' => array(
            '/<hr>/sU'  => '[hr]'
        ),
        'index' => array(
            '/<sub>(.*)<\/sub>/sU'  => '[sub]$1[/sub]',
            '/<sup>(.*)<\/sup>/sU'  => '[sup]$1[/sup]'
        ),
        'effect' => array(
            '/<span class="flipV">(.*)<\/span>/sU'          => '[flipv]$1[/flipv]',
            '/<span class="flipH">(.*)<\/span>/sU'          => '[fliph]$1[/fliph]',
            '/<span class="(blur|fade)">(.*)<\/span>/sU'    => '[$1]$2[/$1]'
        ),
        'random' => array(
            '/<dl class="codebox"><dd><strong>Случайное число \(1,(\d+)\)(?:.*)<\/strong>(?:.*)<\/dd><\/dl>/sU'     => '[rand]$1[/rand]',
            '/<dl class="codebox"><dd><strong>Случайное число \((\d+),(\d+)\)(?:.*)<\/strong>(?:.*)<\/dd><\/dl>/sU' => '[rand]$1,$2[/rand]'
        )
    );

    /**
     * @param string $html
     * @param string $section
     * @return string
     */
    protected static function parse($html, $section)
    {
        $patterns = static::$patterns[$section];
        return preg_replace(array_keys($patterns), $patterns, $html);
    }

    /**
     * Parses all BBCode tags in the HTML source at once
     *
     * @param string $html
     * @return string
     */
    public static function parseAll($html)
    {
        foreach (array_keys(static::$patterns) as $section)
        {
            $html = static::parse($html, $section);
        }

        return $html;
    }

    /**
     * Parses [b], [u], [i] and [strike] tags in the HTML source
     *
     * @param string $html
     * @return string
     */
    public static function parseTypeface($html)
    {
        return static::parse($html, 'typeface');
    }

    /**
     * Parses [left], [right], [center] and [justify] tags in the HTML source
     *
     * @param string $html
     * @return string
     */
    public static function parseAlign($html)
    {
            return static::parse($html, 'align');
    }

    /**
     * Parses [color] tag in the HTML source
     *
     * @param string $html
     * @return string
     */
    public static function parseColor($html)
    {
        return static::parse($html, 'color');
    }

    /**
     * Parses [size] tag in the HTML source
     *
     * @param string $html
     * @return string
     */
    public static function parseSize($html)
    {
        return static::parse($html, 'size');
    }

    /**
     * Parses [font] tag in the HTML source
     *
     * @param string $html
     * @return string
     */
    public static function parseFont($html)
    {
        return static::parse($html, 'font');
    }

    /**
     * Parses [quote] tag in the HTML source
     *
     * @param string $html
     * @return string
     */
    public static function parseQuote($html)
    {
        return static::parse($html, 'quote');
    }

    /**
     * Parses [code] tag in the HTML source
     *
     * @param string $html
     * @return string
     */
    public static function parseCode($html)
    {
        return static::parse($html, 'code');
    }

    /**
     * Parses [hide] tag in the HTML source
     *
     * @param string $html
     * @return string
     */
    public static function parseHide($html)
    {
        return static::parse($html, 'hide');
    }

    /**
     * Parses [list] tag in the HTML source
     *
     * @param string $html
     * @return string
     */
    public static function parseList($html)
    {
        return static::parse($html, 'list');
    }

    /**
     * Parses [url] tag in the HTML source
     *
     * @param string $html
     * @return string
     */
    public static function parseLink($html)
    {
        return static::parse($html, 'link');
    }

    /**
     * Parses [img] tag in the HTML source
     *
     * @param string $html
     * @return string
     */
    public static function parseImage($html)
    {
        return static::parse($html, 'image');
    }

    /**
     * Parses [youtube] and [dailymotion] tags in the HTML source
     *
     * @param string $html
     * @return string
     */
    public static function parseVideo($html)
    {
        return static::parse($html, 'video');
    }

    /**
     * Parses [flash] and [embed-flash] tags in the HTML source
     *
     * @param string $html
     * @return string
     */
    public static function parseFlash($html)
    {
        return static::parse($html, 'flash');
    }

    /**
     * Parses [table] tag in the HTML source
     *
     * @param string $html
     * @return string
     */
    public static function parseTable($html)
    {
        return static::parse($html, 'table');
    }

    /**
     * Parses [scroll] and [updown] tags in the HTML source
     *
     * @param string $html
     * @return string
     */
    public static function parseScrolling($html)
    {
        return static::parse($html, 'scrolling');
    }

    /**
     * Parses [hr] tag in the HTML source
     *
     * @param string $html
     * @return string
     */
    public static function parseLine($html)
    {
        return static::parse($html, 'line');
    }

    /**
     * Parses [sub] and [sup] tags in the HTML source
     *
     * @param string $html
     * @return string
     */
    public static function parseIndex($html)
    {
        return static::parse($html, 'index');
    }

    /**
     * Parses [flipv], [fliph], [blur] and [fade] tags in the HTML source
     *
     * @param string $html
     * @return string
     */
    public static function parseEffect($html)
    {
        return static::parse($html, 'effect');
    }

    /**
     * Parses [rand] tag in the HTML source
     *
     * @param string $html
     * @return string
     */
    public static function parseRandom($html)
    {
        return static::parse($html, 'random');
    }
}

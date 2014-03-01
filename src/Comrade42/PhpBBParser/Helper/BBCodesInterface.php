<?php

namespace Comrade42\PhpBBParser\Helper;

/**
 * Interface BBCodesInterface
 * @package Comrade42\PhpBBParser\Helper
 */
interface BBCodesInterface
{
    /**
     * Parses all BBCode tags in the HTML source at once
     *
     * @param string $html
     * @return string
     */
    public static function parseAll($html);

    /**
     * Parses [b], [u], [i] and [strike] tags in the HTML source
     *
     * @param string $html
     * @return string
     */
    public static function parseTypeface($html);

    /**
     * Parses [left], [right], [center] and [justify] tags in the HTML source
     *
     * @param string $html
     * @return string
     */
    public static function parseAlign($html);

    /**
     * Parses [color] tag in the HTML source
     *
     * @param string $html
     * @return string
     */
    public static function parseColor($html);

    /**
     * Parses [size] tag in the HTML source
     *
     * @param string $html
     * @return string
     */
    public static function parseSize($html);

    /**
     * Parses [font] tag in the HTML source
     *
     * @param string $html
     * @return string
     */
    public static function parseFont($html);

    /**
     * Parses [quote] tag in the HTML source
     *
     * @param string $html
     * @return string
     */
    public static function parseQuote($html);

    /**
     * Parses [code] tag in the HTML source
     *
     * @param string $html
     * @return string
     */
    public static function parseCode($html);

    /**
     * Parses [hide] tag in the HTML source
     *
     * @param string $html
     * @return string
     */
    public static function parseHide($html);

    /**
     * Parses [list] tag in the HTML source
     *
     * @param string $html
     * @return string
     */
    public static function parseList($html);

    /**
     * Parses [url] tag in the HTML source
     *
     * @param string $html
     * @return string
     */
    public static function parseLink($html);

    /**
     * Parses [img] tag in the HTML source
     *
     * @param string $html
     * @return string
     */
    public static function parseImage($html);

    /**
     * Parses [youtube] and [dailymotion] tags in the HTML source
     *
     * @param string $html
     * @return string
     */
    public static function parseVideo($html);

    /**
     * Parses [flash] and [embed-flash] tags in the HTML source
     *
     * @param string $html
     * @return string
     */
    public static function parseFlash($html);

    /**
     * Parses [table] tag in the HTML source
     *
     * @param string $html
     * @return string
     */
    public static function parseTable($html);

    /**
     * Parses [scroll] and [updown] tags in the HTML source
     *
     * @param string $html
     * @return string
     */
    public static function parseScrolling($html);

    /**
     * Parses [hr] tag in the HTML source
     *
     * @param string $html
     * @return string
     */
    public static function parseLine($html);

    /**
     * Parses [sub] and [sup] tags in the HTML source
     *
     * @param string $html
     * @return string
     */
    public static function parseIndex($html);

    /**
     * Parses [flipv], [fliph], [blur] and [fade] tags in the HTML source
     *
     * @param string $html
     * @return string
     */
    public static function parseEffect($html);

    /**
     * Parses [rand] tag in the HTML source
     *
     * @param string $html
     * @return string
     */
    public static function parseRandom($html);
}

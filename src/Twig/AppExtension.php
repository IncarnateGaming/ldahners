<?php

namespace App\Twig;

use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;
use Twig\TwigFunction;

class AppExtension extends AbstractExtension
{
//    public function getFunctions(): array
//    {
//        return [
//            new TwigFunction('arrayConvert', [$this, 'arrayConvert']),
//        ];
//    }

    public function getFilters(): array
    {
        return [
            // If your filter generates SAFE HTML, you should add a third
            // parameter: ['is_safe' => ['html']]
            // Reference: https://twig.symfony.com/doc/2.x/advanced.html#automatic-escaping
            new TwigFilter('index_stripper', [$this, 'indexStripper']),
            new TwigFilter('email_space_sanitizer', [$this, 'emailSpaceSanitizer']),
            new TwigFilter('change_return_to_break',[$this, 'addBreaks']),
        ];
    }
    public function emailSpaceSanitizer(string $string):string{
        return str_replace(' ','%20',$string);
    }
    public function indexStripper($value){
        return str_replace('/index.php','',$value);
    }
    public function addBreaks($value){
        $value = strip_tags($value);
        $value = str_replace("\r\n","<br/>",$value);
        $value = str_replace("\r","<br/>",$value);
        $value = str_replace("\n","<br/>",$value);
        return $value;
    }

//    public function getFilters(): array
//    {
//        return [
//            // If your filter generates SAFE HTML, you should add a third
//            // parameter: ['is_safe' => ['html']]
//            // Reference: https://twig.symfony.com/doc/2.x/advanced.html#automatic-escaping
//            new TwigFilter('filter_name', [$this, 'doSomething']),
//        ];
//    }
//
//    public function getFunctions(): array
//    {
//        return [
//            new TwigFunction('function_name', [$this, 'doSomething']),
//        ];
//    }
//
//    public function doSomething($value)
//    {
//        // ...
//    }
}

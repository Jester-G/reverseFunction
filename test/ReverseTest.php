<?php
use PHPUnit\Framework\TestCase;

include __DIR__ . '/../reverseFunction.php';

class ReverseTest extends TestCase
{
    public function testOnlyText() {
        $str = 'Привет Мир';
        $result = reverse($str);
        $this->assertSame('Тевирп Рим', $result);
    }

    public function testTextWithPunct() {
        $str = 'Привет! Давно не виделись.';
        $result = reverse($str);
        $this->assertSame('Тевирп! Онвад ен ьсиледив.', $result);
    }

    public function testTextWithDigitsAndPunct() {
        $str = 'Пр1вет! Давн0 3деСь';
        $result = reverse($str);
        $this->assertSame('Тев1рп! 0нваД ьсеД3', $result);
    }

    public function testTextWithEngAndRusLetters() {
        $str = 'Prивет! ДавNо Zдесb';
        $result = reverse($str);
        $this->assertSame('Тевиrp! ОnвАд Bседz', $result);
    }
}


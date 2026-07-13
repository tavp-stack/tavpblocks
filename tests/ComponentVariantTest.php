<?php

declare(strict_types=1);

namespace Tavp\Blocks\Tests;

use Tavp\Blocks\Components\StatCard;
use Tavp\Blocks\Components\Badge;
use Tavp\Blocks\Components\Alert;
use Tavp\Blocks\Components\Card;
use PHPUnit\Framework\TestCase;

class ComponentVariantTest extends TestCase
{
    public function testStatCardRendersIconAndSparkline(): void
    {
        $html = (new StatCard('Revenue', 1200, '+12%', 'green', '💰', 'green', [1, 4, 2, 8, 6]))->render();

        $this->assertStringContainsString('💰', $html);
        $this->assertStringContainsString('+12%', $html);
        $this->assertStringContainsString('<polyline', $html);
        $this->assertStringContainsString('1200', $html);
    }

    public function testStatCardDarkThemeUsesDarkShell(): void
    {
        $html = (new StatCard('Users', 5, '', 'gray', '', 'brand', [], 'dark'))->render();

        $this->assertStringContainsString('bg-gray-900', $html);
        $this->assertStringContainsString('text-white', $html);
    }

    public function testStatCardLightThemeUsesWhiteShell(): void
    {
        $html = (new StatCard('Users', 5, '', 'gray', '', 'brand', [], 'light'))->render();

        $this->assertStringContainsString('bg-white', $html);
    }

    public function testBadgeSupportsVariantsAndColors(): void
    {
        $soft = (new Badge('Active', 'green', 'soft'))->render();
        $solid = (new Badge('Active', 'red', 'solid'))->render();
        $outline = (new Badge('Active', 'blue', 'outline'))->render();

        $this->assertStringContainsString('bg-green-100', $soft);
        $this->assertStringContainsString('bg-red-600', $solid);
        $this->assertStringContainsString('border', $outline);
    }

    public function testAlertSupportsTitleAndDismissible(): void
    {
        $html = (new Alert('Saved', 'success', 'Done', true))->render();

        $this->assertStringContainsString('Done', $html);
        $this->assertStringContainsString('Saved', $html);
        $this->assertStringContainsString('this.parentElement.remove()', $html);
    }

    public function testCardRendersActionsAndDarkTheme(): void
    {
        $html = (new Card('Title', 'Body', '', '<button>x</button>', true, 'dark'))->render();

        $this->assertStringContainsString('Title', $html);
        $this->assertStringContainsString('Body', $html);
        $this->assertStringContainsString('<button>x</button>', $html);
        $this->assertStringContainsString('bg-gray-900', $html);
    }
}

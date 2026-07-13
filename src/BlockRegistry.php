<?php

declare(strict_types=1);

namespace Tavp\Blocks;

/**
 * Registry of TAVPblocks UI components.
 *
 * Each block has a PHP class that renders HTML.
 * Components can be used in Volt templates or PHP.
 */
class BlockRegistry
{
    /** @var array<string, class-string<Components\Component>> */
    private const BLOCKS = [
        'Button' => Components\Button::class,
        'Card' => Components\Card::class,
        'Alert' => Components\Alert::class,
        'Badge' => Components\Badge::class,
        'Modal' => Components\Modal::class,
        'Tabs' => Components\Tabs::class,
        'Pagination' => Components\Pagination::class,
        'StatCard' => Components\StatCard::class,
        'Datatable' => Components\Datatable::class,
        'Skeleton' => Components\Skeleton::class,
        'Breadcrumb' => Components\Breadcrumb::class,
        'Accordion' => Components\Accordion::class,
        'ProgressBar' => Components\ProgressBar::class,
        'Tooltip' => Components\Tooltip::class,
        'Avatar' => Components\Avatar::class,
        'EmptyState' => Components\EmptyState::class,
        'LoadingSpinner' => Components\LoadingSpinner::class,
        'SearchBar' => Components\SearchBar::class,
        'NotificationBell' => Components\NotificationBell::class,
        'Timeline' => Components\Timeline::class,
        'AlertBanner' => Components\AlertBanner::class,
        'Chip' => Components\Chip::class,
        'Divider' => Components\Divider::class,
        'Dropdown' => Components\Dropdown::class,
        'Toggle' => Components\Toggle::class,
        'Navbar' => Components\Navbar::class,
        'CopyButton' => Components\CopyButton::class,
        'StatusBadge' => Components\StatusBadge::class,
        'FileCard' => Components\FileCard::class,
        'Comment' => Components\Comment::class,
        'Rating' => Components\Rating::class,
        'Stepper' => Components\Stepper::class,
        'CodeBlock' => Components\CodeBlock::class,
        'TableOfContents' => Components\TableOfContents::class,
        'KeyValue' => Components\KeyValue::class,
        'DescriptionList' => Components\DescriptionList::class,
        'ImageGallery' => Components\ImageGallery::class,
        'VideoPlayer' => Components\VideoPlayer::class,
        'AudioPlayer' => Components\AudioPlayer::class,
        'MapPlaceholder' => Components\MapPlaceholder::class,
        'QRCode' => Components\QRCode::class,
        'StarRating' => Components\StarRating::class,
        'DatePicker' => Components\DatePicker::class,
        'TimePicker' => Components\TimePicker::class,
        'ColorPicker' => Components\ColorPicker::class,
        'RangeSlider' => Components\RangeSlider::class,
        'CheckboxGroup' => Components\CheckboxGroup::class,
        'RadioGroup' => Components\RadioGroup::class,
        'SelectWithSearch' => Components\SelectWithSearch::class,
        'TagInput' => Components\TagInput::class,
        'RichTextEditor' => Components\RichTextEditor::class,
        'FileSize' => Components\FileSize::class,
        'Countdown' => Components\Countdown::class,
        'Clipboard' => Components\Clipboard::class,
        'ShareButtons' => Components\ShareButtons::class,
        'BackToTop' => Components\BackToTop::class,
        'Chart' => Components\Chart::class,
        'Gauge' => Components\Gauge::class,
        'PieChart' => Components\PieChart::class,
        'LineChart' => Components\LineChart::class,
        'BarChart' => Components\BarChart::class,
        'RadarChart' => Components\RadarChart::class,
        'DoughnutChart' => Components\DoughnutChart::class,
        'PolarAreaChart' => Components\PolarAreaChart::class,
        'BubbleChart' => Components\BubbleChart::class,
        'ScatterChart' => Components\ScatterChart::class,
        // DaisyUI Components
        'DaisyAccordion' => Components\DaisyAccordion::class,
        'DaisyAlert' => Components\DaisyAlert::class,
        'DaisyAvatar' => Components\DaisyAvatar::class,
        'DaisyBadge' => Components\DaisyBadge::class,
        'DaisyBottomNav' => Components\DaisyBottomNav::class,
        'DaisyBreadcrumbs' => Components\DaisyBreadcrumbs::class,
        'DaisyBrowserMockup' => Components\DaisyBrowserMockup::class,
        'DaisyButton' => Components\DaisyButton::class,
        'DaisyCard' => Components\DaisyCard::class,
        'DaisyCarousel' => Components\DaisyCarousel::class,
        'DaisyChat' => Components\DaisyChat::class,
        'DaisyCheckbox' => Components\DaisyCheckbox::class,
        'DaisyCodeMockup' => Components\DaisyCodeMockup::class,
        'DaisyCollapse' => Components\DaisyCollapse::class,
        'DaisyCountdown' => Components\DaisyCountdown::class,
        'DaisyDiff' => Components\DaisyDiff::class,
        'DaisyDivider' => Components\DaisyDivider::class,
        'DaisyDrawer' => Components\DaisyDrawer::class,
        'DaisyDropdown' => Components\DaisyDropdown::class,
        'DaisyFileInput' => Components\DaisyFileInput::class,
        'DaisyFilter' => Components\DaisyFilter::class,
        'DaisyFooter' => Components\DaisyFooter::class,
        'DaisyFormControl' => Components\DaisyFormControl::class,
        'DaisyFormGroup' => Components\DaisyFormGroup::class,
        'DaisyHero' => Components\DaisyHero::class,
        'DaisyIndicator' => Components\DaisyIndicator::class,
        'DaisyJoin' => Components\DaisyJoin::class,
        'DaisyKbd' => Components\DaisyKbd::class,
        'DaisyLink' => Components\DaisyLink::class,
        'DaisyLoading' => Components\DaisyLoading::class,
        'DaisyMask' => Components\DaisyMask::class,
        'DaisyMenu' => Components\DaisyMenu::class,
        'DaisyModal' => Components\DaisyModal::class,
        'DaisyNavbar' => Components\DaisyNavbar::class,
        'DaisyPagination' => Components\DaisyPagination::class,
        'DaisyPhoneMockup' => Components\DaisyPhoneMockup::class,
        'DaisyProgress' => Components\DaisyProgress::class,
        'DaisyRadialProgress' => Components\DaisyRadialProgress::class,
        'DaisyRadio' => Components\DaisyRadio::class,
        'DaisyRange' => Components\DaisyRange::class,
        'DaisyRating' => Components\DaisyRating::class,
        'DaisySelect' => Components\DaisySelect::class,
        'DaisySkeleton' => Components\DaisySkeleton::class,
        'DaisyStack' => Components\DaisyStack::class,
        'DaisyStat' => Components\DaisyStat::class,
        'DaisyStatus' => Components\DaisyStatus::class,
        'DaisySteps' => Components\DaisySteps::class,
        'DaisySwap' => Components\DaisySwap::class,
        'DaisyTable' => Components\DaisyTable::class,
        'DaisyTabs' => Components\DaisyTabs::class,
        'DaisyTextarea' => Components\DaisyTextarea::class,
        'DaisyTextfield' => Components\DaisyTextfield::class,
        'DaisyTimeline' => Components\DaisyTimeline::class,
        'DaisyToast' => Components\DaisyToast::class,
        'DaisyToggle' => Components\DaisyToggle::class,
        'DaisyTooltip' => Components\DaisyTooltip::class,
        'DaisyValidator' => Components\DaisyValidator::class,
        'DaisyWindowMockup' => Components\DaisyWindowMockup::class,
    ];

    private array $extra = [];

    /**
     * Return all built-in block names.
     *
     * @return string[]
     */
    public function builtIn(): array
    {
        return array_keys(self::BLOCKS);
    }

    /**
     * Return built-in blocks plus any registered by modules.
     *
     * @return string[]
     */
    public function all(): array
    {
        return array_values(array_unique(array_merge(array_keys(self::BLOCKS), array_keys($this->extra))));
    }

    public function count(): int
    {
        return count($this->all());
    }

    public function has(string $name): bool
    {
        return in_array($name, $this->all(), true);
    }

    /**
     * Get the class for a block.
     */
    public function getClass(string $name): ?string
    {
        return self::BLOCKS[$name] ?? $this->extra[$name] ?? null;
    }

    /**
     * Create a block instance.
     */
    public function make(string $name, array $props = []): ?Components\Component
    {
        $class = $this->getClass($name);

        if ($class === null || !class_exists($class)) {
            return null;
        }

        return new $class(...$props);
    }

    /**
     * Register a custom block from a module.
     *
     * When $class is omitted it is derived from the block name
     * (Tavp\Blocks\Components\{Name}).
     *
     * @param class-string<Components\Component> $class
     */
    public function register(string $name, ?string $class = null): void
    {
        if ($this->has($name)) {
            return;
        }

        $this->extra[$name] = $class ?? ('Tavp\\Blocks\\Components\\' . $name);
    }
}

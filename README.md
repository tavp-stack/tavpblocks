# tavpblocks

Library **komponen UI** untuk TAVP, dibangun dengan Tailwind + Alpine + Volt.
Target: 40+ komponen jadi yang tinggal dipakai.

## Components

### Phase 1 (0.2.0) — 15 basic components

| Component | Description |
|---|---|
| `x-button` | Buttons with variants (primary, secondary, danger, ghost) |
| `x-input` | Text inputs with labels, errors, hints |
| `x-select` | Dropdown selects |
| `x-textarea` | Multi-line text inputs |
| `x-toggle` | On/off switches |
| `x-modal` | Dialog overlays |
| `x-dropdown` | Dropdown menus |
| `x-toast` | Notification popups |
| `x-card` | Content cards |
| `x-badge` | Status indicators |
| `x-avatar` | User avatars |
| `x-datatable` | Data tables with sorting |
| `x-pagination` | Page navigation |
| `x-alert` | Alert messages |
| `x-skeleton` | Loading placeholders |

### Phase 2 (0.4.0) — 25+ more components

| Component | Description |
|---|---|
| `x-tabs` | Tabbed content panels |
| `x-accordion` | Collapsible sections |
| `x-file-upload` | Drag-and-drop file upload |
| `x-rich-editor` | WYSIWYG rich text editor |
| `x-date-picker` | Date selection widget |
| `x-color-picker` | Color selection widget |
| `x-stat-card` | Statistics display card |
| `x-form-group` | Labeled form field wrapper |
| `x-confirm-dialog` | Confirmation modal |
| `x-loading-spinner` | Loading indicators |
| `x-breadcrumb` | Breadcrumb navigation |
| `x-tooltip` | Hover tooltips |
| `x-progress-bar` | Progress indicators |
| `x-stepper` | Multi-step wizard |
| `x-timeline` | Timeline display |

### CMS Controls (0.4.0) — Specialized form controls for tavp-cms

| Component | Description |
|---|---|
| `x-media-picker` | Browse/select from media library |
| `x-relation-picker` | Select related content records |
| `x-tags-input` | Enter and manage tag lists |
| `x-seo-editor` | SEO meta title + description + OG image |
| `x-block-editor` | Gutenberg/Twill-style block-based content |
| `x-code-editor` | JSON/code editor with syntax highlighting |
| `x-taxonomy-browser` | Browse categories and tags |
| `x-revision-viewer` | View revision history |
| `x-search-results` | Search result display |
| `x-api-explorer` | API endpoint testing |

## Requirements

- PHP 8.3+
- Phalcon 5.16+
- tavp-core

## Install

```bash
# Via tavp CLI
tavp module:install tavp/tavpblocks

# Via Composer
composer require tavp/tavpblocks
```

## Usage

```html
<!-- In your Volt template -->
{{ button('Click me', ['variant' => 'primary']) }}
{{ input('name', ['label' => 'Your Name', 'required' => true]) }}
{{ modal('confirm-delete', 'Are you sure?') }}

<!-- CMS controls -->
{{ media_picker('featured_image', ['label' => 'Featured Image']) }}
{{ relation_picker('categories', ['type' => 'category', 'multiple' => true]) }}
{{ tags_input('tags', ['label' => 'Tags']) }}
{{ seo_editor('seo', ['title' => $record['title'] ?? '']) }}
```

## Styling

All components use Tailwind CSS classes. Customization via CSS variables:

```css
--btn-primary: #3b82f6;
--btn-radius: 0.5rem;
--input-border: #d1d5db;
```

## Testing

```bash
composer test
```

## Status

Part of **0.2.0 Mature** (ZeroVer `0.MINOR.PATCH`). 15 basic + 10 CMS controls.
Full 40+ in `0.4.0`.

## License

MIT

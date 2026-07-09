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

tabs, accordion, file-upload, rich-editor, date-picker, chart,
stat-card, form-group, confirm-dialog, loading-spinner, breadcrumb,
tooltip, progress-bar, stepper, timeline, and more.

## Requirements

- PHP 8.1+
- Phalcon 5.x
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

Part of **0.1.0 Genesis** (ZeroVer `0.MINOR.PATCH`). 15 basic components.
Full 40+ in `0.4.0`.

## License

MIT

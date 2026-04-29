

````md
# Status Enum Package

A lightweight, reusable PHP 8.1+ package that standardizes enum usage for dropdowns, validation, and display logic—especially useful in Laravel applications.
some changes may apply
---

## ✨ Features

- Enum value extraction for validation
- Dropdown-friendly options
- Clean label formatting
- Built-in validation rule
- Instance helper methods (`is`, `label`)
- Laravel-ready (framework-agnostic core)

---

## 📥 Installation

```bash
composer require roshan-dhungana/status
````

---

## ⚙️ Requirements

* PHP 8.1+
* Laravel 10+ (optional)

---

## 🚀 Quick Start

### Create your Enum

```php
namespace App\Enums;

use RoshanDhungana\Status\Contracts\EnumContract;
use RoshanDhungana\Status\Traits\HasEnumHelpers;

enum ProjectStatus: string implements EnumContract
{
    use HasEnumHelpers;

    case ACTIVE = 'active';
    case INACTIVE = 'inactive';
    case DRAFT = 'draft';
}
```

---

## 📋 Usage

### Get values (for validation)

```php
ProjectStatus::values();
```

Returns:

```php
['active', 'inactive', 'draft']
```

---

### Validation (Laravel)

```php
use Illuminate\Validation\Rule;

'status' => ProjectStatus::rule(),
```

---

### Dropdown options

```php
ProjectStatus::options();
```

Returns:

```php
[
    'active' => 'Active',
    'inactive' => 'Inactive',
    'draft' => 'Draft',
]
```

---

### Blade Example

```php
@foreach(ProjectStatus::options() as $value => $label)
    <option value="{{ $value }}">{{ $label }}</option>
@endforeach
```

---

### Get label from enum instance

```php
$status->label();
```

---

### Compare values safely

```php
if ($status->is(ProjectStatus::ACTIVE)) {
    // logic here
}
```

or

```php
$status->is('active');
```

---

### Parse from raw value

```php
$status = ProjectStatus::fromValue('active');
```

---

## 🧠 Why Use This Package?

Without this package, enum usage is often scattered:

* Hardcoded arrays in validation
* Duplicate dropdown mappings
* Inconsistent label formatting

This package centralizes everything into a **single source of truth**, improving:

* Maintainability
* Readability
* Consistency across your app

---

## 🏗 Architecture

* Contracts → define behavior
* Traits → reusable enum logic
* Enums → domain-specific states

The core is framework-agnostic while supporting Laravel seamlessly.

---

## 📌 Example: Eloquent Casting (Laravel)

```php
protected $casts = [
    'status' => ProjectStatus::class,
];
```

---

## 🔧 Extending

Create additional enums easily:

```php
enum OrderStatus: string implements EnumContract
{
    use HasEnumHelpers;

    case PENDING = 'pending';
    case COMPLETED = 'completed';
}
```

---

## 🤝 Contributing

Contributions, issues, and feature requests are welcome.

---


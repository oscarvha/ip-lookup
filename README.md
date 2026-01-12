# IP Lookup for PHP

**Framework-agnostic IP lookup library for PHP that fetches and normalizes IP metadata into rich domain objects.**

This package provides a clean, reusable way to retrieve IP address metadata (ASN, network, geolocation, ownership) and expose it as strongly-typed domain objects.  
It is designed to be used in **any PHP environment**: legacy PHP, CLI scripts, or modern frameworks.

---

## ✨ Features

- Framework-agnostic (no Laravel, no Symfony required)
- Clean Architecture / DDD-oriented design
- Strongly typed domain models (no raw arrays leaking out)
- Pluggable IP providers
- Explicit dependency injection (no hidden globals)
- Easy to test and extend

---

## 📦 Installation

```bash
composer require osd/ip-lookup
```

## Basic Usage

```php
use Osd\IpLookup\Bootstrap\IpLookupFactory;

$service = IpLookupFactory::createDefault();

$lookup = $service->execute('79.150.204.251');

echo $lookup->ip();
echo $lookup->owner()->organization();
```

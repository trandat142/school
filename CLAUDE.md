# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## Overview

This repository (`school`) stores course notes, slides, lab exercises, and source code across multiple academic subjects.

### Courses in this repository

1. **Phát triển ứng dụng WEB (`phat-trien-ung-dung-web`)**: PHP, HTML/CSS, Web forms, Sessions, Cookies, File upload.
2. **Lập trình trong CNTT với Java (`lap-trinh-trong-cntt-voi-java`)**: Java Core, Algorithms, Arrays, Sorting, OOP.
3. **Phát triển hệ thống tích hợp (`phat-trien-he-thong-tich-hop`)**: Java OOP, Inheritance, Polymorphism, System architecture.

---

## Repository Structure & Conventions

Each course directory strictly follows a 3-part layout:

```text
<course-folder>/
├── README.md         # Main index and quick links for the course
├── tai-lieu/         # Original slides, PDFs, requirements, and reference docs
├── online/           # Online lecture notes, concept summaries, and class demos
└── offline/          # Lab exercises, practical assignments, and source code
```

When creating new sessions or exercises:
- Name lesson directories using kebab-case: `buoi-XX/` (e.g., `buoi-01`, `buoi-2`).
- Include a `README.md` in each lesson directory outlining the objectives, file breakdown, and run commands.
- If a comprehensive walkthrough is needed, provide a companion `HUONG-DAN.md`.
- Keep the course root `README.md` and `offline/README.md` index links updated whenever new lessons are added.

---

## Development & Execution Commands

### PHP (`phat-trien-ung-dung-web`)

Run via PHP built-in web server:
```bash
# Start server from course root or lesson folder
cd phat-trien-ung-dung-web/offline/buoi-4
php -S localhost:8000
```
Then access via browser at `http://localhost:8000/<file_name>.php` (or through XAMPP `htdocs`).

Check PHP syntax:
```bash
php -l <path-to-file>.php
```

### Java (`lap-trinh-trong-cntt-voi-java`, `phat-trien-he-thong-tich-hop`)

Compile and execute single Java files:
```bash
# Compile with UTF-8 encoding
javac -encoding UTF-8 <FileName>.java

# Run compiled class
java <FileName>
```

---

## Slide & Visual Design Workflow (Pencil MCP)

When creating or editing visual slides, infographics, and lecture diagrams:

### Architecture & Tools
- **Design Canvas (`*.pen`)**: Managed exclusively via Pencil MCP tools (`mcp__pencil__execute`, `mcp__pencil__get_app_state`, etc.). Never read or edit `.pen` files directly with text tools.
- **Exported Visual Assets (`assets/design/` or lesson `tai-lieu/slides/`)**: WebP/PNG exports generated from the canvas.
- **Standard Artboard Dimensions**: `1200 x 675 px` (16:9 ratio, exported at 2x scale).

### Design Tokens & Styling Conventions
- **Base Canvas**: Pumice (`#e2e2df`)
- **Card/Surface**: Limestone (`#f7f6f2`)
- **Primary Text & Borders**: Obsidian (`#070607`)
- **Primary Accent**: Ember (`#fc5000`)
- **Secondary Accent**: Plasma Violet (`#524ae9`)
- **Tag/Highlight**: Sulfur (`#f5f28e`)
- **Typography**: Momo Trust Sans (Display headings & body text)
- **Iconography**: Lucide Icons / Phosphor Icons (clean vector SVG paths)


<div align="center">
  <img src="https://ui-avatars.com/api/?name=EDU+core&background=1e3a8a&color=fbbf24&size=150&font-size=0.33&rounded=true&bold=true" alt="EDUcore Logo" width="120">
  <br>
  <h1><b>EDUcore • School Management System</b></h1>
  <p><b>A Next-Generation, Enterprise-Grade SaaS for Educational Institutions.</b></p>
  
  <p>
    <a href="#"><img src="https://img.shields.io/badge/PHP-8.2+-777BB4?style=flat-square&logo=php&logoColor=white" alt="PHP Version"></a>
    <a href="#"><img src="https://img.shields.io/badge/Laravel-11.x-FF2D20?style=flat-square&logo=laravel&logoColor=white" alt="Laravel Version"></a>
    <a href="#"><img src="https://img.shields.io/badge/Tailwind_CSS-38B2AC?style=flat-square&logo=tailwind-css&logoColor=white" alt="Tailwind CSS"></a>
    <a href="#"><img src="https://img.shields.io/badge/Alpine.js-8BC0D0?style=flat-square&logo=alpine.js&logoColor=white" alt="Alpine JS"></a>
    <a href="#"><img src="https://img.shields.io/badge/MySQL-00000F?style=flat-square&logo=mysql&logoColor=white" alt="MySQL"></a>
    <a href="#"><img src="https://img.shields.io/badge/License-MIT-green.svg?style=flat-square" alt="License"></a>
  </p>
</div>

---

## 📖 Overview

**EDUcore** is a robust, highly scalable, and visually stunning School Management System. Designed with a frictionless User Experience (UX) and modern **Glassmorphism** UI, it bridges the communication and administrative gap between School Admins, Teachers, and Students.

By automating routine tasks like attendance, assignment grading, and fee tracking, EDUcore empowers educators to focus entirely on student growth.

> **Note:** This project is built using the **MVC (Model-View-Controller)** architecture along with the **Repository Pattern** for clean, maintainable, and testable code.

---

## 📑 Table of Contents
- [Screenshots](#-screenshots)
- [Core Modules & Features](#-core-modules--features)
- [System Architecture](#-system-architecture)
- [Installation & Setup](#-installation--setup)
- [Security Features](#-security-features)
- [Roadmap](#-roadmap)
- [License](#-license)

---

## 📸 Screenshots
*(Note to Developer: Replace these placeholder links with actual screenshots of your project)*

| Public Landing Page | Student Dashboard | Teacher Assignments |
| :---: | :---: | :---: |
| <img src="https://placehold.co/600x400/1e293b/ffffff?text=Landing+Page" width="250"> | <img src="https://placehold.co/600x400/1e293b/ffffff?text=Student+Dashboard" width="250"> | <img src="https://placehold.co/600x400/1e293b/ffffff?text=Teacher+Panel" width="250"> |

---

## ✨ Core Modules & Features

### 🛡️ 1. Multi-Tier Role-Based Access Control (RBAC)
- **Super Admin:** Complete overview of school revenue, active students, staff management, and system settings.
- **Teacher Portal:** Custom interface for managing classes, marking attendance, exporting dynamic student rosters (CSV), and publishing assignments.
- **Student/Parent Portal:** Personalized dashboard highlighting pending/overdue assignments, attendance records, and fee status.

### 🎨 2. Premium UI / UX Engineering
- **Glassmorphism Aesthetics:** Translucent navigation bars and deeply integrated Tailwind gradients.
- **Asynchronous Modals:** "No-refresh" animated popups powered by Alpine.js for Notice Boards, Data Previews, and Action Confirmations.
- **Dynamic Active Routing:** Smart navigation components that independently highlight active routes.

### 📚 3. Academic Engine
- **Assignment Management:** Teachers can distribute assignments with precise due dates. Students receive visual indicators (Red = Overdue, Green = Pending).
- **Roster Export Engine:** Utilizing Laravel's `streamDownload` for memory-efficient, real-time CSV extraction of student data.

---

## 🏗️ System Architecture

- **Framework:** Laravel 11.x
- **Frontend Styling:** Tailwind CSS (Custom compiled via Vite)
- **Frontend Interactions:** Alpine.js (Lightweight reactive components)
- **Design Patterns:** MVC, Repository Design Pattern, Service Classes.
- **Middleware:** Custom `PreventBackHistory` for secure session handling and custom role-verification middleware.

---

## ⚙️ Installation & Setup

### Prerequisites
Make sure your server meets the following requirements:
- PHP >= 8.2
- Composer >= 2.0
- Node.js & NPM
- MySQL >= 8.0 or MariaDB

### Step-by-Step Guide

**1. Clone the repository**
```bash
git clone [https://github.com/YourUsername/educore-system.git](https://github.com/YourUsername/educore-system.git)
cd educore-system

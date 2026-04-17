# 🌾 Agri Farm Management System

A web-based system designed to manage rice field operations, inventory, financial tracking, and harvest prediction.

---

## 🚀 Features

* 🌾 Rice Field Management (Sawah)
* 📅 Activity Tracking (Planting, Fertilizing, Spraying)
* 📦 Inventory Management (Fertilizer & Pesticide)
* 💰 Financial Tracking (Expenses & Income)
* 📊 Profit & Loss Calculation
* 🗺️ Map Integration (Field Location)
* 🤖 Harvest Prediction (AI - In Progress)

---

## 🧱 Tech Stack

* **Backend**: Laravel
* **Frontend**: Blade + Tailwind CSS
* **Database**: MySQL
* **API**: Laravel REST API
* **Maps**: Leaflet.js (Planned)
* **AI**: Python / Rule-based (Planned)

---

## 🗂️ Database Design

This project uses a structured relational database with the following main entities:

* Users
* Sawah (Fields)
* Aktivitas Sawah
* Panen
* Produk & Stok
* Transaksi (Pemasukan & Pengeluaran)
* Prediksi Panen

---

## ⚙️ Installation

```bash
git clone https://github.com/USERNAME/agri-farm-system.git
cd agri-farm-system
composer install
cp .env.example .env
php artisan key:generate
```

### Setup Database

* Create database: `agri_farm`
* Update `.env` file

```bash
php artisan migrate
```

---

## ▶️ Run Project

```bash
php artisan serve
npm install
npm run dev
```

---

## 📡 API Example

```http
GET /api/sawah
POST /api/sawah
```

---

## 📸 Preview

(Add your screenshots here)

---

## 📈 Project Status

🚧 Currently in development
✔ Database Design Completed
✔ Basic CRUD (Sawah) in progress
🔜 AI & Maps Integration

---

## 🙌 Author

**Muhammad Fauzan Naufaldy**

* 🌐 Portfolio: 
* 💼 LinkedIn: muhammad fauzan naufaldy

---

## ⭐ Notes

This project is built as a learning and portfolio project to improve skills in backend development, API design, and system architecture.

## ▶️ How to Build & Run Barista Café Application

### 📌 Prerequisites

Make sure you have these installed on your system:

* Docker
* Docker Compose
* Git
* Any browser (Chrome / Edge / Firefox)

Check versions (optional):

```bash
docker --version
docker compose version
```

---

## 📥 Step 1: Clone the Repository

```bash
git clone <your-repo-url>
cd Barista_multi
```

---

## 📁 Step 2: Project Structure (Important)

Make sure your folder looks like this:

```
app/
├──Barista_multi/
    ├── Backend/
    ├── nginx/
    ├── mysql-init/
    ├── docker-compose.yml
└── README.md
```

---

## 🐳 Step 3: Build & Start Containers

From the **root directory**:

```bash
docker compose up -d --build
```

What this does:

* Builds PHP application image
* Builds Nginx image
* Starts MySQL
* Initializes database automatically

---

## 🔍 Step 4: Verify Containers

```bash
docker ps
```

You should see:

* nginx container
* php/app container
* mysql container

All should be **running**.

---

## 🌐 Step 5: Access the Application

Open browser and go to:

```
http://localhost:8085
```

(or)

```
http://<VM-IP>:8085
```

---

## 🔐 Default Admin Login

```
Username: admin
Password: admin123
```

> ⚠ Password is stored as a **bcrypt hash**, not plain text.

---

## 🧑‍💻 Normal User Flow

1. Open website
2. Click **Create Account**
3. Register a new user
4. Login with new credentials
5. Access dashboard
6. Book a table

---

## 👑 Admin Portal Access

After logging in as **admin**, access:

```
http://localhost:8085/app/admin/
```

Admin can:

* View registered users
* View reservations

---

## 🛑 Stop the Application

```bash
docker compose down
```

---

## 🔁 Restart the Application

```bash
docker compose up -d
```

---

## 🧹 Clean Rebuild (If Something Breaks)

```bash
docker compose down -v
docker compose up -d --build
```

⚠ This will remove database data.

---

## 🧠 Notes

* Database is auto-created using `mysql-init/init.sql`
* Sessions are managed by PHP
* Nginx works as reverse proxy
* No manual DB setup required

---

## 🎯 Purpose of This Project

* Practice DevOps workflows
* Learn Docker & Docker Compose
* Prepare for CI/CD pipelines
* Deploy later to AWS / Kubernetes

---

# ☕ Barista Café – DevOps Project (Multi-Container Application)

This project demonstrates running a **multi-container web application** using **Docker Compose** on a local VM.

The application includes:
- Nginx (Reverse Proxy & Frontend)
- PHP-Apache Backend
- MySQL Database
- User Login & Registration
- Reservation Booking System
- Admin Portal to view users & reservations

---

## Project Structure

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

## Architecture (Local)

Browser  
→ Nginx  
→ PHP Backend  
→ MySQL Database  

---

## Prerequisites

Ensure the following are installed on your system or VM:

- Docker
- Docker Compose
- Git

Verify installation:
```bash
docker --version
docker compose version
git --version
````
---

## Steps to Run the Project

### 1 Clone the Repository

```bash
git clone https://github.com/Xsuchi/demo.git
```

### 2 Navigate to Project Directory

```bash
cd demo/app/Barista_multi
```
---

## 3 Docker Compose Commands

### Build Docker Images

```bash
docker compose build
```

### Start Containers (Detached Mode)

```bash
docker compose up -d
```

### Stop Containers

```bash
docker compose stop
```

### Start Stopped Containers

```bash
docker compose start
```

### Stop & Remove Containers and Networks

```bash
docker compose down
```

### Remove Everything (Containers, Images, Volumes)

```bash
docker compose down --rmi all --volumes
```

### Clean Entire Docker System (Optional)

```bash
docker system prune -a --volumes
```

---

##  Access the Application

If running on a **VM**, get the VM IP:

```bash
ip addr show
```

Open browser:

```
http://<VM-IP>:8085
```

---

## Application Login Details

### Admin Login

```
Username: admin
Password: admin123
```

Admin can:

* View all registered users
* View all reservations

### 👤 New User

* Click **Create Account**
* Register a new user
* Login
* Book table reservations

---

## Database Access & Troubleshooting

### Login to MySQL Container

```bash
docker exec -it mysql-db mysql -u root -p
```

Password:

```
rootpass
```

### Select Database

```sql
USE barista;
```

### View Users

```sql
SELECT id, username, password FROM users;
```

### View Reservations

```sql
SELECT * FROM reservations;
```

### Filter Reservations by Date

```sql
SELECT * FROM reservations
WHERE date = '2025-01-20';
```

### Clear All Reservations

```sql
DELETE FROM reservations;
```

---

## Project Purpose

This project is built for:

* Docker & Docker Compose practice
* Multi-container application understanding
* DevOps CI/CD pipeline testing
* Migration readiness to Kubernetes

---

# ☕ Barista Café – Simple Application Workflow

---

## 1️⃣ User opens the website

**URL:**

```
http://<host>:8085
```

* If **not logged in** → Login page is shown
* If **already logged in** → Dashboard opens

---

## 2️⃣ Register (New User)

**Flow:**

```
Login Page
 → Create Account
 → Register Page
 → User details saved in DB
 → Redirect to Login
```

* Username & password are stored
* Password is saved **securely (hashed)**

---

## 3️⃣ Login (Existing User)

**Flow:**

```
Login Page
 → Enter username & password
 → Validate with DB
 → Session created
 → Dashboard opens
```

* Wrong credentials → stays on login page
* Correct credentials → login successful

---

## 4️⃣ Dashboard (After Login)

**What user sees:**

* Website content (Barista Café)
* Navbar with:

  * Home
  * About
  * Menu
  * Contact
  * Reservation
  * Logout
* Admin user also sees **Admin** link

---

## 5️⃣ Book a Table (Reservation)

**Flow:**

```
Dashboard
 → Reservation Page
 → Fill form
 → Data saved in DB
```

* Name
* Phone
* Date
* Time
* Number of people

---

## 6️⃣ Admin Portal (Admin User Only)

**Flow:**

```
Login as admin
 → Dashboard
 → Admin link
 → Admin Portal
```

Admin can:

* View users
* View reservations

Normal users **cannot** access admin pages.

---

## 7️⃣ Logout

**Flow:**

```
Click Logout
 → Session destroyed
 → Back to Login page
```

User must login again to access the site.

---

## 🔁 One-Line Flow (Easy to Remember)

```
Login → Dashboard → Reservation → Logout
Register → Login → Dashboard
Admin → Login → Dashboard → Admin Portal
```

---

## 🎯 Why this is good (DevOps view)

* Clear entry point
* Session-based security
* Separate admin access
* Easy to map to cloud infra later

---

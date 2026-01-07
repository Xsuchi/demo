# ✅ STEP 1 — CHECK WHAT EXISTS IN DATABASE

Run this **exactly**:

```bash
docker exec -it mysql-db mysql -u root -p
```

(password: `rootpass`)

Then:

```sql
USE barista;
SELECT id, username, password FROM users;
```
---


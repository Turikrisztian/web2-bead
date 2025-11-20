# 3. Adatmodell és migrációk

Táblák:
- users: alap + `role` (string, default: user)
- messages: user_id (nullable FK), name, email, content, timestamps
- categories: name (unique), timestamps
- products: category_id (nullable FK), name, price(decimal 10,2), description, timestamps
- orders: user_id, product_id, quantity, total, timestamps

Kapcsolatok:
- User – Message: 1:N (email alapú szűrés is)
- Category – Product: 1:N
- Product – Order: 1:N
- User – Order: 1:N

Seeder-ek:
- AdminUserSeeder: admin@example.com / Admin12345
- CategoryProductSeeder: minta kategóriák és termékek

Mezők részletezve:
`users`
- id (PK, bigint unsigned)
- name (string, 255)
- email (string, unique)
- password (hashed)
- role (string, default 'user')
- timestamps

`messages`
- id
- user_id (nullable, FK users.id) – ha bejelentkezett küldte
- name – vendég név
- email – válaszolható email
- content (text)
- created_at/updated_at

`categories`
- id
- name (unique)
- timestamps

`products`
- id
- category_id (nullable, FK categories.id)
- name (string)
- price (decimal 10,2)
- description (text nullable)
- timestamps

`orders`
- id
- user_id (FK users.id)
- product_id (FK products.id)
- quantity (unsigned int)
- total (decimal 10,2) – redundáns tárolás a gyors lekérdezéshez
- timestamps

Indexek / optimalizáció:
- products(category_id) -> kategória szerinti listázás gyorsítása.
- orders(user_id, product_id) -> statisztikák aggregálása.
- messages(email) -> szűrés user saját üzeneteire.

Kapcsolatok Eloquent-ben (példa):
```php
// Product.php
public function category() { return $this->belongsTo(Category::class); }
public function orders() { return $this->hasMany(Order::class); }
```

ER diagram (szöveges):
```
User 1---N Message
User 1---N Order N---1 Product N---1 Category
```

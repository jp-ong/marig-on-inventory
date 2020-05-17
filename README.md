# MARIG-ON INVENTORY SYSTEM

#### By: _John Paul Ong_ | _Lyndon Tomas_ | _Richie Tan_

---

#### Live demo:

- Link: `https://marig-on.herokuapp.com/`

---

#### MongoDB:

- Connection: `mongodb+srv://<username>:<password>@ong-cluster-smaha.mongodb.net/phpmongo`

- Database: _phpmongo_

- Collections: _users_, _items_

- Users: `{_id: ObjectId, username:String, password:String, access_level:Number, createdAt:Date}`

- Items: `{_id: ObjectId, item_name:String, item_series:String, item_qty:Number, trend_val:String, createdAt:Date, updatedAt:Date, updatedBy:String}`

---

#### Access Levels:

- 0 - _Guest_ **View(_ID, Name, Series_)**
- 1 - _User_ **View(_ID, Name, Series, Quantity_), Add**
- 2 - _Admin_ **View(_ID, Name, Series, Quantity, Trend, Created At, Updated At, Updated By, Actions_), Add, Modify, Delete**

---

#### Setup _(for devs)_:

1. Create new folder.
2. Open VSCode in created folder.
3. Open new terminal.
4. `git clone https://github.com/jp-ong/marig-on-inventory .` **or** download manually.
5. `composer install` on your terminal. _Optional_
6. Set-up finished!
7. Run with xampp on your machine. _Optional_

---

#### Todos:

---

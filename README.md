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

- Users: `{_id: ObjectId, username:String, password:String, access_level:Number}`

- Items: `{_id: ObjectId, item_id:String, item_desc:String, item_qty:Number}`

---

#### Access Levels:

- 0 - _Guest_
- 1 - _User_
- 2 - _Admin_

---

#### Setup:

1. Create new folder.
2. Open VSCode in created folder
3. Open new terminal
4. `git clone https://github.com/jp-ong/marig-on-inventory .`
5. `composer install`
6. Set-up finished!

---

#### Todos:

- Make guest page

---

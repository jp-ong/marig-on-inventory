# MARIG-ON INVENTORY SYSTEM

### By: **John Paul Ong** | **Lyndon Tomas** | **Richie Tan**

#### Setup:

- Create new folder.
- Open VSCode in new folder
- Open new terminal
- `git clone https://github.com/jp-ong/marig-on-inventory .`
- `composer install`
- Set-up finished!

#### MongoDB:

##### Connection: `mongodb+srv://<username>:<password>@ong-cluster-smaha.mongodb.net/phpmongo`

##### Database: phpmongo

##### Collections: users, items

##### Users: `{\_id: ObjectId, username:String, password:String, access_level:Number}`

##### Items: `{\_id: ObjectId, item_id:String, item_desc:String, item_qty:Number}`

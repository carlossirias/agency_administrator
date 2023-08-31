<p align="center"><a href="https://agencyadministrator-production.up.railway.app/agency" target="_blank"><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/8/8c/Logo_Eskimo_Nicaragua.svg/2560px-Logo_Eskimo_Nicaragua.svg.png" width="400" alt="Laravel Logo"></a></p>
<hr>

<div align="center">
    <img src="https://img.shields.io/badge/laravel-%23FF2D20.svg?style=for-the-badge&logo=laravel&logoColor=white">
    <img src="https://img.shields.io/badge/php-%23777BB4.svg?style=for-the-badge&logo=php&logoColor=white">
    <img src="https://img.shields.io/badge/tailwindcss-%2338B2AC.svg?style=for-the-badge&logo=tailwind-css&logoColor=white">
    <img src="https://img.shields.io/badge/mysql-%2300f.svg?style=for-the-badge&logo=mysql&logoColor=white">
    <img src="https://img.shields.io/badge/figma-%23F24E1E.svg?style=for-the-badge&logo=figma&logoColor=white">
    <img src="https://img.shields.io/badge/Railway-0B0D0E.svg?style=for-the-badge&logo=Railway&logoColor=white">
    <img src="https://img.shields.io/badge/Visual%20Studio%20Code-0078d7.svg?style=for-the-badge&logo=visual-studio-code&logoColor=white">
    <img src="https://img.shields.io/badge/Git-F05032.svg?style=for-the-badge&logo=Git&logoColor=white">
</div>

<br>
A web application designed to assist eskimo agencies in efficiently managing their vendors and tracking popsicle sales. This intuitive platform allows agencies to create vendor profiles, record their daily activities, and maintain a detailed record of popsicle sales.

Eskimo is a company derived from Lala, a Mexican company with operations in Nicaragua. Eskimo has agencies throughout the country, and these agencies operate independently. Therefore, agency owners have their own ways of managing them.

These independent agencies have vendors, individuals responsible for selling the products on the streets. Eskimo provides the product and sets the initial price. Subsequently, the agencies decide how much markup they will add for the vendors. Finally, the vendors, depending on the agency, add a second markup that determines the final price for the customer. Under this system, vendors make profits based on how much they can sell and the markup applied to the price.



<p align='center'><img src='https://4.bp.blogspot.com/-IGXCV-HuIZU/UuRXwHzJjCI/AAAAAAAAAeY/Wtv_DCdwilI/s1600/VENDEDOR+DE+ESKIMOS.jpg' width='400'></p>


This web application is capable of storing the input and output information of each seller, as well as their inventory and the calculations performed at that moment for that seller in the application. This way, administrators are exempt from making errors in calculations, sellers will receive a fair receipt, and administrators will be able to maintain an accurate record of each seller's sales.

### How do agencies dispatch and receive sellers?


The seller arrives early in the morning as usual. They check the agency's price table to see if there have been any changes, as this will determine the selling price of the product. Then, they bring out their ice cream cart and the manager starts serving. The manager asks them how many ice creams of the different types they will be taking, noting everything on the receipt and handing over the requested ice creams to the seller.

In the evening, the seller returns to be received again. At this point, they take out all the unsold ice creams for the manager to count. The manager subtracts the initially brought ice cream quantity from the remaining ice creams, thereby determining the total quantity of ice creams sold.

The sales quantity is multiplied by the prices set by the agency for each type of ice cream. This way, the subtotals for each type of ice cream are calculated and added up to get the total amount of money that the seller needs to return to the agency.

Both the sellers and the agency owners earn profits through the margin they generate from street sales.

## Demo<a name="id1"></a>

[Agency administrator](https://agencyadministrator-production.up.railway.app/)


## Feautures

### Sellers information

<p align='center'><img src='https://i.ibb.co/MkbZ3Tb/935shots-so.png'></p>

In this section, the agency administrator will be able to perform various actions related to the sales agents, such as adding, viewing, editing, and deleting their records. Each sales agent will have their own dedicated area where their personal information will be stored, including their Name, ID Number, Phone Number, Address, and even a profile picture. This profile picture will serve as a visual aid for the administrator to easily recognize the sales agent.

In the event that a sales agent has not been terminated but the administrator wishes to deactivate them, they will have the option to do so by updating the relevant information and unchecking the `Habilitado` checkbox. This way, the sales agent will not be removed from the database but will be excluded from all other functions of the application.


### Prices

<p align='center'><img src='https://i.ibb.co/KF4bX0R/549shots-so.png'></p>

As mentioned earlier, the initial price will be provided by Eskimo, while the independent agency needs to determine the additional price margin. To facilitate this process, there is a dedicated `Pricing` section where agency administrators can access information about the ice creams, including whether any promotions are applicable and their corresponding suggested prices.

Within this same section, administrators have the ability to choose the desired price margin they wish to add to the initial price. Once this calculation is completed, the resulting price to be offered to the seller is immediately displayed adjacent to it. _It's important to note that this price will be unique for each agency_.


### Dashboard

<p align='center'><img src='https://i.ibb.co/37j3193/322shots-so.png' ></p>

In the dashboard, administrators will have the ability to view the active sellers for that specific day. In this same section, there is a button provided for dispatching the sellers. Clicking on this button will redirect us to another section where we can select the seller we wish to dispatch. The application will only display the sellers who have not yet been dispatched on that day.

The seller cards contain specific and important information that can assist the administrator in contacting the seller without the need to navigate to the sellers' section. Additionally, the card indicates whether the seller is active (not yet received) or not. It also displays the dispatch time, and if the seller has already been received, it shows the arrival time as well. If the seller has not yet been received, there will be a button to `Receive` the seller. Conversely, if the seller has already been received, a button to `View Receipt` will be shown.

Within these same cards, clicking on the seller's name will reveal special dispatch information, such as the amount of money carried by the seller, the number of ice cream palettes, and a table specifying which flavors are included.

### Receipts

<p align='center'><img src='https://i.ibb.co/f8jYwHD/653shots-so.png'></p>

Finally, in the `Receipts` section, the administrator will have the ability to view both the receipts issued on the current day and older receipts from different days. The administrator can also access information about the arrival and departure dates and times. Similar to the dashboard, a `View Receipt` button will be displayed. Clicking on this button will redirect them to another section where a PDF receipt will be generated with the dispatch information. This includes details such as the number of palettes dispatched, the number returned, the total sales, and the amount owed to the agency.

This feature is designed to allow the administrator to either print or save the receipt for providing it to the seller. The PDF receipt serves as a comprehensive record of the transaction, helping in maintaining clear communication between the agency and the seller.


## Database<a name="id2"></a>

<p align="center"><img  src="https://i.ibb.co/ZMphm5K/Screenshot-2023-08-28-003113.png"></p>

This database was tailor-made for the project, keeping in mind possible future changes that might be made to the application. It is designed to be highly adaptable and capable of hosting multiple agencies with multiple vendors and multiple daily sales. The app has also been designed so that the company in charge of overseeing the agencies (Eskimo) can model the ice cream flow efficiently. This way, if Eskimo decides to introduce a new product, make price changes, or update promotions, these changes will be instantly communicated to the agencies without the need for notification from a distributor.

Note: _The demo does not include an agency login system because it is focused on working with a single agency (Villa Sol Agency) for demonstration purposes._

### Agencies

| id   | agency_name | agency_phone   | adency_adress |
| :--- | :---------- | :------------- | :------------ |
| `PK` |             |                |               |

This is where the database begins. The `agencies` table is used to store the multiple agencies that exist in our application, as well as their main information, such as Name, Address, Number, etc.

### Sellers

| id   | agency_id            | seller_name   | seller_phone | seller_identificacion_number | seller_adress | enabled | seller_image |
| :--- | :------------------- | :------------ | :----------- | :--------------------------- | :------------ | :------ | :----------- |
| `PK` | **agencies.id** `FK` |               |              |                              |               | `true`  | _NULLABLE_   |

The `sellers` table enables us to accommodate multiple vendors in our application, along with their personal information. Additionally, the table includes a column where the ID from the `agencies` table is stored. This allows us to determine the agency from which the vendor originates.

### Palletes

| id   | pallete_name | pallete_image | pallete_description | suggested_price | promotion | promtion_price |
| :--- | :----------- | :------------ | :------------------ | :-------------- | :-------- | :------------- |
| `PK` |              |               | _NULLABLE_          |                 | `false`   | `10`           |

The `palettes` table enables Eskimo to add new ice cream flavors for all agencies, along with their suggested prices. It also allows for the selection of which flavors are on promotion and which ones are not, including the promotional price for those specific flavors.

### Prices Palletes

| id   | agency_id            | pallete_id           | added_price | 
| :--- | :------------------- | :------------------- | :---------- |
| `PK` | **agencies.id** `FK` | **palletes.id** `FK` | `0.00`      |

We state that each agency has its own added price. Due to this, this table is closely related to the `palettes` table as it houses the added price for each agency and each ice cream flavor. The `agency_id` and `palette_id` columns enable us to determine the price for that specific agency and that particular flavor.

Note: _The application features listeners for each time a palette is created in the `palettes` table. This allows for the automatic creation of a new palette for all agencies that have been created up to that point. This ensures that all agencies can view the new palette and update their added price accordingly. This functionality could also be implemented as a trigger within the database._

### Daily Records

| id   | seller_id           | active        | departure_datetime | arrival_datetime | total_earned | 
| :--- | :------------------ | :------------ | :----------------- | :--------------- | :----------- | 
| `PK` | **sellers.id** `FK` | `true`        |                    | _NULLABLE_       |  _NULLABLE_  |

In the `daily_records` table, we can find the dispatch information of the sellers. For instance, it includes the ID from the `sellers` table, which allows us to determine which seller carried out the dispatch. Additionally, it records the dispatch time and, if applicable, the reception time. The total earnings are also recorded. It's important to highlight that the "daily_pallete_sales" table maintains a strong relationship with this one, as the overall earnings calculation depends significantly on the data recorded in that table.

### Daily Pallete Sales

| id   | daily_record_id         | pallete_id           | price | quantity_send | quantity_sold |
| :--- | :---------------------- | :------------------- | :---- |:------------ | :------------ |
| `PK` | **daily_record.id** `FK`|  **pallete.id** `FK` |       |             | _NULLEABLE_   |

In the previous table, we stored dispatch information. However, that table doesn't enable us to store the quantity of pallets the seller received or brought along. For this purpose, this new table has been created. By utilizing the "daily_record_id" and "pallete_id" identifiers, it's possible to access the exact dispatch record as well as the specific palette information. This structure will enable the application to perform calculations successfully.

Note: _In this same table, the exact price at which the seller's dispatch occurred is also stored. This way, if any changes are made in the `prices_pallets` table, it will not affect past records. The seller will not be affected even if there was a price change on that day._

## Roadmap

- Implement a login system for the agencies.
- Implement upload additional files for the seller's profile, such as police records, etc.
- Enhance the security of the system.
- Implement a search system for records.
- Section to view agency statistics.

## Support 

For support, email carlos.sirias04@gmail.com.




<p align="center"><a href="https://agencyadministrator-production.up.railway.app/agency" target="_blank"><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/8/8c/Logo_Eskimo_Nicaragua.svg/2560px-Logo_Eskimo_Nicaragua.svg.png" width="400" alt="Laravel Logo"></a></p>
<hr>

A web application designed to assist eskimo agencies in efficiently managing their vendors and tracking popsicle sales. This intuitive platform allows agencies to create vendor profiles, record their daily activities, and maintain a detailed record of popsicle sales.

Eskimo is a company derived from Lala, a Mexican company with operations in Nicaragua. Eskimo has agencies throughout the country, and these agencies operate independently. Therefore, agency owners have their own ways of managing them.

These independent agencies have vendors, individuals responsible for selling the products on the streets. Eskimo provides the product and sets the initial price. Subsequently, the agencies decide how much markup they will add for the vendors. Finally, the vendors, depending on the agency, add a second markup that determines the final price for the customer. Under this system, vendors make profits based on how much they can sell and the markup applied to the price.

<p align='center'><img src='https://4.bp.blogspot.com/-IGXCV-HuIZU/UuRXwHzJjCI/AAAAAAAAAeY/Wtv_DCdwilI/s1600/VENDEDOR+DE+ESKIMOS.jpg' width='400'></p>


This web application is capable of storing the input and output information of each seller, as well as their inventory and the calculations performed at that moment for that seller in the application. This way, administrators are exempt from making errors in calculations, sellers will receive a fair receipt, and administrators will be able to maintain an accurate record of each seller's sales.


## Demo<a name="id1"></a>

[Agency administrator](https://agencyadministrator-production.up.railway.app/)


## Feautures

### Sellers information

<p align='center'><img src='https://i.ibb.co/yXYRSCL/Screenshot-2023-08-29-190909.png' width='800'></p>

In this section, the agency administrator will be able to perform various actions related to the sales agents, such as adding, viewing, editing, and deleting their records. Each sales agent will have their own dedicated area where their personal information will be stored, including their Name, ID Number, Phone Number, Address, and even a profile picture. This profile picture will serve as a visual aid for the administrator to easily recognize the sales agent.

In the event that a sales agent has not been terminated but the administrator wishes to deactivate them, they will have the option to do so by updating the relevant information and unchecking the `Habilitado` checkbox. This way, the sales agent will not be removed from the database but will be excluded from all other functions of the application.


### Prices

<p align='center'><img src='https://i.ibb.co/7SRZcf7/Screenshot-2023-08-29-192213.png' width='800'></p>

As mentioned earlier, the initial price will be provided by Eskimo, while the independent agency needs to determine the additional price margin. To facilitate this process, there is a dedicated `Pricing` section where agency administrators can access information about the ice creams, including whether any promotions are applicable and their corresponding suggested prices.

Within this same section, administrators have the ability to choose the desired price margin they wish to add to the initial price. Once this calculation is completed, the resulting price to be offered to the seller is immediately displayed adjacent to it. _It's important to note that this price will be unique for each agency_.


### Dashboard

<p align='center'><img src='https://i.ibb.co/tYH6T7M/Screenshot-2023-08-29-194617.png' width='800'></p>

In the dashboard, administrators will have the ability to view the active sellers for that specific day. In this same section, there is a button provided for dispatching the sellers. Clicking on this button will redirect us to another section where we can select the seller we wish to dispatch. The application will only display the sellers who have not yet been dispatched on that day.

The seller cards contain specific and important information that can assist the administrator in contacting the seller without the need to navigate to the sellers' section. Additionally, the card indicates whether the seller is active (not yet received) or not. It also displays the dispatch time, and if the seller has already been received, it shows the arrival time as well. If the seller has not yet been received, there will be a button to `Receive` the seller. Conversely, if the seller has already been received, a button to `View Receipt` will be shown.

Within these same cards, clicking on the seller's name will reveal special dispatch information, such as the amount of money carried by the seller, the number of ice cream palettes, and a table specifying which flavors are included.

### Receipts

<p align='center'><img src='https://i.ibb.co/5K0LHcf/Receipts.jpg' width='800'></p>

Finally, in the "Receipts" section, the administrator will have the ability to view both the receipts issued on the current day and older receipts from different days. The administrator can also access information about the arrival and departure dates and times. Similar to the dashboard, a "View Receipt" button will be displayed. Clicking on this button will redirect them to another section where a PDF receipt will be generated with the dispatch information. This includes details such as the number of palettes dispatched, the number returned, the total sales, and the amount owed to the agency.

This feature is designed to allow the administrator to either print or save the receipt for providing it to the seller. The PDF receipt serves as a comprehensive record of the transaction, helping in maintaining clear communication between the agency and the seller.


## Database<a name="id2"></a>

<p align="center"><img  src="https://i.ibb.co/ZMphm5K/Screenshot-2023-08-28-003113.png"></p>

This database was tailor-made for the project, keeping in mind possible future changes that might be made to the application. It is designed to be highly adaptable and capable of hosting multiple agencies with multiple vendors and multiple daily sales. The app has also been designed so that the company in charge of overseeing the agencies (Eskimo) can model the ice cream flow efficiently. This way, if Eskimo decides to introduce a new product, make price changes, or update promotions, these changes will be instantly communicated to the agencies without the need for notification from a distributor.

Note: _The demo does not include an agency login system because it is focused on working with a single agency (Villa Sol Agency) for demonstration purposes._

### Sellers




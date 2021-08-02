# Shopping-terminal

GENERAL INFORMATION
-------------------

Shopping terminal allows user to see list of products, their prices and special proposals, in order to choose needed number of the different products and add them to the cart.
Users can go to the page with the cart itself, where they can see the list of chosen products with the price, quantity and total price for all the products. The user is able to delete
product from the cart if it isn't needed any more and come back to the main page.

TOOLS
-----

Interface of the cart is written with the use of HTML/CSS and JavaScript. Backend is written on PHP without using any framework. PHPUnit was used for testing this application. All the
code was written in IDE PhpStorm. MySql was used as the database management system. The app has been developing on the local server Apache.

DETAILED INSTRUCTION
--------------------

You can see the list of products and change the quantity of particular product. For this you should click on plus button to increase the quantity and on minus button to decrease. Then 
press the "Add" button to add product to the cart. You can add only one type of product at once. After that, you can see the number of added products in the header, near the cart icon. 
To see the chosen products, you must click on the cart icon and the app shows you the cart page. If you don't add anything to cart, you should see the message "The cart is empty" and
total is 0. If there are products in the cart, you are able to see the title, quantity and price which is calculate according to the special proposals. Program reckons the sum of all
prices and shows it as "Total". Button "Pay" isn't valid. You can delete the product from the cart by pressing the icon of garbage can. The product will instantly disappear from the
cart. You can come back to the main page by clicking on link "Back to product list".

LIST OF PRODUCTS
----------------
* Banana - £2.00 each or 4 for £7.00
* Peach - £12.00 each
* Orange - £1.25 each or 6 for £6.00
* Apple - £0.15 each

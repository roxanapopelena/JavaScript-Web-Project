# JavaScript-Web-Project
Web Project that focuses on the use of JavaScript and the DOM elements.<br/>
Developed using HTML, PHP, JavaScript, SQL, MySQL Database; no CSS included.<br/>
Main features: <br/>
1. Create a facility that allows the administrator of the site to edit details of a book currently held in the database<br/>
●	Choose a book to edit: the administrator is able to choose a book to edit from a list<br/>
●	Edit details of  book: after choosing an book (clicking on its title) to edit, the user is able to edit all of the details of that book, except the ISBN, using a form and the book’s details are amended in the MySQL database.<br/>
●	Server-side data validation and making data safe: the validity of the data entered is checked and the values made safe for each field used (using PHP)<br/>
2.	Create a facility to allow the user to logon via a form.  For the non-logged in user, the logon form is included on every page within the site in a consistent location. For the logged in user, a logout feature is included in the same location. When a user logs in or logs out they should return (be redirected back) to the homepage.<br/>
3. Only users who have successfully logged in are able to gain access to the ‘Choose a book to edit’ (the list of books to choose from) or to ‘Edit details of a book’ (the edit form) functionality to edit details of a book currently held in the database. Without logging on successfully via the form, the user cannot gain access to either. <br/>
4.	Logon script: this should check that the username entered by the user in the logon form exists in the NBL_users table. <br/>
5.	Created Javascript code which will adds the following functionality to orderBooksForm.php 

a.	Make the text saying “I have read and agree to the terms and conditions” change to the colour black and remove the bold if the user checks the terms and conditions checkbox, and return to the original formatting if they uncheck the checkbox

b.	The form’s submit button is disabled until the user has checked the checkbox to say that they have read and agree to the terms and conditions

c.	It is not be possible to submit the form if the user does not enter a value into the text entry fields, e.g. for surname or company, and at least one book has not been selected

d.	The dynamically created form contains details of different books. Next to each is a checkbox that has been given a data-price attribute corresponding to the price of a particular book. The user is also given the choice of collection method for the books that is selected via a radio button, each with a corresponding price.

Use JavaScript to calculate the total cost of the order based on the book checkboxes that are selected and the choice of delivery method. The total cost should be displayed appropriately to allow the user to consider the cost before committing themselves to buying a book. If the user un-checks all of the books that they had previously checked, the total cost should always go back to zero

e.	A select box has been provided to do with the type of customer. It (“Customer  Type”) allows the user to select whether they are a standard customer or a corporate customer (a business).

If the user selects “Customer” for non-corporate customer then the div containing the “forename” and “surname” input areas are visible, while the “Company name” input area not. On the other hand if the user selects “Corporate” for a corporate customer the opposite is true.

6.	Create a basic home page named either index.html or index.php that 
a)	provides links to the other pages in the site
b)	contains two aside elements, one with the id ‘offers’ and one with the id ‘JSONoffers’

7.	AJAX in the home page
a)	Use appropriate AJAX code to request the getOffers.php script when the home page of the site is loaded, then display the default response (a special offer placed inside an HTML paragraph) in an aside tag with the id ‘offers’ inside the home page

b)	Every 5 seconds a new special offer is requested and then displayed inside the ‘offers’ aside in the home page
c)	In a manner similar to a), appropriate AJAX code is used to request getOffers.php?useJSON when the home page of the site is loaded, and then specify that the response should be in JSON format. AJAX is then used to display the response in an appropriate manner in an aside tag with the id ‘JSONoffers’ inside the home page

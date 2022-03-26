You will build a PHP Web Application for our client “Zippy Used Autos”.

Database:
Zippy has a small inventory of 10 vehicles on his lot. He has provided the details for the vehicles in the attached
Excel spreadsheet. You will need to create a database named “zippyusedautos”. The database should contain 4 tables:
vehicles, makes, types, and classes. Provide foreign key relationships to link the tables.

The Public Homepage:
Zippy wants it to simply list ALL of his inventory by default when the page loads. The list should be ordered by most
expensive vehicle first and descend to least expensive. Customers should be able to change the sort order to year (also
descending) or back to price. The sort order input (price or year) may be a drop down menu or radio buttons. Customers
should be able to choose to display only a specific make, type, or class of vehicle. You do not need to provide
combinations of the above... Just make OR type OR class queries. These make, type, or class selections should be made
from drop-down menus.

Zippy’s Admin Backend:
Zippy’s admin area should be in a subdirectory named admin. URL ends in: /admin/ The starting page is a list like
customers see, but also allows Zippy to delete any vehicle. Zippy needs pages to list makes, types, and classes where he
can add more or delete them. He also needs a page to add new vehicles to his list. Do not link to the admin pages from
the public page of Zippy’s app. We will only tell Zippy the address of this page. We have not covered creating a secure
login yet, and I will not expect it for this midterm project.

The design of your PHP Application should follow the MVC design pattern. There will be more than one controller and the
design will be discussed further in class and on Blackboard.

Zippy realizes that over 50% of people browsing the web for a new vehicle will be using a mobile device. Please apply
Responsive Design to Zippy’s application. While Zippy understands he did not hire a dedicated front-end developer, we
should be able to provide a basic design that confirms to mobile phones, tablets, and larger screens. It also helps to
design for the smallest device screen first. In Chrome Dev Tools, this is an iPhone 5. Work your way up to larger
screens with media queries and test the display in dev tools. Note: Many back end devs use Bootstrap, Semantic UI, or
similar frameworks instead of CSS from scratch. Frameworks are not required but may help you with the responsiveness and
appearance of your application.

When complete, deploy Zippy’s web app to Heroku. You will need to export your dev database from myPhpAdmin and import it
into Heroku’s JawsDB version of MySQL. Utilize the directions for Heroku deployment in Blackboard to accomplish this.

8)    Submit the following:
A link to your GitHub code repository (no code updates after the due date accepted on the Midterm)
A link to your deployed project on Heroku (for Zippy’s customers)
A link to Zippy’s “Back End Home Page” (for Zippy to admin his site)
A one page PDF document discussing what challenges you faced while building your project. Share your project and the key
parts of your discussion in the final project forum in Blackboard.


-----------------------------------------------------------------------------------------------------------------------------------


While there is nothing 100% new required in the Midterm Project, there are some parts that will require constructing
somethingmore complex with your previously acquired knowledge. That said, I thought I might give a few pointers /
suggestions. And while I'm at it, I'll provide screenshots of my completed version. The screenshots are just showing you
MY version. Your version may be styled in an entirely different manner with CSS or a CSS framework like Bootstrap while
still meeting the project requirements. '
Breakdown of the Project Requirements (refer to the requirements sheet including the rubric as you read this):

1) What the project is.
2) The data model with 4 tables. Expand on the category concept from the ToDo List. Only now you have 3 categories with
3) IDs that should be foreign keys in the vehicles table.
4) The public homepage has only one action: Display all of the vehicles. The data results may be limited to all vehicles
   of a certain make, type, or class but the resulting view always lists vehicles for customers to see. The
   functionality requirement applies to both the public homepage and Zippy's admin vehicle list. Sort order relates to
   the ORDER BY clause in your SQL statements The required drop-menu selections only work one at a time. You can request
   all vehicles of a certain make, type, or class...but not combinations (unless you complete the extra credit which is
   challenging). Don't focus on the E.C. Complete the minimum requirements first. Give make precedence over type and
   class. Give type more weight than class. Therefore, if all 3 are selected before the form is submitted, return
   results based on the make. If both type and class are selected but no make, return results based on the type.
5) Zippy's admin area is where the project becomes more complex. Zippy's starting page is another vehicle list, but it
   also allows Zippy to delete any vehicle. This should remind you of the ToDo List. Zippy also wants pages for each
   category: make, type, and class. These pages will list all makes, types, or classes. They will also allow list items
   to be deleted. A form should be included to allow Zippy to add new items, too. Think about how many possible actions
   there are. This could be one huge controller, but it will be better to break it up. The index.php in the admin folder
   will be the default master controller which could also be called a router. If you provide 4 smaller sub-controllers,
   these actions are much easier to organize. Therefore action requests to 'add_make', 'delete_make', and 'list_makes'
   require the inclusion of "controllers/makes.php". Think of it this way: Each model file, such as '
   model/makes_db.php', should also be equally represented with a controller like 'controllers/makes.php' and a view
   like 'view/makes_list.php'. The model in this project can be shared with the public part of the web application.
   Therefore, the model directory may be in the root along with the admin directory, the public view directory, and the
   top level index.php file. The admin directory should contain its own index.php (the master controller) along with
   it's own view directory and controllers directory.
6) Follow the MVC design pattern as required. Note: we are not into Object-Oriented Programming (OOP) yet. If you look
   for examples online, many PHP examples show the use of classes to create objects. We will get there. Only use what we
   have covered in class.
7) Responsive Design is a must. I'm not looking for elaborate design. Utilitarian design (plain but works - such as my
   example) is good for this project. Bootstrap may be a good framework to use if you want to. My example CSS is similar
   to the textbook examples and inspired a little bit by Bootstrap.
8) Deployment to Heroku is required. If you know of another free provided that allows you to deploy a PHP application
   and MySQL database, please discuss with me before assuming an exception will be permitted.
9) Submit all requirements to Blackboard. Things to notice in the screenshots below:
   You cannot delete a vehicle from the index.php (customer view)
   Zippy's Admin page has all the functionality of the index.php page, but also offers the ability to delete vehicles,
   and links to the other functionality Zippy needs for vehicle types and classes. Instead of multiple forms, it looks
   like the view filter and sort options at the top of the index.php are all submitted with one form. Refer to the
   parameters given above. The mobile phone views below feature a responsive table. In the 2nd image of the mobile
   phone, you can see the table has scrolled to bring the other columns into view.
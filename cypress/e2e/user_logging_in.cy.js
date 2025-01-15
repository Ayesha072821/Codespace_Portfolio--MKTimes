//This test if user can correctly log in using right credentials

//Test to Load MKTimes Website and see if right url is loaded
describe('Loading MKTimes Website and try to log in with wrong credentials', () => {
  it('passes', () => {
    
    cy.visit('http://localhost/Codespace_Portfolio--MKTimes--EC2284074/index.php')
    cy.url().should('be.equal','http://localhost/Codespace_Portfolio--MKTimes--EC2284074/index.php')
    
    cy.get('#signinout').click()

    cy.url().should('be.equal','http://localhost/Codespace_Portfolio--MKTimes--EC2284074/login.php')
    

    //we are entering rigt email and right password
    cy.get('#user_email').type('ayeshy19@gmail.com')

    cy.get('#user_password').type('shahwaizaslam')
    cy.get('#log_in').click()


    // if user logs in successfully it will take to index page

    cy.url().should('be.equal','http://localhost/Codespace_Portfolio--MKTimes--EC2284074/index.php')



    // tests to see if website behaves properly after logging in.

    // if user is logged in it should give access to all pages 

    // test to check if user can view Female collection.

    cy.get('#her').click()

    //url should be female collection page

    cy.url().should('be.equal','http://localhost/Codespace_Portfolio--MKTimes--EC2284074/femalecollection.php')



    //click on MK Time and it should take user to the index page

    cy.get('.navbar-brand').click()
 
    //user should go to index page

    cy.url().should('be.equal','http://localhost/Codespace_Portfolio--MKTimes--EC2284074/index.php')

    // now we will view Male collection from index page

    cy.get('#him').click()

    // user should be able to see Male collection

    cy.url().should('be.equal','http://localhost/Codespace_Portfolio--MKTimes--EC2284074/malecollection.php')

    //now user should be able to click of OUR Collection button on header

    cy.get('#navbarDarkDropdownMenuLink').click()

    //user selects the Female collection 
    cy.get('#herfromheader').click()
    
    //user should go to female collection page

     cy.url().should('be.equal','http://localhost/Codespace_Portfolio--MKTimes--EC2284074/femalecollection.php')
    
    
    //now user should be able to click of OUR Collection button on header

    cy.get('#navbarDarkDropdownMenuLink').click()

    //user selects the Male collection 
    cy.get('#himfromheader').click()
    
    //user should go to Male collection page

    cy.url().should('be.equal','http://localhost/Codespace_Portfolio--MKTimes--EC2284074/malecollection.php')
    
  
    // if contact button is clicked user should visit the contact page
    cy.get('#contact').click()

    cy.url().should('be.equal','http://localhost/Codespace_Portfolio--MKTimes--EC2284074/contactform.php')
    

    //going to cart and see if initially cart is empty

    cy.get('#cart').click()

    cy.get('#empty_cart').should('contain.text','There are no items in cart.')

    //going back to index page and tring to add some Items to cart from Female Collection

    cy.get('.navbar-brand').click()
    
    //viewing the female collection

    cy.get('#her').click()

    //for this is know the ID against all the products in database
    //clicking the product with id=1
    cy.get('#1').click()

    //clicking the product with id =4

    cy.get('#4').click()


    //checking if cart have 2 items

    cy.get('#item_count').should('contain.text','2')


    //going to index page and add some products from Male colection

    cy.get('.navbar-brand').click()
    cy.get('#him').click()

    //i know the id of all products in database
    cy.get('#11').click()
    cy.get('#14').click()
    cy.get('#14').click()  //i added this item 2 times in cart

    //cart should have total of 5 items now

    cy.get('#item_count').should('contain.text','5')


    //now i'll go view the cart page


    cy.get('#cart').click()


    //test to remove item from cart

    // removing item with id#14 and checing the number of items in cart and it should be 3

    cy.get('#14').click()

    
    cy.get('#item_count').should('contain.text','3')

    

    //try to update the quantity of items

    //update the quantity to -1 for item with id#1 it should not do that

    cy.get('[name="quantity[1]"]').clear().type('-1')
    cy.get('#update_cart').click()

    //number of items in cart are not changed 
    cy.get('#item_count').should('contain.text','3')



    //changing the quantity to 2 and see if cart count is changed 
    //cart count should be 5

    cy.get('[name="quantity[1]"]').clear().type('3')
    cy.get('#update_cart').click()

    cy.get('#item_count').should('contain.text','5')


    //if user can check out 
    cy.get('#checkout').click()

    cy.url().should('be.equal','http://localhost/Codespace_Portfolio--MKTimes--EC2284074/checkout.php')


    // if order is created a display message should be printed
    cy.get('#order_place').should('contain.text','Thanks for your order.')



    //view order history page

    cy.get('#orderhistory').click()

    //it shoulkd go to order details page

    cy.url().should('be.equal','http://localhost/Codespace_Portfolio--MKTimes--EC2284074/vieworders.php')




    //tring to logout of the website and see if user have access to any page
    // bu accessing any page user should redirected to login page


    cy.get('#signinout').click()

    cy.url().should('be.equal','http://localhost/Codespace_Portfolio--MKTimes--EC2284074/index.php')


    //see if user have no access to any page

    cy.get('#her').click()

    cy.url().should('be.equal','http://localhost/Codespace_Portfolio--MKTimes--EC2284074/login.php')



    












  
  })
})
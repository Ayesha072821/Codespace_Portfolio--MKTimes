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
    
      
  
  })
})
//Putting all the right Things and seeing if registration goes through

//If user is Registerd using This spec Next Time This Test will Fil as user will already be registered.

// this test will work with a always a new email that is not in data base

//this test will work if all the Criteria for Inputs is fulfilled.


describe('Testing if Registration with new email works', () => {
  it('passes', () => {

    cy.visit('http://localhost/Codespace_Portfolio--MKTimes--EC2284074/index.php')

    cy.get('#register').click()

    cy.url().should('be.equal','http://localhost/Codespace_Portfolio--MKTimes--EC2284074/registration.php')

    cy.get('#firstname').type('ayesha')

    cy.get('#lastname').type('yousaf')
  
    cy.get('#dateofbirth').type('2001-10-02')
  
    cy.get('#email').type('mktimestesting.email@gmail.com')

    cy.get('#password').type('shahwaiz')

    cy.get('#confirmpassword').type('shahwaiz')

    cy.get('#registeruser').click();

    //this email do not exists in database it should go to the next page
     cy.url().should('be.equal','http://localhost/Codespace_Portfolio--MKTimes--EC2284074/user_registration.php')

    cy.get('#verify_email').click()

    cy.url().should('be.equal','http://localhost/Codespace_Portfolio--MKTimes--EC2284074/verify_email.php')

    cy.pause()
    //here i pause the testing because i get a code in email to register the user
   
    //i will enter the code i am getting  manually and then go to next page and will resume the testing process

    //cy.get('#verify_email_button').click()
    cy.url().should('be.equal','http://localhost/Codespace_Portfolio--MKTimes--EC2284074/verify_email_logic.php')

    cy.get('#log').click()

    cy.url().should('be.equal','http://localhost/Codespace_Portfolio--MKTimes--EC2284074/login.php')

  })
})
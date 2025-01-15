
//this test takes in the link recieved in email and trying to submit the empty form


describe('Visit The email link ', () => {
  it('passes', () => {
    cy.visit('http://localhost/Codespace_Portfolio--MKTimes--EC2284074/resetpassword.php?email=YXllc2h5MTlAZ21haWwuY29t')

    //it should not do anything

    cy.get('#reset').click()

  })
})


//This test put different passwords and submit it

describe('Visit The email link and put Different Passwords ', () => {
  it('passes', () => {
    cy.visit('http://localhost/Codespace_Portfolio--MKTimes--EC2284074/resetpassword.php?email=YXllc2h5MTlAZ21haWwuY29t')

    //it should not do anything

    cy.get('#new_password').type('shah1234')

    cy.get('#confirm_new_password').type('shah12345')

    
    cy.get('#reset').click()

    cy.get('#error').should('contain.text','Passwords do not match')

  })
})




//This test put less than 8 character passwords and submit it

describe('Visit The email link and put Less than 8 characters Passwords ', () => {
  it('passes', () => {
    cy.visit('http://localhost/Codespace_Portfolio--MKTimes--EC2284074/resetpassword.php?email=YXllc2h5MTlAZ21haWwuY29t')

    //it should not do anything

    cy.get('#new_password').type('shah')

    cy.get('#confirm_new_password').type('shah')

    
    cy.get('#reset').click()

    cy.get('#error').should('contain.text','Password should be more then 8 characters long')

  })
})


describe('Visit The email link and change the password ', () => {
  it('passes', () => {
    cy.visit('http://localhost/Codespace_Portfolio--MKTimes--EC2284074/resetpassword.php?email=YXllc2h5MTlAZ21haWwuY29t')

    //it should not do anything

    cy.get('#new_password').type('shahwaizaslam')

    cy.get('#confirm_new_password').type('shahwaizaslam')

    
    cy.get('#reset').click()

   cy.url().should('be.equal','http://localhost/Codespace_Portfolio--MKTimes--EC2284074/resetlogic.php')

   cy.get('#update').should('contain.text','Password Updated Sucessfully.Click the link to Log In.')

   cy.get('#log').click()

   cy.url().should('be.equal','http://localhost/Codespace_Portfolio--MKTimes--EC2284074/login.php')

       //we are entering rigt email and right password
       cy.get('#user_email').type('ayeshy19@gmail.com')

       cy.get('#user_password').type('shahwaizaslam')
       cy.get('#log_in').click()
   
   
       // if user logs in successfully it will take to index page
   
       cy.url().should('be.equal','http://localhost/Codespace_Portfolio--MKTimes--EC2284074/index.php')
   
   
  
    
  })
})




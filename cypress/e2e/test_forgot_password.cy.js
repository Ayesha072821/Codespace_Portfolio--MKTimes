
//this Test see if User is able to change password

describe('User Can view the Forgot password page', () => {
  it('passes', () => {
    cy.visit('http://localhost/Codespace_Portfolio--MKTimes--EC2284074/index.php')

    //user should go to the login page
    cy.visit('http://localhost/Codespace_Portfolio--MKTimes--EC2284074/login.php')

    cy.get('#forgot_password').click()

    cy.visit('http://localhost/Codespace_Portfolio--MKTimes--EC2284074/forgotpassword.php')



    //trying to submit form without entering any email

    //nothing should happen
    cy.get('#pass_change').click()


    //trying to enter wrong email which do n ot exixt in database

    cy.get('#user_email').type('ayeshy190@gmail.com')

    cy.get('#pass_change').click()

    cy.get('.error').should('contain.text', 'Email address do not exist')




  })
})




//this is to see if user enters empty form

describe('Test Empty Form Submission', () => {
  it('passes', () => {
    cy.visit('http://localhost/Codespace_Portfolio--MKTimes--EC2284074/index.php')

    //user should go to the login page
    cy.visit('http://localhost/Codespace_Portfolio--MKTimes--EC2284074/login.php')

    cy.get('#forgot_password').click()

    cy.visit('http://localhost/Codespace_Portfolio--MKTimes--EC2284074/forgotpassword.php')



    //trying to submit form without entering any email

    //nothing should happen
    cy.get('#pass_change').click()



  })
})



//this Test see if error comes up on entering wrong email

describe('Test Wrong email for forgot Password', () => {
  it('passes', () => {
    cy.visit('http://localhost/Codespace_Portfolio--MKTimes--EC2284074/index.php')

    //user should go to the login page
    cy.visit('http://localhost/Codespace_Portfolio--MKTimes--EC2284074/login.php')

    cy.get('#forgot_password').click()

    cy.visit('http://localhost/Codespace_Portfolio--MKTimes--EC2284074/forgotpassword.php')
  

    //trying to enter wrong email which do not exixt in database

    cy.get('#user_email').type('ayeshy190@gmail.com')

    cy.get('#pass_change').click()

    cy.get('.error').should('contain.text', 'Email address do not exist')




  })
})


//this Test see if user recieves an email for password change
//email entered is correct and user should have access to this email to change password
//user is updated that email has been sent

describe('Test Wrong email for forgot Password', () => {
  it('passes', () => {
    cy.visit('http://localhost/Codespace_Portfolio--MKTimes--EC2284074/index.php')

    //user should go to the login page
    cy.visit('http://localhost/Codespace_Portfolio--MKTimes--EC2284074/login.php')

    cy.get('#forgot_password').click()

    cy.visit('http://localhost/Codespace_Portfolio--MKTimes--EC2284074/forgotpassword.php')
  

    //trying to enter wrong email which do not exixt in database

    cy.get('#user_email').type('ayeshy19@gmail.com')

    cy.get('#pass_change').click()

    cy.get('#reset').should('contain.text','Link To reset password has been sent to you email. Click that to change your password.')



  })
})







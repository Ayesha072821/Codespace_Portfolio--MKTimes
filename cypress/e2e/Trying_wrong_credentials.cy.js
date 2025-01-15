//This test will enter right password against wrong email address already in database and it should get an error message

//Test to Load MKTimes Website and see if right url is loaded
describe('Loading MKTimes Website and try to log in with wrong Password', () => {
  it('passes', () => {
    
    cy.visit('http://localhost/Codespace_Portfolio--MKTimes--EC2284074/index.php')
    cy.url().should('be.equal','http://localhost/Codespace_Portfolio--MKTimes--EC2284074/index.php')
    
    cy.get('#signinout').click()

    cy.url().should('be.equal','http://localhost/Codespace_Portfolio--MKTimes--EC2284074/login.php')
    

    cy.get('#user_email').type('ayeshy190@gmail.com')

    cy.get('#user_password').type('shahwaizaslam')
    cy.get('#log_in').click()

    cy.get('#login_err').should('contain.text','Wrong Credentials. Please try again')

    
  
  })
})





//This test will enter wrong password against email address already in database and it should get an error message

//Test to Load MKTimes Website and see if right url is loaded
describe('Loading MKTimes Website and try to log in with wrong Password', () => {
  it('passes', () => {
    
    cy.visit('http://localhost/Codespace_Portfolio--MKTimes--EC2284074/index.php')
    cy.url().should('be.equal','http://localhost/Codespace_Portfolio--MKTimes--EC2284074/index.php')
    
    cy.get('#signinout').click()

    cy.url().should('be.equal','http://localhost/Codespace_Portfolio--MKTimes--EC2284074/login.php')
    

    cy.get('#user_email').type('ayeshy19@gmail.com')

    cy.get('#user_password').type('123456789')
    cy.get('#log_in').click()

    cy.get('#login_err').should('contain.text','Wrong Credentials. Please try again')

    
  
  })
})



//This test will enter Right password against wrong email email address already in database and it should get an error message

//Test to Load MKTimes Website and see if right url is loaded
describe('Loading MKTimes Website and try to log in with wrong email and wrong Password', () => {
  it('passes', () => {
    
    cy.visit('http://localhost/Codespace_Portfolio--MKTimes--EC2284074/index.php')
    cy.url().should('be.equal','http://localhost/Codespace_Portfolio--MKTimes--EC2284074/index.php')
    
    cy.get('#signinout').click()

    cy.url().should('be.equal','http://localhost/Codespace_Portfolio--MKTimes--EC2284074/login.php')
    

    cy.get('#user_email').type('ayeshy190@gmail.com')

    cy.get('#user_password').type('123456789')
    cy.get('#log_in').click()

    cy.get('#login_err').should('contain.text','Wrong Credentials. Please try again')

    
  
  })
})